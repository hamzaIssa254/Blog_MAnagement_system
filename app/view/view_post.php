
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if (isset($post) && $post): ?>
    <h2>title: <?php echo htmlspecialchars($post['title']); ?></h2>
    <p><strong>content:</strong> <?php echo htmlspecialchars($post['content']); ?></p>
    <p><strong>Author:</strong> <?php echo htmlspecialchars($post['author']); ?></p>
    

    <a href="index.php?action=edit&id=<?php echo $post['id']; ?>">Edit Post</a>
    <a href="index.php?action=delete&id=<?php echo $post['id']; ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete Post</a>

    <br><br>
    <a href="index.php">Back to Posts List</a>
<?php else: ?>
    <p>Post not found.</p>
    <a href="index.php">Back to Posts List</a>
<?php endif; ?>

</body>
</html>