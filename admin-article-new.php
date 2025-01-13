<?php
session_start();
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $author_id = $_SESSION['admin_id'];

    $stmt = $pdo->prepare("INSERT INTO articles (title, content, category, status, author_id, created_at) 
                           VALUES (:title, :content, :category, :status, :author_id, NOW())");
    $stmt->execute([
        'title' => $title,
        'content' => $content,
        'category' => $category,
        'status' => $status,
        'author_id' => $author_id,
    ]);

    header('Location: admin-articles.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Article - SF BEN</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
</head>
<body>
    <div class="admin-container">
        <main class="admin-main">
            <header class="admin-header">
                <h1>New Article</h1>
            </header>
            <form method="POST" action="admin-article-new.php">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>

                <label for="category">Category</label>
                <input type="text" id="category" name="category" required>

                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>

                <label for="content">Content</label>
                <div id="editor-container"></div>
                <textarea name="content" id="content" style="display:none;"></textarea>

                <button type="submit" class="btn-primary">Save Article</button>
            </form>
        </main>
    </div>
    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });

        // Submit content from Quill editor
        document.querySelector('form').onsubmit = function() {
            document.querySelector('#content').value = quill.root.innerHTML;
        };
    </script>
</body>
</html>
