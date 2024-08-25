<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";  // Sesuaikan dengan username MySQL Anda
$password = "";  // Sesuaikan dengan password MySQL Anda
$dbname = "wishlist_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add new item to wishlist
if (isset($_POST['add'])) {
    $item = htmlspecialchars($_POST['item']);
    if (!empty($item)) {
        $stmt = $conn->prepare("INSERT INTO wishlist_items (item) VALUES (?)");
        $stmt->bind_param("s", $item);
        $stmt->execute();
        $stmt->close();
    }
}

// Update an existing item in wishlist
if (isset($_POST['save'])) {
    $id = intval($_POST['index']);
    $updatedItem = htmlspecialchars($_POST['item']);
    if (!empty($updatedItem)) {
        $stmt = $conn->prepare("UPDATE wishlist_items SET item = ? WHERE id = ?");
        $stmt->bind_param("si", $updatedItem, $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Remove item from wishlist
if (isset($_GET['remove'])) {
    $id = intval($_GET['remove']);
    $stmt = $conn->prepare("DELETE FROM wishlist_items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Edit item: Get current item data for editing
$editIndex = -1;
$editItem = '';
if (isset($_GET['edit'])) {
    $editIndex = intval($_GET['edit']);
    $stmt = $conn->prepare("SELECT item FROM wishlist_items WHERE id = ?");
    $stmt->bind_param("i", $editIndex);
    $stmt->execute();
    $stmt->bind_result($editItem);
    $stmt->fetch();
    $stmt->close();
}

$conn->close();
?>