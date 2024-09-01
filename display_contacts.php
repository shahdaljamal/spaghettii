<?php
include 'DB.php'; // Ensure the path is correct

$shop = new SpaghettiShop($pdo);

$contacts = $shop->getAllContacts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
    <h1>Contact List</h1>
    <ul>
        <?php foreach ($contacts as $contact): ?>
            <li>
                <?php echo htmlspecialchars($contact['name']); ?> - 
                <?php echo htmlspecialchars($contact['email']); ?> - 
                <?php echo htmlspecialchars($contact['message']); ?> - 
                <?php echo htmlspecialchars($contact['created_at']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
