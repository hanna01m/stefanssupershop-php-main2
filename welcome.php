<?php
session_start();
require 'dbh.inc.php';
 
 
if (!isset($_SESSION['user_email'])) {
    header('Location: AccountLogin.php');
    exit();
}
 
 
$email = $_SESSION['user_email'];
$sql = "SELECT Name FROM registerData WHERE Email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
 
if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $userName = htmlspecialchars($row['Name']);
} else {
    $userName = 'Användare';
}
?>
 
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Välkommen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Välkommen, <?= $userName ?>!</h1>
    <p>Du är nu inloggad.</p>
 
    <form action="index.html" method="post">
        <button type="submit">Logga ut</button>
    </form>
</body>
</html>