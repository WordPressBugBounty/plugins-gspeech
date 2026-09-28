<?php 
// no direct access!
defined('ABSPATH') or die("No direct access");
?>

<div class="old_p">
	<h4 class="old_p_title title_holder_vertical">
		<span><?php _e('Legacy player', 'gspeech'); ?></span>
		<span class="questions_icon">
			<img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/svg/info.svg" />
		</span>
		<span class="gs_title_vertical"><span class="title_v_subtitle">Legacy player:</span> If you turn this on, Cloud Console players are turned off. They do not run together.</span>
	</h4>
	<div class="old_p">
		<?php $checked1 = $wpgs_options['use_old_plugin'] == 0 ? 'checked="checked"' : ''; ?>
		<?php $checked2 = $wpgs_options['use_old_plugin'] == 1 ? 'checked="checked"' : ''; ?>
		<input id="wpgs_settings[use_old_plugin1]" name="wpgs_settings[use_old_plugin]" type="radio" value="0" <?php echo $checked1;?> /> 
		<label class="description" for="wpgs_settings[use_old_plugin1]"><?php _e('No', 'gspeech'); ?></label>
		<input id="wpgs_settings[use_old_plugin2]" name="wpgs_settings[use_old_plugin]" type="radio" value="1" <?php echo $checked2;?> /> 
		<label class="description" for="wpgs_settings[use_old_plugin2]"><?php _e('Yes', 'gspeech'); ?></label>
	</div>

	<h4 style="margin-bottom: -3px;"><?php _e('Language', 'gspeech'); ?><span class="description" style="display:block;font-weight: normal"><?php echo _e('Your site native language', 'gspeech')?></span></h4>
	<div class="old_p">
		<select name="wpgs_settings[language]" id="wpgs_settings[language]">
			<?php foreach($languages as $key => $language) { ?>
				<?php if($wpgs_options['language'] == $key) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
				<?php if($key == 'en' && $wpgs_options['language'] == '') { $selected = 'selected="selected"'; }?>
				<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $language; ?></option>
			<?php } ?>
		</select>
	</div>
	
	<h4 style="margin-bottom: -3px;"><?php _e('Speak Any Text', 'gspeech'); ?><span class="description" style="display:block;font-weight: normal"><?php echo _e('Show speaker when visitors highlighted text from the site', 'gspeech')?></span></h4>
	<div class="old_p">
		<?php $checked1 = $wpgs_options['speak_any_text'] == 1 ? 'checked="checked"' : ''; ?>
		<?php $checked2 = $wpgs_options['speak_any_text'] == 0 ? 'checked="checked"' : ''; ?>
		<input id="wpgs_settings[speak_any_text1]" name="wpgs_settings[speak_any_text]" type="radio" value="1" <?php echo $checked1;?> /> 
		<label class="description" for="wpgs_settings[speak_any_text1]"><?php _e('Yes', 'gspeech'); ?></label>
		<input id="wpgs_settings[speak_any_text2]" name="wpgs_settings[speak_any_text]" type="radio" value="0" <?php echo $checked2;?> /> 
		<label class="description" for="wpgs_settings[speak_any_text2]"><?php _e('No', 'gspeech'); ?></label>
	</div>

	<h4 style="margin-bottom: -3px;"><?php _e('Player Title', 'gspeech'); ?><span class="description" style="display:block;font-weight: normal"><?php echo _e('Title when user hover the speaker', 'gspeech')?></span></h4>
	<div class="old_p">
		<?php $checked1 = $wpgs_options['speak_any_text'] == 1 ? 'checked="checked"' : ''; ?>
		<?php $checked2 = $wpgs_options['speak_any_text'] == 0 ? 'checked="checked"' : ''; ?>
		<?php $v2_title = $wpgs_options['gspeech_v2x_title']; ?>
		<input style="width: 250px;" name="wpgs_settings[gspeech_v2x_title]" type="text" value="<?php echo $v2_title; ?>" /> 
	</div>
</div>