<?php
include('../db/conn.php');


    if (isset($_GET['edit_id'])) {
        $item_id = $_GET['edit_id'];

        $sql = "SELECT * FROM items WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            die('MySQL prepare statement error: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, 'i', $item_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($data = mysqli_fetch_assoc($result)) {

            $name = $data['item_name'];
            $desc = $data['item_desc'];
        } else {
            header('Location: item_list.php');
            exit();
        }


        if (isset($_POST['submit'])) {
            $name = $_POST['item_name'];
            $desc = $_POST['item_desc'];


            $update_sql = "UPDATE items SET item_name = ?, item_desc = ? WHERE id = ?";
            $update_stmt = mysqli_prepare($conn, $update_sql);

            if ($update_stmt === false) {
                die('MySQL prepare statement error: ' . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($update_stmt, 'ssi', $name, $desc, $item_id);

            if (mysqli_stmt_execute($update_stmt)) {
                header('Location: item_list.php');
                exit();
            } else {
                echo "Error updating item: " . mysqli_error($conn);
            }
        }
    } else {

        header('Location: item_list.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item REgistration</title>
    <link href="../css/boostrap.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h5>Update Form</h5>
        <form action="" method="POST">
            <div class="row my-3">
                <div class="col">
                    <input type="text" name="item_name" class="form-control" placeholder="Item Name" value="<?php echo htmlspecialchars($name); ?>">
                </div>
                <div class="col">
                    <input type="text" name="item_desc" class="form-control" placeholder="Item Description" value="<?php echo htmlspecialchars($desc); ?>">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
