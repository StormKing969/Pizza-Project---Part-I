<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Welcome Student!</h1>
        <h2>Available Sizes</h2>
        <table>
            <tr>
                <th>Sizes</th>
            </tr>
            <?php foreach ($sizes as $size) : ?>
            <tr>    
               <td><?php echo $size['size']; ?></td>
            </tr>
             <?php endforeach; ?>
        </table>
        <h2>Available Toppings</h2>
        <table>
            <tr>
                <th>Toppings</th>
            </tr>
            <?php foreach ($toppings as $topping) : ?>
            <tr>    
               <td><?php echo $topping['topping']; ?></td>
            </tr>
             <?php endforeach; ?>
        </table>

        <form  action="index.php" method="post">
            <input type="hidden" name="action" value="select_user">
            <label>Username:</label>
            <select name="user_id" required="required">
                <?php foreach ($users as $user) : ?>
                    <option value="<?php echo $user['id']; ?>" > <?php echo $user['username']; ?>
                    </option>
                <?php endforeach; ?> 
            </select>
            <input type="submit" value="Select Your Username" />
        </form>

        <?php if (!empty($user_id)): ?>
            <h2>Orders In Progress For <?php echo $username ?></h2>
            <?php if (count($preparing_orders) > 0): ?>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($preparing_orders as $preparing_order) : ?>
                <tr>    
                    <td><?php echo $preparing_order['id']; ?></td>
                    <td><?php echo $preparing_order['username']; ?></td>
                    <td><?php echo $preparing_order['status']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else: ?>
                <p>No Orders At The Moment</p>
            <?php endif; ?>
        <?php endif; ?>
        <p>
             <a href="?action=order_pizza">Order Pizza</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; 