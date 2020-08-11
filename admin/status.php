<?php


require_once '../vendor/autoload.php';

$cat = new \App\classes\Category;
$blog = new \App\classes\Blog;



if(isset($_GET['active'])&&$_GET['cat']){
    $id = $_GET['id'];
    $cat->active($id);
    header('location:manage_category.php');

}
if(isset($_GET['inactive'])&&$_GET['cat']){
    $id = $_GET['id'];
    $cat->inactive($id);
    header('location:manage_category.php');

}

if(isset($_GET['active'])&&$_GET['blog']){
    $id = $_GET['id'];
    $blog->active($id);
    header('location:manage_blog.php');

}
if(isset($_GET['inactive'])&&$_GET['blog']){
    $id = $_GET['id'];
    $blog->inactive($id);
    header('location:manage_blog.php');

}









?>