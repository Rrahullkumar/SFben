<?php
require_once 'config.php';

try {
    // Get all users
    $stmt = $pdo->query("SELECT id, password FROM admin_users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Update each user's password with a proper hash
    foreach ($users as $user) {
        $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);
        
        $update = $pdo->prepare("UPDATE admin_users SET password = ? WHERE id = ?");
        $update->execute([$hashed_password, $user['id']]);
    }
    
    echo "Passwords have been successfully hashed.";
    
} catch (PDOException $e) {
    echo "Error updating passwords: " . $e->getMessage();
}
?>