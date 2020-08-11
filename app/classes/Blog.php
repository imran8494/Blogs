<?php

namespace App\classes;

use App\classes\Database;

class Blog
{
    public function addBlog($data)
    {

        $photo = explode('.', $_FILES['photo']['name']);
        $photo_ex = end($photo);
        $photo_name = date('ymdtis') . '.' . $photo_ex;

        $title = mysqli_real_escape_string(Database::dbCon(), $data['title']);
        $content = mysqli_real_escape_string(Database::dbCon(), $data['content']);
        $cat_id = mysqli_real_escape_string(Database::dbCon(), $data['cat_id']);
        $status = $data['status'];
        $name = $_SESSION['name'];

        $sql = "INSERT INTO `blog`(`cat_id`, `title`, `content`, `photo`, `name`,`status`) VALUES ('$cat_id','$title','$content','$photo_name','$name','$status')";

        $result = mysqli_query(Database::dbCon(), $sql);

        if ($result) {
            move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/' . $photo_name);
            $insertMsg = "Blog save successfully!";
            return $insertMsg;
        } else {
            $insertMsg = "Blog not saved!";
            return $insertMsg;
        }
    }
    public function updateBlog($data)
    {



        $title = mysqli_real_escape_string(Database::dbCon(), $data['title']);
        $content = mysqli_real_escape_string(Database::dbCon(), $data['content']);
        $cat_id = mysqli_real_escape_string(Database::dbCon(), $data['cat_id']);
        $status = $data['status'];
        $name = $_SESSION['name'];
        $id = $_POST['id'];

        if ($_FILES['photo']['name'] == NULL) {

            $sql = "UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`name`='$name',`status`='$status' WHERE `id` = '$id'";

        } else {

            $photo = explode('.', $_FILES['photo']['name']);
            $photo_ex = end($photo);
            $photo_name = date('ymdtis') . '.' . $photo_ex;

            $sql = "UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`photo`='$photo_name',`name`='$name',`status`='$status' WHERE `id` = '$id'";
            move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/' . $photo_name);
        }


        $result = mysqli_query(Database::dbCon(), $sql);

        if ($result) {
            header('location:manage_blog.php');
        } else {
            $insertMsg = "Blog not updated!";
            return $insertMsg;
        }
    }
    public function allBlog()
    {
        $result = mysqli_query(Database::dbCon(), "SELECT `blog`.*, `category`.`category_name`
        FROM `blog`
        INNER JOIN `category` ON `category`.`id` = `blog`.`cat_id` ORDER BY `id` DESC");
        return $result;
    }
    public function active($id)
    {
        mysqli_query(Database::dbCon(), "UPDATE `blog` SET `status`= 1 WHERE `id`='$id'");
    }
    public function inactive($id)
    {
        mysqli_query(Database::dbCon(), "UPDATE `blog` SET `status`= 0 WHERE `id`='$id'");
    }
    public function delete($id)
    {
        mysqli_query(Database::dbCon(), "DELETE FROM `blog` WHERE `id`='$id'");
    }
    public function selectRow($id = '')
    {
        return mysqli_query(Database::dbCon(), "SELECT * FROM `blog` WHERE `id`='$id'");
    }
}
