<?php
$host = 'localhost';
$db = 'spaghetti_shop';
$user = 'root'; // Default XAMPP MySQL user
$pass = ''; // Default XAMPP MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

class SpaghettiShop {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Create a new contact
    public function createContact($name, $email, $message) {
        $stmt = $this->pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);
    }

    // Update an existing contact
    public function updateContact($id, $name, $email, $message) {
        $stmt = $this->pdo->prepare("UPDATE contacts SET name = ?, email = ?, message = ? WHERE id = ?");
        $stmt->execute([$name, $email, $message, $id]);
    }

    // Delete a contact
    public function deleteContact($id) {
        $stmt = $this->pdo->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Create a new order
    public function createOrder($customer_name, $dish, $quantity, $price) {
        $stmt = $this->pdo->prepare("INSERT INTO orders (customer_name, dish, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$customer_name, $dish, $quantity, $price]);
    }

    // Update an existing order
    public function updateOrder($id, $customer_name, $dish, $quantity, $price) {
        $stmt = $this->pdo->prepare("UPDATE orders SET customer_name = ?, dish = ?, quantity = ?, price = ? WHERE id = ?");
        $stmt->execute([$customer_name, $dish, $quantity, $price, $id]);
    }

    // Delete an order
    public function deleteOrder($id) {
        $stmt = $this->pdo->prepare("DELETE FROM orders WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Fetch all contacts
    public function getAllContacts() {
        $stmt = $this->pdo->query("SELECT * FROM contacts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch all orders
    public function getAllOrders() {
        $stmt = $this->pdo->query("SELECT * FROM orders");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Example usage
$shop = new SpaghettiShop($pdo);

// Uncomment the following lines for testing purposes
// $shop->createContact('John Doe', 'john@example.com', 'Interested in your menu!');
// $shop->updateContact(1, 'John Doe', 'john@example.com', 'Updated message');
// $shop->deleteContact(1);

// $shop->createOrder('Jane Doe', 'Spaghetti Carbonara', 2, 20.00);
// $shop->updateOrder(1, 'Jane Doe', 'Spaghetti Bolognese', 3, 30.00);
// $shop->deleteOrder(1);

// $contacts = $shop->getAllContacts();
// print_r($contacts);

// $orders = $shop->getAllOrders();
// print_r($orders);
?>

