<?php
include 'DB.php'; // Ensure the path is correct

$shop = new SpaghettiShop($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $shop->createContact($name, $email, $message);
    echo "Contact submitted successfully!";
}
?>
