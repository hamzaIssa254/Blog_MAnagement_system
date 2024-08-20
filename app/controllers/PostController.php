<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../validation/Validator.php';


class PostController {
    private $db;
    private $post;
    private $validator;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->post = new Post($this->db);
        $this->validator = new Validator();
    }
    // Create post
    public function createPost($title, $content, $author) {
        $this->post->title = $title;
        $this->post->content = $content;
        $this->post->author = $author;

        return $this->post->create();
    }
    // Read post
    public function getPost($id) {
        return $this->post->read($id);
    }
    // Update post
    public function updatePost($id, $title, $content, $author) {
        $this->post->title = $title;
        $this->post->content = $content;
        $this->post->author = $author;

        return $this->post->update($id);
    }
    // Delete post
    public function deletePost($id) {
        return $this->post->delete($id);
    }
    // Get all posts
    public function listPosts() {
        return $this->post->listAll();
    }
}
