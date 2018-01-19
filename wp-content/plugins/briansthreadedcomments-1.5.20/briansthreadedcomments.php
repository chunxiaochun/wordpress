<?php
/*
Plugin Name: Brian's Threaded Comments
Plugin URI: http://meidell.dk/threadedcomments/
Version: 1.5.20
Description: This gives you threaded comments and a "wandering" comment form.
Author: Brian Meidell
Author URI: http://meidell.dk/

Changelog:
   version 1.5: 	Released for WP1.5
   version 1.5.1:	Added error message for missing form field
   version 1.5.2:	Fixed stupid bug from last release	
   version 1.5.3:	Much more comprehensive error messages to help with diagnosis of problems.
                  Added login patch from Salil Deshpande.
                  Added auto-integration with subscribe-to-comments.
   version 1.5.4:	A fix to Salil Deshpandes patch - proper login required code, thanks to Salil again.
                  Renamed maybe_add_column to prevent conflicts with other plugins.
   version 1.5.5:	Added an options panel called "Threaded Comments" for the few settings
   version 1.5.6:	Changed comment_reply_ID form field to use comment_form hook instead, making it 
                  compatible with other plugins using this hook. Thanks to Martey of www.marteydodoo.com for pointing this out.
   version 1.5.7: Included bugfix from Zhou Qingbo
   version 1.5.8:	Fixed php opening tags to be verbose, as suggested by Michael Carrino
   version 1.5.9:	Changed plugin to use only existing database columns, and added migration code from older versions
   version 1.5.10: Changed nesting levels setting so it correctly reflects the nesting level (it was one off)
   version 1.5.11: Fixed taborder. Thanks to RJ Matthis (http://blog.reformatthis.com) / Ryan J Parker (http://www.ryanjparker.net)
   version 1.5.12: Fixed missing php opening tag
   version 1.5.15: Fixed closed/open comments bug and deploy script
   version 1.5.16: Big thanks to NSpeaks - Fixed issues mentioned in this post: http://nspeaks.com/149/hacking-brian’s-threaded-comments-plugin/
   version 1.5.17: Fixes from this article implemented: http://www.howtospoter.com/web-20/wordpress/fixing-brians-threaded-comments-plugin - thanks to Alex Sysoef
   version 1.5.18: Added gravatar support for wp2.5 and myavatars, thanks to Alex Sysoef
	version 1.5.19: Fgallery compatibility fix, fix for 2.5 compatibility (saving options problem), other minor bugfixes
	version 1.5.20: Fixed short opening tag error
*/

 
/**
 * Images
 */
$images = array();
$images['subscribed.png'] = "iVBORw0KGgoAAAANSUhEUgAAABUAAAAICAMAAAAhgUThAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAGUExURai0vvP8+20m9Z0AAAACdFJOU/8A5bcwSgAAAE5JREFUeNpiYAQBBhBGAgABxAARZYBgRigPIIBgchAI1cgAEEBwFWDlUNMYAAIIWS3cIAaAAEIyFy7OyAAQQAxIbkDYBhBAcCaKywACDAAgyABfpZamZwAAAABJRU5ErkJggg==";
$images['subthread.png'] = "iVBORw0KGgoAAAANSUhEUgAAAA0AAAANCAYAAAEF7NTqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAACmSURBVHjaYvz//z8DCAAEEBMDFAAEECNMBCCA4CIAAQQXgQGAAGJiQAMAAYSiAiCAGIEYzgMIIBSlAAGEogwggBignP/oGCQOEEAYNiADgADCKwkQQBiOhQGAAGIByzIyosgCFTMCBBBOHQABhFMHQADh1AEQQDh1AAQQTh0AAYRTAh8ACCBEzKBZhY8PEEBMDGQAgAAiSxNAAJGlCSCAyAoIgAADAEniPAbcSIg9AAAAAElFTkSuQmCC";
$images['subthread-open.png'] = "iVBORw0KGgoAAAANSUhEUgAAAA0AAAANCAYAAAEF7NTqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAACoSURBVHjaYvz//z8DCAAEEBMDFAAEECNMBCCA4CIAAQQXgQGAAGJiQAMAAYSiAiCAQOg/VOA/QAChKAUIIBRlAAHEAFOCjkHiAAGEYQMyAAggvJIAAYThFBgACCAWsCwj4380dzICBBBOHQABhFMHQADh1AEQQDh1AAQQTh0AAYRTAh8ACCBEzKBZhWE6kjxAADExkAEAAogsTQABRJYmgAAiKyAAAgwA3YE+/1F5tWAAAAAASUVORK5CYII=";
$images['spacer.png'] = "iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQI12NgYGBgAAAABQABXvMqOgAAAABJRU5ErkJggg==";

if(isset($_GET['image']) && 'briansthreadedcomments.php' == basename($_SERVER['SCRIPT_FILENAME']))
{
	header("content-type: image/png");
	print base64_decode($images[$_GET['image']]);
	exit;
}

function btc_options_page()
{
	global $wpdb;
?>
 
<div class="wrap"> 
<?php 
	$col = $wpdb->get_col("DESCRIBE {$wpdb->comments} comment_reply_ID");
	$col = count( $col );
?>
  <?php if( $col && !get_option("btc_migrated") ) { ?>
  <h2><?php _e('Upgrade Threading'); ?></h2>
  <form name="form2" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
      <tr valign="top"> 
        <th width="33%" scope="row"><?php _e('Migrate Threading') ?></th> 
        <td>
	<?php if( isset($_REQUEST['btc_upgrade']) ) { 
	 	$wpdb->query("UPDATE {$wpdb->comments} SET comment_parent=comment_reply_ID WHERE comment_parent = 0");
		update_option("btc_migrated", 1 );
	?>
           Done migrating comments.
	<?php } else { ?>
	  <input type="submit" name="btc_upgrade" value="Migrate now" />
	<br />
	Migrate threading from older version of Brians Threaded Comments plugin. 
	<?php
	} ?>
	</td> 
      </tr> 
      </table>
  </form>
  <?php } ?>
  <h2><?php _e('Brians Threaded Comments Options') ?></h2> 
  <form name="form1" method="post" action="options.php"> 
   <?php wp_nonce_field('update-options'); ?>
	<input type="hidden" name="action" value="update" /> <input type="hidden" name="page_options" value="btc_nestinglevels,btc_shrinkby,btc_customtarget,btc_separate_trackbacks" /> 
    <table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
      <tr valign="top"> 
        <th width="33%" scope="row"><?php _e('Max Nesting Levels:') ?></th> 
        <td><input name="btc_nestinglevels" type="text" id="btc_nestinglevels" value="<?php form_option('btc_nestinglevels'); ?>" size="5" /></td> 
      </tr> 
      <tr valign="top"> 
        <th scope="row"><?php _e('Shrink Font By %:') ?></th> 
        <td><input name="btc_shrinkby" type="text" id="btc_shrinkby" value="<?php form_option('btc_shrinkby'); ?>" size="5" />
        <br />
<?php _e('Enables shrinking the font by n percent per nesting level. Recommended is 0%-2%.') ?></td> 
      </tr> 
      <tr valign="top"> 
        <th width="33%" scope="row"><?php _e('Custom Comments Target:') ?></th> 
        <td><input name="btc_customtarget" type="text" id="btc_customtarget" value="<?php form_option('btc_customtarget'); ?>" size="40" />
	<br /> 
<?php _e('If you have renamed your wp-comments-post.php file to prevent comment spam, set the filename here (relative to the site root).') ?></td> 
      </tr> 
      <tr valign="top"> 
        <th width="33%" scope="row"><?php _e('Separate Trackbacks:') ?></th> 
		  <td><input name="btc_separate_trackbacks" type="checkbox" id="btc_separate_trackbacks" <?php checked('1', get_settings('btc_separate_trackbacks')); ?> value="1" size="40" />
      </tr> 
</table>

    </fieldset> 
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Update Options') ?> &raquo;" />
    </p>
  </form> 
</div> 
<?php 
	include("admin-footer.php");
	exit;
}
	
/**
 * Settings   
 */
 $shrinkby = get_option("btc_shrinkby");  	//	Each level of nesting makes the font size 2% smaller
 $btc_cutoff_level = get_option("btc_nestinglevels")-1; 		// 	At what level of nesting should we flatten the tree

function bnc_altertable()
{
	global $tablecomments;
	if(get_option("btc_shrinkby") == false)
		add_option("btc_shrinkby", 0, "Shrink percentage per nesting level for Brians Threaded Comments");
	if(get_option("btc_nestinglevels") == false)
		add_option("btc_nestinglevels", 3, "Max numver of nesting levels for Brians Threaded Comments");
	if(get_option("btc_customtarget") == false)
		add_option("btc_customtarget", "wp-comments-post.php", "Custom post target script name for Brians Threaded Comments");
	if(get_option("btc_separate_trackbacks") === false)
		add_option("btc_separate_trackbacks", '1', "Separate trackbacks form comments for Brians Threaded Comments");
}

function briansthreadedcomments() {
global $shrinkby;
if (!($withcomments) && ($single)) return;

// You can safely delete the single line below if your threaded comments are up and running
	bnc_altertable();
	
?>
<script language="javascript" type="text/javascript">
<!--
		function collapseThread( theId ) {
			var comment = document.getElementById(theId);
			if(!comment)
			{
				alert("ERROR:\nThe document structure is different\nfrom what Threaded Comments expects.\nYou are missing the element '"+theId+"'");
				return;
			}
			var theBody = findBody(comment);
			if(comment.className.indexOf("collapsed") > -1) {
				comment.className = comment.className.replace(" collapsed", "");;
			} else {
				comment.className += " collapsed";
			}
		}

		function expandThread( theId ) {
			var comment = document.getElementById(theId);
			if(!comment)
			{
				alert("ERROR:\nThe document structure is different\nfrom what Threaded Comments expects.\nYou are missing the element '"+theId+"'");
				return;
			}
			var theBody = findBody(comment);
			if(comment.className.indexOf("collapsed") > -1) {
				comment.className = comment.className.replace(" collapsed", "");;
			} 
		}
		
		function findBody(el)
		{
			var divs = el.getElementsByTagName("div");
			var ret;
			for(var i = 0; i < divs.length; ++i) {
				if(divs.item(i).className.indexOf("body") > -1)
					return divs.item(i);
			}
			return false;
		}
	
		function onAddComment() {
			//checkDocumentIntegrity();
			var el = document.getElementById("commentform");
			// Future release: Check if form is filled correctly and mark the form fields.
			el.submit();
		}
		
		function moveAddCommentBelow(theId, threadId, collapse)
		{
			expandThread( theId );
			var addComment = document.getElementById("addcomment");
			if(!addComment)
			{
			  	alert("ERROR:\nThreaded Comments can't find the 'addcomment' div.\nThis is probably because you have changed\nthe comments.php file.\nMake sure there is a tag around the form\nthat has the id 'addcomment'"); 
				return
			}
			var comment = document.getElementById(theId);
			if(collapse)
			{
				for(var i = 0; i < comment.childNodes.length; ++i) {
					var c = comment.childNodes.item(i);
					if(typeof(c.className) == "string" && c.className.indexOf("collapsed")<0) {
						c.className += " collapsed";
					}
				}
			}
			addComment.parentNode.removeChild(addComment);

			comment.appendChild(addComment);
			if(comment.className.indexOf("alt")>-1) {
				addComment.className = addComment.className.replace(" alt", "");					
			} else {
				addComment.className += " alt";
			}
		        var replyId = document.getElementById("comment_reply_ID");
			if(replyId == null)
			{
				alert("Brians Threaded Comments Error:\nThere is no hidden form field called\n'comment_reply_ID'. This is probably because you\nchanged the comments.php file and forgot\nto include the field. Please take a look\nat the original comments.php and copy the\nform field over.");
			}
			replyId.value = threadId;
			var reRootElement = document.getElementById("reroot");
			if(reRootElement == null)
			{
				alert("Brians Threaded Comments Error:\nThere is no anchor tag called 'reroot' where\nthe comment form starts.\nPlease compare your comments.php to the original\ncomments.php and copy the reroot anchor tag over.");
			}
			reRootElement.style.display = "block";
			var aTags = comment.getElementsByTagName("A");
			var anc = aTags.item(0).id;
			//document.location.href = "#"+anc;
			document.getElementById("comment").focus();
		}

		function checkDocumentIntegrity()
		{
			str = "";
			
			str += checkElement("reroot","div tag");
			str += checkElement("addcomment", "div tag");
			str += checkElement("comment_reply_ID", "hidden form field");
			str += checkElement("content", "div tag");
			str += checkElement("comment", "textfield");
			str += checkElement("addcommentanchor", "anchor tag");
			
			if(str != "")
			{
				str = "Brian's Threaded Comments are missing some of the elements that are required for it to function correctly.\nThis is probably the because you have changed the original comments.php that was included with the plugin.\n\nThese are the errors:\n" + str;
				str += "\nYou should compare your comments.php with the original comments.php and make sure the required elements have not been removed.";

				alert(str);
			}
		}
               
		function checkElement(theId, elDesc)
		{
			var el = document.getElementById(theId);
			if(!el)
			{
				if(elDesc == null)
					elDesc = "element";
				return "- The "+elDesc+" with the ID '" +theId + "' is missing\n"; 
			}
			else 
				return "";
		}
		
		function reRoot()
		{
			var addComment = document.getElementById("addcomment");			
			var reRootElement = document.getElementById("reroot");
			reRootElement.style.display = "none";
			var content = document.getElementById("content-main");
			if( !content )
				content = document.getElementById("content");
			if( content )
			{
				addComment.parentNode.removeChild(addComment);
				content.appendChild(addComment);
			}
			addComment.className = addComment.className.replace(" alt", "");
			document.location.href = "#addcommentanchor";
			document.getElementById("comment").focus();				
			document.getElementById("comment_reply_ID").value = "0";
		}			
		
		function changeCommentSize(d)
		{
			var el = document.getElementById("comment");
			var height = parseInt(el.style.height);
			if(!height && el.offsetHeight)
				height = el.offsetHeight;
			height += d;
			if(height < 20) 
				height = 20;
			el.style.height = height+"px";
		}		
-->
</script>
<style type="text/css">
.comment 
{
	position: 				relative;
	margin:					3px;
	margin-top:				6px;
/*	border: 				1px solid #666; */
	padding:				4px 4px 4px 8px;
<?php if($shrinkby > 0) { ?>
	font-size:				<?php echo (100-$shrinkby); ?>%;
<?php } ?>
	background-color:		#fff;
}

.odd
{
	background-color: #f8f8f8;
}

.comment div {
	position: 				relative;
}

.comment .comment img
{
	margin: 				0px;
}

.comment .collapseicon 
{
	width: 					13px;
	height: 				13px;
	overflow:				hidden;
	background-image: 		url(<?php echo get_settings('siteurl'); ?>/wp-content/plugins/briansthreadedcomments.php?image=subthread-open.png);
}

.collapsed .collapseicon 
{
	background-image: 		url(<?php echo get_settings('siteurl'); ?>/wp-content/plugins/briansthreadedcomments.php?image=subthread.png);
}


.comment .reply {
	text-align: 			right;
	font-size: 				80%;
	padding: 				0px 6px 6px 0px;
}

.comment
{
	border: 	1px solid #ddd;
	margin-top: 			10px;
}

input#subscribe
{
	width: auto;
}

.comment .body .content
{
	padding:				0px 3px 0px 3px;
	/*width: 					100%;	*/
	overflow: 				auto; 
}

.comment .title abbr
{
	border: none;
}

.collapsed .body, .collapsed .comment
{
	display:				none;
}
 
#commentform textarea {
	width: 97%;
}

<?php if( btc_has_avatars() ) { ?>
.btc_gravatar {
	float: right;
	margin: 3px 3px 4px 4px;
}
<?php } ?>
</style>
<?php
}

function btc_has_avatars()
{

	if( function_exists('get_avatar')) 
		return true;
	else if(function_exists('MyAvatars'))
		return true;
	return false;
}

function btc_avatar()
{

	if( function_exists('get_avatar')) 
	{
		echo get_avatar(get_comment_author_email(), '64'); 
		return;
	}
	else if(function_exists('MyAvatars')) 
	{ 
		MyAvatars();
		return;
	}
}

function btc_add_reply_id($id)
{
	global $tablecomments, $wpdb;	
	$reply_id = mysql_escape_string($_REQUEST['comment_reply_ID']);
	$q = $wpdb->query("UPDATE $tablecomments SET comment_parent='$reply_id' WHERE comment_ID='$id'");
}

function btc_add_options()
{
	add_options_page("Threaded Comments", "Threaded Comments", 7, __FILE__, 'btc_options_page');
	
}

function btc_add_reply_id_formfield()
{
	print "<input type='hidden' id='comment_reply_ID' name='comment_reply_ID' value='0' />";
}

add_action('wp_head','briansthreadedcomments');
add_action('comment_post','btc_add_reply_id');
add_action('admin_menu', 'btc_add_options');
add_action('comment_form', 'btc_add_reply_id_formfield');
?>
