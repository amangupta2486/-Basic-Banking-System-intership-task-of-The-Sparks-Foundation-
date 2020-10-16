<?php
require_once "pdo.php";
if ( isset($_POST['name']) && isset($_POST['email']) 
     && isset($_POST['current_balance'])) {
    $sql = "INSERT INTO customers (name, email, current_balance) 
              VALUES (:name, :email, :current_balance)";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':current_balance' => $_POST['current_balance']));
}
$stmt = $pdo->query("SELECT name, email, current_balance FROM customers");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
<title>Customers Details</title>
<?php require_once "bootstrap.php"; ?>
</head><body>
<h1>Customers Details</h1>
<table border="1">
<tr><td>Name</td><td>Email</td><td>current_balance</td></tr>
<?php
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo($row['name']);
    echo("</td><td>");
    echo($row['email']);
    echo("</td><td>");
    echo($row['current_balance']);
    echo("</td></tr>\n");
}
?>
</table>

