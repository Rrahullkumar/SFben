<?php
session_start();
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-login.php');
    exit();
}

// Get articles
$stmt = $pdo->query("SELECT articles.*, admin_users.username as author_name 
                     FROM articles 
                     LEFT JOIN admin_users ON articles.author_id = admin_users.id 
                     ORDER BY created_at DESC");
$articles = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SF BEN</title>
    <link rel="stylesheet" href="styles.css">
    <!-- <script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/5/tinymce.min.js"></script> -->

</head>
<body class="admin-page">
    <div class="admin-container">
        <nav class="admin-sidebar">
            <div class="admin-logo">SF BEN Admin</div>
            <ul class="admin-nav">
                <li><a href="#" class="active">Dashboard</a></li>
                <li><a href="admin-articles.php">Articles</a></li>
                <li><a href="admin-users.php">Users</a></li>
                <li><a href="admin-settings.php">Settings</a></li>
                <li><a href="admin-logout.php">Logout</a></li>
            </ul>
        </nav>

        <main class="admin-main">
            <header class="admin-header">
                <h1>Dashboard</h1>
                <div class="admin-actions">
                    <a href="admin-article-new.php" class="btn-primary">New Article</a>
                </div>
            </header>

            <div class="admin-content">
                <div class="dashboard-stats">
                    <div class="stat-card">
                        <h3>Total Articles</h3>
                        <p class="stat-number"><?php echo count($articles); ?></p>
                    </div>
                    <!-- Add more stat cards -->
                </div>

                <div class="recent-articles">
                    <h2>Recent Articles</h2>
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($article['title']); ?></td>
                                <td><?php echo htmlspecialchars($article['author_name']); ?></td>
                                <td><?php echo htmlspecialchars($article['category']); ?></td>
                                <td><span class="status-badge <?php echo $article['status']; ?>">
                                    <?php echo ucfirst($article['status']); ?>
                                </span></td>
                                <td><?php echo date('M d, Y', strtotime($article['created_at'])); ?></td>
                                <td class="action-buttons">
                                    <a href="admin-article-edit.php?id=<?php echo $article['id']; ?>" 
                                       class="btn-edit">Edit</a>
                                    <button onclick="deleteArticle(<?php echo $article['id']; ?>)" 
                                            class="btn-delete">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="scripts.js"></script>
</body>
</html>