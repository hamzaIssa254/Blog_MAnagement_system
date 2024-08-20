<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h2>Create New Post</h2>

<form method="post" action="index.php?action=create">
    <label for="title">Title:</label><br>
    <input type="text" name="title" id="title" required><br><br>

    <label for="content">Content:</label><br>
    <textarea name="content" id="content" required></textarea><br><br>

    <label for="author">Author:</label><br>
    <input type="text" name="author" id="author" required><br><br>

    <button type="submit">Create Post</button>
</form>

<br>
<a href="index.php">Back to Posts List</a>


</body>
</html>