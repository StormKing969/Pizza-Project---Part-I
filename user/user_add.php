<?php include '../view/header.php'; ?> 
<main>     
    <h1>Add User</h1>     
    <form action="index.php" method="post">         
        <input type="hidden" name="action" value="add_user"> 

        <label>User's Name:</label>                 
        <input type="text" name="username" />         
        <br>
        
        <label>User's Room:</label>                 
        <input type="text" name="room" />         
        <br>
        
        <label>&nbsp;</label>         
        <input type="submit" value="Add User" />         
        <br>     
    </form>     
    <p>         
        <a href="index.php?action=user_list"> View Users</a>    
    </p> 
 
</main>
<?php include '../view/footer.php'; ?> 