<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Google chart shortcode</title>
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
			document.getElementById('googlecharts_text').value = medziShortcodom;
       	}		
	}
	
	function lizatomic_vlozSC() {
		
        // shortcode sam
		var shortcodeRetazec;
		
        // instancie tabov
		var googlechartsTab_instancia = document.getElementById('googlechartsTab');	
		
		// Column ==============================================================
        
        // je tab aktivny?
		if (googlechartsTab_instancia.className.indexOf('current') != -1) {
		  
			// ziskaj text medzi shortcode tagmi
			var medziShortcodom = tinyMCE.activeEditor.selection.getContent();
            
            /*
            Background color #1  
            Background color #2
            Width
            Height
            Chart type: 2D pie, 3D pie, Line, XY line, Spark line, Scatter, Venn
            Chart colors
            Chart labels  
            */
			// ziskaj hodnoty z formu	
            var googlechartsData = document.getElementById('googlechartsData').value;
            var googlechartsType = document.getElementById('googlechartsType').value;
            var googlechartsWidth = document.getElementById('googlechartsWidth').value;	
            var googlechartsHeight = document.getElementById('googlechartsHeight').value;
            var googlechartsLabels = document.getElementById('googlechartsLabels').value;
            var googlechartsColors = document.getElementById('googlechartsColors').value;
            var googlechartsColor1 = document.getElementById('googlechartsColor1').value;	
            var googlechartsColor2 = document.getElementById('googlechartsColor2').value;
            
            //shortcodeRetazec
			shortcodeRetazec = '[googlechart type="' + googlechartsType + '" data="' + googlechartsData + '" width="' + googlechartsWidth + '" height="' + googlechartsHeight + '" labels="' + googlechartsLabels + '" colors="' + googlechartsColors + '" color1="' + googlechartsColor1 + '" color2="' + googlechartsColor2 + '"]';		
		
        //vloz shortcode a repaint editor
		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcodeRetazec);
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
		
	  } 
	}
	</script>
	<base target="_self" />
    
	<style type="text/css">
	
    label span {color: #f00; }
	
    </style>
    
</head>
<body onload="lizatomic_zobrazForm();">
	<form name="lizatomic_sc_form" action="#">
	<div class="tabs">
		<ul>
			<li id="googlechartsTabID" class="current"><span><a href="javascript:mcTabs.displayTab('googlechartsTabID','googlechartsTab');" onmousedown="return false;">Google chart</a></span></li>            
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 360px;">
            
		<div id="googlechartsTab" class="panel current" style="height: 360px;">
        
        <!-- 
        
        Chart type: 2D pie, 3D pie, Line, XY line, Spark line, Scatter, Venn 
        Width
        Height
        Chart labels 
        Chart colors 
        Background color #1  
        Background color #2      
    
         -->
        
        <fieldset>        
            <legend>Google chart</legend><br />  
                   
            <table border="0" cellpadding="4" cellspacing="0"> 
                <!-- Data-->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="googlechartsData">Data:</label></td>
					<td>                    
                        <input type="text" name="googlechartsData" id="googlechartsData" value="12.5,15,20,30" style="width: 220px" /><br /> 
                        <em style="font-size: 9px; color: #999999;">Data of the chart.</em>                  
                    </td>                    
                  </tr> 
                 <!-- Chart type -->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="googlechartsType">Type:</label></td>                          <td>                    
                        <select name="googlechartsType" id="googlechartsType" style="width: 224px">                        
                            <option value="p3">3D Pie</option>
                            <option value="p">2D Pie</option>                            
                            <option value="lc">Line</option>  
                            <option value="lxy">XY Line</option>
                            <option value="ls">Spark Line</option>
                            <option value="s">Scatter</option>
                            <option value="v">Venn</option> 
                            <option value="gom">Meter</option>                                        
                        </select><br />      
                        <em style="font-size: 9px; color: #999;">Choose type of the chart.</em>                
                    </td>                    
                  </tr>               
                <!-- width-->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="googlechartsWidth">Width (px):</label></td>
					<td>                    
                        <input type="text" name="googlechartsWidth" id="googlechartsWidth" value="500" style="width: 220px" /><br /> 
                        <em style="font-size: 9px; color: #999999;">Width of the chart.</em>                  
                    </td>                    
                  </tr>   
                 <!-- height-->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="googlechartsHeight">Height (px):</label></td>
					<td>                    
                        <input type="text" name="googlechartsHeight" id="googlechartsHeight" value="300" style="width: 220px" /><br /> 
                        <em style="font-size: 9px; color: #999999;">Height of the chart.</em>                  
                    </td>                    
                  </tr> 				  
                 <!-- labels-->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="googlechartsLabels">Labels:</label></td>
					<td>                    
                        <input type="text" name="googlechartsLabels" id="googlechartsLabels" value="January+2012|February+2012|March+2012|April+2012" style="width: 220px" /><br /> 
                        <em style="font-size: 9px; color: #999999;">Chart labels.</em>                  
                    </td>                    
                  </tr> 
                 <!-- colors-->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="googlechartsColors">Colors:</label></td>
					<td>                    
                        <input type="text" name="googlechartsColors" id="googlechartsColors" value="FF0000|33CCCC|FFCC00|99CC00" style="width: 220px" /><br /> 
                        <em style="font-size: 9px; color: #999999;">Cahrt colors.</em>                  
                    </td>                    
                  </tr> 
                  
                  <!-- background color #1-->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="googlechartsColor1">Bg color #1:</label></td>
					<td>                    
                        <input type="text" name="googlechartsColor1" id="googlechartsColor1" value="ffffff" style="width: 220px" /><br /> 
                        <em style="font-size: 9px; color: #999999;">Background color #1 of the chart.</em>                  
                    </td>                    
                  </tr> 
                  
                  <!-- background color #2-->       
                 <tr>                 
                    <td nowrap="nowrap" style="vertical-align: text-top;"><label for="googlechartsColor2">Bg color #2:</label></td>
					<td>                    
                        <input type="text" name="googlechartsColor2" id="googlechartsColor2" value="C0C0C0" style="width: 220px" /><br /> 
                        <em style="font-size: 9px; color: #999999;">Background color #2 of the chart.</em>                  
                    </td>                    
                  </tr>
                                                 
              </table>     
         </fieldset>
		</div><!-- /#googlechartsTab -->
       
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