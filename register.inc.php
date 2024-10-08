<?php
require_once 'dbh.inc.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_confirmation = $_POST['password_confirmation'] ?? '';
    $name = $_POST['name'] ?? 
    
    '';
    $streetAddress = $_POST['streetAddress'] ?? '';
    $postalCode = $_POST['postalCode'] ?? '';
    $city = $_POST['city'] ?? '';
 
 
    if (empty($name)) {
        die("Name is required");
    }
 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Valid email required");
    }
 
    if (strlen($password) < 4) {
        die("Password must be at least 4 characters");
    }
 
    if ($password !== $password_confirmation) {
        die("Passwords must match");
    }
 
  
    $checkEmailQuery = "SELECT COUNT(*) FROM registerData WHERE Email = :email";
    $checkStmt = $pdo->prepare($checkEmailQuery);
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();
 
    if ($checkStmt->fetchColumn() > 0) {
        die("E-postadressen är redan registrerad.");
    }
 
 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
 
   
    try {
        $insertQuery = 'INSERT INTO registerData (Email, Password, Name, StreetAddress, PostalCode, City)
                        VALUES (:email, :password, :name, :streetAddress, :postalCode, :city)';
        $insertStmt = $pdo->prepare($insertQuery);
 
        
        $insertStmt->bindParam(':email', $email);
        $insertStmt->bindParam(':password', $hashedPassword);
        $insertStmt->bindParam(':name', $name);
        $insertStmt->bindParam(':streetAddress', $streetAddress);
        $insertStmt->bindParam(':postalCode', $postalCode);
        $insertStmt->bindParam(':city', $city);
 
      
        if ($insertStmt->execute()) {
            echo "User registered successfully!";
            echo '<form action="AccountLogin.php" method="GET">
            <button type="submit">Go to Login</button>
          </form>';
            exit();
        } else {
            die("Execution error: " . $insertStmt->errorInfo()[2]);
        }
    } catch (PDOException $e) {
        echo 'Query failed: ' . $e->getMessage();
    }
} else {
    header('Location: index.php');
    exit();
}
 