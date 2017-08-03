<?php
/**
 * Form
 */
function theme_settings_general()
{
    ?>
    <div class="wrap">
        <h1>itaxxion Settings</h1>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
            settings_fields("general-settings");
            do_settings_sections("itaxxion-general-settings");
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// End Form

/**
 * Fields
 */

function display_enable_topbar()
{
    ?>
        <input name="wp_itaxxion_enable_topbar" class="form-control col-sm-6 col-xs-12" type="checkbox" value="1" id="wp_itaxxion_enable_topbar" placeholder="Enable Topbar" <?php checked( '1', get_option('wp_itaxxion_enable_topbar'));?> />
    <?php
}

function display_contact_support_element()
{
    ?>
    <input type="text" name="wp_itaxxion_contact_support" id="wp_itaxxion_contact_support"
           class="form-control col-sm-6 col-xs-12" value="<?php echo get_option('wp_itaxxion_contact_support'); ?>"
           placeholder="Contact Phone/Email"/>
    <?php
}

function display_twitter_element()
{
    ?>
    <input type="url" name="wp_itaxxion_twitter_url" id="wp_itaxxion_twitter_url" class="form-control col-sm-6 col-xs-12"
           value="<?php echo get_option('wp_itaxxion_twitter_url'); ?>"/>
    <?php
}

function display_facebook_element()
{
    ?>
    <input type="url" name="wp_itaxxion_facebook_url" id="wp_itaxxion_facebook_url"
           class="form-control col-sm-6 col-xs-12" value="<?php echo get_option('wp_itaxxion_facebook_url'); ?>"/>
    <?php
}

function display_github_element()
{
    ?>
    <input type="url" name="wp_itaxxion_github_url" id="wp_itaxxion_github_url" class="form-control col-sm-6 col-xs-12"
           value="<?php echo get_option('wp_itaxxion_github_url'); ?>"/>
    <?php
}

function logo_display()
{
    ?>
    <input type="file" name="wp_itaxxion_logo"/>
    <?php
    $logo = get_option('wp_itaxxion_logo');
    if (!empty($logo)) { ?>
        <img class="img img-responsive" src="<?php echo $logo; ?>"/>
    <?php } ?>
    <?php
}

function handle_logo_upload()
{
    if (!empty($_FILES["logo"]["tmp_name"])) {
        $urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
        $temp = $urls["url"];
        return $temp;
    }

    return $option;
}

// End Fields

/**
 * Display Form
 */
add_action("admin_menu", "display_theme_general_fields");
function display_theme_general_fields()
{
    global $my_itaxxion_admin_page;
    add_action("admin_init", "register_general_settings");

    if (!isset($_POST['option_page'])) {
        if (!isset($_GET['page']) || (isset($_GET['page']) && !in_array($_GET['page'], $my_itaxxion_admin_page)))
            return;
    }

    wp_enqueue_style('itaxxion-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
}

function register_general_settings()
{
    add_settings_section("general-settings", "Settings", null, "itaxxion-general-settings");

    add_settings_field("wp_itaxxion_topbar", "Enable Topbar", "display_enable_topbar", "itaxxion-general-settings", "general-settings");
    add_settings_field("wp_itaxxion_contact_support", "Contact Support", "display_contact_support_element", "itaxxion-general-settings", "general-settings");
    add_settings_field("wp_itaxxion_facebook_url", "Facebook Profile Url", "display_facebook_element", "itaxxion-general-settings", "general-settings");
    add_settings_field("wp_itaxxion_twitter_url", "Twitter Profile Url", "display_twitter_element", "itaxxion-general-settings", "general-settings");
    add_settings_field("wp_itaxxion_github_url", "Github Profile Url", "display_github_element", "itaxxion-general-settings", "general-settings");
    add_settings_field("wp_itaxxion_logo", "Logo", "logo_display", "itaxxion-general-settings", "general-settings");

    register_setting("general-settings", "wp_itaxxion_enable_topbar");
    register_setting("general-settings", "wp_itaxxion_contact_support");
    register_setting("general-settings", "wp_itaxxion_facebook_url");
    register_setting("general-settings", "wp_itaxxion_twitter_url");
    register_setting("general-settings", "wp_itaxxion_github_url");
    register_setting("general-settings", "wp_itaxxion_logo", "handle_logo_upload");
}
// End Display Form