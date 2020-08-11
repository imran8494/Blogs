<?php

use App\classes\Category;

require_once 'header.php' ?>
<?php

require_once '../vendor/autoload.php';

$blog = new \App\classes\Blog;

$allPost = $blog->allBlog();


?>
<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                Manage Blogs
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SI no.</th>
                                <th>Category Name</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Photo</th>
                                <th>Admin Name</th>
                                <th>Status</th>
                                <th style="width:300px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            while ($row = mysqli_fetch_assoc($allPost)) {
                            ?>
                                <tr>
                                    <td><?= $sl; ?></td>
                                    <td><?= $row['category_name'] ?></td>
                                    <td><?= $row['title'] ?></td>
                                    <td><?= $row['content'] ?></td>
                                    <td><img width="50px" src="../uploads/<?= $row['photo'] ?>" alt=""></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?php

                                        if ($row['status'] == 1) {
                                        ?>
                                            <a href="status.php?id=<?= $row['id'] ?>&blog=blog&inactive=inactive" class="btn btn-info btn-sm"><i class="fa fa-arrow-down"></i> Active</a>

                                        <?php
                                        } else {
                                        ?>
                                            <a href="status.php?id=<?= $row['id'] ?>&blog=blog&active=active" class="btn btn-warning btn-sm"><i class="fa fa-arrow-up"></i> Inactive</a>

                                        <?php
                                        }

                                        ?></td>
                                    <td>

                                        <a href="update_blog.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i> Edit</a>
                                        <a href="delete.php?id=<?= $row['id'] ?>&blog=blog&filename=<?=$row['photo']?>" class="btn btn-danger btn-sm "><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>

                            <?php
                                $sl++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<?php require_once 'footer.php' ?>