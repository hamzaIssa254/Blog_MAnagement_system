
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if (isset($post) && $post): ?>
    <h2>Edit Post</h2>
    <form method="post" action="index.php?action=update&id=<?php echo $post['id']; ?>">
        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>

        <label for="content">Content:</label><br>
        <textarea name="content" id="content" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>

        <label for="author">Author:</label><br>
        <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($post['author']); ?>" required><br><br>

        <button type="submit">update</button>
    </form>

    <br>
    <a href="index.php?action=view&id=<?php echo $post['id']; ?>">Cancel</a>
<?php else: ?>
    <p>Post not found.</p>
    <a href="index.php">Back to Posts List</a>
<?php endif; ?>

</body>
</html>