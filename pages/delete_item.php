<?php
include('../db/conn.php');

    if (isset($_GET['delete_id'])) {
        $item_id = $_GET['delete_id'];

        $delete_sql = "DELETE FROM items WHERE id = ?";
        $delete_stmt = mysqli_prepare($conn, $delete_sql);

        if ($delete_stmt === false) {
            die('MySQL prepare statement error: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($delete_stmt, 'i', $item_id);

        if (mysqli_stmt_execute($delete_stmt)) {
            header('Location: item_list.php');
            exit();
        } else {
            
            echo "Error deleting item: " . mysqli_error($conn);
        }
    } else {
        header('Location: item_list.php');
        exit();
    }
?>
