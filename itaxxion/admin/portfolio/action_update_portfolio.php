<?php
require_once('../../../../../wp-load.php');

if (!is_user_logged_in()) {
    echo json_encode(array('error' => 'You Don\'t have authorized'));
    exit();
}


$ret = $wpdb->update(
    $wpdb->prefix . "wp_itaxxion_portfolio",
    array(
        'name' => sanitize_text_field(ucfirst($_POST['name'])),
        'published' => ($_POST['published'] == 'true') ? 1 : 0
    ),
    array('id' => $_POST['id_portfolio']),
    array('%s', '%d'),
    array('%d')
);

if ($ret !== false)
    echo json_encode(array('status' => 'OK'));
else
    echo json_encode(array('error' => 'Update failed!!!'));