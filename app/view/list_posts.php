
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>All Posts</h2>

<a href="index.php?action=create">Create New Post</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>content</th>
            <!-- <th>Created At</th> -->
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($posts)): ?>
            <?php $i = 1; foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo htmlspecialchars($post['title']); ?></td>
                    <td><?php echo htmlspecialchars($post['author']); ?></td>
                    <td><?php echo htmlspecialchars($post['content']); ?></td>
                    <!--  -->
                    <td>
                        <a href="index.php?action=view&id=<?php echo $post['id']; ?>">View</a>
                        <a href="index.php?action=edit&id=<?php echo $post['id']; ?>">Edit</a>
                        <a href="index.php?action=delete&id=<?php echo $post['id']; ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No posts found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>