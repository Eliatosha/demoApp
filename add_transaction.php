<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transactions";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$date = $_POST["date"];
$type = $_POST["type"];
$amount = $_POST["amount"];

// Insert the transaction into the database
$sql = "INSERT INTO transactions (date, type, amount) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $date, $type, $amount);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Transaction added successfully.";
    header("Location: index.php"); // Redirect to index.php
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>