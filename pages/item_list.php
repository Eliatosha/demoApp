<?php
    include('../db/conn.php');

    $sql = "SELECT * FROM items";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item List</title>
    <link href="../css/boostrap.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5">
        <div class="col-12">
            <a href="save_item.php">
                <button type="button" class="btn btn-secondary">Back </button>
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Description</th>
                <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (mysqli_num_rows($result) > 0) {
                    $n = 0;
                    while ($data = mysqli_fetch_object($result)) {
                        $n = $n + 1;
                        echo "<tr>
                                <th scope='row'>$n</th>
                                <td>$data->item_name</td>
                                <td>$data->item_desc</td>
                                <td>$data->created_at</td>
                                <td>
                                    <a href='update_item.php?edit_id=$data->id' class='btn btn-primary'>
                                        <i class='fas fa-pencil-alt'></i> Edit
                                    </a>
                                </td>
                                <td> 
                                   <a href='delete_item.php?delete_id=$data->id' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this item?');\">
                                        <i class='fas fa-trash-alt'></i> Delete
                                    </a>
                                </td>
                            </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>