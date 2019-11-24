<?php

require('../model/database.php');
require('../model/initial.php');
require('../model/day_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'day';
    }
}

$current_day = get_current_day($db);

if ($action == 'day') {
    try {
        $order_list = get_todays_orders($db, $current_day);
        include 'day_list.php';
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
}

else if ($action == 'initial_db') {
    try {
        initial_db($db);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
    header("Location: .");
}

else if ($action = 'next_day') {
    try {
        increment_day($db);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
    header("Location: .");
}