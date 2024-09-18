<?php
    include('../db/conn.php');

    // Get the item ID and updated data from the POST parameters
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $item_desc = $_POST['item_desc'];

    // Update the item data in the database
    $sql = "UPDATE items SET item_name = '$item_name', item_desc = '$item_desc' WHERE id = $id";
    mysqli_query($conn, $sql);

    // Redirect back to the item list page
    header('Location: item_list.php');
    exit;
?>