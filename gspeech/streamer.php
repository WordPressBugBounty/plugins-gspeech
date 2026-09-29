<?php

if ( ! defined( 'ABSPATH' ) ) {
	http_response_code( 403 );
	exit;
}

final class GSpeech_Legacy_Streamer {

	const NONCE_ACTION = 'gspeech_legacy_stream';

	const MAX_TEXT_LENGTH = 200;

	const MAX_REQUESTS_PER_MINUTE = 120;

	const MAX_SITE_REQUESTS_PER_MINUTE = 1000;

	const OWN_STREAMER_KEY = 'gsp2x_8f4c1a7e29d3b6c0e5a8f1d2479b3c6e';

	public static function stream() {

		if ( 'GET' !== self::server_value( 'REQUEST_METHOD' ) ) {
			self::send_error( 'Invalid request method.', 405 );
		}

		$widget_id = (string) get_option( 'gspeech_widget_id', '' );

		if ( $widget_id !== '' ) {
			self::send_error( 'Legacy mode is disabled.', 403 );
		}

		if ( false === check_ajax_referer( self::NONCE_ACTION, 'nonce', false ) ) {
			self::send_error( 'Invalid request.', 403 );
		}

		if ( 'cross-site' === strtolower( self::server_value( 'HTTP_SEC_FETCH_SITE' ) ) ) {
			self::send_error( 'Cross-site requests are not allowed.', 403 );
		}

		if ( ! self::has_valid_referer() ) {
			self::send_error( 'Invalid request source.', 403 );
		}

		$text    = self::query_value( 'q' );
		$lang    = sanitize_text_field( self::query_value( 'l' ) );
		$token   = sanitize_text_field( self::query_value( 'token' ) );
		$tr_tool = sanitize_key( self::query_value( 'tr_tool' ) );

		if ( 'g' !== $tr_tool ) {
			self::send_error( 'Unsupported speech provider.', 400 );
		}

		/*
		 * Keep the original text transformation because the Google token
		 * is generated in the legacy JavaScript from this text.
		 */
		$text = wp_strip_all_tags( $text, true );

		$text = str_replace(
			array( '"', "'", '&nbsp;', "\0" ),
			'',
			$text
		);

		if ( '' === trim( $text ) ) {
			self::send_error( 'Empty text.', 400 );
		}

		$text_length = function_exists( 'mb_strlen' )
			? mb_strlen( $text, 'UTF-8' )
			: strlen( $text );

		if ( $text_length > self::MAX_TEXT_LENGTH ) {
			self::send_error( 'Text is too long.', 413 );
		}

		if ( ! preg_match( '/^[a-z]{2,3}(?:-[a-z]{2,4})?$/i', $lang ) ) {
			self::send_error( 'Invalid language.', 400 );
		}

		if ( ! preg_match( '/^\d{1,10}\.\d{1,10}$/', $token ) ) {
			self::send_error( 'Invalid speech token.', 400 );
		}

		if ( ! self::within_rate_limits() ) {
			self::send_error( 'Too many requests.', 429 );
		}

		$url = add_query_arg(
			array(
				'ie'       => 'UTF-8',
				'q'        => $text,
				'tl'       => $lang,
				'total'    => 1,
				'idx'      => 0,
				'textlen'  => $text_length,
				'tk'       => $token,
				'client'   => 'tw-ob',
				'prev'     => 'input',
				'ttsspeed' => 1,
			),
			'https://translate.google.com/translate_tts'
		);

		$response = self::fetch_google_tts( $url );

		if ( ! self::is_audio_response( $response ) ) {
			$response = self::fetch_own_streamer( $text, $lang, $token, $tr_tool );
		}

		if ( ! self::is_audio_response( $response ) ) {
			self::send_error( 'Speech generation failed.', 502 );
		}

		$audio = wp_remote_retrieve_body( $response );

		status_header( 200 );

		header( 'Content-Type: audio/mpeg' );
		header( 'Content-Length: ' . strlen( $audio ) );
		header( 'Content-Disposition: inline' );
		header( 'X-Content-Type-Options: nosniff' );
		header( 'Cache-Control: private, max-age=3600' );

		echo $audio;
		exit;
	}

	private static function fetch_google_tts( $url ) {

		return wp_safe_remote_get(
			$url,
			array(
				'timeout'             => 10,
				'redirection'         => 2,
				'limit_response_size' => 1024 * 1024,
				'user-agent'          => 'stagefright/1.2 (Linux; Android 5.0)',
				'headers'             => array(
					'Referer' => 'https://translate.google.com/',
					'Accept'  => 'audio/mpeg,audio/*;q=0.9,*/*;q=0.8',
				),
			)
		);
	}

	private static function fetch_own_streamer( $text, $lang, $token, $tr_tool ) {

		return wp_safe_remote_post(
			'https://gspeech.io/streamer.php',
			array(
				'timeout'             => 10,
				'redirection'         => 2,
				'limit_response_size' => 1024 * 1024,
				'headers'             => array(
					'X-GSpeech-Streamer-Key' => self::OWN_STREAMER_KEY,
				),
				'body'                => array(
					'q'       => $text,
					'l'       => $lang,
					'tr_tool' => $tr_tool,
					'token'   => $token,
				),
			)
		);
	}

	private static function is_audio_response( $response ) {

		if ( is_wp_error( $response ) ) {
			return false;
		}

		$status_code = (int) wp_remote_retrieve_response_code( $response );
		$audio       = wp_remote_retrieve_body( $response );

		if ( 200 !== $status_code || '' === $audio ) {
			return false;
		}

		$content_type = (string) wp_remote_retrieve_header(
			$response,
			'content-type'
		);

		if (
			'' !== $content_type &&
			0 !== stripos( $content_type, 'audio/' )
		) {
			return false;
		}

		return true;
	}

	private static function query_value( $key ) {

		if (
			! isset( $_GET[ $key ] ) ||
			! is_string( $_GET[ $key ] )
		) {
			return '';
		}

		return wp_unslash( $_GET[ $key ] );
	}

	private static function server_value( $key ) {

		if (
			! isset( $_SERVER[ $key ] ) ||
			! is_string( $_SERVER[ $key ] )
		) {
			return '';
		}

		return sanitize_text_field(
			wp_unslash( $_SERVER[ $key ] )
		);
	}

	private static function has_valid_referer() {

		$referer = self::server_value( 'HTTP_REFERER' );

		/*
		 * Some privacy configurations remove the Referer header.
		 * In that case the nonce and rate limits still apply.
		 */
		if ( '' === $referer ) {
			return true;
		}

		$site_host = wp_parse_url(
			home_url(),
			PHP_URL_HOST
		);

		$referer_host = wp_parse_url(
			$referer,
			PHP_URL_HOST
		);

		if (
			! is_string( $site_host ) ||
			! is_string( $referer_host )
		) {
			return false;
		}

		return hash_equals(
			strtolower( $site_host ),
			strtolower( $referer_host )
		);
	}

	private static function within_rate_limits() {

		$minute = gmdate( 'YmdHi' );

		$ip = self::server_value( 'REMOTE_ADDR' );

		$ip_hash = substr(
			hash_hmac(
				'sha256',
				$ip,
				wp_salt( 'nonce' )
			),
			0,
			24
		);

		$ip_key = 'gsp_tts_ip_' . $ip_hash . '_' . $minute;

		$site_key = 'gsp_tts_site_' . $minute;

		return self::increment_limit(
			$ip_key,
			self::MAX_REQUESTS_PER_MINUTE
		) && self::increment_limit(
			$site_key,
			self::MAX_SITE_REQUESTS_PER_MINUTE
		);
	}

	private static function increment_limit( $key, $limit ) {

		$count = (int) get_transient( $key );

		if ( $count >= $limit ) {
			return false;
		}

		set_transient(
			$key,
			$count + 1,
			2 * MINUTE_IN_SECONDS
		);

		return true;
	}

	private static function send_error( $message, $status_code ) {

		status_header( $status_code );

		header( 'Content-Type: text/plain; charset=UTF-8' );
		header( 'X-Content-Type-Options: nosniff' );
		header( 'Cache-Control: no-store' );

		echo esc_html( $message );
		exit;
	}
}