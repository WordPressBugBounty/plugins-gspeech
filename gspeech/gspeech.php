<?php

// no direct access!
defined('ABSPATH') or die("No direct access");

/*
Plugin Name: GSpeech
Plugin URI: https://gspeech.io
Description: GSpeech is a universal text to speech audio solution. See <a href="https://gspeech.io/demos">GSpeech Demo</a>. Please <a href="https://gspeech.io/contact-us">Contact Us</a> if you have any questions.
Author: Text-To-Speech AI Audio Solutions
Author URI: https://gspeech.io
Version: 3.17.5
*/

$gspeech_plugin_version = '3.17.5';
$gspeech_new_db_version = 195;

define('GSPEECH_PLG_VERSION', $gspeech_plugin_version);
define('GSPEECH_NEW_DB_VER', $gspeech_new_db_version);
if (!defined('MINUTE_IN_SECONDS')) {
    define('MINUTE_IN_SECONDS', 60);
}
if (!defined('HOUR_IN_SECONDS')) {
    define('HOUR_IN_SECONDS', 3600);
}

include('includes/gspeech_processor.php');
include('includes/gspeech_main.php');
include('includes/gspeech_widget.php');
include('includes/gspeech_notices.php');
include('includes/gspeech_frontend.php');
include('includes/gspeech_backend.php');

register_activation_hook(__FILE__, array('GSpeech', 'activate'));
register_uninstall_hook(__FILE__, array('GSpeech', 'uninstall'));

add_action('init', array('GSpeech', 'init'));
add_action('widgets_init', array('GSpeech', 'register'));
add_action('admin_menu', array('GSpeech_Admin', 'admin_menu'));
add_action('admin_init', array('GSpeech_Admin', 'admin_init'));
add_action('admin_init', array('GSpeech_Admin', 'admin_settings'));
add_action('wp_enqueue_scripts', array('GSpeech_Front', 'load_scripts'), 1);

add_filter('script_loader_tag', function ($tag, $handle) {
    if ($handle === 'wpgs-script776' || $handle === 'wpgs-script777') {
        $tag = str_replace(array(' defer', ' async'), '', $tag);
        $tag = str_replace('<script ', '<script data-no-defer data-no-optimize data-cfasync="false" ', $tag);
        if (strpos($tag, ' id=') === false) {
            $tag = str_replace('<script ', '<script id="'.$handle.'-js" ', $tag);
        }
    }
    return $tag;
}, 10, 2);

add_action('wp_print_footer_scripts', function () {
    $src = plugin_dir_url(__FILE__) . 'includes/js/gspeech_front.js';
    $version = defined('GSPEECH_PLG_VERSION') ? GSPEECH_PLG_VERSION : '1.0.0';
    ?>
    <script data-no-defer data-no-optimize data-cfasync="false">(function(){try{for(var s=document.scripts,f=!1,i=0;i<s.length;i++)if(/gspeech_front\.js/i.test(s[i].src)){f=!0;break}if(!window.gspeechFront&&!document.getElementById("wpgs-script777-js")&&!f){console.warn("[GSpeech] gspeech_front.js not found — loading fallback");var e=document.createElement("script");e.id="wpgs-script777-js";e.setAttribute("data-no-defer","");e.setAttribute("data-no-optimize","");e.setAttribute("data-cfasync","false");e.src=<?php echo json_encode($src . (strpos($src,"?")===false ? "?v=" : "&v=") . $version); ?>;document.head.appendChild(e)}else console.log("[GSpeech] gspeech_front.js already loaded")}catch(e){}})();</script>
    <?php
}, 999);

add_filter('the_content', array('GSpeech_Front', 'process_post_data'));
add_action('wp_loaded', array('GSpeech_Front', 'load_module'));
add_action('wp_ajax_wpgsp_apply_feedback', array('GSpeech_Admin', 'wpgsp_apply_feedback'));
add_action('wp_ajax_nopriv_wpgsp_apply_feedback', array('GSpeech_Admin', 'wpgsp_apply_feedback'));
add_action('wp_ajax_wpgsp_apply_ajax_save', array('GSpeech_Admin', 'wpgsp_apply_ajax_save'));
add_action('wp_ajax_nopriv_wpgsp_apply_ajax_save', array('GSpeech_Admin', 'wpgsp_apply_ajax_save'));
add_action('wp_ajax_wpgsp_validate_enc_data', array('GSpeech_Admin', 'wpgsp_validate_enc_data'));
add_action('wp_ajax_nopriv_wpgsp_validate_enc_data', array('GSpeech_Admin', 'wpgsp_validate_enc_data'));
add_filter('plugin_action_links_' . plugin_basename(__FILE__), array('GSpeech_Admin', 'plugin_action_links'));

register_shutdown_function(array('GSpeech_Front', 'make_ob_end_flush'));