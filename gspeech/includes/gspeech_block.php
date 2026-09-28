<?php

defined('ABSPATH') or die("No direct access");

add_action('init', 'gspeech_register_player_block');

function gspeech_register_player_block() {

	if (!function_exists('register_block_type')) {
		return;
	}

	$plugin_version = defined('GSPEECH_PLG_VERSION') ? GSPEECH_PLG_VERSION : '3.22.1';
	$dir_url = plugin_dir_url(__FILE__);

	$script_deps = array('wp-blocks', 'wp-element', 'wp-components', 'wp-i18n', 'wp-editor');
	if (function_exists('get_bloginfo') && version_compare(get_bloginfo('version'), '5.3', '>=')) {
		$script_deps[] = 'wp-block-editor';
	}

	wp_register_script(
		'gspeech-block',
		$dir_url . 'js/gspeech-block.js',
		$script_deps,
		$plugin_version,
		true
	);

	wp_register_style(
		'gspeech-block-editor',
		$dir_url . 'css/gspeech-block-editor.css',
		array('wp-edit-blocks'),
		$plugin_version
	);

	$wpgs_options = get_option('wpgs_settings', array());
	$use_old_plugin = isset($wpgs_options['use_old_plugin']) ? intval($wpgs_options['use_old_plugin']) : 0;
	$widget_id = (string) get_option('gspeech_widget_id', '');

	wp_localize_script('gspeech-block', 'gspeechBlock', array(
		'isLegacy' => ($use_old_plugin === 1) ? 1 : 0,
		'hasCloud' => ($widget_id !== '') ? 1 : 0,
		'settingsUrl' => admin_url('admin.php?page=gspeech'),
		'cloudUrl' => admin_url('admin.php?page=gspeech_cloud_console'),
	));

	$block_args = array(
		'editor_script' => 'gspeech-block',
		'editor_style' => 'gspeech-block-editor',
		'attributes' => array(
			'type' => array(
				'type' => 'string',
				'default' => 'full',
			),
		),
	);

	$block_json = __DIR__ . '/block.json';
	if (file_exists($block_json) && function_exists('register_block_type_from_metadata')) {
		register_block_type_from_metadata($block_json);
		return;
	}

	register_block_type('gspeech/player', $block_args);
}
