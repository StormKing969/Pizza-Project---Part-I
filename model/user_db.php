<?php
// the try/catch for these actions is in the caller
function add_user($db, $username, $room)  
{   
    $query = 'INSERT INTO shop_users (username, room)
		VALUES (:username, :room)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username); 
    $statement->bindValue(':room', $room); 
    $statement->execute();
    $statement->closeCursor();
}

function delete_user($db, $username_id, $room_id)  
{   
    $query = 'DELETE FROM shop_users WHERE id = :username_id AND id = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':username_id', $username_id); 
    $statement->bindValue(':room_id', $room_id); 
    $statement->execute();
    $statement->closeCursor();
}

function get_users($db) {
    $query = 'SELECT * FROM shop_users';
    $statement = $db->prepare($query);
    $statement->execute();
    $users1 = $statement->fetchAll();
    return $users1;
}

function get_username($db, $user_id) {
    $query = 'SELECT username FROM shop_users where id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $user_row = $statement->fetch();
    return $user_row['username'];    
}


