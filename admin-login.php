<?php
session_start();
require_once 'config.php';

// Add error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']); // Add trim to remove whitespace
    $password = $_POST['password'];
    
    try {
        // Test database connection
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Debug: Log the query attempt
        error_log("Attempting login for username: " . $username);
        
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Debug: Log if user was found
        if ($user) {
            error_log("User found in database");
            
            if (password_verify($password, $user['password'])) {
                error_log("Password verified successfully");
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_role'] = $user['role'];
                header('Location: admin-dashboard.php');
                exit();
            } else {
                error_log("Password verification failed");
                $error = "Invalid credentials";
            }
        } else {
            error_log("No user found with username: " . $username);
            $error = "Invalid credentials";
        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        $error = "System error. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SF BEN</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="admin-login-page">
    <div class="login-container">
        <div class="login-box">
            <h1>SF BEN Admin</h1>
            
            <?php if (isset($error)): ?>
                <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <form method="POST" class="login-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required 
                           value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>