<?php
// Simple login processing
$username = $_POST['username'];
$password = $_POST['password'];

// For demo purposes, we simply echo the values
echo "Username: " . htmlspecialchars($username) . "<br>";
echo "Password: " . htmlspecialchars($password) . "<br>";
?>
