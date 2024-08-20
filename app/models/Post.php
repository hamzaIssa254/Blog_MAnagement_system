<?php 

require_once __DIR__ . '/../validation/Validator.php';

class Post {
    private $conn;
    private $table = 'posts';

    public $id;
    public $title;
    public $content;
    public $author;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }
    // Execute INSERT post query
    public function create() {
        
        $validator = new Validator();

        // Validate the title, content, and author fields
        $this->title = $validator->validate($this->title);
    $this->content = $validator->validate($this->content);
    $this->author = $validator->validate($this->author);

    // Validate the title, content, and author fields
    $validator->validateRequired('title', $this->title);
    $validator->validateStringLength('title', $this->title, 3, 255);
    
    $validator->validateRequired('content', $this->content);
    $validator->validateStringLength('content', $this->content, 10, 10000);
    
    $validator->validateRequired('author', $this->author);
    $validator->validateStringLength('author', $this->author, 3, 100);


        // Check if validation passes
        if (!$validator->passes()) {
            // Return the errors if validation fails
            return $validator->getErrors();
        }

        // SQL query
        $query = 'INSERT INTO ' . $this->table . ' (title, content, author) VALUES(:title, :content, :author)';
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':author', $this->author);

        // Execute the query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    // Execute SELECT post query
    public function read($id) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id LIMIT 0,1';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Execute UPDATE post query
    public function update($id) {
        $query = 'UPDATE ' . $this->table . ' SET title = :title, content = :content, author = :author,updated_at = NOW() WHERE id = :id';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':author', $this->author);
        // $stmt->bindParam(':updated_at',date("Y-m-d"));
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    //Execute DELETE post query
    public function delete($id) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    // Execute SELECT all posts query
    public function listAll() {
        $query = 'SELECT * FROM ' . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}