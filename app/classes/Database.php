<?php

namespace App\classes;

class Database
{

    public function dbCon(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "blogs";
        $link = mysqli_connect($host,$user,$pass,$db);
        return $link;
    }

}















?>