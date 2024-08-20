<?php
require_once __DIR__ . '/../app/controllers/PostController.php';
require_once __DIR__ . '/../app/config/database.php';

$controller = new PostController();

// Handle POST requests 
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    // For create post
    if( strpos($_SERVER['REQUEST_URI'], 'create') !== false)
    {
        if (isset($_POST['title'], $_POST['content'], $_POST['author'])) {
        
            $controller->createPost($_POST['title'], $_POST['content'], $_POST['author']);
            include __DIR__ . '/../app/view/list_posts.php';
            header('Location: http://localhost/blog_oop/public/index.php');
            exit();
        } 
    }elseif(strpos($_SERVER['REQUEST_URI'], 'update') !== false)
    {
        // For update post
        if (isset($_POST['title'], $_POST['content'], $_POST['author'])){
            $controller->updatePost($_GET['id'],$_POST['title'], $_POST['content'], $_POST['author']);
            include __DIR__ . '/../app/view/list_posts.php';
            header('Location: http://localhost/blog_oop/public/index.php');
            exit();
        }
       
    }
   
  
}


// Handle GET requests (view, edit, delete, create)
if (isset($_GET['id'])) {
    // View a post
    if (strpos($_SERVER['REQUEST_URI'], 'view') !== false) {
        $post = $controller->getPost($_GET['id']);
        include __DIR__ . '/../app/view/view_post.php';
    }
    // Edit a post
    elseif (strpos($_SERVER['REQUEST_URI'], 'edit') !== false) {
        $post = $controller->getPost($_GET['id']);
        include __DIR__ . '/../app/view/edit_post.php';
        
    }
    // Delete a post
    elseif (strpos($_SERVER['REQUEST_URI'], 'delete') !== false) {
        $controller->deletePost($_GET['id']);
        include __DIR__ . '/../app/view/list_posts.php';
        header('Location: http://localhost/blog_oop/public/index.php');
        exit();
    }
} else {
    // Check if the request is to create a new post (GET request)
    if (strpos($_SERVER['REQUEST_URI'], 'create') !== false) {
        include __DIR__ . '/../app/view/create_post.php';
    } else {
        $posts = $controller->listPosts();
        include __DIR__ . '/../app/view/list_posts.php';
    }
}
