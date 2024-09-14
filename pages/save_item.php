<?php
    include('../db/conn.php');
    if(isset($_POST['submit'])){
        $name = $_POST['item_name'];
        $desc = $_POST['item_desc'];

        $sql = "INSERT INTO items (item_name,item_desc) VALUES ('$name','$desc')";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('Location: item_list.php');
        }
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
        <h5>Form to save Items</h5>
        <form action="" method="POST">
            <div class="row my-3">
                <div class="col">
                    <input type="text" name="item_name" class="form-control" placeholder="Item Name">
                </div>
                <div class="col">
                    <input type="text" name="item_desc" class="form-control" placeholder="Item Description">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</body>
</html>