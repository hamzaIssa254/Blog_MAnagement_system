# Simple Blog Management System

## About Project : 
   - blog management system that can create,update,delete and view posts;

## Installation


1. Import the SQL schema found in `sql/db_blog.sql` to your MySQL database.
2. Configure your database connection in `app/config/database.php`.
3. Place the project folder in your web server's root directory (e.g., `htdocs` for XAMPP).
4. Access the project via your browser (`http://localhost/blog_oop/public`).


## Some details about files


- file `sql/db_blog.sql` : to create the db and tables;

- file `/config/database.php`:
    connect to database via PDO;
- file `/model/Post.php` :
    execute the sql statement;
    
- file `/controllers/PostController.php`:
    controlle the request for add,view,edit and delete posts;
- file `/validation/Validator.php`:
  validation the requests;

- file `/view` :
  -`/create_post.php`: for create posts;
  -`/edit_post.php` : for edit posts;
  -`/list_posts.php` : for view all posts;
  -`/view_post.php` : for view specific post;

- file `public/index.php` : the begin of the project;

- file `routes/web.php` : define the routes for the project;

## Usage

- To create a new post, go to `/create_post.php`.
- To view a post, go to `/view_post.php?id=POST_ID`.
- To edit a post, go to `/edit_post.php?id=POST_ID`.
- To delete a post, go to `/delete_post.php?id=POST_ID`.
- To list all posts, go to `/list_posts.php`.


 
