<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Topping List</h1>

        <h2>Toppings with meat!</h2>
        <table>
            <tr>
                <th>Topping Name</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($toppingswithmeat as $topping) :  ?>
                <tr>
                    <td><?php echo $topping['topping']; ?></td>
                    <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_topping">
                    <input type="hidden" name="topping_id"
                           value="<?php echo $topping['id']; ?>">
                    <input type="hidden" name="is_meat_id"
                           value="<?php echo $topping['id']; ?>">         
                    <input type="submit" value="Delete">
                    </form></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h2>Toppings without meat</h2>
        <table>
            <tr>
                <th>Topping Name</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($toppingwithoutmeat as $topping) : ?>
                <tr>
                    <td><?php echo $topping['topping']; ?></td>
                    <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_topping">
                    <input type="hidden" name="topping_id"
                           value="<?php echo $topping['id']; ?>">
                    <input type="hidden" name="is_meat_id"
                           value="<?php echo $topping['id']; ?>">         
                    <input type="submit" value="Delete">
                    </form></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>
             <a href="?action=show_add_form">Add Topping</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; 
