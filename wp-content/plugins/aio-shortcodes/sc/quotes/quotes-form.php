<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Quote shortcode</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">
	function lizatomic_zobrazForm() {
		tinyMCEPopup.resizeToInnerSize();
		
        
	}
	function lizatomic_vlozSC() {
        // shortcode sam
		var shortcodeRetazec;
        // instancie tabov
		var quoteTab_instancia = document.getElementById('quoteTab');	
		// Text quote ==============================================================
        
			// ziskaj text medzi shortcode tagmi
			var medziShortcodom = tinyMCE.activeEditor.selection.getContent();
        
        if (medziShortcodom != '') {            
            medziShortcodom = medziShortcodom;
        }	else {
            medziShortcodom = "quote";
        } 
			// ziskaj hodnoty z formu			
			var quote_type = document.getElementById('quote_type').value;
            var quote_align = document.getElementById('quote_align').value;	            
           
			shortcodeRetazec = '[quote type="'+quote_type+'" align="'+quote_align+'"] '+medziShortcodom+' [/quote]'; 
            
               //vloz shortcode a repaint editor
		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcodeRetazec);
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		return;
	}
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
			<li id="quoteTabID" class="current"><span><a href="javascript:mcTabs.displayTab('quoteTabID','quoteTab');" onmousedown="return false;">Quotes</a></span></li>            
		</ul>
	</div>
	<div class="panel_wrapper">
		<div id="quoteTab" class="panel current">
        <fieldset>        
            <legend>Tooltip</legend><br />  
            <table border="0" cellpadding="4" cellspacing="0">                
                <!-- Type -->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="quote_type">Type:</label></td>                          <td>                    
                        <select name="quote_type" id="quote_type" style="width: 250px">                       
                            <option value="large">Large</option>
                            <option value="medium">Medium</option>
                            <option value="small">Small</option>                                          
                        </select><br />      
                        <em style="font-size: 9px; color: #999;">Type of the quote</em>                
                    </td>                    
                  </tr>  
                <!-- Text align -->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="quote_align">Text align:</label></td>                          <td>                    
                        <select name="quote_align" id="quote_align" style="width: 250px">                       
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                            <option value="center">Center</option> 
                            <option value="justify">Justify</option>                                          
                        </select><br />      
                        <em style="font-size: 9px; color: #999;">Text align.</em>                
                    </td>                    
                  </tr>                                  
              </table>     
         </fieldset>         
		</div><!-- /#quoteTab -->
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