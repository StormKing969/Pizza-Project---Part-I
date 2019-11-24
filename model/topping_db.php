<?php
// the try/catch for these actions is in the caller
function add_topping($db, $topping_name, $is_meat)  
{   
    $query = 'INSERT INTO menu_toppings (topping, is_meat)
		VALUES (:topping_name, :is_meat)';
    $statement = $db->prepare($query);
    $statement->bindValue(':topping_name', $topping_name); 
    $statement->bindValue(':is_meat', $is_meat); 
    $statement->execute();
    $statement->closeCursor();
}

function get_toppings($db) {
   $query = 'SELECT * FROM menu_toppings';
   $statement = $db->prepare($query);
   $statement->execute();
   $toppings = $statement->fetchAll();
   return $toppings;    
}

function delete_topping($db, $topping_id, $is_meat_id)  
{   
    $query = 'DELETE FROM menu_toppings WHERE id = :topping_id AND id = :is_meat_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':topping_id', $topping_id); 
    $statement->bindValue(':is_meat_id', $is_meat_id); 
    $statement->execute();
    $statement->closeCursor();
}
function get_toppings_withoutmeat($db) {
    $query = 'SELECT * FROM menu_toppings WHERE is_meat = 0';
    $statement = $db->prepare($query);
    $statement->execute();
    $toppingwithoutmeat = $statement->fetchAll();
    return $toppingwithoutmeat;
}
function get_toppings_withmeat($db) {
    $query = 'SELECT * FROM menu_toppings WHERE is_meat = 1';
    $statement = $db->prepare($query);
    $statement->execute();
    $toppingswithmeat = $statement->fetchAll();
    return $toppingswithmeat;
}