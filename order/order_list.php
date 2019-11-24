<?php include '../view/header.php'; ?>
<main>
    <section>
    <h1>Current Orders Report</h1>
        <h2>Orders Baked but not delivered</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Status</th>
            </tr>
            <?php if (count($baked_orders) > 0): ?>
            	<?php foreach ($baked_orders as $baked_order) : ?>
                <tr>    
                   <td><?php echo $baked_order['id']; ?></td>
                   <td><?php echo $baked_order['username']; ?></td>
                   <td><?php echo $baked_order['status']; ?></td>
                </tr>
            	<?php endforeach; ?>
            <?php else: ?>
        		<tr>
        			<td>No Baked orders</td>
        			<td></td>
        			<td></td>
        		</tr>
    		<?php endif; ?>
       	</table>

        <h2>Orders Preparing(in the oven): Any ready now?</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Status</th>
            </tr>
            <?php if (count($preparing_orders) > 0): ?>
            	<?php foreach ($preparing_orders as $preparing_order) : ?>
                <tr>    
                   <td><?php echo $preparing_order['id']; ?></td>
                   <td><?php echo $preparing_order['username']; ?></td>
                   <td><?php echo $preparing_order['status']; ?></td>
                </tr>
            	<?php endforeach; ?>
            <?php else: ?>
        		<tr>
        			<td>No orders are being prepared in Oven</td>
        			<td></td>
        			<td></td>
        		</tr>
    		<?php endif; ?>
       	</table>
        <br> 
        <form  action="index.php" method="post" >
            <input type="hidden" name="action" value="change_to_baked">
            <input type="submit" value="Mark Oldest Pizza Baked" />
            <br>
        </form>
        <br>  

    </section>
</main>
<?php include '../view/footer.php'; 