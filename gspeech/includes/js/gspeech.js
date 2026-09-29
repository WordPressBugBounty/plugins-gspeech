(function ($) {
	window.GSpeechBasic = function () {
		var thisPage = this;

		this.clearSelection = function () {
			if (window.getSelection) {
				if (window.getSelection().empty) {
					window.getSelection().empty();
				}
				else if (window.getSelection().removeAllRanges) {
					window.getSelection().removeAllRanges();
				}
			}
			else if (document.selection) {
				document.selection.empty();
			}
		};

		this.hide_speaker = function () {
			var f;

			thisPage.clearAllPlayers();
			thisPage.stop_rotate_speaker();
			$('#sound_container').fadeTo(10, 1);
			$('#sound_container').fadeOut(300);
			for (f in blink_timer) {
				clearTimeout(blink_timer[f]);
			}
			sound_container_clicked = false;
			blinking_enable = true;
			sound_container_visible = true;
			thisPage.hide_tooltip_basic($('#sexy_tooltip'));
		};

		this.stop_speaker = function () {
			var f;

			thisPage.clearAllPlayers();
			thisPage.stop_rotate_speaker();
			$('#sound_container').fadeTo(10, 1);
			for (f in blink_timer) {
				clearTimeout(blink_timer[f]);
			}
			sound_container_clicked = false;
			blinking_enable = true;
			sound_container_visible = true;
		};

		this.check_pro_version = function () {
			var bl;
			var bl1;

			return true;
			bl = $("#sexy_tooltip").css("display");
			bl1 = $("#sexy_tooltip .tooltip_inner").css("display");
			if (bl == 'block' && bl1 == 'block') {
				return true;
			}
			return false;
		};

		this.rotate_speaker = function () {
			$("#sound_container").addClass("gspeech_rotate");
		};

		this.stop_rotate_speaker = function () {
			$("#sound_container").removeClass("gspeech_rotate");
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

		this.blink_speaker = function () {
			if (sound_container_visible) {
				$('#sound_container').fadeTo(200, 0.2);
				sound_container_visible = false;
			}
			else {
				$('#sound_container').fadeTo(200, 1);
				sound_container_visible = true;
			}
			blink_timer.push(setTimeout(function () {
				thisPage.blink_speaker();
			}, 800));
		};

		this.change_speaker_animation = function () {
			if (!($("#sound_container").is(":visible"))) {
				return;
			}
			if (blinking_enable) {
				thisPage.stop_rotate_speaker();
				thisPage.blink_speaker();
			}
			blinking_enable = false;
		};

		this.isVissible = function () {
			var dis = $('#sound_container').css('display');
			if (dis == 'block') {
				return true;
			}
			return false;
		};

		this.isMyDiv = function (e) {
			var x;
			var id_clicked;

			if (typeof event == "undefined") {
				x = e.target || e.srcElement;
			}
			else {
				x = event.target || event.srcElement;
			}
			id_clicked = x.id;
			if (id_clicked == 'sound_container') {
				return true;
			}
			return false;
		};

		this.navigate_tooltip_basic = function ($tooltip, sound_x, sound_y) {
			var center_offset_x = parseFloat($('#sound_container ').width() / 2);
			var tooltip_width = parseFloat($tooltip.find('.tooltip_inner').width());
			var tooltip_height = parseFloat($tooltip.show().find('.tooltip_inner').height());
			var container_height = parseFloat($tooltip.next('#sound_container ').height());
			var final_offset;
			var top_0;
			var top_1;
			var new_opacity;

			$tooltip.hide();

			if ($tooltip.find('.the-tooltip').hasClass('left')) {
				final_offset = -32 * 1 + center_offset_x * 1 + sound_x * 1;
				$tooltip.css({'left': final_offset, opacity: 0, 'display': 'block'});
			}

			if ($tooltip.find('.the-tooltip').hasClass('top')) {
				top_0 = sound_y - 200 * 1;
				top_1 = sound_y;
				$tooltip.css({'top': top_0, display: 'block'});
				new_opacity = 0.95;
				$tooltip.stop().animate({
					top: top_1,
					opacity: new_opacity
				}, 300, 'easeOutBack', function () {
					$tooltip.css({'display': 'block'});
				});
			}
			else if ($tooltip.find('.the-tooltip').hasClass('bottom')) {
				if ($tooltip.find('.tooltip_inner').hasClass('powered_by')) {
					new_opacity = 0.95;
				}
				else {
					new_opacity = 0.95;
				}

				top_0 = sound_y + 200 * 1;
				top_1 = sound_y + container_height * 1 + 16 * 1;
				$tooltip.css({'top': top_0, display: 'block'});
				$tooltip.stop().animate({
					top: top_1,
					opacity: new_opacity
				}, 300, 'easeOutBack', function () {
					$tooltip.css({'display': 'block'});
				});
			}
		};

		this.hide_tooltip_basic = function ($tooltip) {
			if ($tooltip.find('.the-tooltip').hasClass('top')) {
				$tooltip.stop(true, true).delay(200).animate({
					top: '-=200px',
					opacity: 0
				}, 300, 'easeInBack', function () {
					$(this).hide();
				});
			}
			else if ($tooltip.find('.the-tooltip').hasClass('bottom')) {
				$tooltip.stop(true, true).delay(130).animate({
					top: '+=200px',
					opacity: 0
				}, 300, 'easeInBack', function () {
					$(this).hide();
				});
			}
		};

		this.move_sound_container = function (x, y, txt) {
			var sound_x = x * 1 + 5;
			var sound_y = y * 1 - 5;

			$('#sound_container').css({
				left: sound_x,
				top: sound_y
			});
			$('#sound_container').fadeIn(400);
			$('#sound_text').html(txt);
			thisPage.navigate_tooltip_basic($('#sexy_tooltip'), sound_x, sound_y);
		};

		this.make_audio = function () {
			var words_array = new Array();
			var sent_array = new Array();
			var sent_index = 0;
			var i;
			var total_l;
			var players_count;
			var htm_cont;

			selected_txt = $('#sound_text').html();
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
							thisPage.change_speaker_animation();
						}, false);

						if (i == players_count - 1) {
							players[players_count - 1].addEventListener('pause', function (e) {
								thisPage.stop_speaker();
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

		this.GetSelectedText = function () {
			var selText = "";
			var selTextParts = [];

			function getNodeText(node) {
				var child;
				if (node.nodeType == 3) {
					selTextParts.push(node.data);
				}
				else if (node.hasChildNodes() && !(node.nodeType == 1 && /^(script|style)$/i.test(node.tagName))) {
					for (child = node.firstChild; !!child; child = child.nextSibling) {
						getNodeText(child);
					}
				}
			}

			if (window.getSelection) {
				var sel = window.getSelection();
				var rangeCount = sel.rangeCount;
				var i;
				if (rangeCount) {
					for (i = 0; i < rangeCount; ++i) {
						getNodeText(sel.getRangeAt(i).cloneContents());
					}
					selText = selTextParts.join("");
				}
			}
			else if (document.selection && document.selection.type == "Text") {
				selText = document.selection.createRange().text;
			}
			return selText;
		};

		this.get_coord = function (e) {
			var isIE = document.all ? true : false;
			var pos_x;
			var pos_y;
			var left;
			var top;

			if (!isIE) {
				pos_x = e.pageX;
				pos_y = e.pageY;
			}
			if (isIE) {
				left = document.documentElement.scrollLeft ?
					document.documentElement.scrollLeft :
					document.body.scrollLeft;
				pos_x = event.clientX + left;

				top = document.documentElement.scrollTop ?
					document.documentElement.scrollTop :
					document.body.scrollTop;
				pos_y = event.clientY + top;
			}
			return [pos_x, pos_y];
		};

		this.clearAllPlayers = function () {
			var c;
			for (c in players) {
				players[c] = '';
			}
			$('#sound_audio').html('');
		};

		this.play_selected = function () {
			if (!thisPage.isVissible()) {
				return;
			}
			if (!sound_container_clicked) {
				if (!thisPage.check_pro_version()) {
					alert('To hide a backlink please purchase a GSpeech PRO version');
					return false;
				}
				thisPage.make_audio();
				thisPage.rotate_speaker();
				sound_container_clicked = true;
			}
			else {
				thisPage.clearSelection();
				thisPage.hide_speaker();
			}
		};

		this.init = function () {
			console.log("gspeech old loaded");

			$("#sexy_tooltip").mousedown(function (e) {
				return false;
			});

			$(document).mousedown(function (e) {
				var w = parseInt(e.which);
				if (w == 3) {
					return false;
				}
				if (!thisPage.isMyDiv(e) && thisPage.isVissible()) {
					thisPage.hide_speaker();
					thisPage.clearSelection();
				}
				else {
					if (thisPage.isVissible() && thisPage.isMyDiv(e)) {
						thisPage.play_selected();
						e.preventDefault();
					}
					else {
						thisPage.clearSelection();
					}
				}
			});

			$("body").keydown(function (e) {
				if (e.keyCode == 13) {
					thisPage.play_selected();
				}
			});

			document.onmouseup = function (e) {
				var patt1;
				var txt_empty;
				var coords;
				var x;
				var y;

				if (!basic_plg_enable) {
					return;
				}
				selected_txt = thisPage.GetSelectedText();
				if (!thisPage.isMyDiv(e) && !sound_container_clicked) {
					patt1 = /^(\s)*$/gi;
					txt_empty = patt1.test(selected_txt);
					if (txt_empty) {
						selected_txt = '';
					}
					if (selected_txt != '' && selected_txt != undefined && selected_txt.length > 1 && !txt_empty) {
						coords = thisPage.get_coord(e);
						x = coords[0];
						y = coords[1];
						thisPage.move_sound_container(x, y, selected_txt);
					}
				}
			};

			$("#sexy_tooltip").mouseup(function (e) {
				return false;
			});

			$("#sound_container").hover(function () {
				var sound_x = parseFloat($(this).css('left'));
				var sound_y = parseFloat($(this).css('top'));
				thisPage.navigate_tooltip_basic($('#sexy_tooltip_title'), sound_x, sound_y);
			}, function () {
				var sound_x = parseFloat($(this).css('left'));
				var sound_y = parseFloat($(this).css('top'));
				thisPage.hide_tooltip_basic($('#sexy_tooltip_title'), sound_x, sound_y);
			});
		};

		this.init();
	};

	$(document).ready(function () {
		window.gspeechBasic = new GSpeechBasic();
	});
})(jQuery);
