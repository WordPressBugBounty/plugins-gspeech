<?php

// no direct access!
defined('ABSPATH') or die("No direct access");

class GSpeech_Front {

	private static $gsp_widget_id = '';
    private static $version_index_1 = '';
    private static $wpgs_load_sh = '';
    private static $sh_ = '';
    private static $lazy_load = '';
    private static $reload_session = '';
	private static $player_title = '';
    private static $gtranslate_wrapper_selector = '';
	private static $is_legacy = false;

	public static function process_post_data($content) {

	    $post = get_post();

	    if ($post) {

	        $post_id    = $post->ID;
	        $post_type  = get_post_type($post);
	        $cat_data   = get_the_category($post_id);
	        $post_title = get_the_title($post_id);
	        $home_url   = home_url();

	        $modified_date = get_the_modified_date('Y-m-d H:i:s', $post_id);
	        $current_date  = date('Y-m-d H:i:s');
	        $dif           = strtotime($current_date) - strtotime($modified_date);
	        $minutes       = self::get_dates_data($dif, 5);

	        $created_ts = get_post_time('U', false, $post_id);

	        $list_cat = array();
	        foreach ($cat_data as $cat) {
	            $list_cat[] = $cat->slug;
	        }
	        $cat_str = implode(',', $list_cat);

	        $post_title = esc_attr(str_replace('"', '\'', $post_title));

	        $post_type_html = '<div class="gsp_post_data" 
	            data-post_type="'.esc_attr($post_type).'" 
	            data-cat="'.esc_attr($cat_str).'" 
	            data-modified="'.esc_attr($minutes).'"
	            data-created="'.esc_attr($created_ts).'"
	            data-title="'.$post_title.'" 
	            data-home="'.esc_url($home_url).'"></div>';

	        $content .= $post_type_html;
	    }

	    return $content;
	}

    private static function get_dates_data($diff, $r) {

		$total_s = $diff;
		$total_m = floor($diff / 60);

		$total_m = $total_m > 120 ? 120 : $total_m;

		if($r == 5)
			return $total_m;

		return $total_s;
    }

	private static function init() {

	    if (is_admin() || self::is_login_page()) {
	        return;
	    }

	    $cache_key = 'gspeech_settings_cache';
	    $settings = get_transient($cache_key);
	    if (false === $settings) {
	        $settings = [
	            'wpgs' => get_option('wpgs_settings', []),
	            'gtranslate' => get_option('GTranslate', []),
	            'misc' => [
	                'lazy_load' => intval(get_option('gspeech_lazy_load', 1)),
	                'widget_id' => get_option('gspeech_widget_id', ''),
	                'crypto' => get_option('gspeech_crypto', ''),
	                'reload_session' => intval(get_option('gspeech_reload_session', 0)),
	                'version_index' => intval(get_option('gspeech_version_index', 0)),
	                'email' => get_option('gspeech_email', ''),
	                'sh_w_loaded' => intval(get_option('gspeech_sh_w_loaded', 0)),
	                'sh_' => intval(get_option('gspeech_sh_', 0)),
	            ],
	        ];

	        GSpeech::load_defaults($settings['wpgs']);
	        set_transient($cache_key, $settings, 5 * MINUTE_IN_SECONDS);
	    }

	    $wpgs_options = GSpeech::load_settings($settings['wpgs']);
	    $gtranslate_data = $settings['gtranslate'];
	    $misc_settings = $settings['misc'];

	    $gtranslate_wrapper_selector = 'gsp_clgtranslate_wrapper';
	    if (!empty($gtranslate_data) && isset($gtranslate_data["wrapper_selector"]) && $gtranslate_data["wrapper_selector"] != "") {
	        $gtranslate_wrapper_selector = sanitize_text_field($gtranslate_data["wrapper_selector"]);
	        $gtranslate_wrapper_selector = str_replace('.', 'gsp_cl', $gtranslate_wrapper_selector);
	        $gtranslate_wrapper_selector = str_replace('#', 'gsp_id', $gtranslate_wrapper_selector);
	    }

	    $lazy_load = $misc_settings['lazy_load'];
	    $gsp_widget_id = $misc_settings['widget_id'];
	    $gsp_reload_session = $misc_settings['reload_session'];
	    $version_index_1 = $misc_settings['version_index'];
	    $wpgs_load_sh = $misc_settings['sh_w_loaded'];
	    $sh_ = $misc_settings['sh_'];

	    $player_title = $wpgs_options['gspeech_v2x_title'] ?? __('Click to listen highlighted text!', 'gspeech');
	    self::$is_legacy = ($gsp_widget_id === '');
	    if (self::$is_legacy) {
	    	$gsp_widget_id = '';
	    }

	    self::$gsp_widget_id = $gsp_widget_id;
	    self::$version_index_1 = $version_index_1;
	    self::$wpgs_load_sh = $wpgs_load_sh;
	    self::$sh_ = $sh_;
	    self::$lazy_load = $lazy_load;
	    self::$reload_session = $gsp_reload_session;
	    self::$player_title = $player_title;
	    self::$gtranslate_wrapper_selector = $gtranslate_wrapper_selector;
	}

	private static function allow_shortcode_process() {

		$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		if ($referer != '' && strpos($referer, 'wp-admin/') !== false) {
			return false;
		}

		return true;
	}

	private static function is_building_auto_excerpt() {

		return doing_filter('get_the_excerpt') && doing_filter('the_content');
	}

	public static function keep_excerpt_shortcodes($tags) {

		if (!doing_filter('get_the_excerpt')) {
			return $tags;
		}

		$skip = array('gspeech', 'gspeech-button', 'gspeech-circle', 'gspeech-full');
		$kept = array();
		foreach ($tags as $tag) {
			if (!in_array($tag, $skip, true)) {
				$kept[] = $tag;
			}
		}

		return $kept;
	}

	private static function restore_square_tag($atts, $content, $tag) {

		$atts = shortcode_atts(array(
			'type' => '',
			'id' => '',
		), $atts, $tag);

		$out = '[' . $tag;
		if (intval($atts['id']) > 0) {
			$out .= ' id=' . intval($atts['id']);
		}
		else if ($atts['type'] !== '') {
			$out .= ' type=' . $atts['type'];
		}
		$out .= ']';

		if ($content !== '' && $content !== null) {
			$out .= $content . '[/' . $tag . ']';
		}

		return $out;
	}

	public static function process_text($content) {

		if (!is_string($content) || $content === '') {
			return $content;
		}

		if (self::$is_legacy) {
			return self::process_legacy_curly($content);
		}

		$content = do_shortcode($content);
		return self::process_cloud_curly($content);
	}

	public static function process_acf_value($value, $post_id, $field) {

		if (!is_string($value) || $value === '') {
			return $value;
		}

		$type = isset($field['type']) ? $field['type'] : '';
		if ($type !== 'wysiwyg' && $type !== 'textarea' && $type !== 'text') {
			return $value;
		}

		if (strpos($value, '[gspeech') === false && strpos($value, '{gspeech') === false) {
			return $value;
		}

		return self::process_text($value);
	}

	private static function is_inside_html_tag($html, $offset) {

		$before = substr($html, 0, $offset);
		$in_tag = false;
		$quote = '';
		$len = strlen($before);

		for ($i = 0; $i < $len; $i++) {
			$ch = $before[$i];

			if ($quote !== '') {
				if ($ch === $quote) {
					$quote = '';
				}
				continue;
			}

			if ($in_tag) {
				if ($ch === '"' || $ch === "'") {
					$quote = $ch;
					continue;
				}
				if ($ch === '>') {
					$in_tag = false;
				}
				continue;
			}

			if ($ch === '<') {
				$in_tag = true;
			}
		}

		return $in_tag;
	}

	private static function replace_complete_pairs($content, $pattern, $replacer, $limit = 0) {

		if (strpos($content, '{gspeech') === false) {
			return $content;
		}

		if (!preg_match_all($pattern, $content, $all, PREG_SET_ORDER | PREG_OFFSET_CAPTURE)) {
			return $content;
		}

		$replacements = array();
		foreach ($all as $match) {
			$full = $match[0][0];
			$pos = $match[0][1];

			if (self::is_inside_html_tag($content, $pos)) {
				continue;
			}

			$plain = array();
			foreach ($match as $part) {
				$plain[] = $part[0];
			}

			$new = call_user_func($replacer, $plain);
			if ($new === null) {
				continue;
			}

			$replacements[] = array('position' => $pos, 'length' => strlen($full), 'html' => $new);
			if ($limit > 0 && count($replacements) >= $limit) {
				break;
			}
		}

		// Apply the first eligible pairs backwards so their original offsets stay valid.
		foreach (array_reverse($replacements) as $replacement) {
			$pos = $replacement['position'];
			$content = substr($content, 0, $pos) . $replacement['html'] . substr($content, $pos + $replacement['length']);
		}

		return $content;
	}

	private static function add_content_filters($method) {

		$cb = array('GSpeech_Front', $method);
		add_filter('the_content', $cb, 12);
		add_filter('the_excerpt', $cb, 12);
		add_filter('get_the_excerpt', $cb, 12);
		add_filter('widget_text', $cb, 12);
		add_filter('widget_text_content', $cb, 12);
		add_filter('widget_block_content', $cb, 12);
		add_filter('woocommerce_short_description', $cb, 12);
		add_filter('elementor/widget/render_content', $cb, 12);
		add_filter('widget_custom_html_content', $cb, 12);
		add_filter('acf/format_value', array('GSpeech_Front', 'process_acf_value'), 12, 3);
	}

	public static function shortcode_gspeech($atts, $content = '') {

		if (self::is_building_auto_excerpt()) {
			return self::restore_square_tag($atts, $content, 'gspeech');
		}

		if (!self::allow_shortcode_process()) {
			return '';
		}

		$atts = shortcode_atts(array(
			'type' => '',
			'id' => '',
		), $atts, 'gspeech');

		$id = intval($atts['id']);
		if ($id > 0) {
			if ($content !== '' && $content !== null) {
				return self::cloud_inline_html($id, $content);
			}
			return '<div class="gsp_shortcode_' . $id . '"></div>';
		}

		$type = strtolower(trim($atts['type']));
		if ($type === 'button') {
			return '<div class="gsp_button_player"></div>';
		}
		if ($type === 'circle') {
			return '<div class="gsp_circle_player"></div>';
		}

		if ($content !== '' && $content !== null) {
			return self::cloud_inline_html(0, $content);
		}

		return '<div class="gsp_full_player"></div>';
	}

	public static function shortcode_gspeech_button($atts = array(), $content = '') {

		if (self::is_building_auto_excerpt()) {
			return self::restore_square_tag($atts, $content, 'gspeech-button');
		}

		if (!self::allow_shortcode_process()) {
			return '';
		}

		return '<div class="gsp_button_player"></div>';
	}

	public static function shortcode_gspeech_circle($atts = array(), $content = '') {

		if (self::is_building_auto_excerpt()) {
			return self::restore_square_tag($atts, $content, 'gspeech-circle');
		}

		if (!self::allow_shortcode_process()) {
			return '';
		}

		return '<div class="gsp_circle_player"></div>';
	}

	public static function shortcode_gspeech_full($atts = array(), $content = '') {

		if (self::is_building_auto_excerpt()) {
			return self::restore_square_tag($atts, $content, 'gspeech-full');
		}

		if (!self::allow_shortcode_process()) {
			return '';
		}

		return '<div class="gsp_full_player"></div>';
	}

	private static function cloud_inline_html($id, $text) {

		$id = intval($id);
		if ($id > 0) {
			$player = '<div class="gsp_shortcode_' . $id . '"></div>';
			$txt_class = 'gsp_shortcode_txt_element gsp_shortcode_wrp_' . $id;
		}
		else {
			$player = '<div class="gsp_def_inline_shortcode"></div>';
			$txt_class = 'gsp_shortcode_txt_element';
		}

		return '<div class="gsp_inline_shortcode"><div class="gsp_inline_shortcode_player_wrp">' . $player . '</div><div class="gsp_inline_shortcode_txt_wrp"><div class="' . $txt_class . '">' . $text . '</div></div></div>';
	}

	public static function process_cloud_curly($content) {

		if (!is_string($content) || $content === '') {
			return $content;
		}

		if (!self::allow_shortcode_process()) {
			return $content;
		}

		if (self::is_building_auto_excerpt()) {
			return $content;
		}

		$content = self::replace_complete_pairs(
			$content,
			'/\{gspeech id=(\d+)\}(.*?)\{\/gspeech\}/si',
			array('GSpeech_Front', 'cloud_curly_id_html')
		);

		$content = self::replace_complete_pairs(
			$content,
			'/\{gspeech\}(.*?)\{\/gspeech\}/si',
			array('GSpeech_Front', 'cloud_curly_def_html')
		);

		return $content;
	}

	public static function cloud_curly_id_html($matches) {

		return self::cloud_inline_html($matches[1], $matches[2]);
	}

	public static function cloud_curly_def_html($matches) {

		return self::cloud_inline_html(0, $matches[1]);
	}

	public static function process_legacy_curly($content) {

		if (!is_string($content) || $content === '') {
			return $content;
		}

		if (!self::allow_shortcode_process()) {
			return $content;
		}

		if (self::is_building_auto_excerpt()) {
			return $content;
		}

		$processed_marker = '<!-- gspeech-legacy-processed -->';
		if (strpos($content, $processed_marker) !== false || strpos($content, 'class="gspeech_pro_main_wrapper"') !== false) {
			return $content;
		}

		$pattern = '/\{gspeech( style=([\d]*?))?( language=([\S]*?))?( autoplay=([\d]*?))?( speechtimeout=([\d]*?))?( registered=([\d]*?))?( selector=(.*?))?( event=(.*?))?( hidespeaker=([\d]*?))?[\s]?\}(.*?)\{\/gspeech\}/si';

		$original_content = $content;
		$content = self::replace_complete_pairs($content, $pattern, array('GSpeech_Front', 'legacy_pair_html'), 5);
		if ($content !== $original_content) {
			$content = self::apply_legacy_speaker_classes($content);
			// Keep later filters from consuming more pairs, including when all players are hidden.
			$content = $processed_marker . $content;
		}

		return $content;
	}

	public static function legacy_pair_html($matches) {

		$data = get_option('wpgs_settings');
		GSpeech::load_defaults($data);
		$wpgs_options = GSpeech::load_settings($data);
		$gsp_player_title = $wpgs_options['gspeech_v2x_title'];

		$userid = get_current_user_id();
		$current_user = wp_get_current_user();
		$sitename = get_bloginfo('name');

		$speech_title = $gsp_player_title;
		$userRegistered = $userid == 0 ? 0 : 1;

		$username = $current_user->user_login;
		$realname = $current_user->display_name;

		if ($userRegistered == 0 && $matches[10] == 1) {
			if ($matches[16] != 1) {
				return $matches[17];
			}
			return '';
		}
		if ($userRegistered == 1 && $matches[10] == 2) {
			if ($matches[16] != 1) {
				return $matches[17];
			}
			return '';
		}

		$htm = strip_tags($matches[17]);
		$htm = preg_replace('/<script\b[^>]*>(.*?)<\/script>/si', "", $htm);
		$htm = preg_replace('/<style\b[^>]*>(.*?)<\/style>/si', "", $htm);
		$htm = str_replace(array("\"","'"), "", $htm);

		$htm = str_replace("SITENAME", $sitename, $htm);
		if ($userRegistered == 1) {
			$htm = str_replace("USERNAME", $username, $htm);
			$htm = str_replace("REALNAME", $realname, $htm);
		}

		$htm_original = str_replace("SITENAME", $sitename, $matches[17]);
		if ($userRegistered == 1) {
			$htm_original = str_replace("USERNAME", $username, $htm_original);
			$htm_original = str_replace("REALNAME", $realname, $htm_original);
		}

		$hidespeaker_pre = $matches[16] == 1 ? '<div style="display:none">' : '';
		$hidespeaker_af = $matches[16] == 1 ? '</div>' : '';

		$style_index = $matches[2] == '' ? 1 : $matches[2];

		return $hidespeaker_pre.'
	    	<span class="gspeech_selection gspeech_style_'.$style_index.'" roll="'.$style_index.'">'.$htm_original.'</span>
	    	<span class="gspeech_pro_main_wrapper">&nbsp;
	    	<span class="sexy_tooltip"><span class="the-tooltip top left sexy_tooltip_'.$style_index.'"><span class="tooltip_inner">'.$speech_title.'</span></span></span>
	    	<span class="sound_container_pro sound_div_'.$style_index.'" language="'.esc_attr($matches[4]).'" roll="'.$style_index.'" autoplaypro="'.esc_attr($matches[6]).'" speechtimeout="'.esc_attr($matches[8]).'" selector="'.esc_attr($matches[12]).'" eventpro="'.esc_attr($matches[14]).'" title="" style=""><span class="sound_text_pro">'.$htm.'</span></span>
	    	</span>'.$hidespeaker_af;
	}

	private static function apply_legacy_speaker_classes($content) {

		$data = get_option('wpgs_settings');
		GSpeech::load_defaults($data);
		$wpgs_options = GSpeech::load_settings($data);

		$speaker_types_array = array(
			"1" => $wpgs_options['speaker_type_1'],
			"2" => $wpgs_options['speaker_type_2'],
			"3" => $wpgs_options['speaker_type_3'],
			"4" => $wpgs_options['speaker_type_4'],
			"5" => $wpgs_options['speaker_type_5'],
		);
		$speaker_sizes_array = array(
			"1" => $wpgs_options['speaker_size_1'],
			"2" => $wpgs_options['speaker_size_2'],
			"3" => $wpgs_options['speaker_size_3'],
			"4" => $wpgs_options['speaker_size_4'],
			"5" => $wpgs_options['speaker_size_5'],
		);
		$tooltips_array = array(
			"1" => $wpgs_options['tooltip_1'],
			"2" => $wpgs_options['tooltip_2'],
			"3" => $wpgs_options['tooltip_3'],
			"4" => $wpgs_options['tooltip_4'],
			"5" => $wpgs_options['tooltip_5'],
		);

		for ($style_index = 1; $style_index <= 5; $style_index++) {
			$speaker_type = $speaker_types_array[$style_index];
			$speaker_size = $speaker_sizes_array[$style_index];
			$replace_val2 = 'sound_div_' . $style_index . ' size_' . $speaker_size . ' ' . $speaker_type;
			$content = preg_replace('/\bsound_div_' . $style_index . '\b(?!\s+size_)/', $replace_val2, $content);
			$tooltip = $tooltips_array[$style_index];
			$content = str_replace('sexy_tooltip_' . $style_index, $tooltip, $content);
		}

		return $content;
	}

	public static function print_cloud_data_html() {

		if (self::$gsp_widget_id == '') {
			return;
		}

		$plugin_version = GSPEECH_PLG_VERSION;
		$widget_id = self::$gsp_widget_id;
		$lazy_load = self::$lazy_load;
		$reload_session = self::$reload_session;
		$gtranslate_wrapper_selector = self::$gtranslate_wrapper_selector;
		$version_index_1 = self::$version_index_1;
		$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

		echo '<div id="gsp_data_html" data-g_version="'.esc_attr($plugin_version).'" data-w_id="'.esc_attr($widget_id).'" data-s_enc="" data-h_enc="" data-hh_enc="" data-lazy_load="'.esc_attr($lazy_load).'" data-reload_session="'.esc_attr($reload_session).'" data-gt-w="'.esc_attr($gtranslate_wrapper_selector).'" data-vv_index="'.esc_attr($version_index_1).'" data-ref="'.esc_attr($referer).'"></div>' . "\n";
	}

	public static function print_legacy_footer() {

		if (!self::$is_legacy) {
			return;
		}

		$gsp_player_title = self::$player_title;

		$data = get_option('wpgs_settings');
		GSpeech::load_defaults($data);
		$wpgs_options = GSpeech::load_settings($data);

		$bcp1 = $wpgs_options['bcp1'];
		$cp1 = $wpgs_options['cp1'];
		$bca1 = $wpgs_options['bca1'];
		$ca1 = $wpgs_options['ca1'];
		$spop1 = $wpgs_options['spop1'];
		$spop1_ = $spop1 / 100;
		$speaker_type_2 = $wpgs_options['speaker_type_2'];
		$speaker_size_2 = $wpgs_options['speaker_size_2'];
		$tooltip_2 = $wpgs_options['tooltip_2'];

		$bcp2 = $wpgs_options['bcp2'];
		$cp2 = $wpgs_options['cp2'];
		$bca2 = $wpgs_options['bca2'];
		$ca2 = $wpgs_options['ca2'];
		$spop2 = $wpgs_options['spop2'];
		$spop2_ = $spop2 / 100;

		$bcp3 = $wpgs_options['bcp3'];
		$cp3 = $wpgs_options['cp3'];
		$bca3 = $wpgs_options['bca3'];
		$ca3 = $wpgs_options['ca3'];
		$spop3 = $wpgs_options['spop3'];
		$spop3_ = $spop3 / 100;

		$bcp4 = $wpgs_options['bcp4'];
		$cp4 = $wpgs_options['cp4'];
		$bca4 = $wpgs_options['bca4'];
		$ca4 = $wpgs_options['ca4'];
		$spop4 = $wpgs_options['spop4'];
		$spop4_ = $spop4 / 100;

		$bcp5 = $wpgs_options['bcp5'];
		$cp5 = $wpgs_options['cp5'];
		$bca5 = $wpgs_options['bca5'];
		$ca5 = $wpgs_options['ca5'];
		$spop5 = $wpgs_options['spop5'];
		$spop5_ = $spop5 / 100;

		$speech_title = $gsp_player_title;

		echo '
	        <span id="sexy_tooltip_title"><span class="the-tooltip top left '.$tooltip_2.'"><span class="tooltip_inner">'.$speech_title.'</span></span></span>
	        <div id="sound_container" class="sound_div sound_div_basic size_'.$speaker_size_2.' '.$speaker_type_2.'" title="" style=""><div id="sound_text"></div>
	        </div><div id="sound_audio"></div>
	        <style type="text/css">.gspeech_style_,.gspeech_style_1{background-color:'.$bcp1.';color:'.$cp1.';}.gspeech_style_2{background-color:'.$bcp2.';color:'.$cp2.';}.gspeech_style_3{background-color:'.$bcp3.';color:'.$cp3.';}.gspeech_style_4{background-color:'.$bcp4.';color:'.$cp4.';}.gspeech_style_5{background-color:'.$bcp5.';color:'.$cp5.';}</style>
	        <style type="text/css">.gspeech_style_.active,.gspeech_style_1.active{background-color:'.$bca1.' !important;color:'.$ca1.' !important;.gspeech_style_2.active{background-color:'.$bca2.' !important;color:'.$ca2.' !important;.gspeech_style_3.active{background-color:'.$bca3.' !important;color:'.$ca3.' !important;.gspeech_style_4.active{background-color:'.$bca4.' !important;color:'.$ca4.' !important;.gspeech_style_5.active{background-color:'.$bca5.' !important;color:'.$ca5.' !important;</style>
	        <style type="text/css">.sound_div_,.sound_div_1{opacity:'.$spop1_.';filter: alpha(opacity = '.$spop1.')}.sound_div_2{opacity:'.$spop2_.';filter: alpha(opacity = '.$spop2.')}.sound_div_3{opacity:'.$spop3_.';filter: alpha(opacity = '.$spop3.')}.sound_div_4{opacity:'.$spop4_.';filter: alpha(opacity = '.$spop4.')}.sound_div_5{opacity:'.$spop5_.';filter: alpha(opacity = '.$spop5.')}</style>
	        <style type="text/css">
	           ::selection {
					background: '.$bca2.';
					color: '.$ca2.';
				}
				::-moz-selection {
					background: '.$bca2.';
					color: '.$ca2.';
				}
	        </style>
		';
	}

	private static function enqueue_legacy_player() {

		$plugin_version = GSPEECH_PLG_VERSION;
		$code_path = plugin_dir_url(__FILE__);

		$data = get_option('wpgs_settings');
		GSpeech::load_defaults($data);
		$wpgs_options = GSpeech::load_settings($data);

		$speak_any_text = $wpgs_options['speak_any_text'];
		$userid = get_current_user_id();
		$userRegistered = $userid == 0 ? 0 : 1;

		$legacy_vars = 'var players = new Array(),'
			. 'blink_timer = new Array(),'
			. 'lang_identifier = "'.esc_js($wpgs_options['language']).'",'
			. 'selected_txt = "",'
			. 'sound_container_clicked = false,'
			. 'sound_container_visible = true,'
			. 'blinking_enable = true,'
			. 'basic_plg_enable = true,'
			. 'pro_container_clicked = false,'
			. 'gspeech_plugin_url = "'.esc_js(plugins_url() . '/gspeech/').'",'
			. 'gspeech_legacy_stream_url = "'.esc_js(admin_url('admin-ajax.php')).'",'
			. 'gspeech_legacy_stream_nonce = "'.esc_js(wp_create_nonce('gspeech_legacy_stream')).'",'
			. 'translation_tool = "g",'
			. 'translation_audio_type = "audio/mpeg",'
			. 'speech_text_length = "100",'
			. 'blink_start_enable_pro = true,'
			. 'createtriggerspeechcount = 0,'
			. 'speechtimeoutfinal = 0,'
			. 'speechtxt = "",'
			. 'userRegistered = "'.$userRegistered.'",'
			. 'gspeech_bcp = ["'.esc_js($wpgs_options['bcp1']).'","'.esc_js($wpgs_options['bcp2']).'","'.esc_js($wpgs_options['bcp3']).'","'.esc_js($wpgs_options['bcp4']).'","'.esc_js($wpgs_options['bcp5']).'"],'
			. 'gspeech_cp = ["'.esc_js($wpgs_options['cp1']).'","'.esc_js($wpgs_options['cp2']).'","'.esc_js($wpgs_options['cp3']).'","'.esc_js($wpgs_options['cp4']).'","'.esc_js($wpgs_options['cp5']).'"],'
			. 'gspeech_bca = ["'.esc_js($wpgs_options['bca1']).'","'.esc_js($wpgs_options['bca2']).'","'.esc_js($wpgs_options['bca3']).'","'.esc_js($wpgs_options['bca4']).'","'.esc_js($wpgs_options['bca5']).'"],'
			. 'gspeech_ca = ["'.esc_js($wpgs_options['ca1']).'","'.esc_js($wpgs_options['ca2']).'","'.esc_js($wpgs_options['ca3']).'","'.esc_js($wpgs_options['ca4']).'","'.esc_js($wpgs_options['ca5']).'"],'
			. 'gspeech_spop = ["'.esc_js($wpgs_options['spop1']).'","'.esc_js($wpgs_options['spop2']).'","'.esc_js($wpgs_options['spop3']).'","'.esc_js($wpgs_options['spop4']).'","'.esc_js($wpgs_options['spop5']).'"],'
			. 'gspeech_spoa = ["'.esc_js($wpgs_options['spoa1']).'","'.esc_js($wpgs_options['spoa2']).'","'.esc_js($wpgs_options['spoa3']).'","'.esc_js($wpgs_options['spoa4']).'","'.esc_js($wpgs_options['spoa5']).'"],'
			. 'gspeech_animation_time = ["'.esc_js($wpgs_options['animation_time_1']).'","'.esc_js($wpgs_options['animation_time_2']).'","'.esc_js($wpgs_options['animation_time_3']).'","'.esc_js($wpgs_options['animation_time_4']).'","'.esc_js($wpgs_options['animation_time_5']).'"];';

		wp_enqueue_script(
			'wpgs-legacy-pro',
			$code_path . 'js/gspeech_pro.js',
			array('jquery', 'wpgs-script3'),
			$plugin_version,
			true
		);
		wp_add_inline_script('wpgs-legacy-pro', $legacy_vars, 'before');

		if ($speak_any_text == 1) {
			wp_enqueue_script(
				'wpgs-legacy-basic',
				$code_path . 'js/gspeech.js',
				array('jquery', 'wpgs-legacy-pro'),
				$plugin_version,
				true
			);
		}
	}

	public static function is_login_page() {

		if(!isset($_SERVER['HTTP_HOST'])) {
			return true;
		}
		
		$domain = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

		if (strpos($domain, '/wp-admin/') !== false || strpos($domain, '/wp-json/') !== false || strpos($domain, 'wp-cron.php') !== false || strpos($domain, 'favicon') !== false) {
			return true;
		}

		return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
	}

	public static function load_module() {

		if(is_admin() || self::is_login_page())
			return;

		self::init();

		if (!self::$is_legacy) {
			add_shortcode('gspeech', array('GSpeech_Front', 'shortcode_gspeech'));
			add_shortcode('gspeech-button', array('GSpeech_Front', 'shortcode_gspeech_button'));
			add_shortcode('gspeech-circle', array('GSpeech_Front', 'shortcode_gspeech_circle'));
			add_shortcode('gspeech-full', array('GSpeech_Front', 'shortcode_gspeech_full'));

			add_filter('strip_shortcodes_tagnames', array('GSpeech_Front', 'keep_excerpt_shortcodes'));
			add_filter('the_excerpt', 'do_shortcode', 11);
			add_filter('get_the_excerpt', 'do_shortcode', 11);
			add_filter('widget_text', 'do_shortcode');
			add_filter('widget_block_content', 'do_shortcode', 11);
			add_filter('widget_custom_html_content', 'do_shortcode', 11);
			add_filter('woocommerce_short_description', 'do_shortcode', 11);
			add_filter('elementor/widget/render_content', 'do_shortcode', 11);

			self::add_content_filters('process_cloud_curly');
			if (self::$gsp_widget_id != '') {
				add_action('wp_footer', array('GSpeech_Front', 'print_cloud_data_html'), 5);
			}
		}
		else {
			self::add_content_filters('process_legacy_curly');
			add_action('wp_footer', array('GSpeech_Front', 'print_legacy_footer'), 5);
		}
	}

	public static function load_scripts() {

        $plugin_version = GSPEECH_PLG_VERSION;
        $gsp_widget_id = self::$gsp_widget_id;
        $version_index_1 = self::$version_index_1;
        $lazy_load = self::$lazy_load;
        $reload_session = self::$reload_session;
        $gtranslate_wrapper_selector = self::$gtranslate_wrapper_selector;

        if(self::$is_legacy) {

            wp_enqueue_style('wpgs-styles1', plugin_dir_url( __FILE__ ) . 'css/gspeech.css', false, $plugin_version);
            wp_enqueue_style('wpgs-styles2', plugin_dir_url( __FILE__ ) . 'css/the-tooltip.css', false,  $plugin_version);
            wp_enqueue_script("jquery");
            wp_enqueue_script('wpgs-script1', plugin_dir_url( __FILE__ ) . 'js/color.js', array('jquery'), $plugin_version);
            wp_enqueue_script('wpgs-script3', plugin_dir_url( __FILE__ ) . 'js/easing.js', array('jquery'), $plugin_version);
            wp_enqueue_script('wpgs-script4', plugin_dir_url( __FILE__ ) . 'js/mediaelement-and-player.min.js', array('jquery'), $plugin_version);
			self::enqueue_legacy_player();
        }
        else if($gsp_widget_id != "") {

        	$referer = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '';
        	$ajax_nonce = wp_create_nonce('wpgsp_ajax_nonce_value_1');

			wp_enqueue_script('jquery');

			wp_enqueue_script(
				'wpgs-script776',
				plugin_dir_url(__FILE__) . 'js/gspeech_front_inline.js',
				array('jquery'),
				$plugin_version,
				true
			);

			$inline_script="!function(){var d=document,e=d.getElementById('gsp_data_html');if(!e){e=d.createElement('div'),e.id='gsp_data_html',e.setAttribute('data-g_version','{$plugin_version}'),e.setAttribute('data-w_id','{$gsp_widget_id}'),e.setAttribute('data-lazy_load','{$lazy_load}'),e.setAttribute('data-reload_session','{$reload_session}'),e.setAttribute('data-gt-w','{$gtranslate_wrapper_selector}'),e.setAttribute('data-vv_index','{$version_index_1}'),e.setAttribute('data-ref',encodeURI('{$referer}')),e.setAttribute('data-s_enc',''),e.setAttribute('data-h_enc',''),e.setAttribute('data-hh_enc',''),(d.body||d.documentElement).appendChild(e)}}();";

			wp_add_inline_script('wpgs-script776', $inline_script);

			wp_enqueue_script(
				'wpgs-script777',
				plugin_dir_url(__FILE__) . 'js/gspeech_front.js',
				array('jquery','wpgs-script776'),
				$plugin_version,
				true
			);

			wp_localize_script('wpgs-script777','gsp_ajax_obj', array(
				'ajax_url' => admin_url('admin-ajax.php'),
				'nonce'    => $ajax_nonce,
			));
        }
    }
}
?>
