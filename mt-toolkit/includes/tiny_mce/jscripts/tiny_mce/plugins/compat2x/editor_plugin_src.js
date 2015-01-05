/**
 * $Id: editor_plugin_src.js 264 2007-04-26 20:53:09Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright © 2004-2008, Moxiecode Systems AB, All rights reserved.
 */

(function() {
	var DOM = tinymce.DOM, Event = tinymce.dom.Event, each = tinymce.each, is = tinymce.is;

	tinymce.create('tinymce.plugins.Compat2x', {
		getInfo : function() {
			return {
				longname : 'Compat2x',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/compat2x',
				version : tinyMCE.majorVersion + "." + tinyMCE.minorVersion
			};
		}
	});

	(function() {
		// Extend tinyMCE/EditorManager
		tinymce.extend(tinyMCE, {
			addToLang : function(p, l) {
				each(l, function(v, k) {
					tinyMCE.i18n[(tinyMCE.settings.language || 'en') + '.' + (p ? p + '_' : '') + k] = v;
				});
			},

			getInstanceById : function(n) {
				return this.get(n);
			}
		});
	})();

	(function() {
		var EditorManager = tinymce.EditorManager;

		tinyMCE.instances = {};
		tinyMCE.plugins = {};
		tinymce.PluginManager.onAdd.add(function(pm, n, p) {
			tinyMCE.plugins[n] = p;
		});

		tinyMCE.majorVersion = tinymce.majorVersion;
		tinyMCE.minorVersion = tinymce.minorVersion;
		tinyMCE.releaseDate = tinymce.releaseDate;
		tinyMCE.baseURL = tinymce.baseURL;
		tinyMCE.isIE = tinyMCE.isMSIE = tinymce.isIE || tinymce.isOpera;
		tinyMCE.isMSIE5 = tinymce.isIE;
		tinyMCE.isMSIE5_0 = tinymce.isIE;
		tinyMCE.isMSIE7 = tinymce.isIE;
		tinyMCE.isGecko = tinymce.isGecko;
		tinyMCE.isSafari = tinymce.isWebKit;
		tinyMCE.isOpera = tinymce.isOpera;
		tinyMCE.isMac = false;
		tinyMCE.isNS7 = false;
		tinyMCE.isNS71 = false;
		tinyMCE.compat = true;

		// Extend tinyMCE class
		TinyMCE_Engine = tinyMCE;
		tinymce.extend(tinyMCE, {
			getParam : function(n, dv) {
				return this.activeEditor.getParam(n, dv);
			},

			addEvent : function(e, na, f, sc) {
				tinymce.dom.Event.add(e, na, f, sc || this);
			},

			getControlHTML : function(n) {
				return EditorManager.activeEditor.controlManager.createControl(n);
			},

			loadCSS : function(u) {
				tinymce.DOM.loadCSS(u);
			},

			importCSS : function(doc, u) {
				if (doc == document)
					this.loadCSS(u);
				else
					new tinymce.dom.DOMUtils(doc).loadCSS(u);
			},

			log : function() {
				console.debug.apply(console, arguments);
			},

			getLang : function(n, dv) {
				var v = EditorManager.activeEditor.getLang(n.replace(/^lang_/g, ''), dv);

				// Is number
				if (/^[0-9\-.]+$/g.test(v))
					return parseInt(v);

				return v;
			},

			isInstance : function(o) {
				return o != null && typeof(o) == "object" && o.execCommand;
			},

			triggerNodeChange : function() {
				EditorManager.activeEditor.nodeChanged();
			},

			regexpReplace : function(in_str, reg_exp, replace_str, opts) {
				var re;

				if (in_str == null)
					return in_str;

				if (typeof(opts) == "undefined")
					opts = 'g';

				re = new RegExp(reg_exp, opts);

				return in_str.replace(re, replace_str);
			},

			trim : function(s) {
				return tinymce.trim(s);
			},

			xmlEncode : function(s) {
				return tinymce.DOM.encode(s);
			},

			explode : function(s, d) {
				var o = [];

				tinymce.each(s.split(d), function(v) {
					if (v != '')
						o.push(v);
				});

				return o;
			},

			switchClass : function(id, cls) {
				var b;

				if (/^mceButton/.test(cls)) {
					b = EditorManager.activeEditor.controlManager.get(id);

					if (!b)
						return;

					switch (cls) {
						case "mceButtonNormal":
							b.setDisabled(false);
							b.setActive(false);
							return;

						case "mceButtonDisabled":
							b.setDisabled(true);
							return;

						case "mceButtonSelected":
							b.setActive(true);
							b.setDisabled(false);
							return;
					}
				}
			},

			addCSSClass : function(e, n, b) {
				return tinymce.DOM.addClass(e, n, b);
			},

			hasCSSClass : function(e, n) {
				return tinymce.DOM.hasClass(e, n);
			},

			removeCSSClass : function(e, n) {
				return tinymce.DOM.removeClass(e, n);
			},

			getCSSClasses : function() {
				var cl = EditorManager.activeEditor.dom.getClasses(), o = [];

				each(cl, function(c) {
					o.push(c['class']);
				});

				return o;
			},

			setWindowArg : function(n, v) {
				EditorManager.activeEditor.windowManager.params[n] = v;
			},

			getWindowArg : function(n, dv) {
				var wm = EditorManager.activeEditor.windowManager, v;

				v = wm.getParam(n);
				if (v === '')
					return '';

				return v || wm.getFeature(n) || dv;
			},

			getParentNode : function(n, f) {
				return this._getDOM().getParent(n, f);
			},

			selectElements : function(n, na, f) {
				var i, a = [], nl, x;

				for (x=0, na = na.split(','); x<na.length; x++)
					for (i=0, nl = n.getElementsByTagName(na[x]); i<nl.length; i++)
						(!f || f(nl[i])) && a.push(nl[i]);

				return a;
			},

			getNodeTree : function(n, na, t, nn) {
				return this.selectNodes(n, function(n) {
					return (!t || n.nodeType == t) && (!nn || n.nodeName == nn);
				}, na ? na : []);
			},

			getAttrib : function(e, n, dv) {
				return this._getDOM().getAttrib(e, n, dv);
			},

			setAttrib : function(e, n, v) {
				return this._getDOM().setAttrib(e, n, v);
			},

			getElementsByAttributeValue : function(n, e, a, v) {
				var i, nl = n.getElementsByTagName(e), o = [];

				for (i=0; i<nl.length; i++) {
					if (tinyMCE.getAttrib(nl[i], a).indexOf(v) != -1)
						o[o.length] = nl[i];
				}

				return o;
			},

			selectNodes : function(n, f, a) {
				var i;

				if (!a)
					a = [];

				if (f(n))
			