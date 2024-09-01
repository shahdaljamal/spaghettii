<?php
include 'DB.php'; // Ensure the path is correct

$shop = new SpaghettiShop($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $dish = $_POST['dish'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $shop->createOrder($customer_name, $dish, $quantity, $price);
    echo "Order placed successfully!";
}
?>

