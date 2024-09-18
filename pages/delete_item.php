<?php
    include('../db/conn.php');

    // Get the item ID from the GET parameter
    $id = $_GET['id'];

    // Delete the item data from the database
    $sql = "DELETE FROM items WHERE id = $id";
    mysqli_query($conn, $sql);

    // Redirect back to the item list page
    header('Location: item_list.php');
    exit;
?>