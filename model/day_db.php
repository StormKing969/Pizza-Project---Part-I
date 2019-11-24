<?php
function get_current_day($db) {
    $query = 'SELECT * FROM pizza_sys_tab';    
    $statement = $db->prepare($query);
    $statement->execute();    
    $currentday = $statement->fetch();
    $statement->closeCursor();    
    $current_day = $currentday['current_day'];
    return $current_day;
}
function increment_day($db){
    $query = 'UPDATE pizza_sys_tab 
                SET current_day = current_day + 1';    
    $statement = $db->prepare($query);
    $statement->execute();    
    $statement->closeCursor();    
}

function get_todays_orders($db, $current_day) {
    $query = 'SELECT p.id, s.username, p.day, p.status FROM pizza_orders p, shop_users s 
                WHERE day = :current_day AND p.user_id = s.id';
    $statement = $db->prepare($query);
    $statement->bindValue(':current_day', $current_day);
    $statement->execute();
    $order_list = $statement->fetchAll();
    $statement->closeCursor();   
    return $order_list;
}

function finish_orders_for_day($db, $current_day) {
    $query = 'UPDATE pizza_orders SET status=\'Finished\' 
                WHERE day=:current_day';
    $statement = $db->prepare($query);
    $statement->bindValue(':current_day', $current_day);
    $statement->execute();
    $statement->closeCursor(); 
}