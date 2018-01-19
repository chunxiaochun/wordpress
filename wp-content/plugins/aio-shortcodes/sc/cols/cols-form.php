<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Columns shortcode</title>
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
			document.getElementById('col_text').value = medziShortcodom;
       	}		
	}
	
	function lizatomic_vlozSC() {
		
        // shortcode sam
		var shortcodeRetazec;
		
        // instancie tabov
		var colTab_instancia = document.getElementById('colTab');	
		
		// Column ==============================================================
        
        // je tab aktivny?
		if (colTab_instancia.className.indexOf('current') != -1) {
		  
			// ziskaj text medzi shortcode tagmi
			var medziShortcodom = tinyMCE.activeEditor.selection.getContent();
			// ziskaj hodnoty z formu			
			var col_width = document.getElementById('col_width').value;	
            var is_last = document.getElementById('is_last').value;	
		
		//shortcodeRetazec = '["'+col_width+'" last="'+is_last+'" ]'+medziShortcodom+'[/"'+col_width+'"] ';
		shortcodeRetazec = '[' + col_width + ' last=' + is_last + ']' + medziShortcodom + '[/'+col_width+']';
		
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
			<li id="colTabID" class="current"><span><a href="javascript:mcTabs.displayTab('colTabID','colTab');" onmousedown="return false;">Column</a></span></li>            
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 120px;">
            
		<div id="colTab" class="panel current" style="height: 120px;">
        
        <fieldset>        
            <legend>Columns</legend><br />  
                   
            <table border="0" cellpadding="4" cellspacing="0">                
                <!-- Column -->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="col_width">Column:</label></td>                          <td>                    
                        <select name="col_width" id="col_width" style="width: 250px">                       
                            <option value="one-half">One half</option>
                            <option value="one-third">One third</option>  
                            <option value="two-thirds">Two thirds</option>  
                            <option value="one-fourth">One fourth</option>  
                            <option value="three-fourths">Three fourths</option>                                               
                        </select><br />      
                        <em style="font-size: 9px; color: #999;">Select width of the col.</em>                
                    </td>                    
                  </tr>     
                 <!-- is last? -->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="is_last">Is last?</label></td>                          <td>                    
                        <select name="is_last" id="is_last" style="width: 250px">                       
                            <option value="no">No</option>
                            <option value="yes">Yes</option>                                            
                        </select><br />      
                        <em style="font-size: 9px; color: #999;">Is this column last in the row?</em>                
                    </td>                    
                  </tr>                                 
              </table>     
         </fieldset>
		</div><!-- /#colTab -->
       
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