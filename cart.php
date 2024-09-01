
<?php
session_start();

// Initialize cart and balance if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 30; // Example balance
}

// Add item to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];
    $price = $_POST['price'];

    $_SESSION['cart'][] = ['item' => $item, 'price' => $price];
}

// Calculate total
$total = array_sum(array_column($_SESSION['cart'], 'price'));

// Handle checkout
if (isset($_POST['checkout'])) {
    if ($total <= $_SESSION['balance']) {
        $_SESSION['balance'] -= $total;
        $_SESSION['cart'] = []; // Clear cart after purchase
        echo "Purchase successful! Your new balance is $" . $_SESSION['balance'];
    } else {
        echo "Insufficient balance!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <ul>
        <?php foreach ($_SESSION['cart'] as $cartItem): ?>
            <li><?php echo $cartItem['item'] . " - $" . $cartItem['price']; ?></li>
        <?php endforeach; ?>
    </ul>
    <p>Total: $<?php echo $total; ?></p>
    <p>Your Balance: $<?php echo $_SESSION['balance']; ?></p>

    <form method="post">
        <button type="submit" name="checkout">Checkout</button>
    </form>
    <script>
    function addToCart(item, price) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {  // readyState 4 means the request is done.
                if (xhr.status === 200) {  // status 200 is a successful return.
                    console.log('Item added to cart:', item);
                    console.log('Response from server:', xhr.responseText);
                    alert(xhr.responseText); // Optional: Alert to confirm item added
                } else {
                    console.log('Error: Failed to add item to cart');
                }
            }
        };
        
        xhr.send(`item=${encodeURIComponent(item)}&price=${encodeURIComponent(price)}`);
    }
</script>
</body>
</html>

