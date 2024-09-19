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
    <a href="view_trans.php"><input type="submit" value="Transaction History"></a>
    </div>
    <form class="transaction-form" action="add_transaction.php" method="post">
      <label for="date">Date:</label>
      <input type="date" id="date" name="date"><br><br>
      <label for="type">Type:</label>
      <select id="type" name="type">
        <option value="deposit">Deposit</option>
       <!-- <option value="withdrawal">Withdrawal</option> -->
      </select><br><br>
      <label for="amount">Amount:</label>
      <input type="number" id="amount" name="amount" required/><br><br>
      <input type="submit" value="Add Transaction">
    </form>
    <h2>Add Initial Balance</h2>
    <form class="initial-balance-form" action="add_initial_balance.php" method="post">
      <label for="initial-balance">Initial Balance:</label>
      <input type="number" id="initial-balance" name="initial-balance" required/><br><br>
      <input type="submit" value="Add Initial Balance">

    </div>
  </div>
</body>
</html>