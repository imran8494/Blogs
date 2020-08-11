<?php

require_once 'vendor/autoload.php';

use App\classes\Category;

$cat = new Category;

$category = $cat->allActiveCategory();


$getId = $_GET['id'];
$singlePost = $cat->singlePost($getId);

$posts = mysqli_fetch_assoc($singlePost);



$post = $cat->allActivePost();





?>

<?php require_once 'header.php'; ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">
            </h1>

            <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="uploads/<?= $posts['photo'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title"><?= $posts['title'] ?></h3>
                    <p class="card-text"><?=$posts['content']?></p>
                </div>
                <div class="card-footer text-muted">
                    Posted on <?= date('d M Y', strtotime($posts['createtime'])) ?> by
                    <a href="#"><?= $posts['name'] ?></a>
                </div>
            </div>

        </div>
        <?php require_once 'widget.php'; ?>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php require_once 'footer.php'; ?>