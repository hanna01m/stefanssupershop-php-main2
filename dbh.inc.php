<?php

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $createTableSQL = "
        CREATE TABLE IF NOT EXISTS registerData (
            UserID INT AUTO_INCREMENT PRIMARY KEY,
            Email VARCHAR(255) NOT NULL UNIQUE,  
            Password VARCHAR(255) NOT NULL,
            Name VARCHAR(100) NOT NULL,
            StreetAddress VARCHAR(255) NOT NULL,
            PostalCode VARCHAR(20) NOT NULL,
            City VARCHAR(100) NOT NULL
        ) 
    ";

    $pdo->exec($createTableSQL);  

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); 
    exit();  
}
