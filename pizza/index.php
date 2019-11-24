<?php

require('../model/database.php');
require('../model/user_db.php');
require('../model/size_db.php');
require('../model/topping_db.php');
require('../model/day_db.php');
require('../model/order_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'student';
    }
}

$user_id = filter_input(INPUT_POST,'user_id',FILTER_VALIDATE_INT);
if ($user_id == NULL) {
    $user_id = filter_input(INPUT_GET, 'user_id');
}

$username = get_username($db, $user_id);
if ($action == 'student' || $action == 'select_user') {
    try {
        $current_day = get_current_day($db);
        $sizes = get_sizes($db);
        $toppings = get_toppings($db);
        $users = get_users($db);
        if (!empty($user_id)) {
            $preparing_orders = get_preparing_orders_by_user($db, $current_day, $user_id);
        }
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
    include('student_welcome.php');
}


else if ($action == 'order_pizza') {
    try {
        $sizes = get_sizes($db);
        $meatless_topping = get_toppings_withoutmeat($db);
        $meat_topping = get_toppings_withmeat($db);
        $users = get_users($db);
    } catch (Exception $e) {
        include('../errors/error.php');
        exit();
    }
    include('order_pizza.php');
}

else if ($action == 'add_order') {
    $user_id = filter_input(INPUT_GET, 'userz', FILTER_VALIDATE_INT);
    $pizza_size = filter_input(INPUT_GET, 'pizza_size');
    if ($pizza_size == NULL || $pizza_size == FALSE) {
        // string $e will be displayed as is--see errors.php
        $e = "Invalid size";
        include('../errors/error.php');
        exit();
    }
    try {
        $current_day = get_current_day($db);
    } catch (Exception $e) {
        include('../errors/error.php');
        exit();
    }
    $status = 'Preparing';
    try {
        add_order($db, $user_id, $pizza_size, $current_day, $status);
    } catch (Exception $e) {
        include('../errors/error.php');
        exit();
    }
    header("Location: .?student = $student");
}
