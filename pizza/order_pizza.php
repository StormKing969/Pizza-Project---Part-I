<?php include '../view/header.php'; ?>
<main>
    <h1> Build Your Pizza! </h1>
	 <form  action="index.php" method="get">
        <input type="hidden" name="action" value="add_order">
        <h3>Pizza Size:</h3>
        <?php foreach ($sizes as $size) : ?>
            <input type="radio" name="pizza_size"  
            	value="<?php echo $size['size']; ?>" required="required">
            <label><?php echo $size['size']; ?> </label>
        <?php endforeach; ?><br>

        <h3>Meat: </h3>
        <?php foreach ($meat_topping as $topping) : ?>
            <input type="checkbox" name="pizza_topping[]"  value="<?php echo $topping['id']; ?>" >
            <label><?php echo $topping['topping']; ?> </label><br>
        <?php endforeach;?> <br>

        <h3>Meatless: </h3>
        <?php foreach ($meatless_topping as $topping) : ?>
            <input type="checkbox" name="pizza_topping[]"  value="<?php echo $topping['id']; ?>" >
            <label><?php echo $topping['topping']; ?> </label><br>
        <?php endforeach;?> <br>

        
            <label>Username:</label>
            <select name="userz" required="required">
                <?php foreach($users as $user) : ?>
                    <option value="<?php echo $user['id']; ?>" > 
                    <?php echo $user['username']; ?>  </option>
                   
                <?php endforeach; ?> 
            </select>
            <br>
            <br>
                
        <input type="submit" value="Order Pizza" /> <br><br>
    </form>
</main>
<?php include '../view/footer.php'; 