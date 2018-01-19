<div class="wrap">
<h2><?php print LTSC_PUGIN_NAME ." ". LTSC_CURRENT_VERSION; ?></h2>

<form method="post" action="options.php">
    <?php
		settings_fields( 'ltsc-settings-group' );
	?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Twitter ID</th>
        <td><input type="text" name="lizatomic_twitter" value="<?php echo get_option('lizatomic_twitter'); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Feedburner</th>
        <td><input type="text" name="lizatomic_feedburner" value="<?php echo get_option('lizatomic_feedburner'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">CSS Styles</th>
        <td>
        <textarea name="lizatomic_cssstyles" cols="50" rows="20"><?php echo get_option('lizatomic_cssstyles'); ?></textarea></td>
        </tr>
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>