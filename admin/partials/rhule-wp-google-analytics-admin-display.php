<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/mrhule
 * @since      1.0.0
 *
 * @package    Rhule_Wp_Google_Analytics
 * @subpackage Rhule_Wp_Google_Analytics/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

<h2><?php echo esc_html(get_admin_page_title()); ?></h2>

<form method="post" name="cleanup_options" action="options.php">

<?php 
    $options = get_option($this->plugin_name);

    $ga_code = $options['ga_code'];
    echo $options['invalid'];
?>

<?php 
    settings_fields($this->plugin_name); 
    do_settings_sections($this->plugin_name);
?>

        <fieldset>
            <p>Paste your GA Code below.</p>
            <legend class="screen-reader-text"><span><?php _e('Paste your GA Code', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-ga_code" name="<?php echo $this->plugin_name; ?>[ga_code]" value="<?php echo $ga_code?>"/>
        </fieldset>

    <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

</form>


</div>