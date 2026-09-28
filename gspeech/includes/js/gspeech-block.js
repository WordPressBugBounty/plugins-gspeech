(function (blocks, element, blockEditor, components, i18n) {
	var el = element.createElement;
	var useBlockProps = (blockEditor && blockEditor.useBlockProps) ? blockEditor.useBlockProps : null;
	var InspectorControls = (blockEditor && blockEditor.InspectorControls)
		? blockEditor.InspectorControls
		: (window.wp.editor ? window.wp.editor.InspectorControls : null);
	var SelectControl = components.SelectControl;
	var __ = i18n.__;
	var cfg = window.gspeechBlock || {};
	var isLegacy = parseInt(cfg.isLegacy, 10) === 1;
	var hasCloud = parseInt(cfg.hasCloud, 10) === 1;
	var settingsUrl = cfg.settingsUrl || '';
	var cloudUrl = cfg.cloudUrl || settingsUrl;

	var typeOptions = [
		{ label: __('Full', 'gspeech'), value: 'full' },
		{ label: __('Button', 'gspeech'), value: 'button' },
		{ label: __('Circle', 'gspeech'), value: 'circle' }
	];

	function playerClass(type) {
		if (type === 'button') {
			return 'gsp_button_player';
		}
		if (type === 'circle') {
			return 'gsp_circle_player';
		}
		return 'gsp_full_player';
	}

	function typeLabel(type) {
		if (type === 'button') {
			return __('Button Player', 'gspeech');
		}
		if (type === 'circle') {
			return __('Circle Player', 'gspeech');
		}
		return __('Full Player', 'gspeech');
	}

	function onTypeChange(setAttributes, value) {
		setAttributes({ type: value });
	}

	function editorProps() {
		var extra = { className: 'gsp-block-editor' };
		if (useBlockProps) {
			return useBlockProps(extra);
		}
		return extra;
	}

	function noticeBox(text, linkLabel, linkUrl) {
		var kids = [
			el('div', { key: 'text', className: 'gsp-block-notice-text' }, text)
		];
		if (linkUrl) {
			kids.push(el('a', {
				key: 'link',
				className: 'gsp-block-notice-link',
				href: linkUrl
			}, linkLabel));
		}
		return el('div', { key: 'notice', className: 'gsp-block-notice' }, kids);
	}

	blocks.registerBlockType('gspeech/player', {
		title: __('GSpeech Player', 'gspeech'),
		icon: 'controls-volumeon',
		category: 'widgets',
		attributes: {
			type: {
				type: 'string',
				default: 'full'
			}
		},
		supports: {
			html: false,
			inserter: !isLegacy
		},
		edit: function (props) {
			var type = props.attributes.type || 'full';
			var controls = [];

			if (isLegacy) {
				controls.push(noticeBox(
					__('This player works in Cloud mode. Turn off Legacy in GSpeech settings.', 'gspeech'),
					__('Open settings', 'gspeech'),
					settingsUrl
				));
				return el('div', editorProps(), controls);
			}

			if (!hasCloud) {
				controls.push(noticeBox(
					__('Connect your GSpeech Cloud account to use this player on the site.', 'gspeech'),
					__('Open Cloud Console', 'gspeech'),
					cloudUrl
				));
			}

			if (InspectorControls) {
				controls.push(
					el(InspectorControls, { key: 'side' },
						el(SelectControl, {
							label: __('Type', 'gspeech'),
							value: type,
							options: typeOptions,
							onChange: function (value) {
								onTypeChange(props.setAttributes, value);
							}
						})
					)
				);
			}

			controls.push(
				el('div', {
					key: 'preview',
					className: 'gsp-block-preview gsp-block-preview-' + type
				},
					el('div', { className: 'gsp-block-preview-title' }, 'GSpeech'),
					el('div', { className: 'gsp-block-preview-type' }, typeLabel(type)),
					el(SelectControl, {
						label: __('Type', 'gspeech'),
						value: type,
						options: typeOptions,
						onChange: function (value) {
							onTypeChange(props.setAttributes, value);
						}
					})
				)
			);

			return el('div', editorProps(), controls);
		},
		save: function (props) {
			var type = props.attributes.type || 'full';
			return el('div', { className: playerClass(type) });
		}
	});
})(
	window.wp.blocks,
	window.wp.element,
	window.wp.blockEditor || window.wp.editor,
	window.wp.components,
	window.wp.i18n
);
