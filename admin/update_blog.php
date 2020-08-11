<?php require_once 'header.php' ?>
<?php

require_once '../vendor/autoload.php';


$category = new \App\classes\Category();
$blog = new \App\classes\Blog();

$allActiveCategory = $category->allActiveCategory();


$id = $_GET['id'];
$result = $blog->selectRow($id);
$row1 = mysqli_fetch_assoc($result);




if (isset($_POST['update_blog'])) {
    $insertMsg = $blog->updateBlog($_POST);
}

?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Update Blog Form
            </header>
            <div class="card-body">
                <?php

                if (isset($insertMsg)) {
                ?>
                    <h5 class="text-center"><?= $insertMsg ?></h5>
                <?php
                }

                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="cat_id " class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?= $row1['id'] ?>">

                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">Select</option>
                                <?php

                                while ($row = mysqli_fetch_assoc($allActiveCategory)) {
                                ?>

                                    <option <?= $row['id'] == $row1['cat_id'] ? 'selected' : '' ?> value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>

                                <?php
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Category Title </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Category Title " value="<?= $row1['title'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">Content </label>
                        <div class="col-sm-10">
                            <textarea name="content" id="" cols="30" rows="10" class="summernote"><?= $row1['content'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Category Photo </label>
                        <div class="col-sm-10">
                            <input type="file" name="photo" id="photo">
                            <img width="100px" src="../uploads/<?= $row1['photo'] ?>" alt="">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1" <?= $row1['status'] == 1 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="0" <?= $row1['status'] == 0 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="update_blog" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>
<?php require_once 'footer.php' ?>