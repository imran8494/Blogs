<?php


namespace App\classes;

use App\classes\Database;

class Category{
    public function addCategory($data){
        
        $category_name = $data['category_name'];
        $status = $data['status'];

        $sql = "INSERT INTO `category`(`category_name`, `status`) VALUES ('$category_name','$status')";

        $result = mysqli_query(Database::dbCon(),$sql);

        if($result){
            $insertMsg = "Category save successfully!";
            return $insertMsg;
        }else{
            $insertMsg = "Category not saved!";
            return $insertMsg;
        }

    }
    public function updateCategory($data){
        
        $category_name = $data['category_name'];
        $status = $data['status'];
        $id = $data['id'];

        $sql = "UPDATE `category` SET `category_name`='$category_name',`status`='$status' WHERE `id`='$id'";

        $result = mysqli_query(Database::dbCon(),$sql);

        if($result){
            $insertMsg = "Category updated successfully!";
            return $insertMsg;
        }else{
            $insertMsg = "Category not updated!";
            return $insertMsg;
        }

    }
    public function selectRow($id = ''){
        return mysqli_query(Database::dbCon(),"SELECT * FROM `category` WHERE `id`='$id'");
        
    }
    public function allActiveCategory(){
       $result = mysqli_query(Database::dbCon(),"SELECT * FROM `category` WHERE `status`= 1");
       return $result;
    }
    public function allActivePost(){
       $result = mysqli_query(Database::dbCon(),"SELECT * FROM `blog` WHERE `status`= 1 order by `id` desc");
       return $result;
    }
    public function searchPost($text){
       $result = mysqli_query(Database::dbCon(),"SELECT * FROM `blog` WHERE `content` LIKE '%$text%' and `status`= 1 order by `id` desc");
       return $result;
    }
    public function catPost($id){
       $result = mysqli_query(Database::dbCon(),"SELECT * FROM `blog` WHERE `status`= 1 and `cat_id` = '$id' order by `id` desc");
       return $result;
    }
    public function allCategory(){
       $result = mysqli_query(Database::dbCon(),"SELECT * FROM `category`");
       return $result;
    }
    public function active($id){
        mysqli_query(Database::dbCon(),"UPDATE `category` SET `status`= 1 WHERE `id`='$id'");
    }
    public function inactive($id){
        mysqli_query(Database::dbCon(),"UPDATE `category` SET `status`= 0 WHERE `id`='$id'");
    }
    public function delete($id){
        mysqli_query(Database::dbCon(),"DELETE FROM `category` WHERE `id`='$id'");
    }
    public function singlePost($id){
        return mysqli_query(Database::dbCon(),"SELECT * FROM `blog` WHERE `id`='$id'");
    }
    
}




















?>