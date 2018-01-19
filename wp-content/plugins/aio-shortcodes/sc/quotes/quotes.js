(function() {
// Load plugin specific language pack
tinymce.PluginManager.requireLangPack('lizatomic_sc_quotes');
tinymce.create('tinymce.plugins.lizatomic_sc_quotes', {
    
/**
* Initializes the plugin, this will be executed after the plugin has been created.
* This call is done before the editor instance has finished it's initialization so use the onInit event
* of the editor instance to intercept that event.
*
* @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
* @param {string} url Absolute URL to where the plugin is located.
*/

init : function(ed, url) {	
	// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
	ed.addCommand('mcelizatomic_sc_quotes', function() {		
		ed.windowManager.open({			
			file : url + '/quotes-form.php',
			width : 360 + ed.getLang('lizatomic_sc_quotes.delta_width', 0),
			height : 380 + ed.getLang('lizatomic_sc_quotes.delta_height', 0),
			inline : 1			
		}, {			
			plugin_url : url		
		});
	});
	// Register lizatomic_sc_quotes button
	ed.addButton('lizatomic_sc_quotes', {
		title : 'Quotes shortcode',
		cmd : 'mcelizatomic_sc_quotes',
		image : url + '/quotes.png'		
	});
	// Add a node change handler, selects the button in the UI when a image is selected
	ed.onNodeChange.add(function(ed, cm, n) {		
		cm.setActive('mcelizatomic_sc_quotes', n.nodeName == 'IMG');		
	});
}, 

/**
* Returns information about the plugin as a name/value array.
* The current keys are longname, author, authorurl, infourl and version.
*
* @return {Object} Name/value array containing information about the plugin.
*/

getInfo : function() {	
    return {		
			longname : "Lizatomic's shortcodes",
			author : 'LizaTom.com',
			authorurl : 'http://LizaTom.com/',
			infourl : 'http://LizaTom.com/',
			version : "0.9"			
	};	
}
});
// Register plugin
tinymce.PluginManager.add('lizatomic_sc_quotes', tinymce.plugins.lizatomic_sc_quotes);
})();