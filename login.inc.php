<?php
session_start();
require 'dbh.inc.php';
 
$error = '';
 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
 
 
    if (empty($email) || empty($password)) {
        $error = "E-post och lösenord är obligatoriska.";
    } else {
      
        $sql = "SELECT Password FROM registerData WHERE Email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
 
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $row['Password'];
 
         
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_email'] = $email;
                header('Location: welcome.php');
                exit();
            } else {
                $error = "Fel lösenord. Försök igen.";
            }
        } else {
            $error = "E-postadressen är inte registrerad.";
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Logga In</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signinContainer">
        <form method="post" action="">
            <h2>Logga In</h2>
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter Your Password" required>
            </div>
            <button type="submit">Login</button>
            <?php if ($error): ?>
                <p style="color:red;"><?= $error ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
 