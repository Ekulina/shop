<?php
require_once 'autoload.php';

print_r($_SESSION['cart']);

?>
<table border="1" width="100%">
    <tr>
        <th width="20%"></th>
        <th width="60%"></th>
        <th width="20%"></th>
    </tr>

    <?php if (!empty($_SESSION['cart'])) : foreach ($_SESSION['cart'] as $id => $amount) { ?>
        <?php $product = $products[$id]; ?>
        <tr>
            <td><img src="<?php echo $product['image']; ?>"></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']*$amount; ?></td>  
        </tr>
    <?php } endif; ?>
 </table>