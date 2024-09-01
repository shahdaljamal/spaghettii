<?php
include 'DB.php'; // Ensure the path is correct

$shop = new SpaghettiShop($pdo);

$orders = $shop->getAllOrders();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
</head>
<body>
    <h1>Order List</h1>
    <ul>
        <?php foreach ($orders as $order): ?>
            <li>
                <?php echo htmlspecialchars($order['customer_name']); ?> - 
                <?php echo htmlspecialchars($order['dish']); ?> - 
                <?php echo htmlspecialchars($order['quantity']); ?> - 
                <?php echo htmlspecialchars($order['price']); ?> - 
                <?php echo htmlspecialchars($order['created_at']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
