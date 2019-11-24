<?php

function add_order($db, $user_id, $pizza_size, $current_day, $status) {
    $query = 'INSERT INTO pizza_orders (user_id, size, day, status) 
    			VALUES (:user_id, :pizza_size, :current_day, :status)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id',$user_id);
    $statement->bindValue(':pizza_size', $pizza_size);
    $statement->bindValue(':current_day', $current_day);
    $statement->bindValue(':status', $status);
    $statement->execute();
    $statement->closeCursor(); 
}

function get_preparing_orders($db, $current_day) {
    $query = 'SELECT * FROM pizza_orders p, shop_users s where day = :current_day AND p.status=\'Preparing\' AND p.user_id = s.id';
    $statement = $db->prepare($query);
    $statement->bindValue(':current_day', $current_day);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;  
}

function get_baked_orders($db, $current_day) {
    $query = 'SELECT * FROM pizza_orders p, shop_users s where day = :current_day AND p.status=\'Baked\' AND p.user_id = s.id';
    $statement = $db->prepare($query);
    $statement->bindValue(':current_day', $current_day);
    $statement->execute(); 
    $orders = $statement->fetchAll();
    $statement->closeCursor();    
    return $orders;  
}

function change_to_baked($db, $id, $current_day) {
    $query = 'UPDATE pizza_orders SET status=\'Baked\' WHERE status=\'Preparing\' and id=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $statement->closeCursor();     
}

function get_oldest_preparing_id($db) {
    $query = 'SELECT min(id) id FROM pizza_orders where status=\'Preparing\'';
    $statement = $db->prepare($query);
    $statement->execute();
    $id = $statement->fetch()['id'];
    $statement->closeCursor();
    return $id;     
}

function get_preparing_orders_by_user($db, $current_day, $user_id) {
    $query = 'SELECT * FROM pizza_orders p, shop_users s where day = :current_day AND p.status=\'Preparing\' AND p.user_id = s.id AND user_id =:user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':current_day', $current_day);
    $statement->bindValue(':user_id',$user_id);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;  
}