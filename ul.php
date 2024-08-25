<ul id="wishlist">
    <?php
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query("SELECT * FROM wishlist_items");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<li>' . htmlspecialchars($row['item']) . ' 
                <a href="index.php?edit=' . $row['id'] . '" class="edit-btn">Edit</a>
                <a href="index.php?remove=' . $row['id'] . '" class="remove-btn">Remove</a>
            </li>';
        }
    } else {
        echo '<li>Your wishlist is empty.</li>';
    }
    $conn->close();
    ?>
</ul>