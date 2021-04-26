<?php
require_once 'autoload.php';

echo "<pre>";
$id = $_GET["id"];//filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!isset($products[$id])) {
    //redirect to...
    exit('product missing');
}

//session req: id, amount
if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = 0;
}

unset($_SESSION['cart'][$id]);
header("Location: cart.php?msg=deleted");
exit();
?>