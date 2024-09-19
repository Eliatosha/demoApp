<!DOCTYPE html>
<html>
<head>
  <title>Balance Manager</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Cash Balance Manager</h1>  
    <div align="right">    
    <a href="withdraw.php"><input type="submit" value="Withdraw"></a>
    <a href="index.php"><input type="submit" value="Home"></a>
    </div>
 

    </form>
    <h2>Transaction History</h2>
    <div id="transaction-history">
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

      // Get the transaction history
      $sql = "SELECT * FROM balances ORDER BY date DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "Date: " . date("d-m-Y H:i:s", strtotime($row["date"])) . "<br>";
              echo "Type: " . $row["type"] . "<br>";
              echo "Amount: " . $row["amount"] . "<br>";
              echo "Balance: " . $row["balance"] . "<br><br>";
          }
      } else {
          echo "No transactions found.";
      }

      $conn->close();
      ?>
    </div>
  </div>

  <script>
    function printPDF() {
      var doc = new jsPDF();
      var transactionHistory = document.getElementById("transaction-history").innerHTML;
      doc.fromHTML(transactionHistory);
      doc.save('transaction_history.pdf');
    }
  </script>
</body>
</html>