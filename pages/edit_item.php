<?php
    include('../db/conn.php');
    if(isset($_GET['id'])){
        $item_id = $_GET['id'];

        $sql = "SELECT * FROM items WHERE id = '$item_id'";
        $result = mysqli_query($conn,$sql);

        if($result){
            $item = mysqli_fetch_assoc($result);
        }
    }

    if(isset($_POST['submit'])){
        $name = $_POST['item_name'];
        $desc = $_POST['item_desc'];

        $sql = "UPDATE items SET item_name = '$name', item_desc = '$desc' WHERE id = '$item_id'";
        $result = mysqli_query($conn, $sql);

        if($result){
        header('Location:item_list.php');
    }
}

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
        <h5>Form to edit Items</h5>
        <form action="" method="POST">
            <div class="row my-3">
                <div class="col">
                    <input type="text" name="item_name" class="form-control" value="<?php echo $item['item_name']; ?>">
                </div>
                <div class="col">
                    <input type="text" name="item_desc" class="form-control" value="<?php echo $item['item_desc']; ?>">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</body>
</html>