<?php require_once 'header.php' ?>
<?php

require_once '../vendor/autoload.php';


$category = new \App\classes\Category();

$allActiveCategory = $category->allActiveCategory();

$blog = new \App\classes\Blog();

if(isset($_POST['add_blog'])){
    $insertMsg = $blog->addBlog($_POST);
}

?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Add Category Forms
            </header>
            <div class="card-body">
            <?php
            
            if(isset($insertMsg)){
                ?>
                <h5 class="text-center"><?=$insertMsg?></h5>
                <?php
            }

            ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="cat_id " class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">Select</option>
                                <?php
                                
                                while($row = mysqli_fetch_assoc($allActiveCategory)){
                                    ?>

                                    <option value="<?=$row['id']?>"><?=$row['category_name']?></option>
                                    
                                    <?php
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Category Title </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Category Title ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">Content </label>
                        <div class="col-sm-10">
                            <textarea name="content" id="" cols="30" rows="10" class="summernote"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Category Photo </label>
                        <div class="col-sm-10">
                            <input type="file" name="photo" id="photo ">
                        </div>
                    </div>
                    
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1">
                                    <label class="form-check-label" for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                    <label class="form-check-label" for="inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="add_blog" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>
<?php require_once 'footer.php' ?>