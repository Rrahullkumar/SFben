<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $stmt = $pdo->prepare("INSERT INTO registrations (full_name, email, company, job_title, phone) VALUES (?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $_POST['full_name'],
            $_POST['email'],
            $_POST['company'],
            $_POST['job_title'],
            $_POST['phone']
        ]);
        
        $success = "Registration successful! We'll send you the event details shortly.";
    } catch(PDOException $e) {
        $error = "Registration failed. Please try again.";
        if(strpos($e->getMessage(), 'Duplicate entry') !== false) {
            $error = "This email is already registered.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOps Lifecycle Summit 2025 Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="registration-container">
        <h1>DevOps Lifecycle Summit 2025</h1>
        <h2>Registration Form</h2>
        
        <?php if (isset($success)): ?>
            <div class="alert success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="register.php" class="registration-form">
            <div class="form-group">
                <label for="full_name">Full Name *</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" id="company" name="company">
            </div>

            <div class="form-group">
                <label for="job_title">Job Title</label>
                <input type="text" id="job_title" name="job_title">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone">
            </div>

            <button type="submit" class="submit-btn">Register Now</button>
        </form>
    </div>
</body>
</html>