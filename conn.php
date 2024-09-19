<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transactions";

$conn = new mysqli('$localhost', '$root',  '' , '$transactions');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the viewTransactionHistory function
function viewTransactionHistory() {
    global $conn;
    $sql = "SELECT * FROM transactions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>Date: " . $row["date"] . ", Type: " . $row["type"] . ", Amount: " . $row["amount"] . "</p>";
        }
    } else {
        echo "<p>No transactions found.</p>";
    }
}

// Call the viewTransactionHistory function
viewTransactionHistory();

$conn->close();
