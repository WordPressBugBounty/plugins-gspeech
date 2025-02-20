<?php 
// no direct access!
defined('ABSPATH') or die("No direct access");

?>

<div class="dashcontwrapper ss_plan_info_holder ss_dash_page_type_3" data-plan_id="" data-website_plan="">
	<div class="dashboard_title_inner">Widget Settings</div>
	<div class="dashboard_tabs_wrapper" style="" class="">
		<div class="dashboard_tab ss_tab_link_general ss_selected" data-tab_ident="general">General</div>
		<div class="dashboard_tab ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3 ss_tab_link_design" data-tab_ident="styles">Design (Preview)</div>
		<div class="dashboard_tab" data-tab_ident="content">Content</div>
		<div class="dashboard_tab ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3" data-tab_ident="player">Player</div>
		<div class="dashboard_tab" data-tab_ident="texts">Texts</div>
		<div class="dashboard_tab ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3" data-tab_ident="translation">Translation</div>
		<div class="dashboard_tab ss_opts_hidden ss_opts_visible_4" data-tab_ident="advanced">Advanced</div>
		<div class="dashboard_tab" data-tab_ident="aliases">Aliases</div>
		<div class="ss_upgrade_info">
			<div class="ss_locked_icon"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
			<a href="#">Upgrade</a><span>to Activate Locked Features</span>
		</div>
	</div>

	<div class="dashboard_content" class="ss_dash_widg_set">

		<div class="inner_options_wrapper">

			<div class="ss_options_group_1 ss_tab_wrapper ss_tab_general ss_tab_active">

				<div class="opts_title">General options</div>
				<div id="ss_widget_page_data" style="display: none" data-options="" data-website_plan="" data-widget_options=""></div>
				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Title</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Widget title:</span> Will be used only in dashboard.</span>
					</div>
					<input type="text" class="opts_input" id="ss_widget_title" value="" />
				</div>

				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Widget Type</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Widget Type:</span> Currently GSpeech supports five widget types.<br /><br />You can see all of them in action on demo page.<br /><br /><a class="gsp_title_sub_link" href="https://gspeech.io/demos" target="_blank">See live demo</a></span>
					</div>
					<input id="ss_widget_type" type="text" readonly="readonly" class="opts_input" data-widget_type="" value=""/>
				</div>

				<div class="opts_block gsp_opts_sh_wrapper">
					<div class="opts_block_label title_holder_vertical">
						<span>Shortcode</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Shortcode:</span> Insert as shortcode.<br /></span>
					</div>
					<textarea class="gsp_shortcode_html gsp_opts_sh">[gspeech type=ss_class]</textarea>
				</div>

				<div class="opts_block gsp_opts_ch_wrapper">
					<div class="opts_block_label title_holder_vertical">
						<span>Custom Html</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Custom Html:</span> Insert as Custom Html.<br /></span>
					</div>
					<textarea class="gsp_shortcode_html gsp_opts_ch">&lt;div class="ss_class"&gt;&lt;/div&gt;</textarea>
				</div>

				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Status</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Status:</span> Publish or unpublish the widget!</span>
						
					</div>

					<div class="gs_mono_checkbox_wrapper" id="wbs_w_status">
						<div class="gs_mono_switcher">
							<div class="gs_mono_switcher_button"></div>
						</div>
						<div class="gs_mono_label">
							<span class="gs_mono_label gs_mono_label_0">Unpublished</span>
							<span class="gs_mono_label gs_mono_label_1">Published</span>
							<input type="checkbox" class="gs_mono_checkbox" value="1"/>
						</div>
					</div>
				</div>

				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Use custom language/voice?</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Use custom:</span> Use global value(which is set in website settings section), or set custom.<br /><br />Can be used for multilingual websites, to create a separate widget for each language.</span>
						<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
					</div>

					<div class="gs_mono_checkbox_wrapper ss_commercial_switcher" id="wbs_custom_val">
						<div class="gs_mono_switcher">
							<div class="gs_mono_switcher_button"></div>
						</div>
						<div class="gs_mono_label">
							<span class="gs_mono_label gs_mono_label_0">Disabled</span>
							<span class="gs_mono_label gs_mono_label_1">Enabled</span>
							<input type="checkbox" class="gs_mono_checkbox" value="1"/>
						</div>
					</div>
				</div>

				<div class="ss_custom_values ss_display_none">
					<div class="opts_block">

						<div class="opts_block_label title_holder_vertical">
							<span>Language</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Webiste language:</span> Your webiste native language. Will be used as default language for all audio blocks.</span>
						</div>
						<div id="lng_sel_wdg" data-val="" class="items_select_filter_wrapper" data-def_txt="Select language">
							<div class="items_select_filter">
								<div class="items_select_filter_content">
									<span>Select language</span>
									<input type="text" class="li_search_input" />
								</div>
								<div class="items_select_filter_icon_wrapper">
									<div class="items_select_filter_icon_holder">
										<div class="items_select_filter_icon_inner">
											<span class="items_select_filter_icon">
												<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
											</span>
										</div>
									</div>
								</div>
								<div class="items_select_ul_wrapper">
									<div class="items_select_ul_holder">
										<div class="items_select_ul_inner">
											<ul class="items_select_ul">
											</ul>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="opts_block">
						<div class="opts_block_label title_holder_vertical">
							<span>Voice</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>

							<span class="gs_title_vertical"><span class="title_v_subtitle">Website voice:</span> Will be used as default voice for website and all audio blocks.</span>
						</div>

						<div id="voice_sel_wdg" class="items_select_filter_wrapper ss_audio_holder" data-sel_voice="" data-def_txt="Select voice">
							<div class="items_select_filter">
								<div class="items_select_filter_content"><span>Select voice</span><input type="text" class="li_search_input" /></div>
								<div class="items_select_filter_icon_wrapper">
									<div class="items_select_filter_icon_holder">
										<div class="items_select_filter_icon_inner">
											<span class="items_select_filter_icon">
												<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
											</span>
										</div>
									</div>
								</div>

								<div class="items_select_ul_wrapper">
									<div class="items_select_ul_holder">
										<div class="items_select_ul_inner">
											<ul class="items_select_ul">
												<li data-val="-1" class="search_li"><span>select voice</span></li>
											</ul>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="opts_block">
						<div class="opts_block_label title_holder_vertical">
							<span>Speed</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Voice speed:</span> Will be used as default voice speed for all audio blocks.<br />Available for Premium voices only!</span>
						</div>
						<div class="ss_slider_element_wrapper gsp_option_disable_switcher" style="">
							<div class="gsp_slider_element" id="gsp_w_slider_speed">
								<div class="gsp_label_wrapper">
									<label for="gsp_voice_type" class=""></label>
									<div class="gsp_label_reset_icon gsp_reset_disabled">
										<svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 256c0 88.224-71.775 160-160 160H170.067l34.512 32.419c9.875 9.276 10.119 24.883.539 34.464l-10.775 10.775c-9.373 9.372-24.568 9.372-33.941 0l-92.686-92.686c-9.373-9.373-9.373-24.568 0-33.941l92.686-92.686c9.373-9.373 24.568-9.373 33.941 0l10.775 10.775c9.581 9.581 9.337 25.187-.539 34.464L170.067 352H352c52.935 0 96-43.065 96-96 0-13.958-2.996-27.228-8.376-39.204-4.061-9.039-2.284-19.626 4.723-26.633l12.183-12.183c11.499-11.499 30.965-8.526 38.312 5.982C505.814 205.624 512 230.103 512 256zM72.376 295.204C66.996 283.228 64 269.958 64 256c0-52.935 43.065-96 96-96h181.933l-34.512 32.419c-9.875 9.276-10.119 24.883-.539 34.464l10.775 10.775c9.373 9.372 24.568 9.372 33.941 0l92.686-92.686c9.373-9.373 9.373-24.568 0-33.941l-92.686-92.686c-9.373-9.373-24.568-9.373-33.941 0L306.882 29.12c-9.581 9.581-9.337 25.187.539 34.464L341.933 96H160C71.775 96 0 167.776 0 256c0 25.897 6.186 50.376 17.157 72.039 7.347 14.508 26.813 17.481 38.312 5.982l12.183-12.183c7.008-7.008 8.786-17.595 4.724-26.634z"></path></svg>
									</div>
									<input type="text" class="gsp_value_label" value="0.00" />
								</div>
								<div class="gsp_slider_wrapper" data-bar_limit_start="0.25" data-bar_start="0" data-bar_end="4" data-start_value="">
									<div class="gsp_slider_bar">
										<div class="gsp_slider_bar_active">
											<div class="gsp_slider_bar_button"></div>
										</div>
										<div class="gsp_slider_bar_percents"></div>
									</div>
								</div>
							</div>
							<div class="gsp_option_disable_wrapper"></div>
						</div>
					</div>
					<div class="opts_block">
						<div class="opts_block_label title_holder_vertical">
							<span>Pitch</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Voice pitch:</span> Will be used as default voice pitch for all audio blocks.<br />Available for Premium voices only!</span>
						</div>
						<div class="ss_slider_element_wrapper gsp_option_disable_switcher" style="">
							<div class="gsp_slider_element" id="gsp_w_slider_pitch">
								<div class="gsp_label_wrapper">
									<label for="gsp_voice_type" class=""></label>
									<div class="gsp_label_reset_icon gsp_reset_disabled">
										<svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 256c0 88.224-71.775 160-160 160H170.067l34.512 32.419c9.875 9.276 10.119 24.883.539 34.464l-10.775 10.775c-9.373 9.372-24.568 9.372-33.941 0l-92.686-92.686c-9.373-9.373-9.373-24.568 0-33.941l92.686-92.686c9.373-9.373 24.568-9.373 33.941 0l10.775 10.775c9.581 9.581 9.337 25.187-.539 34.464L170.067 352H352c52.935 0 96-43.065 96-96 0-13.958-2.996-27.228-8.376-39.204-4.061-9.039-2.284-19.626 4.723-26.633l12.183-12.183c11.499-11.499 30.965-8.526 38.312 5.982C505.814 205.624 512 230.103 512 256zM72.376 295.204C66.996 283.228 64 269.958 64 256c0-52.935 43.065-96 96-96h181.933l-34.512 32.419c-9.875 9.276-10.119 24.883-.539 34.464l10.775 10.775c9.373 9.372 24.568 9.372 33.941 0l92.686-92.686c9.373-9.373 9.373-24.568 0-33.941l-92.686-92.686c-9.373-9.373-24.568-9.373-33.941 0L306.882 29.12c-9.581 9.581-9.337 25.187.539 34.464L341.933 96H160C71.775 96 0 167.776 0 256c0 25.897 6.186 50.376 17.157 72.039 7.347 14.508 26.813 17.481 38.312 5.982l12.183-12.183c7.008-7.008 8.786-17.595 4.724-26.634z"></path></svg>
									</div>
									<input type="text" class="gsp_value_label" value="0.00" />
								</div>
								<div class="gsp_slider_wrapper" data-bar_start="-20" data-bar_end="20" data-start_value="">
									<div class="gsp_slider_bar">
										<div class="gsp_slider_bar_active">
											<div class="gsp_slider_bar_button"></div>
										</div>
										<div class="gsp_slider_bar_percents"></div>
									</div>
								</div>
							</div>
							<div class="gsp_option_disable_wrapper"></div>
						</div>
					</div>

					<div class="opts_block" style="margin-top: 15px;">
						<div class="ss_voice_preview_widget_wrapper"></div>
						<div class="ss_option_info">Listen to the voice with applied configuration.</div>
						<div class="voice_preview_data" data-preview_txt_def="Hello, you are listening to the preview of this voice." data-preview_txt_ready="Hello, you are listening to the preview of this voice."></div>
						<div class="wbs_website_options" data-val=""></div>
					</div>
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Multiple voices</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>

						<span class="gs_title_vertical"><span class="title_v_subtitle">Multiple voices:</span> Shows voice option in the players.<br /><br />Allow your users to listen audio in desired voice(differnent male/female voices).<br /><br /><a class="gsp_title_sub_link" href="https://gspeech.io/demos" target="_blank">See live demo</a></span>
						<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
					</div>

					<div id="wbs_w_voice_enabled" class="items_select_filter_wrapper ss_audio_holder" data-sel_voice="" data-def_txt="Select voice">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Use Global</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>

							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="-1" class="search_li li_selected ss_ul_li_act ss_li_donotglobal"><span>Use Global</span></li>
											<li data-val="0" class="search_li"><span>Disabled</span></li>
											<li data-val="1" class="search_li ss_premium_feature_li"><span>Enabled</span></li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div id="wbs_w_multiple_voices" style="margin-top: 15px;" class="items_select_filter_wrapper ss_select_multiple ss_disabled ss_audio_holder" data-sel_voice="" data-def_txt="Select voices">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Select voices</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul"></ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="ss_options_group_1 ss_tab_wrapper ss_tab_content">

				<div class="opts_title">Content settings</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Content Selector</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Content Selector:</span> Specify the elemenets, which content should be read. Seperate with coma(,). Leave it empty, if you are using <span class="ss_title_colored1">Content Text</span>.</span>
					</div>
					<input type="text" class="opts_input" id="ss_content_selector" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Render Element</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Render Element:</span> Specify where to render the player! Example: body</span>
					</div>
					<input type="text" class="opts_input" id="ss_render_element" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Render Position</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Render Position:</span> Specify Render Position: after, or before the content.</span>
					</div>

					<div class="gs_mono_checkbox_wrapper" id="wbs_render_pos">
						<div class="gs_mono_switcher">
							<div class="gs_mono_switcher_button"></div>
						</div>
						<div class="gs_mono_label">
							<span class="gs_mono_label gs_mono_label_0">Before</span>
							<span class="gs_mono_label gs_mono_label_1">After</span>
							<input type="checkbox" class="gs_mono_checkbox" value="1"/>
						</div>
					</div>
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Exclude List</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Exclude List:</span> Specify the elemenets, which should not be read. Seperate with coma(,). Example: #element_with_this_id,.element_class</span>
					</div>
					<input type="text" class="opts_input" id="ss_exclude_list" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Title Selector</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Title Selector:</span> Specify the elemenets, which should be used as title. Seperate with coma(,). Example: h1. Leave it empty, if you are using <span class="ss_title_colored1">Title Text</span>.</span>
					</div>
					<input type="text" class="opts_input" id="ss_player_title_selector" value="" />
				</div>
				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Title Text</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Title text:</span> Specify the text, which should be used as title.</span>
					</div>
					<input type="text" class="opts_input" id="ss_player_title_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_4">
					<div class="opts_block_label title_holder_vertical">
						<span>Content Text</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Content Text:</span> Specify text of content. Will be used instead of .content_selector value!</span>
					</div>
					<textarea class="opts_input ss_textarea_dynamic_height" id="ss_content_text" style=""></textarea>
				</div>
				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Allowed Urls</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Allowed Urls:</span> Specify the list of urls, where the player should be rendered. One per line!<br /><br />*(asterisk) matches any characters.<br /><br /><span class="gsp_title_sub_1">Example: </span> To activate only on all blog posts, write:<br /><span class="gsp_title_sub_code">https://example.com/blog/*</span></span>
						<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
					</div>
					<textarea class="opts_input ss_textarea_dynamic_height ss_commercial_switcher" id="ss_allowed_urls" style=""></textarea>
				</div>
				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Blocked Urls</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Blocked Urls:</span> Specify the list of urls, where the player should not be rendered. One per line!<br /><br />*(asterisk) matches any characters.<br /><br /><span class="gsp_title_sub_1">Example: </span> To disable on all blog posts, write:<br /><span class="gsp_title_sub_code">https://example.com/blog/*</span></span>
						<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
					</div>
					<textarea class="opts_input ss_textarea_dynamic_height ss_commercial_switcher" id="ss_blocked_urls" style=""></textarea>
				</div>
			</div>

			<div class="ss_options_group_1 ss_tab_wrapper ss_tab_player">

				<div class="opts_title">Player settings</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Appear animation</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Appear animation:</span> How the players should animate, when appearing first time.</span>
					</div>
					<div id="wbs_w_appear_class" style="margin-top: 5px;" class="items_select_filter_wrapper">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Use Global</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="-1" class="search_li li_selected ss_ul_li_act"><span>Use Global</span></li>
											<li data-val="ss_fade" class="search_li ss_li_ss_fade"><span>Fade</span></li>
											<li data-val="ss_zoom_in" class="search_li ss_li_ss_zoom_in"><span>Zoom In</span></li>
											<li data-val="ss_zoom_out" class="search_li ss_li_ss_zoom_out"><span>Zoom Out</span></li>
											<li data-val="ss_slide_down" class="search_li ss_li_ss_slide_down"><span>Slide Down</span></li>
											<li data-val="ss_slide_right" class="search_li ss_li_ss_slide_right"><span>Slide Right</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_0">
					<div class="opts_block_label title_holder_vertical">
						<span>Auto Load</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Auto Load:</span> Automatically load audio.</span>
					</div>

					<div class="gs_mono_checkbox_wrapper" id="wbs_auto_load">
						<div class="gs_mono_switcher">
							<div class="gs_mono_switcher_button"></div>
						</div>
						<div class="gs_mono_label">
							<span class="gs_mono_label gs_mono_label_0">Disabled</span>
							<span class="gs_mono_label gs_mono_label_1">Enabled</span>
							<input type="checkbox" class="gs_mono_checkbox" value="1"/>
						</div>
					</div>
				</div>

				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Speed control</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>

						<span class="gs_title_vertical"><span class="title_v_subtitle">Speed control:</span> Enable/disable speed control in the players.<br /><br /><a class="gsp_title_sub_link" href="https://gspeech.io/demos" target="_blank">See live demo</a></span>
					</div>
					<div id="wbs_w_speed_enabled" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Use Global</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>

							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="-1" class="search_li li_selected ss_ul_li_act"><span>Use Global</span></li>
											<li data-val="0" class="search_li"><span>Disabled</span></li>
											<li data-val="1" class="search_li"><span>Enabled</span></li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Volume control</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Volume control:</span> Enable/disable volume control in the players.<br /><br /><a class="gsp_title_sub_link" href="https://gspeech.io/demos" target="_blank">See live demo</a></span>
					</div>
					<div id="wbs_w_volume_enabled" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Use Global</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>

							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="-1" class="search_li li_selected ss_ul_li_act"><span>Use Global</span></li>
											<li data-val="0" class="search_li"><span>Disabled</span></li>
											<li data-val="1" class="search_li"><span>Enabled</span></li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="opts_block">
					<div class="opts_block_label title_holder_vertical">
						<span>Text panel</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Text panel:</span> Enable/disable text panel in the players.<br /><br />Shows text panel, and caption the part of text, which is being read.<br /><br /><a class="gsp_title_sub_link" href="https://gspeech.io/demos" target="_blank">See live demo</a></span>
						<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
					</div>
					<div id="wbs_w_text_enabled" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Use Global</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="-1" class="search_li li_selected ss_ul_li_act"><span>Use Global</span></li>
											<li data-val="0" class="search_li"><span>Disabled</span></li>
											<li data-val="1" class="search_li ss_premium_feature_li"><span>Enabled</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Download audio</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Download audio:</span> Enable/disable audio downloads for users.<br /><br />Shows a download icon in the players, and the downloads count.<br /><br /><a class="gsp_title_sub_link" href="https://gspeech.io/demos" target="_blank">See live demo</a></span>
							<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
					</div>
					<div id="wbs_w_download_enabled" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Use Global</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="-1" class="search_li li_selected ss_ul_li_act"><span>Use Global</span></li>
											<li data-val="0" class="search_li"><span>Disabled</span></li>
											<li data-val="1" class="search_li ss_premium_feature_li"><span>Enabled</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Context player</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Context player:</span> Would follow the users as they scroll and allow them to control the player when it's out of view.<br /><br />Shows text panel, and caption the part of text, which is being read.<br /><br /><a class="gsp_title_sub_link" href="https://gspeech.io/demos" target="_blank">See live demo</a></span>
						<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
					</div>
					<div id="wbs_w_context_enabled" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Use Global</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="-1" class="search_li li_selected ss_ul_li_act"><span>Use Global</span></li>
											<li data-val="0" class="search_li"><span>Disabled</span></li>
											<li data-val="1" class="search_li ss_premium_feature_li"><span>Enabled</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Plays count</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Plays count:</span> Shows how many times audio played.</span>
						<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
					</div>
					<div id="wbs_w_plays_enabled" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Use Global</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="-1" class="search_li li_selected ss_ul_li_act"><span>Use Global</span></li>
											<li data-val="0" class="search_li"><span>Disabled</span></li>
											<li data-val="1" class="search_li ss_premium_feature_li"><span>Enabled</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="ss_options_group_1 ss_tab_wrapper ss_tab_translation">

				<div class="opts_title">Translation</div>

				<div class="opts_block">

					<div class="opts_block_label title_holder_vertical">
						<span>Translation</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Translation:</span> Give your users opportunity to translate audio to desired language instantly from the player.<br /><br />Shows a globe icon in the player, to choose the language.<br /><br /><a class="gsp_title_sub_link" href="https://gspeech.io/demos" target="_blank">See live demo</a></span>
						<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
					</div>

					<div id="wbs_w_langs_enabled" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Use Global</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="-1" class="search_li li_selected ss_ul_li_act ss_li_donotglobal"><span>Use Global</span></li>
											<li data-val="0" class="search_li"><span>Disabled</span></li>
											<li data-val="1" class="search_li ss_premium_feature_li"><span>Enabled</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="ss_w_translation_options" class="ss_display_none"></div>
			</div>

			<div class="ss_options_group_1 ss_tab_wrapper ss_tab_texts">

				<div class="opts_title">Texts</div>
				
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Speed</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Speed:</span> Will be used as hover information for speed menu.</span>
					</div>
					<input type="text" class="opts_input" id="ss_speed_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Language</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Language:</span> Will be used as hover information for translation menu.</span>
					</div>
					<input type="text" class="opts_input" id="ss_lang_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Voice</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Voice:</span> Will be used as hover information for voice menu.</span>
					</div>
					<input type="text" class="opts_input" id="ss_voice_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Plays</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Plays:</span> The word Plays.</span>
					</div>
					<input type="text" class="opts_input" id="ss_plays_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Plays Title</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Plays Title:</span> Will be used as hover information for Plays Count block.</span>
					</div>
					<input type="text" class="opts_input" id="ss_plays_title_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Download</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Download:</span> The word Download.</span>
					</div>
					<input type="text" class="opts_input" id="ss_download_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Downloaded</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Downloaded:</span> The word Downloaded.</span>
					</div>
					<input type="text" class="opts_input" id="ss_downloaded_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Open Text</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Open Text:</span> Will be used as hover information for Text menu.</span>
					</div>
					<input type="text" class="opts_input" id="ss_open_text_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Open Context</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Open Context:</span> Will be used as hover information for Context menu.</span>
					</div>
					<input type="text" class="opts_input" id="ss_open_context_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Close Context</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Close Context:</span> Will be used as hover information for close Context menu.</span>
					</div>
					<input type="text" class="opts_input" id="ss_close_context_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Loading</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Loading:</span> The word Loading.</span>
					</div>
					<input type="text" class="opts_input" id="ss_loading_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_4">
					<div class="opts_block_label title_holder_vertical">
						<span>Play</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Play:</span> The word Play.</span>
					</div>
					<input type="text" class="opts_input" id="ss_play_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_1 ss_opts_visible_2">
					<div class="opts_block_label title_holder_vertical">
						<span>Pause</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Pause:</span> The word Pause.</span>
					</div>
					<input type="text" class="opts_input" id="ss_pause_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Options</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Options:</span> Will be used as hover information for Options menu.</span>
					</div>
					<input type="text" class="opts_input" id="ss_options_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Listen</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Listen:</span> Information about RHT player active.</span>
					</div>
					<input type="text" class="opts_input" id="ss_listen_text" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Listen Desc</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Listen Description:</span> Information about RHT player active. Description.</span>
					</div>
					<input type="text" class="opts_input" id="ss_listen_text_desc" value="" />
				</div>
				<div class="opts_block ss_opts_hidden ss_opts_visible_4">
					<div class="opts_block_label title_holder_vertical">
						<span>Close</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Close:</span> The word Close.</span>
					</div>
					<input type="text" class="opts_input" id="ss_close_text" value="" />
				</div>
			</div>

			<div class="ss_options_group_1 ss_tab_wrapper ss_tab_styles">

				<div class="opts_title">Preview</div>

				<div class="opts_block  ss_opts_hidden ss_opts_visible_0">
					<div class="ss_full_player_preview" style="width: 50%;"></div>
				</div>
				<div class="opts_block  ss_opts_hidden ss_opts_visible_1">
					<div class="ss_button_player_preview" style="width: 50%;"></div>
				</div>
				<div class="opts_block  ss_opts_hidden ss_opts_visible_2">
					<div class="ss_circle_player_preview" style="width: 50%;"></div>
				</div>
				<div class="opts_block  ss_opts_hidden ss_opts_visible_3">
					<div class="ss_rht_player_preview" style="width: 50%;"></div>
				</div>

				<div class="opts_title ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3" style="margin-top: 15px;">Styles</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_0">

					<div class="opts_block_label title_holder_vertical">
						<span>BG Theme</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">BG Theme:</span> The main background theme of the player.</span>
					</div>

					<div class="ss_bg_blocks_wrapper">

						<div class="ss_carousel_wrapper" data-connection_id="wbs_bg_class">
							<div class="ss_carousel_arrow_left ss_arrow_disabled">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
							</div>
							<div class="ss_carousel_inner">

								<div class="ss_carousel_inner_row">

									<div class="ss_carousel_item ss_carousel_selected" data-item="ss_bg_19">
										<div class="ss_bg_19 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_20">
										<div class="ss_bg_20 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_21">
										<div class="ss_bg_21 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_22">
										<div class="ss_bg_22 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_23">
										<div class="ss_bg_23 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_24">
										<div class="ss_bg_24 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_25">
										<div class="ss_bg_25 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_26">
										<div class="ss_bg_26 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_27">
										<div class="ss_bg_27 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_28">
										<div class="ss_bg_28 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_29">
										<div class="ss_bg_29 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_30">
										<div class="ss_bg_30 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_31">
										<div class="ss_bg_31 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_32">
										<div class="ss_bg_32 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_33">
										<div class="ss_bg_33 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_34">
										<div class="ss_bg_34 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_35">
										<div class="ss_bg_35 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_36">
										<div class="ss_bg_36 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_37">
										<div class="ss_bg_37 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_38">
										<div class="ss_bg_38 ss_bg_scheme_gray ss_car_item_inner"></div>
									</div>

									<div class="ss_carousel_item" data-item="ss_bg_1">
										<div class="ss_bg_1 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_2">
										<div class="ss_bg_2 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_3">
										<div class="ss_bg_3 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_4">
										<div class="ss_bg_4 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_5">
										<div class="ss_bg_5 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_6">
										<div class="ss_bg_6 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_7">
										<div class="ss_bg_7 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_8">
										<div class="ss_bg_8 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_9">
										<div class="ss_bg_9 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_10">
										<div class="ss_bg_10 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_11">
										<div class="ss_bg_11 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_12">
										<div class="ss_bg_12 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_13">
										<div class="ss_bg_13 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_14">
										<div class="ss_bg_14 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_15">
										<div class="ss_bg_15 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_16">
										<div class="ss_bg_16 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_17">
										<div class="ss_bg_17 ss_car_item_inner"></div>
									</div>
									
									<div class="ss_carousel_item" data-item="ss_bg_72">
										<div class="ss_bg_72 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_73">
										<div class="ss_bg_73 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_74">
										<div class="ss_bg_74 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_75">
										<div class="ss_bg_75 ss_car_item_inner"></div>
									</div>

									<div class="ss_carousel_item" data-item="ss_bg_76">
										<div class="ss_bg_76 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_77">
										<div class="ss_bg_77 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_78">
										<div class="ss_bg_78 ss_car_item_inner"></div>
									</div>

									<div class="ss_carousel_item" data-item="ss_bg_52">
										<div class="ss_bg_52 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_53">
										<div class="ss_bg_53 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_54">
										<div class="ss_bg_54 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_55">
										<div class="ss_bg_55 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_56">
										<div class="ss_bg_56 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_57">
										<div class="ss_bg_57 ss_car_item_inner"></div>
									</div>
									
									<div class="ss_carousel_item" data-item="ss_bg_58">
										<div class="ss_bg_58 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_59">
										<div class="ss_bg_59 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_60">
										<div class="ss_bg_60 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_61">
										<div class="ss_bg_61 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_62">
										<div class="ss_bg_62 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_63">
										<div class="ss_bg_63 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_64">
										<div class="ss_bg_64 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_65">
										<div class="ss_bg_65 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_66">
										<div class="ss_bg_66 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_67">
										<div class="ss_bg_67 ss_car_item_inner"></div>
									</div>

									<div class="ss_carousel_item" data-item="ss_bg_18">
										<div class="ss_bg_18 ss_bg_scheme_violet ss_car_item_inner"><div class="ssplayer_content"></div></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_39">
										<div class="ss_bg_39 ss_bg_scheme_violet ss_car_item_inner"><div class="ssplayer_content"></div></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_40">
										<div class="ss_bg_40 ss_bg_scheme_violet ss_car_item_inner"><div class="ssplayer_content"></div></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_41">
										<div class="ss_bg_41 ss_bg_scheme_violet ss_car_item_inner"><div class="ssplayer_content"></div></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_42">
										<div class="ss_bg_42 ss_bg_scheme_violet ss_car_item_inner"><div class="ssplayer_content"></div></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_43">
										<div class="ss_bg_43 ss_bg_scheme_violet ss_car_item_inner"><div class="ssplayer_content"></div></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_44">
										<div class="ss_bg_44 ss_bg_scheme_violet ss_car_item_inner"><div class="ssplayer_content"></div></div>
									</div>

									<div class="ss_carousel_item" data-item="ss_bg_45">
										<div class="ss_bg_45 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_46">
										<div class="ss_bg_46 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_47">
										<div class="ss_bg_47 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_48">
										<div class="ss_bg_48 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_49">
										<div class="ss_bg_49 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_50">
										<div class="ss_bg_50 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_51">
										<div class="ss_bg_51 ss_car_item_inner"></div>
									</div>

									<div class="ss_carousel_item" data-item="ss_bg_68">
										<div class="ss_bg_68 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_69">
										<div class="ss_bg_69 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_70">
										<div class="ss_bg_70 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_71">
										<div class="ss_bg_71 ss_car_item_inner"></div>
									</div>

									<div class="ss_carousel_item" data-item="ss_bg_79">
										<div class="ss_bg_79 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_80">
										<div class="ss_bg_80 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_81">
										<div class="ss_bg_81 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_82">
										<div class="ss_bg_82 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_83">
										<div class="ss_bg_83 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_84">
										<div class="ss_bg_84 ss_car_item_inner"></div>
									</div>
									<div class="ss_carousel_item" data-item="ss_bg_85">
										<div class="ss_bg_85 ss_car_item_inner"></div>
									</div>
									
								</div>
								

							</div>
							<div class="ss_carousel_arrow_right">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>
							</div>
						</div>

					</div>

					<div id="wbs_bg_class" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Gray</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="ss_bg_19" class="search_li li_selected ss_ul_li_act"><span>Light 1 - Blocks</span></li>
											<li data-val="ss_bg_20" class="search_li"><span>Light 2 - Blocks Small</span></li>
											<li data-val="ss_bg_21" class="search_li"><span>Light 3 - Points</span></li>
											<li data-val="ss_bg_22" class="search_li"><span>Light 4 - Flowers</span></li>
											<li data-val="ss_bg_23" class="search_li"><span>Light 5 - Z-Style</span></li>
											<li data-val="ss_bg_24" class="search_li"><span>Light 6 - Circles</span></li>
											<li data-val="ss_bg_25" class="search_li"><span>Light 7 - Smile :)</span></li>
											<li data-val="ss_bg_26" class="search_li"><span>Light 8 - Yellow-Drops</span></li>
											<li data-val="ss_bg_27" class="search_li"><span>Light 9 - Wood Vertical</span></li>
											<li data-val="ss_bg_28" class="search_li"><span>Light 10 - Rain</span></li>
											<li data-val="ss_bg_29" class="search_li"><span>Light 11 - Horizontal Mirage</span></li>
											<li data-val="ss_bg_30" class="search_li"><span>Light 12 - Vertical Mirage</span></li>
											<li data-val="ss_bg_31" class="search_li"><span>Light 13 - Wood Horizontal</span></li>
											<li data-val="ss_bg_32" class="search_li"><span>Light 14 - Points Small</span></li>
											<li data-val="ss_bg_33" class="search_li"><span>Light 15 - 3D Pattern</span></li>
											<li data-val="ss_bg_34" class="search_li"><span>Light 16 - Yellow Rombs</span></li>
											<li data-val="ss_bg_35" class="search_li"><span>Light 17 - Blocks Mozaic</span></li>
											<li data-val="ss_bg_36" class="search_li"><span>Light 18 - Jeans</span></li>
											<li data-val="ss_bg_37" class="search_li"><span>Light 19 - Points Dark</span></li>
											<li data-val="ss_bg_38" class="search_li"><span>Light 20 - Points Dark 2</span></li>

											<li data-val="ss_bg_1" class="search_li "><span>Dark 1 - Dorado</span></li>
											<li data-val="ss_bg_2" class="search_li"><span>Dark 2 - Brown Pattern</span></li>
											<li data-val="ss_bg_3" class="search_li"><span>Dark 3 - SnowFlakes</span></li>
											<li data-val="ss_bg_4" class="search_li"><span>Dark 4 - Stone Solid</span></li>
											<li data-val="ss_bg_5" class="search_li"><span>Dark 5 - Wood Verical</span></li>
											<li data-val="ss_bg_6" class="search_li"><span>Dark 6 - Firework</span></li>
											<li data-val="ss_bg_7" class="search_li"><span>Dark 7 - Red Circles</span></li>
											<li data-val="ss_bg_8" class="search_li"><span>Dark 8 - Ammo</span></li>
											<li data-val="ss_bg_9" class="search_li"><span>Dark 9 - Diagonal Mirage</span></li>
											<li data-val="ss_bg_10" class="search_li"><span>Dark 10 - Diagonal Lines</span></li>
											<li data-val="ss_bg_11" class="search_li"><span>Dark 11 - Diagonal Lines 2</span></li>
											<li data-val="ss_bg_12" class="search_li"><span>Dark 12 - Blocks Small</span></li>
											<li data-val="ss_bg_13" class="search_li"><span>Dark 13 - Solid Pattern</span></li>
											<li data-val="ss_bg_14" class="search_li"><span>Dark 14 - Solid Pattern horizontal</span></li>
											<li data-val="ss_bg_15" class="search_li"><span>Dark 15 - Dark jeans</span></li>
											<li data-val="ss_bg_16" class="search_li"><span>Dark 16 - Blocks Dark</span></li>
											<li data-val="ss_bg_17" class="search_li"><span>Dark 17 - Green Mirage</span></li>

											<li data-val="ss_bg_72" class="search_li"><span>Green 1 - Solid</span></li>
											<li data-val="ss_bg_73" class="search_li"><span>Green 2 - SnowFlakes</span></li>
											<li data-val="ss_bg_74" class="search_li"><span>Green 3 - Green Pattern</span></li>
											<li data-val="ss_bg_75" class="search_li"><span>Green 4 - Leaves</span></li>

											<li data-val="ss_bg_76" class="search_li"><span>Yellow 1 - Lite Pattern</span></li>
											<li data-val="ss_bg_77" class="search_li"><span>Yellow 2 - Classic</span></li>
											<li data-val="ss_bg_78" class="search_li"><span>Yellow 3 - Flowers</span></li>

											<li data-val="ss_bg_52" class="search_li"><span>Red 1 - Flowers</span></li>
											<li data-val="ss_bg_53" class="search_li"><span>Red 2 - Red Pattern</span></li>
											<li data-val="ss_bg_54" class="search_li"><span>Red 3 - Squares</span></li>
											<li data-val="ss_bg_55" class="search_li"><span>Red 4 - Leaves</span></li>
											<li data-val="ss_bg_56" class="search_li"><span>Red 5 - Rise</span></li>
											<li data-val="ss_bg_57" class="search_li"><span>Red 6 - Mozaic</span></li>

											<li data-val="ss_bg_58" class="search_li"><span>Blue 1 - Bubbles</span></li>
											<li data-val="ss_bg_59" class="search_li"><span>Blue 2 - White Pattern</span></li>
											<li data-val="ss_bg_60" class="search_li"><span>Blue 3 - Classic</span></li>
											<li data-val="ss_bg_61" class="search_li"><span>Blue 4 - Flowers</span></li>
											<li data-val="ss_bg_62" class="search_li"><span>Blue 5 - Flowers 2</span></li>
											<li data-val="ss_bg_63" class="search_li"><span>Blue 6 - Abstract</span></li>
											<li data-val="ss_bg_64" class="search_li"><span>Blue 7 - Circles</span></li>
											<li data-val="ss_bg_65" class="search_li"><span>Blue 8 - Elegant</span></li>
											<li data-val="ss_bg_66" class="search_li"><span>Blue 9 - Blue-Smoke</span></li>
											<li data-val="ss_bg_67" class="search_li"><span>Blue 10 - Salute</span></li>

											<li data-val="ss_bg_18" class="search_li"><span>Violet 1 - Blocks</span></li>
											<li data-val="ss_bg_39" class="search_li"><span>Violet 2 - Blocks Small</span></li>
											<li data-val="ss_bg_40" class="search_li"><span>Violet 3 - Points</span></li>
											<li data-val="ss_bg_41" class="search_li"><span>Violet 4 - Flowers</span></li>
											<li data-val="ss_bg_42" class="search_li"><span>Violet 5 - Z-Style</span></li>
											<li data-val="ss_bg_43" class="search_li"><span>Violet 6 - Circles</span></li>
											<li data-val="ss_bg_44" class="search_li"><span>Violet 7 - Smile :)</span></li>

											<li data-val="ss_bg_45" class="search_li"><span>Pink 1 - Pink Pattern</span></li>
											<li data-val="ss_bg_46" class="search_li"><span>Pink 2 - Love</span></li>
											<li data-val="ss_bg_47" class="search_li"><span>Pink 3 - Love 2</span></li>
											<li data-val="ss_bg_48" class="search_li"><span>Pink 4 - Circles</span></li>
											<li data-val="ss_bg_49" class="search_li"><span>Pink 5 - Contexture</span></li>
											<li data-val="ss_bg_50" class="search_li"><span>Pink 6 - Drops</span></li>
											<li data-val="ss_bg_51" class="search_li"><span>Pink 7 - Balloons</span></li>

											<li data-val="ss_bg_68" class="search_li"><span>Brown 1 - Soldier</span></li>
											<li data-val="ss_bg_69" class="search_li"><span>Brown 2 - Patter 2</span></li>
											<li data-val="ss_bg_70" class="search_li"><span>Brown 3 - SnowFlakes</span></li>
											<li data-val="ss_bg_71" class="search_li"><span>Brown 4 - Dark 2</span></li>

											<li data-val="ss_bg_79" class="search_li"><span>Wood 1</span></li>
											<li data-val="ss_bg_80" class="search_li"><span>Wood 2</span></li>
											<li data-val="ss_bg_81" class="search_li"><span>Wood 3</span></li>
											<li data-val="ss_bg_82" class="search_li"><span>Wood 4</span></li>
											<li data-val="ss_bg_83" class="search_li"><span>Wood 5</span></li>
											<li data-val="ss_bg_84" class="search_li"><span>Wood 6</span></li>
											<li data-val="ss_bg_85" class="search_li"><span>Wood 7</span></li>
											
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="opts_block  ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opts_visible_3">

					<div class="opts_block_label title_holder_vertical">
						<span>Template</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Template:</span> Color scheme for icons and timeline.</span>
					</div>

					<div id="ss_template_blocks_wrapper">
						<div data-block_id="sstemplate_1" class="ss_tmp_block ss_tmp_block_1 ss_tmp_selected"></div>
						<div data-block_id="sstemplate_2" class="ss_tmp_block ss_tmp_block_2"></div>
						<div data-block_id="sstemplate_3" class="ss_tmp_block ss_tmp_block_3"></div>
						<div data-block_id="sstemplate_4" class="ss_tmp_block ss_tmp_block_4"></div>
						<div data-block_id="sstemplate_5" class="ss_tmp_block ss_tmp_block_5"></div>
						<div data-block_id="sstemplate_6" class="ss_tmp_block ss_tmp_block_6"></div>
						<div data-block_id="sstemplate_7" class="ss_tmp_block ss_tmp_block_7"></div>
						<div data-block_id="sstemplate_8" class="ss_tmp_block ss_tmp_block_8"></div>
						<div data-block_id="sstemplate_9" class="ss_tmp_block ss_tmp_block_9"></div>
						<div data-block_id="sstemplate_10" class="ss_tmp_block ss_tmp_block_10"></div>
						<div data-block_id="sstemplate_11" class="ss_tmp_block ss_tmp_block_11"></div>
						<div data-block_id="sstemplate_12" class="ss_tmp_block ss_tmp_block_12"></div>
						<div data-block_id="sstemplate_13" class="ss_tmp_block ss_tmp_block_13"></div>
						<div data-block_id="sstemplate_14" class="ss_tmp_block ss_tmp_block_14"></div>
						<div data-block_id="sstemplate_15" class="ss_tmp_block ss_tmp_block_15"></div>
						<div data-block_id="sstemplate_16" class="ss_tmp_block ss_tmp_block_16"></div>

					</div>

					<div id="wbs_template" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Template 1</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="sstemplate_1" class="search_li li_selected ss_ul_li_act"><span>Blue - Template 1</span></li>
											<li data-val="sstemplate_2" class="search_li"><span>Red - Template 2</span></li>
											<li data-val="sstemplate_3" class="search_li"><span>Green - Template 3</span></li>
											<li data-val="sstemplate_4" class="search_li"><span>Orange - Template 4</span></li>
											<li data-val="sstemplate_5" class="search_li"><span>Yellow - Template 5</span></li>
											<li data-val="sstemplate_6" class="search_li"><span>Purple - Template 6</span></li>
											<li data-val="sstemplate_7" class="search_li"><span>Black - Template 7</span></li>
											<li data-val="sstemplate_8" class="search_li"><span>Gray - Template 8</span></li>
											<li data-val="sstemplate_9" class="search_li"><span>White - Template 9</span></li>
											<li data-val="sstemplate_10" class="search_li"><span>Lite Blue - Template 10</span></li>
											<li data-val="sstemplate_11" class="search_li"><span>Violet - Template 11</span></li>
											<li data-val="sstemplate_12" class="search_li"><span>Brown - Template 12</span></li>
											<li data-val="sstemplate_13" class="search_li"><span>Gray Blue - Template 13</span></li>
											<li data-val="sstemplate_14" class="search_li"><span>Lite Green - Template 14</span></li>
											<li data-val="sstemplate_15" class="search_li"><span>Coral - Template 15</span></li>
											<li data-val="sstemplate_16" class="search_li"><span>Dark Blue - Template 16</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_0">

					<div class="opts_block_label title_holder_vertical">
						<span>BG Theme</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">BG Theme:</span></span>
					</div>

					<div id="wbs_bg_class" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Gray</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="ss_bg_19" class="search_li li_selected ss_ul_li_act"><span>Gray</span></li>
											<li data-val="ss_bg_1" class="search_li "><span>Theme 1</span></li>
											<li data-val="ss_bg_2" class="search_li"><span>Theme 2</span></li>
											<li data-val="ss_bg_3" class="search_li"><span>Theme 3</span></li>
											<li data-val="ss_bg_4" class="search_li"><span>Theme 4</span></li>
											<li data-val="ss_bg_5" class="search_li"><span>Theme 5</span></li>
											<li data-val="ss_bg_6" class="search_li"><span>Theme 6</span></li>
											<li data-val="ss_bg_7" class="search_li"><span>Theme 7</span></li>
											<li data-val="ss_bg_8" class="search_li"><span>Theme 8</span></li>
											<li data-val="ss_bg_9" class="search_li"><span>Theme 9</span></li>
											<li data-val="ss_bg_10" class="search_li"><span>Theme 10</span></li>
											<li data-val="ss_bg_11" class="search_li"><span>Theme 11</span></li>
											<li data-val="ss_bg_12" class="search_li"><span>Theme 12</span></li>
											<li data-val="ss_bg_13" class="search_li"><span>Theme 13</span></li>
											<li data-val="ss_bg_14" class="search_li"><span>Theme 14</span></li>
											<li data-val="ss_bg_15" class="search_li"><span>Theme 15</span></li>
											<li data-val="ss_bg_16" class="search_li"><span>Theme 16</span></li>
											<li data-val="ss_bg_17" class="search_li"><span>Theme 17</span></li>
											<li data-val="ss_bg_18" class="search_li"><span>Pink</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="opts_hor_wrapper ">

					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_block_w_1">
						<div class="opts_block_label title_holder_vertical">
							<span>SoundCloud Player</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">SoundCloud Style:</span> Use a nice large SoundCloud Style Player design.</span>
						</div>
						<div class="gs_mono_checkbox_wrapper" id="ss_plr0_soundcloud_enabled">
							<div class="gs_mono_switcher">
								<div class="gs_mono_switcher_button"></div>
							</div>
							<div class="gs_mono_label">
								<span class="gs_mono_label gs_mono_label_0">Disabled</span>
								<span class="gs_mono_label gs_mono_label_1">Enabled</span>
								<input type="checkbox" class="gs_mono_checkbox" value="0"/>
							</div>
						</div>
					</div>

					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_block_w_1">
						<div class="opts_block_label title_holder_vertical">
							<span>New York Player</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">New York Style:</span> Use a nice solid New York Player design. It will load the timeline and settings after the click on play button.</span>
						</div>
						<div class="gs_mono_checkbox_wrapper" id="ss_plr0_newyork_enabled">
							<div class="gs_mono_switcher">
								<div class="gs_mono_switcher_button"></div>
							</div>
							<div class="gs_mono_label">
								<span class="gs_mono_label gs_mono_label_0">Disabled</span>
								<span class="gs_mono_label gs_mono_label_1">Enabled</span>
								<input type="checkbox" class="gs_mono_checkbox" value="0"/>
							</div>
						</div>
					</div>

				</div>
				<div class="opts_hor_wrapper ">

					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_block_w_1">
						<div class="opts_block_label title_holder_vertical">
							<span>Play Button</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Play Button Style</span> Choose Play Button Style</span>
						</div>
						<div class="gs_mono_checkbox_wrapper" id="ss_plr0_play_style">
							<div class="gs_mono_switcher">
								<div class="gs_mono_switcher_button"></div>
							</div>
							<div class="gs_mono_label">
								<span class="gs_mono_label gs_mono_label_0">Style 1</span>
								<span class="gs_mono_label gs_mono_label_1">Style 2</span>
								<input type="checkbox" class="gs_mono_checkbox" value="0"/>
							</div>
						</div>
					</div>

					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_block_w_2">
						<div class="opts_block_label title_holder_vertical">
							<span>Hide N/P</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Next/Prev Buttons</span> Show or hide Next/Prev controls</span>
						</div>
						<div class="gs_mono_checkbox_wrapper" id="ss_plr0_np_hidden">
							<div class="gs_mono_switcher">
								<div class="gs_mono_switcher_button"></div>
							</div>
							<div class="gs_mono_label">
								<span class="gs_mono_label gs_mono_label_0">Disabled</span>
								<span class="gs_mono_label gs_mono_label_1">Enabled</span>
								<input type="checkbox" class="gs_mono_checkbox" value="0"/>
							</div>
						</div>
					</div>

					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_block_w_2">
						<div class="opts_block_label title_holder_vertical">
							<span>N/P Buttons</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Next/Prev Buttons Style</span> Choose Next/Prev Buttons Style</span>
						</div>
						<div class="gs_mono_checkbox_wrapper" id="ss_plr0_np_style">
							<div class="gs_mono_switcher">
								<div class="gs_mono_switcher_button"></div>
							</div>
							<div class="gs_mono_label">
								<span class="gs_mono_label gs_mono_label_0">Style 1</span>
								<span class="gs_mono_label gs_mono_label_1">Style 2</span>
								<input type="checkbox" class="gs_mono_checkbox" value="0"/>
							</div>
						</div>
					</div>
				</div>

				<div class="opts_hor_wrapper ">

					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_block_w_1">
						<div class="opts_block_label title_holder_vertical">
							<span>Rounded Icons</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Rounded Icons</span> Enable this to use icons with circle background.</span>
						</div>
						<div class="gs_mono_checkbox_wrapper" id="ss_plr0_rounded_icons">
							<div class="gs_mono_switcher">
								<div class="gs_mono_switcher_button"></div>
							</div>
							<div class="gs_mono_label">
								<span class="gs_mono_label gs_mono_label_0">Disabled</span>
								<span class="gs_mono_label gs_mono_label_1">Enabled</span>
								<input type="checkbox" class="gs_mono_checkbox" value="0"/>
							</div>
						</div>
					</div>

					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_block_w_2">
						<div class="opts_block_label title_holder_vertical">
							<span>Icons BG</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Rcons BG</span> When rounded icons are enabled, choose the background theme</span>
						</div>
						<div class="gs_mono_checkbox_wrapper" id="ss_plr0_icons_bg">
							<div class="gs_mono_switcher">
								<div class="gs_mono_switcher_button"></div>
							</div>
							<div class="gs_mono_label">
								<span class="gs_mono_label gs_mono_label_0">Lite</span>
								<span class="gs_mono_label gs_mono_label_1">Dark</span>
								<input type="checkbox" class="gs_mono_checkbox" value="0"/>
							</div>
						</div>
					</div>

					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_block_w_2">
						<div class="opts_block_label title_holder_vertical">
							<span>Hide Header</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Hide Header</span> Enable this to hide player header area.</span>
						</div>
						<div class="gs_mono_checkbox_wrapper" id="ss_plr0_hide_header">
							<div class="gs_mono_switcher">
								<div class="gs_mono_switcher_button"></div>
							</div>
							<div class="gs_mono_label">
								<span class="gs_mono_label gs_mono_label_0">Disabled</span>
								<span class="gs_mono_label gs_mono_label_1">Enabled</span>
								<input type="checkbox" class="gs_mono_checkbox" value="0"/>
							</div>
						</div>
					</div>

					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_block_w_2">
						<div class="opts_block_label title_holder_vertical">
							<span>No BG</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">No Background</span> Enable this to not use any background.</span>
						</div>
						<div class="gs_mono_checkbox_wrapper" id="ss_plr0_no_bg">
							<div class="gs_mono_switcher">
								<div class="gs_mono_switcher_button"></div>
							</div>
							<div class="gs_mono_label">
								<span class="gs_mono_label gs_mono_label_0">Disabled</span>
								<span class="gs_mono_label gs_mono_label_1">Enabled</span>
								<input type="checkbox" class="gs_mono_checkbox" value="0"/>
							</div>
						</div>
					</div>
					
				</div>

				<div class="opts_hor_wrapper ss_cus2">
					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opt_w_1 ">
						<div class="opts_block_label title_holder_vertical">
							<span>Width</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Width:</span> The width of player. Example: 100%, or 300px.</span>
						</div>
						<input type="text" class="opts_input" id="ss_width" value="" />
					</div>
					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opt_w_1">
						<div class="opts_block_label title_holder_vertical">
							<span>Margin Top</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Margin Top:</span> The margin-top of player. Example: 5.</span>
						</div>
						<input type="text" class="opts_input" id="ss_margin_top" value="" />
					</div>
					<div class="opts_block ss_opts_hidden ss_opts_visible_0 ss_opts_visible_1 ss_opts_visible_2 ss_opt_w_1">
						<div class="opts_block_label title_holder_vertical">
							<span>Margin Bottom</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Margin Bottom:</span> The margin-bottom of player. Example: 5.</span>
						</div>
						<input type="text" class="opts_input" id="ss_margin_bottom" value="" />
					</div>
				</div>


				<div class="opts_block ss_opts_hidden ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Block View</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Block View:</span></span>
					</div>
					<div id="wbs_block_sub_type" class="items_select_filter_wrapper ss_audio_holder" data-def_txt="">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>View 1</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="0" class="search_li li_selected ss_ul_li_act"><span>View 1</span></li>
											<li data-val="1" class="search_li"><span>View 2</span></li>
											<li data-val="2" class="search_li"><span>View 3</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="opts_title ss_opts_hidden ss_opts_visible_3" style="margin-top: 15px;">TTS Notifications</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Icon Position</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Icon Position:</span> Where to show the icon. When user hover it, the information about TTS is shown!</span>
					</div>

					<div class="gs_mono_checkbox_wrapper" id="wbs_rht_icon_pos">
						<div class="gs_mono_switcher">
							<div class="gs_mono_switcher_button"></div>
						</div>
						<div class="gs_mono_label">
							<span class="gs_mono_label gs_mono_label_0">Left</span>
							<span class="gs_mono_label gs_mono_label_1">Right</span>
							<input type="checkbox" class="gs_mono_checkbox" value="1"/>
						</div>
					</div>
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Top Offset</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Top Offset:</span> Specify in pixels, or percents. default is 15%.</span>
					</div>
					<input type="text" class="opts_input gsp_short_inp" id="ss_rht_icon_top_offset" value="" />
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_3">
					<div class="opts_block_label title_holder_vertical">
						<span>Show Banner</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Show Banner:</span> Show banner, which illustrates, that text-to-speech is enabled!</span>
					</div>

					<div class="gs_mono_checkbox_wrapper ss_commercial_switcher" id="wbs_show_rht">
						<div class="gs_mono_switcher">
							<div class="gs_mono_switcher_button"></div>
						</div>
						<div class="gs_mono_label">
							<span class="gs_mono_label gs_mono_label_0">Hide</span>
							<span class="gs_mono_label gs_mono_label_1">Show</span>
							<input type="checkbox" class="gs_mono_checkbox" value="1"/>
						</div>
					</div>
				</div>

				<div class="ss_rht_banner_info ss_display_none">
					<div class="opts_block ss_opts_hidden ss_opts_visible_3">
						<div class="opts_block_label title_holder_vertical">
							<span>Banner Position</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Banner Position:</span> Where to show the banner.</span>
						</div>
						<div id="wbs_rht_pos_class" style="" class="items_select_filter_wrapper">
							<div class="items_select_filter">
								<div class="items_select_filter_content"><span>Bottom Right</span></div>
								<div class="items_select_filter_icon_wrapper">
									<div class="items_select_filter_icon_holder">
										<div class="items_select_filter_icon_inner">
											<span class="items_select_filter_icon">
												<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
											</span>
										</div>
									</div>
								</div>
								<div class="items_select_ul_wrapper">
									<div class="items_select_ul_holder">
										<div class="items_select_ul_inner">
											<ul class="items_select_ul">
												<li data-val="ss_b_r" class="search_li li_selected ss_ul_li_act"><span>Bottom Right</span></li>
												<li data-val="ss_b_l" class="search_li"><span>Bottom Left</span></li>
												<li data-val="ss_t_l" class="search_li"><span>Top Left</span></li>
												<li data-val="ss_t_r" class="search_li"><span>Top Right</span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="opts_block ss_opts_hidden ss_opts_visible_3">
						<div class="opts_block_label title_holder_vertical">
							<span>Banner Close Event</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Banner Close Event:</span> Behaviour after close.</span>
						</div>
						<div id="wbs_rht_hide_size" style="" class="items_select_filter_wrapper">
							<div class="items_select_filter">
								<div class="items_select_filter_content"><span>Hide during session</span></div>
								<div class="items_select_filter_icon_wrapper">
									<div class="items_select_filter_icon_holder">
										<div class="items_select_filter_icon_inner">
											<span class="items_select_filter_icon">
												<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
											</span>
										</div>
									</div>
								</div>
								<div class="items_select_ul_wrapper">
									<div class="items_select_ul_holder">
										<div class="items_select_ul_inner">
											<ul class="items_select_ul">
												<li data-val="0" class="search_li"><span>Show Anytime</span></li>
												<li data-val="-1" class="search_li li_selected ss_ul_li_act"><span>Hide during session</span></li>
												<li data-val="1" class="search_li"><span>Hide for custom hours</span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="ss_rht_custom_val_info ss_display_none">
						<div class="opts_block ss_opts_hidden ss_opts_visible_3">
							<div class="opts_block_label title_holder_vertical">
								<span>Hours</span>
								<span class="questions_icon">
									<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
								</span>
								<span class="gs_title_vertical"><span class="title_v_subtitle">Hours:</span> Hide for this ammount of hours.</span>
							</div>
							<input type="text" class="opts_input" id="wbs_rht_hide_size_custom" value="" />
						</div>
					</div>
				</div>
			</div>

			<div class="ss_options_group_1 ss_tab_wrapper ss_tab_advanced">
				<div class="opts_title ss_opts_hidden ss_opts_visible_4" style="">Message Options</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_4">
					<div class="opts_block_label title_holder_vertical">
						<span>Banner Position</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Banner Position:</span> Banner position, where the message about welcome audio will be shown!</span>
					</div>

					<div class="gs_mono_checkbox_wrapper ss_commercial_switcher" id="banner_pos">
						<div class="gs_mono_switcher">
							<div class="gs_mono_switcher_button"></div>
						</div>
						<div class="gs_mono_label">
							<span class="gs_mono_label gs_mono_label_0">Bottom</span>
							<span class="gs_mono_label gs_mono_label_1">Top</span>
							<input type="checkbox" class="gs_mono_checkbox" value="1"/>
						</div>
					</div>
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_4">
					<div class="opts_block_label title_holder_vertical">
						<span>Play Timeout</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Play Timeout:</span> Timeout before the welcome message will be played. Set in miliseconds: 1000 for 1 second.</span>
					</div>
					<input type="text" class="opts_input" id="ss_play_timeout" value="" />
				</div>

				<div class="opts_block ss_opts_hidden ss_opts_visible_4">
					<div class="opts_block_label title_holder_vertical">
						<span>Play Type</span>
						<span class="questions_icon">
							<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
						</span>
						<span class="gs_title_vertical"><span class="title_v_subtitle">Play Type:</span> How to play welcome message.</span>
					</div>
					<div id="welcome_repeat_interval" style="" class="items_select_filter_wrapper">
						<div class="items_select_filter">
							<div class="items_select_filter_content"><span>Play Anytime</span></div>
							<div class="items_select_filter_icon_wrapper">
								<div class="items_select_filter_icon_holder">
									<div class="items_select_filter_icon_inner">
										<span class="items_select_filter_icon">
											<svg class="" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="items_select_ul_wrapper">
								<div class="items_select_ul_holder">
									<div class="items_select_ul_inner">
										<ul class="items_select_ul">
											<li data-val="0" class="search_li"><span>Play Anytime</span></li>
											<li data-val="-1" class="search_li li_selected ss_ul_li_act"><span>Play once per session</span></li>
											<li data-val="1" class="search_li"><span>Set custom hours</span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="ss_welcome_m_custom_info ss_display_none">
					<div class="opts_block ss_opts_hidden ss_opts_visible_4">
						<div class="opts_block_label title_holder_vertical">
							<span>Hours</span>
							<span class="questions_icon">
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
							</span>
							<span class="gs_title_vertical"><span class="title_v_subtitle">Hours:</span> Hide for this ammount of hours.</span>
						</div>
						<input type="text" class="opts_input" id="welcome_repeat_interval_custom" value="" />
					</div>
				</div>
			</div>

			<div class="ss_options_group_1 ss_tab_wrapper ss_tab_aliases">

				<div class="opts_title">Aliases</div>

				<div class="opts_block_label title_holder_vertical">
					<span>Aliases</span>
					<span class="questions_icon">
						<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/info.svg" />
					</span>
					<span class="gs_title_vertical"><span class="title_v_subtitle">Aliases:</span> Create text aliases.<br />Insert one alias per row!<br /><br />For example you need AI to be read as Artificial Intelligence. Just add the line:<br /><span class="gsp_title_sub_code">ai:artificial intelligence</span></span>
					<div class="ss_locked_icon ss_locked_icon_inner"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/svg/lock.svg" /></div>
				</div>
				<textarea class="opts_input ss_commercial_switcher" id="ss_w_aliases" style="height: 250px;"></textarea>
			</div>

			<div class="ss_options_group_1 ss_buttons_holder">
				<div class="gsp_login_button" id="ss_widget_settings_submit" data-widget_id="" data-user_id="" data-website_id="">Save</div>
				<div class="gsp_login_button ss_red_button" id="ss_widget_delete" data-widget_id="">Delete</div>
			</div>

		</div>
	</div>	
	
</div>