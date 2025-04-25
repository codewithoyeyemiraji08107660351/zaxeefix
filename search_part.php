<?php
include('db_connection.php');

if (isset($_POST['query'])) {
    $search = mysqli_real_escape_string($con, $_POST['query']);
    
    $query = "SELECT * FROM parts 
              WHERE LOWER(name) LIKE LOWER('%$search%') 
                 OR LOWER(description) LIKE LOWER('%$search%') 
                 OR LOWER(category) LIKE LOWER('%$search%') 
              LIMIT 8";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='card'>
                <h4>" . htmlspecialchars($row['name']) . "</h4>
                <img src='./admin/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>
                <p>" . htmlspecialchars($row['description']) . "</p>
                <span class='price'>₦" . htmlspecialchars($row['price']) . "</span>
            </div>";
        }
    } else {
        echo "<div class='no-record'><p>No items found!</p></div>";
    }
}
?>
