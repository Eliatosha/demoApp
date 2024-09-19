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
$initial_balance = $_POST["initial-balance"];

// Insert the initial balance into the database
$sql = "INSERT INTO balances (initial_balance, date, type, amount, balance) VALUES (?, NOW(), 'initial', ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $initial_balance, $initial_balance, $initial_balance);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Innitial balance added successfully.";
    header("Location: index.php"); // Redirect to index.php
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>