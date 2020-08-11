<?php


require_once '../vendor/autoload.php';

$blog = new \App\classes\Blog;
$cat = new \App\classes\Category;


if(isset($_GET['cat'])){
    $id = $_GET['id'];
    $cat->delete($id);
    header('location:manage_category.php');
}
if(isset($_GET['blog'])){
    $id = $_GET['id'];

    $blog->delete($id);

    $file = $_GET['filename'];
    unlink('../uploads/'.$file);

    header('location:manage_blog.php');
}




?>