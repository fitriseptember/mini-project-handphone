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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="wishlist-container">
        <h1>My Wishlist</h1>  
        <div class="wishlist-form">
            <form method="POST" action="wishlist.php">
                <input type="text" name="item" placeholder="Enter item" value="<?php echo htmlspecialchars($editItem); ?>" required>
                <?php if ($editIndex === -1): ?>
                    <button type="submit" name="add">Add to Wishlist</button>
                <?php else: ?>
                    <input type="hidden" name="index" value="<?php echo $editIndex; ?>">
                    <button type="submit" name="save">Save</button>
                <?php endif; ?>
            </form>
        </div>
        <ul id="wishlist">
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            $result = $conn->query("SELECT * FROM wishlist_items");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<li>' . htmlspecialchars($row['item']) . ' 
                        <a href="wishlist.php?edit=' . $row['id'] . '" class="edit-btn">Edit</a>
                        <a href="wishlist.php?remove=' . $row['id'] . '" class="remove-btn">Remove</a>
                    </li>';
                }
            } else {
                echo '<li>Your wishlist is empty.</li>';
            }
            $conn->close();
            ?>
        </ul>

        <a href= "index.html"> <button class="btn">Back</button></a>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>