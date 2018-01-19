<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Highlighter shortcode</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">
	function lizatomic_zobrazForm() {
		
		tinyMCEPopup.resizeToInnerSize();
				var medziShortcodom = tinyMCE.activeEditor.selection.getContent();		
		if(medziShortcodom != '') {			
			document.getElementById('highlighter_text').value = medziShortcodom;
       	}		
	}
	
	function lizatomic_vlozSC() {
		
        // shortcode sam
		var shortcodeRetazec;
		
        // instancie tabov
		var highlighterTab_instancia = document.getElementById('highlighterTab');	
		
		// Text highlighter ==============================================================
        
        // je tab aktivny?
		if (highlighterTab_instancia.className.indexOf('current') != -1) {
		  
			// ziskaj text medzi shortcode tagmi
			var medziShortcodom = tinyMCE.activeEditor.selection.getContent();
			// ziskaj hodnoty z formu			
			var highlighter_color = document.getElementById('highlighter_color').value;	
		
		shortcodeRetazec = '[highlighter color="'+highlighter_color+'" ]'+medziShortcodom+'[/highlighter] ';
		
		
        //vloz shortcode a repaint editor
		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcodeRetazec);
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	} }
	</script>
	<base target="_self" />
    
	<style type="text/css">
	
    label span { color: #f00; }
	
    </style>
    
</head>
<body onload="lizatomic_zobrazForm();">
	<form name="lizatomic_sc_form" action="#">
	<div class="tabs">
		<ul>
			<li id="highlighterTabID" class="current"><span><a href="javascript:mcTabs.displayTab('highlighterTabID','highlighterTab');" onmousedown="return false;">Highlighters</a></span></li>            
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 120px;">
            
		<div id="highlighterTab" class="panel current" style="height: 120px;">
        
        <fieldset>        
            <legend>Highlighter color</legend><br />  
                   
            <table border="0" cellpadding="4" cellspacing="0">                
                <!-- color -->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="highlighter_color">Color:</label></td>                          <td>                    
                        <select name="highlighter_color" id="highlighter_color" style="width: 250px">                       
                            <option value="light-blue">Light blue</option>
                            <option value="light-green">Light green</option>                            
                            <option value="yellow">Yellow</option>  
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                            <option value="black">Black</option>
                            <option value="violet">Violet</option>
                            <option value="bordo">Bordo</option>
                            <option value="orange">Orange</option>
                            <option value="gray">Gray</option>
                            <option value="red">Red</option>
                            <option value="pink">Pink</option>                                              
                        </select><br />      
                        <em style="font-size: 9px; color: #999;">Size of the highlighter</em>                
                    </td>                    
                  </tr>                                  
              </table>     
         </fieldset>
		</div><!-- /#highlighterTab -->
       
	</div><!-- /.panel_wrapper -->

	<div class="mceActionPanel">
		<div style="float: left;">
			<input type="button" id="cancel" name="cancel" value="Close" onclick="tinyMCEPopup.close();" />
		</div>
		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="Insert" onclick="lizatomic_vlozSC();" />
		</div>
	</div>
</form>
</body>
</html>