<?php
/**
 * Created by PhpStorm.
 * User: EA
 * Date: 8/18/2015
 * Time: 2:06 PM
 */
 $docDirectory = "docs/";
$finalFilename = "";
if(isset($_POST['start'])){
    if(isset($_FILES['excel'])){
        $errors= array();
        $file_name = $_FILES['excel']['name'];
        $file_size = $_FILES['excel']['size'];
        $file_tmp = $_FILES['excel']['tmp_name'];
        $file_type = $_FILES['excel']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['excel']['name'])));
        $extensions = array("xlsx","XLSX","csv","jpg","png","jpeg","zip","rar");
        if(in_array($file_ext,$extensions )=== false){
            $errors[]="extension not allowed, please choose a valid Excel file.";
    }
        if($file_size > 122097152){
            $errors[]='File size must be excately 100 MB';
        }
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,$docDirectory.$file_name);
            $finalFilename = $docDirectory.$file_name;
        }else{
            print_r($errors);
        }
    }
}
?>
<html>
<head>
    <title>
        Export Excel to Mysql Table
    </title>
    <style type="text/css">
        input{
            display: block;
        }
    </style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <label>Select an Excel file</label>
    <input type="file" name="excel">
    <input type="submit" name="start" value="Upload">
</form>
</body>
</html>