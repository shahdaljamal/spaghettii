<?php
include 'DB.php'; // Ensure the path to DB.php is correct

$shop = new SpaghettiShop($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert into contacts table
        $shop->createContact($name, $email, $message);
        echo "Message sent successfully!";
    } else {
        echo "Invalid email format";
    }
}
?>

