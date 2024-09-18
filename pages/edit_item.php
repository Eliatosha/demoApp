<?php
    include('../db/conn.php');

    // Get the item ID from the GET parameter
    $id = $_GET['id'];

    // Retrieve the item data from the database
    $sql = "SELECT * FROM items WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_object($result);

    // Display the item data in a form for editing
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link href="../css/boostrap.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5">
        <h2>Edit Item</h2>
        <form action="update_item.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $data->item_name; ?>">
            </div>
            <div class="form-group">
                <label for="item_desc">Item Description:</label>
                <textarea class="form-control" id="item_desc" name="item_desc"><?php echo $data->item_desc; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
</body>
</html>