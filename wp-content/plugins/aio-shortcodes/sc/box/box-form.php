<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Content box shortcode</title>
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
			document.getElementById('box_text').value = medziShortcodom;
       	}		
	}
	
	function lizatomic_vlozSC() {
		
        // shortcode sam
		var shortcodeRetazec;
		
        // instancie tabov
		var boxTab_instancia = document.getElementById('boxTab');	
		
		// Text box ==============================================================
        
        // je tab aktivny?
		if (boxTab_instancia.className.indexOf('current') != -1) {
		  
			// ziskaj text medzi shortcode tagmi
			var medziShortcodom = tinyMCE.activeEditor.selection.getContent();
			// ziskaj hodnoty z formu			
			var box_color = document.getElementById('box_color').value;	
            var box_icon = document.getElementById('box_icon').value;	
		
		shortcodeRetazec = '[box color="'+box_color+'" icon="'+box_icon+'"]'+medziShortcodom+'[/box] ';
		
		
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
			<li id="boxTabID" class="current"><span><a href="javascript:mcTabs.displayTab('boxTabID','boxTab');" onmousedown="return false;">Content box</a></span></li>            
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 120px;">
            
		<div id="boxTab" class="panel current" style="height: 120px;">
        
        <fieldset>        
            <legend>Style of the box</legend><br />  
                   
            <table border="0" cellpadding="4" cellspacing="0">                
                <!-- color -->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="box_color">Background:</label></td>                          <td>                    
                        <select name="box_color" id="box_color" style="width: 224px">                       
                            <option value="white">White</option>
                            <option value="green">Green</option>                            
                            <option value="blue">Blue</option>  
                            <option value="red">Red</option>
                            <option value="black">Black</option>
                            <option value="orange">Orange</option>
                            <option value="gray">Gray</option>
                            <option value="yellow">Yellow</option>                                         
                        </select><br />      
                        <em style="font-size: 9px; color: #999;">Background color of the box.</em>                
                    </td>                    
                  </tr>  
                <!-- icon -->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="box_icon">Icon:</label></td>                          <td>                    
                        <select name="box_icon" id="box_icon" style="width: 224px">                       
                            <option value="accept">accept</option>
                            <option value="add">add</option>
                            <option value="arrow_refresh">arrow_refresh</option>
                            <option value="box_down">box_down</option>
                            <option value="chart_pie">chart_pie</option>
                            <option value="emotion_smile">emotion_smile</option>
                            <option value="emotion_wink">emotion_wink</option>
                            <option value="eye">eye</option>
                            <option value="information">information</option>
                            <option value="lightbulb">lightbulb</option>
                            <option value="lightbulb_off">lightbulb_off</option>
                            <option value="new">new</option>
                            <option value="rss_valid">rss_valid</option>
                            <option value="star">star</option> 
                            <option value="support">support</option>
                            <option value="thumb_up">thumb_up</option>
                            <option value="thumb_down">thumb_down</option>
                            <option value="total_plan_cost">total_plan_cost</option>
                            <option value="user_green">user_green</option>
                            <option value="wand">wand</option>
                            <option value="world">world</option>                      
                        </select><br />      
                        <em style="font-size: 9px; color: #999;">Icon of the box.</em>                
                    </td>                    
                  </tr>                                  
              </table>     
         </fieldset>
		</div><!-- /#boxTab -->
       
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