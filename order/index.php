<?php
require('../model/database.php');
require('../model/order_db.php');
require('../model/user_db.php');
require('../model/day_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_orders';
    }
}
// TODO: actions list_orders, changed_to_baked
if ($action == 'list_orders') {
    $current_day = get_current_day($db);
    try {
        $baked_orders = get_baked_orders($db, $current_day);
        $preparing_orders = get_preparing_orders($db, $current_day);
    include('order_list.php');
    } catch (Exception $e) {
        include ('../../errors/error.php');
        exit();
    }
} else if ($action == 'change_to_baked') {
    $current_day = get_current_day($db);
    try {
        $next_id = get_oldest_preparing_id($db);
        change_to_baked($db, $next_id, $current_day);
        header("Location: .");
    } catch (Exception $e) {
        include ('../../errors/error.php');
        exit();
    }
}