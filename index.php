<?php
require_once 'autoload.php';

$msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
if (isset($msg) && !empty($msg)) {
    echo '<p> message:'.$msg.'</p>';

}

?>
<a href="cart.php">CART</a>;
<?php if (!empty($products)) : foreach ($products as $products) { ?>
    <p>
        <?php echo $product ['name']; ?><br>
        <?php echo $product ['price']; ?><br>
        <img src="<?php echo $product ['image']; ?>"><br>
        <a href="add.php?id=<?php echo $product['id']; ?>">Add to cart</a>
        </p>
<?php } endif; ?>
