<?php
require_once('../../../../wp-load.php');

$portfolios = $wpdb->get_results("SELECT * FROM `" . $wpdb->prefix . "wp_itaxxion_portfolio` WHERE published=1", object);

echo json_encode($portfolios);