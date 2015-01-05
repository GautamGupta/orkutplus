/**
 * $Id: editor_plugin_src.js 539 2008-01-14 19:08:58Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright © 2004-2008, Moxiecode Systems AB, All rights reserved.
 */

(function() {
	tinymce.create('tinymce.plugins.AdvancedLinkPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceAdvLink', function() {
				ed.windowManager.open({
					file : url + '/link.htm',
					width : 480 + parseInt(ed.getLang('advlink.delta_width', 0)),
					height : 155 + parseInt(ed.getLang('advlink.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			// Register buttons
			ed.addButton('link', {title : 'advlink.link_desc', cmd : 'mceAdvLink'});

			ed.addShortcut('ctrl+k', 'advlink.advlink_desc', 'mceAdvLink');
			
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('link', n.nodeName == 'A');
			});
		},

		getInfo : function() {
			return {
				longname : 'Advanced link',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/advlink',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('advlink', tinymce.plugins.AdvancedLinkPlugin);
})();