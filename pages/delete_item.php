<?php
include('../db/conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $item_id = $_POST['id'];

    $sql = "DELETE FROM items WHERE id = '$item_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: item_list.php');
        exit();
    } 
}

?>