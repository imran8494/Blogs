<?php

use App\classes\Category;

require_once 'header.php' ?>
<?php

require_once '../vendor/autoload.php';

$cat = new \App\classes\Category;

$category = $cat->allCategory();


?>
<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                Dynamic Table
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
                                <th>Status</th>
                                <th style="width:300px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            while ($row = mysqli_fetch_assoc($category)) {
                            ?>
                                <tr>
                                    <td><?= $sl; ?></td>
                                    <td><?= $row['category_name'] ?></td>
                                    <td><?= $row['status'] == 1 ? 'Active' : 'Inactive' ?></td>
                                    <td>
                                        <?php

                                        if ($row['status'] == 1) {
                                        ?>
                                            <a href="status.php?id=<?=$row['id']?>&cat=category&inactive=inactive" class="btn btn-warning btn-sm"><i class="fa fa-arrow-down"></i> Inactive</a>
                                            
                                            <?php
                                        } else {
                                            ?>
                                            <a href="status.php?id=<?=$row['id']?>&cat=category&active=active" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"></i> Active</a>

                                        <?php
                                        }

                                        ?>
                                        <a href="update_category.php?id=<?=$row['id']?>" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i> Edit</a>
                                        <a href="delete.php?id=<?=$row['id']?>&cat=category" class="btn btn-danger btn-sm "><i class="fa fa-trash-o"></i> Delete</a>
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