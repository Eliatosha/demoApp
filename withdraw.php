<!DOCTYPE html>
<html>
<head>
  <title>Balance Manager</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

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

// Get the current balance
$sql = "SELECT balance FROM balances ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_balance = $row["balance"];
} else {
    $current_balance = 0; // Initialize balance to 0 if no transactions found
}

// Check if the user is trying to make a withdrawal
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["type"] == "withdrawal") {
    $withdrawal_amount = $_POST["amount"];
    if ($withdrawal_amount > $current_balance) {
        echo "Error: Insufficient balance. You cannot withdraw more than your current balance.";
    } else {
        // Proceed with the withdrawal transaction
        $sql = "INSERT INTO balances (date, type, amount, balance) VALUES (NOW(), 'withdrawal', ?, ?)";
        $stmt = $conn->prepare($sql);
        $new_balance = $current_balance - $withdrawal_amount;
        $stmt->bind_param("ii", $withdrawal_amount, $new_balance);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "Withdrawal successful.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!-- Add a new form for withdrawals -->
<a href="index.php"><input type="submit" value="Home"></a>
<a href="view_trans.php"><input type="submit" value="Transaction History"></a>

<h2>Withdrawal</h2>

<form class="withdrawal-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" max="<?php echo $current_balance; ?>"><br><br>
    <input type="hidden" name="type" value="withdrawal">
    <input type="submit" value="Withdraw">
</form>
</body>
</html>