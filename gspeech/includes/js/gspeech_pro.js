(function ($) {
	window.GSpeechPro = function () {
		var thisPage = this;

		this.check_pro_version_by_class = function () {
			if ($(".tooltip_inner.powered_by").is(":visible")) {
				return true;
			}
			return false;
		};

		this.navigate_tooltip = function ($tooltip) {
			var center_offset_x = parseFloat($tooltip.parent('span').find('.sound_container_pro ').width() / 2);
			var tooltip_width = parseFloat($tooltip.find('.tooltip_inner').width());
			var final_offset;
			var new_opacity;
			var h;

			if ($tooltip.find('.the-tooltip').hasClass('center')) {
				final_offset = -1 * ((tooltip_width / 2) * 1 + 14 * 1 - center_offset_x * 1);
				$tooltip.css({'left': final_offset, opacity: 0, display: 'block'});
			}
			else if ($tooltip.find('.the-tooltip').hasClass('left')) {
				final_offset = -32 * 1 + center_offset_x * 1;
				$tooltip.css({'left': final_offset, opacity: 0, display: 'block'});
			}
			else if ($tooltip.find('.the-tooltip').hasClass('right')) {
				final_offset = 32 * 1 + center_offset_x * 1;
				$tooltip.css({'left': final_offset, opacity: 0, display: 'block'});
			}

			if ($tooltip.find('.the-tooltip').hasClass('top')) {
				$tooltip.css({'top': -200});
				new_opacity = 0.95;
				$tooltip.stop(false, false).animate({
					top: 1,
					opacity: new_opacity
				}, 300, 'easeOutBack');
			}
			else if ($tooltip.find('.the-tooltip').hasClass('bottom')) {
				new_opacity = 0.95;
				h = -1 * parseFloat($tooltip.parent('span').find('.sound_container_pro ').height());
				$tooltip.css({'bottom': -200});
				$tooltip.stop(false, false).animate({
					bottom: h,
					opacity: new_opacity
				}, 300, 'easeOutBack');
			}
		};

		this.hide_tooltip = function ($tooltip) {
			if ($tooltip.find('.the-tooltip').hasClass('top')) {
				$tooltip.stop(true, true).delay(200).animate({
					top: -200,
					opacity: 0
				}, 300, 'easeInBack', function () {
					$(this).hide();
				});
			}
			else if ($tooltip.find('.the-tooltip').hasClass('bottom')) {
				$tooltip.stop(true, true).delay(200).animate({
					bottom: -200,
					opacity: 0
				}, 300, 'easeInBack', function () {
					$(this).hide();
				});
			}
		};

		this.show_backlinks = function () {
			$('.sound_container_pro').each(function () {
				var $tooltip = $(this).next('.sexy_tooltip');
				setTimeout(function () {
					thisPage.navigate_tooltip($tooltip);
				}, 1500);
			});
		};

		this.triggerspeech = function ($elem, speechtimeout) {
			speechtimeoutfinal = speechtimeoutfinal + speechtimeout * 1 + 200 * 1;
			setTimeout(function () {
				thisPage.stop_all_speakers_pro($('.sound_container_pro'));
				thisPage.clearAllPlayers();
				setTimeout(function () {
					thisPage.make_speeching($elem);
				}, 10);
			}, speechtimeoutfinal);
		};

		this.createtriggerspeech = function ($elem, speechtimeout, selector, event) {
			$("" + selector + "").bind(event, function () {
				var $active_elem = $(this);
				var new_htm = $active_elem.html().replace(/<\/?[^>]+>/gi, '');
				var new_val = $active_elem.val().replace(/<\/?[^>]+>/gi, '');
				var htm;

				thisPage.stop_all_speakers_pro($('.sound_container_pro'));
				thisPage.clearAllPlayers();

				htm = $elem.children('.sound_text_pro').html();
				if (htm == 'gspeech_html' || $elem.children('.sound_text_pro').attr("htm") == 'gspeech_html') {
					$elem.children('.sound_text_pro').attr("htm", "gspeech_html");
					$elem.children('.sound_text_pro').html(new_htm);
				}
				else if (htm == 'gspeech_value' || $elem.children('.sound_text_pro').attr("htm") == 'gspeech_value') {
					$elem.children('.sound_text_pro').attr("htm", "gspeech_value");
					$elem.children('.sound_text_pro').html(new_val);
				}
				setTimeout(function () {
					thisPage.make_speeching($elem);
				}, speechtimeout);
			});
		};

		this.reset_opacities = function () {
			$('.sound_container_pro').each(function () {
				var $selection = $(this).parent('span').prev('.gspeech_selection');
				var roll = $selection.attr("roll");
				var an_time;
				var speaker_op;

				roll = roll == '' ? 1 : roll;
				--roll;
				an_time = parseFloat(gspeech_animation_time[roll]);
				speaker_op = parseFloat(gspeech_spop[roll] / 100);
				$(this).animate({opacity: speaker_op}, an_time);
			});
		};

		this.make_speeching = function ($elem) {
			var sel_txt = $elem.children('.sound_text_pro').html();
			var $selection;
			var lang;
			var roll;
			var speaker_op;

			if (speechtxt != sel_txt) {
				$selection = $elem.parent('span').prev('.gspeech_selection');
				$selection.stop().removeAttr("style").addClass('active');
				$elem.addClass('active');

				lang = $elem.attr("language");
				lang = lang == '' ? lang_identifier : lang;

				blinking_enable_pro = true;
				blink_start_enable_pro = true;

				roll = $elem.attr("roll");
				roll = roll == '' ? 1 : roll;
				--roll;
				speaker_op = parseFloat(gspeech_spoa[roll] / 100);
				$elem.stop().fadeTo(400, speaker_op);
				thisPage.rotate_speaker_pro($elem);

				thisPage.clearAllPlayers();
				thisPage.make_audio_pro($elem.children('.sound_text_pro'), $elem, lang);
			}
			speechtxt = sel_txt;
			setTimeout(function () {
				speechtxt = '';
			}, 100);
		};

		this.stop_speaker_pro = function ($elem) {
			var roll;
			var speaker_op;
			var f;

			basic_plg_enable = true;
			thisPage.clearAllPlayers();
			thisPage.stop_rotate_speaker_pro($elem);

			roll = $elem.attr("roll");
			roll = roll == '' ? 1 : roll;
			--roll;
			speaker_op = parseFloat(gspeech_spop[roll] / 100);
			$elem.stop().fadeTo(400, speaker_op).removeClass('active');

			for (f in blink_timer) {
				clearTimeout(blink_timer[f]);
			}
		};

		this.stop_all_speakers_pro = function ($elem) {
			var roll;
			var speaker_op;
			var f;

			thisPage.clearAllPlayers();
			thisPage.stop_rotate_speaker_pro($('.sound_container_pro'));

			roll = $elem.attr("roll");
			roll = roll == '' ? 1 : roll;
			--roll;

			speaker_op = parseFloat(gspeech_spop[roll] / 100);
			$elem.stop().removeClass('active');

			for (f in blink_timer) {
				clearTimeout(blink_timer[f]);
			}
		};

		this.rotate_speaker_pro = function ($elem) {
			$elem.addClass("gspeech_rotate");
		};

		this.stop_rotate_speaker_pro = function ($elem) {
			$elem.removeClass("gspeech_rotate");
		};

		this.play_audio = function (player) {
			var p;
			if (!player) {
				return;
			}
			try {
				p = player.play();
				if (p && p.catch) {
					p.catch(function () {});
				}
			} catch (e) {}
		};

		this.gspeech_stream_src = function (encoded_text, token) {
			return gspeech_legacy_stream_url +
				'?action=gspeech_legacy_stream' +
				'&nonce=' + encodeURIComponent(gspeech_legacy_stream_nonce) +
				'&q=' + encoded_text +
				'&l=' + encodeURIComponent(lang_identifier) +
				'&tr_tool=' + encodeURIComponent(translation_tool) +
				'&token=' + encodeURIComponent(token);
		};

		this.blink_speaker_pro = function ($elem) {
			var t;
			if (blink_start_enable_pro) {
				$elem.fadeTo(200, 0.2);
				blink_start_enable_pro = false;
			}
			else {
				$elem.fadeTo(200, 1);
				blink_start_enable_pro = true;
			}
			t = setTimeout(function () {
				thisPage.blink_speaker_pro($elem);
			}, 800);
			blink_timer.push(t);
		};

		this.change_speaker_animation_pro = function ($elem) {
			if (blinking_enable_pro) {
				thisPage.stop_rotate_speaker_pro($elem);
				thisPage.blink_speaker_pro($elem);
			}
			blinking_enable_pro = false;
		};

		this.make_audio_pro = function ($txt_element, $elem, lang) {
			var words_array = new Array();
			var sent_array = new Array();
			var sent_index = 0;
			var i;
			var total_l;
			var players_count;
			var htm_cont;

			selected_txt = $txt_element.html();
			words_array = selected_txt.split(/[^\S]+/);

			for (i = 0; i < words_array.length; i++) {
				if (sent_array[sent_index] == undefined) {
					sent_array[sent_index] = '';
				}

				total_l = sent_array[sent_index].length + words_array[i].length;
				if (sent_array[sent_index].length < speech_text_length && total_l < speech_text_length) {
					sent_array[sent_index] += words_array[i] + ' ';
				}
				else {
					++sent_index;
					sent_array[sent_index] = words_array[i] + ' ';
				}
			}

			players_count = sent_array.length;
			htm_cont = '';
			for (i = 0; i < players_count; i++) {
				htm_cont += '<audio id="player' + i + '" src="' + gspeech_plugin_url + 'gspeech.mpeg" type="' + translation_audio_type + '" controls="controls"></audio>';
			}
			$("#sound_audio").html(htm_cont);

			for (i = 0; i < players_count; i++) {
				create_htm(i, players_count);
			}

			function gs_get_token(encoded_text) {
				var query = encoded_text;
				var cM = function(a) {
					return function() {
						return a
					}
				};
				var of = "=";
				var dM = function(a, b) {
					for (var c = 0; c < b.length - 2; c += 3) {
						var d = b.charAt(c + 2),
							d = d >= t ? d.charCodeAt(0) - 87 : Number(d),
							d = b.charAt(c + 1) == Tb ? a >>> d : a << d;
						a = b.charAt(c) == Tb ? a + d & 4294967295 : a ^ d
					}
					return a
				};

				var eM = null;
				var cb = 0;
				var k = "";
				var Vb = "+-a^+6";
				var Ub = "+-3^+b+-f";
				var t = "a";
				var Tb = "+";
				var dd = ".";
				var hoursBetween = Math.floor(Date.now() / 3600000);
				window.TKK = hoursBetween.toString();

				fM = function(a) {
					var b;
					if (null === eM) {
						var c = cM(String.fromCharCode(84));
						b = cM(String.fromCharCode(75));
						c = [c(), c()];
						c[1] = b();
						eM = Number(window[c.join(b())]) || 0
					}
					b = eM;

					var d = cM(String.fromCharCode(116)),
						c = cM(String.fromCharCode(107)),
						d = [d(), d()];
					d[1] = c();
					for (var c = cb + d.join(k) +
							of, d = [], e = 0, f = 0; f < a.length; f++) {
						var g = a.charCodeAt(f);

						128 > g ? d[e++] = g : (2048 > g ? d[e++] = g >> 6 | 192 : (55296 == (g & 64512) && f + 1 < a.length && 56320 == (a.charCodeAt(f + 1) & 64512) ? (g = 65536 + ((g & 1023) << 10) + (a.charCodeAt(++f) & 1023), d[e++] = g >> 18 | 240, d[e++] = g >> 12 & 63 | 128) : d[e++] = g >> 12 | 224, d[e++] = g >> 6 & 63 | 128), d[e++] = g & 63 | 128)
					}

					a = b || 0;
					for (e = 0; e < d.length; e++) a += d[e], a = dM(a, Vb);
					a = dM(a, Ub);
					0 > a && (a = (a & 2147483647) + 2147483648);
					a %= 1E6;
					return a.toString() + dd + (a ^ b)
				};

				var token = fM(query);
				return token;
			}

			function gs_replace_ch(str) {
				str = str.replace("'", "");
				str = str.replace('"', '');
				str = str.replace('', '');
				str = str.replace('/', '');
				str = str.replace('&nbsp;', '');
				return str;
			}

			function create_htm(i, players_count) {
				$('#player' + i).mediaelementplayer({
					success: function (mediaElement, domObject) {
						var encoded_text;
						var token;

						players[i] = mediaElement;

						encoded_text = gs_replace_ch(sent_array[i]);
						token = gs_get_token(encoded_text);
						encoded_text = encodeURIComponent(encoded_text);
						mediaElement.setSrc(thisPage.gspeech_stream_src(encoded_text, token));

						mediaElement.addEventListener('pause', function (e) {
							thisPage.play_audio(players[i + 1]);
						}, false);

						players[0].addEventListener('progress', function (e) {
							thisPage.change_speaker_animation_pro($elem);
						}, false);

						if (i == players_count - 1) {
							players[players_count - 1].addEventListener('pause', function (e) {
								thisPage.stop_speaker_pro($elem);
							}, false);
						}

						mediaElement.load();

						if (i == 0) {
							thisPage.play_audio(mediaElement);
						}
					}
				});
			}
		};

		this.clearAllPlayers = function () {
			var c;
			for (c in players) {
				players[c] = '';
			}
			$('#sound_audio').html('');
		};

		this.init = function () {
			var speech_enable_count = 5;

			$('.sound_container_pro').slice(speech_enable_count).remove();

			thisPage.show_backlinks();

			$('.sound_container_pro').each(function (i) {
				var $elem = $(this);
				var autoplay = $(this).attr("autoplaypro");
				var speechtimeout = $(this).attr("speechtimeout");
				var selector = $(this).attr("selector");
				var event = $(this).attr("eventpro");

				if (isNaN(speechtimeout)) {
					speechtimeout = 0;
				}
				speechtimeout = parseFloat(speechtimeout);

				if (selector != '' && event != '' && createtriggerspeechcount < speech_enable_count) {
					thisPage.createtriggerspeech($elem, speechtimeout, selector, event);
					createtriggerspeechcount++;
				}
				else if (autoplay == 1) {
					thisPage.triggerspeech($elem, speechtimeout);
				}
			});

			$('.sound_container_pro').each(function (i) {
				var h1;
				var h2;
				var w;
				var delta_w;
				var delta;
				var delta_htm;

				h1 = $(this).parent('span').height();
				h2 = $(this).height();
				w = $(this).width();
				delta_w = w - 8;
				delta = (h1 - h2) / 2;
				$(this).parent('span').css({top: delta + 'px'});
				delta_htm = '<label style="width: ' + delta_w + 'px;display: inline-block">&nbsp;</label>';
				$(this).parent('span').after(delta_htm);
			});

			$('.sound_container_pro').hover(function () {
				var $selection = $(this).parent('span').prev('.gspeech_selection');
				var roll = $selection.attr("roll");
				var an_time;
				var speaker_op;

				roll = roll == '' ? 1 : roll;
				--roll;

				an_time = parseFloat(gspeech_animation_time[roll]);
				speaker_op = parseFloat(gspeech_spoa[roll] / 100);

				$(this).stop().animate({
					opacity: speaker_op
				}, an_time);

				$selection.stop().animate({
					backgroundColor: gspeech_bca[roll],
					color: gspeech_ca[roll]
				}, an_time);

				thisPage.navigate_tooltip($(this).prev('.sexy_tooltip'));
			}, function () {
				var $selection = $(this).parent('span').prev('.gspeech_selection');
				var roll = $selection.attr("roll");
				var an_time;
				var speaker_op;

				roll = roll == '' ? 1 : roll;
				--roll;

				if (!$(this).hasClass('active')) {
					an_time = parseFloat(gspeech_animation_time[roll]);
					speaker_op = parseFloat(gspeech_spop[roll] / 100);
					$(this).stop().animate({
						opacity: speaker_op
					}, an_time);
				}

				if (!$selection.hasClass('active')) {
					$selection.stop().animate({
						backgroundColor: gspeech_bcp[roll],
						color: gspeech_cp[roll]
					}, an_time);
				}

				thisPage.hide_tooltip($(this).prev('.sexy_tooltip'));
			});

			$('.sound_container_pro').mousedown(function () {
				pro_container_clicked = true;
				basic_plg_enable = false;
			});

			$("body").mousedown(function () {
				if ($('.sound_container_pro.active').length > 0 && !pro_container_clicked) {
					basic_plg_enable = true;
				}

				thisPage.stop_all_speakers_pro($('.sound_container_pro'));
				thisPage.clearAllPlayers();
				thisPage.reset_opacities();
				$('.sound_container_pro').removeClass('active');
				$('.gspeech_selection').removeClass('active');
			});

			$('.sound_container_pro').click(function () {
				if (false) {
					alert('To hide a backlink please purchase a GSpeech PRO version');
					return false;
				}
				thisPage.make_speeching($(this));
			});
		};

		this.init();
	};

	$(document).ready(function () {
		window.gspeechPro = new GSpeechPro();
	});
})(jQuery);
