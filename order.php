<?php
include 'DB.php'; // Ensure the path to DB.php is correct

$shop = new SpaghettiShop($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $menu = htmlspecialchars($_POST['menu']);
    $orderDetails = htmlspecialchars($_POST['order']);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle file upload
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        if ($fileError === 0) {
            $fileDestination = '../uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
        }

        // Insert into orders table
        $shop->createOrder($name, $email, $menu, $orderDetails, $fileName);
        echo "Order placed successfully!";
    } else {
        echo "Invalid email format";
    }
}
?>

