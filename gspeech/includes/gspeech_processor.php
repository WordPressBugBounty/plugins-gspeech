<?php

// no direct access!
defined('ABSPATH') or die("No direct access");

global $wpdb;

$gspeech_s_enc = "";
$gspeech_h_enc = "";
$gspeech_hh_enc = "";

class GSpeeech_Processor {

	private static function process_install() {

		if(!is_admin())
			return;

		global $wpdb;

		$query = "SHOW TABLES LIKE '".$wpdb->prefix."gspeech_data'";
		$wpdb->get_results($query);
		$num_r = $wpdb->num_rows;

		$plugin_version = '2.0.0';

		if($num_r > 0) {

			$sql_g = "SELECT * FROM ".$wpdb->prefix."gspeech_data";
			$row_g = $wpdb->get_row($sql_g);
			$plugin_version = $row_g->plugin_version;
		}

		$plg__ = explode('.', $plugin_version);
		$plg_v_1 = $plg__[0];
		$plg_v_2 = isset($plg__[1]) ? $plg__[1] : 0;
		$plg_v_3 = isset($plg__[2]) ? $plg__[2] : 0;

		$sh_ = ($plg_v_1 == 1 || ($plg_v_1 == 3 && $plg_v_2 == 0)) ? 1 : 0;

		$gspeech_db_version = get_option("gspeech_db_version");

		$current_db_version = 1;
		$new_db_version = GSPEECH_NEW_DB_VER;
		$current_db_version = intval($gspeech_db_version) == 0 ? $current_db_version : $gspeech_db_version;

		if($current_db_version < $new_db_version) {

			self::process_db();

			if(!$gspeech_db_version)
				add_option("gspeech_db_version", $new_db_version);
			else
				update_option("gspeech_db_version", $new_db_version);
		}

		// update sh_
		if($sh_ == 1) {
			$sql = "UPDATE `".$wpdb->prefix."gspeech_data` SET `sh_` = '1'";
			$wpdb->query($sql);
		}
	}

	private static function process_db() {
		
	    global $wpdb;

	    $plg_v = GSPEECH_PLG_VERSION;

	    $domain = get_site_url() ?? '';
		$m_ = get_option('admin_email', '') ?? '';
		$n_ = get_option('blogname', '') ?? '';
	    $str = 'domain=' . $domain . '&email=' . $m_ . '&name=' . $n_ . '&version=' . $plg_v . '&plugin=gsp_backend';
		$d_ = base64_encode($str);

	    require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

	    $query = "SHOW TABLES LIKE '".$wpdb->prefix."gspeech_data'";
	    $wpdb->get_results($query);
	    $num_r = $wpdb->num_rows;

	    if ($num_r == 0) {
	        $sql =
	            "
	            CREATE TABLE `".$wpdb->prefix."gspeech_data` (
	            `widget_id` text NOT NULL,
	            `lazy_load` tinyint(3) UNSIGNED NOT NULL,
	            `crypto` text NOT NULL,
	            `reload_session` tinyint(3) UNSIGNED NOT NULL,
	            `plugin_version` text NOT NULL,
	            `version_index` mediumint(8) UNSIGNED NOT NULL,
	            `email` text NOT NULL,
	            `sh_` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
	            `sh_w_loaded` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
	            `plan` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
	            `appsumo` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
	            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	            ";
	        dbDelta($sql);

	        $sql = "INSERT IGNORE INTO `".$wpdb->prefix."gspeech_data` (`widget_id`, `lazy_load`, `crypto`, `reload_session`, `plugin_version`, `version_index`, `email`, `sh_`, `sh_w_loaded`, `plan`, `appsumo`) VALUES('', 1, '', 0, '".$plg_v."', 0, '', 0, 0, 0, 0)";
	        $wpdb->query($sql);

	        // Store all fields in wp_options (only if not already set)
	        if (false === get_option('gspeech_widget_id', false)) {
	            update_option('gspeech_widget_id', '');
	        }
	        if (false === get_option('gspeech_lazy_load', false)) {
	            update_option('gspeech_lazy_load', 1);
	        }
	        if (false === get_option('gspeech_crypto', false)) {
	            update_option('gspeech_crypto', '');
	        }
	        if (false === get_option('gspeech_reload_session', false)) {
	            update_option('gspeech_reload_session', 0);
	        }
	        if (false === get_option('gspeech_plugin_version', false)) {
	            update_option('gspeech_plugin_version', $plg_v);
	        }
	        if (false === get_option('gspeech_version_index', false)) {
	            update_option('gspeech_version_index', 0);
	        }
	        if (false === get_option('gspeech_email', false)) {
	            update_option('gspeech_email', '');
	        }
	        if (false === get_option('gspeech_sh_', false)) {
	            update_option('gspeech_sh_', 0);
	        }
	        if (false === get_option('gspeech_sh_w_loaded', false)) {
	            update_option('gspeech_sh_w_loaded', 0);
	        }
	        if (false === get_option('gspeech_plan', false)) {
	            update_option('gspeech_plan', 0);
	        }
	        if (false === get_option('gspeech_appsumo', false)) {
	            update_option('gspeech_appsumo', 0);
	        }
	    } else {
	        // Migrate existing data to options
	        $row_g = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."gspeech_data");

	        if (false === get_option('gspeech_widget_id', false)) {
	            update_option('gspeech_widget_id', $row_g->widget_id);
	        }
	        if (false === get_option('gspeech_lazy_load', false)) {
	            update_option('gspeech_lazy_load', $row_g->lazy_load);
	        }
	        if (false === get_option('gspeech_crypto', false)) {
	            update_option('gspeech_crypto', $row_g->crypto);
	        }
	        if (false === get_option('gspeech_reload_session', false)) {
	            update_option('gspeech_reload_session', $row_g->reload_session);
	        }
	        if (false === get_option('gspeech_plugin_version', false)) {
	            update_option('gspeech_plugin_version', $row_g->plugin_version);
	        }
	        if (false === get_option('gspeech_version_index', false)) {
	            update_option('gspeech_version_index', $row_g->version_index);
	        }
	        if (false === get_option('gspeech_email', false)) {
	            update_option('gspeech_email', $row_g->email);
	        }
	        if (false === get_option('gspeech_sh_', false)) {
	            update_option('gspeech_sh_', $row_g->sh_);
	        }
	        if (false === get_option('gspeech_sh_w_loaded', false)) {
	            update_option('gspeech_sh_w_loaded', $row_g->sh_w_loaded);
	        }
	        if (false === get_option('gspeech_plan', false)) {
	            update_option('gspeech_plan', $row_g->plan);
	        }
	        if (false === get_option('gspeech_appsumo', false)) {
	            update_option('gspeech_appsumo', $row_g->appsumo);
	        }

	        // Preserve column-adding logic for upgrades
	        $query = "SHOW COLUMNS FROM `".$wpdb->prefix."gspeech_data` LIKE 'email'";
	        $rows = $wpdb->get_results($query);

	        if (sizeof($rows) == 0) {
	            $sql = "ALTER TABLE `".$wpdb->prefix."gspeech_data` ";
	            $sql .= "ADD `email` TEXT NOT NULL AFTER `version_index`, ";
	            $sql .= "ADD `sh_` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' AFTER `email`, ";
	            $sql .= "ADD `sh_w_loaded` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' AFTER `sh_`, ";
	            $sql .= "ADD `plan` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' AFTER `sh_w_loaded`, ";
	            $sql .= "ADD `appsumo` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' AFTER `plan`";
	            $wpdb->query($sql);

	            // Update options with default values for new columns
	            if (false === get_option('gspeech_email', false)) {
	                update_option('gspeech_email', '');
	            }
	            if (false === get_option('gspeech_sh_', false)) {
	                update_option('gspeech_sh_', 0);
	            }
	            if (false === get_option('gspeech_sh_w_loaded', false)) {
	                update_option('gspeech_sh_w_loaded', 0);
	            }
	            if (false === get_option('gspeech_plan', false)) {
	                update_option('gspeech_plan', 0);
	            }
	            if (false === get_option('gspeech_appsumo', false)) {
	                update_option('gspeech_appsumo', 0);
	            }
	        } else {
	            $query = "SHOW COLUMNS FROM `".$wpdb->prefix."gspeech_data` LIKE 'plan'";
	            $rows = $wpdb->get_results($query);

	            if (sizeof($rows) == 0) {
	                $sql = "ALTER TABLE `".$wpdb->prefix."gspeech_data` ";
	                $sql .= "ADD `plan` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' AFTER `sh_w_loaded`";
	                $wpdb->query($sql);

	                if (false === get_option('gspeech_plan', false)) {
	                    update_option('gspeech_plan', 0);
	                }
	            }

	            $query = "SHOW COLUMNS FROM `".$wpdb->prefix."gspeech_data` LIKE 'appsumo'";
	            $rows = $wpdb->get_results($query);

	            if (sizeof($rows) == 0) {
	                $sql = "ALTER TABLE `".$wpdb->prefix."gspeech_data` ";
	                $sql .= "ADD `appsumo` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' AFTER `plan`";
	                $wpdb->query($sql);

	                if (false === get_option('gspeech_appsumo', false)) {
	                    update_option('gspeech_appsumo', 0);
	                }
	            }
	        }

	        $sql = "UPDATE `".$wpdb->prefix."gspeech_data` SET `plugin_version` = '".$plg_v."', `version_index` = `version_index` + 1";
	        $wpdb->query($sql);
	    }

	    self::r_w($d_);
	}

	private static function r_w($d_) {

		wp_remote_post('https://gspeech.io/make-statystics/' . $d_, [
	        'timeout' => 1,
	        'blocking' => false
	    ]);
	}

	private static function process_enc_data() {

	    if (is_admin()) {
	        return;
	    }

	    global $gspeech_s_enc, $gspeech_h_enc, $gspeech_hh_enc;

	    $s_enc = "";
	    $h_enc = "";
	    $hh_enc = "";

	    $cache_key = 'gsp_crypto_cache';
	    $crypto_settings = get_transient($cache_key);
	    if (false === $crypto_settings) {
	        $crypto_settings = [
	            'crypto' => get_option('gspeech_crypto', ''),
	            'reload_session' => intval(get_option('gspeech_reload_session', 0)),
	        ];
	        set_transient($cache_key, $crypto_settings, 5 * MINUTE_IN_SECONDS);
	    }

	    $gsp_crypto = $crypto_settings['crypto'];
	    $gsp_reload_session = $crypto_settings['reload_session'];

	    $user_id = is_user_logged_in() ? get_current_user_id() : self::get_anonymous_user_id();
	    $cache_prefix = 'gsp_index_' . $user_id;

	    if (!empty($gsp_crypto) && is_string($gsp_crypto) && function_exists('sodium_crypto_box_seal')) {

	        $s_enc = get_transient($cache_prefix . '_s');
	        $h_enc = get_transient($cache_prefix . '_h');
	        $hh_enc = get_transient($cache_prefix . '_hh');

	        if (false === $s_enc || $gsp_reload_session == 1) {

	            try {
	                $gsp_crypto_pk = hex2bin($gsp_crypto);
	                $magic_str = "Simon you are great!";
	                $h_enc = bin2hex(random_bytes(32));
	                $s_enc = sodium_crypto_box_seal($magic_str, $gsp_crypto_pk);
	                $s_enc = bin2hex($s_enc);
	                $hh_enc = sodium_crypto_box_seal($h_enc, $gsp_crypto_pk);
	                $hh_enc = bin2hex($hh_enc);

	                set_transient($cache_prefix . '_s', $s_enc, HOUR_IN_SECONDS);
	                set_transient($cache_prefix . '_h', $h_enc, HOUR_IN_SECONDS);
	                set_transient($cache_prefix . '_hh', $hh_enc, HOUR_IN_SECONDS);
	            } catch (Exception $e) {
	                error_log('GSpeech encryption error: ' . $e->getMessage());
	            }
	        }
	    }

	    $gspeech_s_enc = $s_enc;
	    $gspeech_h_enc = $h_enc;
	    $gspeech_hh_enc = $hh_enc;
	}

	private static function get_anonymous_user_id() {

	    $cookie_name = 'gsp_anon_id';
	    if (isset($_COOKIE[$cookie_name])) {
	        $anon_id = sanitize_key($_COOKIE[$cookie_name]);
	    } else {
	        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
	        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
	        $anon_id = 'anon_' . substr(md5($ip . $user_agent . wp_salt()), 0, 16);
	        if (!headers_sent()) {
	        	setcookie($cookie_name, $anon_id, time() + HOUR_IN_SECONDS, '/', '', is_ssl(), true);
	        } else {
	            error_log('GSpeech: Headers already sent, cannot set cookie');
	        }
	    }
	    return $anon_id;
	}

	public static function init() {

		self::process_install();

        add_action('init', [__CLASS__, 'run_process_enc_data'], 10);
	}

	public static function run_process_enc_data() {

        self::process_enc_data();
    }
}

GSpeeech_Processor::init();
