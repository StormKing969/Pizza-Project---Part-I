<?php

require('../model/database.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_users';
    }
}

if ($action == 'list_users') {
    try {
        $users = get_users($db);
        include('user_list.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
} 

else if ($action == 'delete_user') {
    $username_id = filter_input(INPUT_POST, 'username_id', FILTER_VALIDATE_INT);
    $room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
    if ($username_id == NULL || $username_id == FALSE) {
        $e = "Missing or incorrect topping.";
        include('../../errors/error.php');
    } else {
        try {
            delete_user($db, $username_id, $room_id);
        } catch (Exception $e) {
            include('../../errors/error.php');
            exit();
        }
        header("Location: .");
    }
}

 else if ($action == 'show_add_form') {
    include('user_add.php'); 
} else if ($action == 'add_user') {
    $username = filter_input(INPUT_POST, 'username');
    $room = filter_input(INPUT_POST, 'room');
    if ($username == NULL || $username == FALSE) {
        $error = "Invalid topping name";
        include('../errors/error.php');
    } else {
        try {
            add_user($db, $username, $room);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../errors/database_error.php');
            exit();  // needed here to avoid redirection of next line
        }
        // Redirect back to index.php (see pp. 164-165)
        // (don't include index.php inside index.php)
        header("Location: .");
    }
}
