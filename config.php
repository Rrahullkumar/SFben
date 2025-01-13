<?php
// Database credentials
$host = 'localhost';
$dbname = 'devops_summit';
$username = 'root';
$password = '';

// Default charset and timezone
$charset = 'utf8mb4';
$timezone = 'UTC';

// Set default timezone
date_default_timezone_set($timezone);

try {
    // Create DSN with proper charset
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    
    // Configure PDO options for better security and performance
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset"
    ];

    // Create PDO instance
    $pdo = new PDO($dsn, $username, $password, $options);
    
} catch(PDOException $e) {
    // Log the error instead of displaying it (in production)
    error_log("Database Connection Error: " . $e->getMessage());
    
    // For development, you might want to see the error:
    if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
        die('Connection failed: ' . $e->getMessage());
    } else {
        die('Internal Server Error');
    }
}


// <!-- <?php
// $host = 'localhost';
// $dbname = 'devops_summit';
// $username = 'root';
// $password = ''; // Default XAMPP password is empty

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//     die();
// }
// ?>