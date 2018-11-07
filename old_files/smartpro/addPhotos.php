<?php
include('header.php');
include("../XownCMS/link.php");
include('functions.php');

include('SimpleImage.php');


if (!(isset($_SESSION["ref_num_Edit"]))){
echo '<script>window.location = "listProperty.php"</script>';
}

?>

<?php
if (isset($_POST["submit"])) {
	$property_ID = getPropertyID($_SESSION["ref_num_Edit"]);
	$imageDesc = "Null";

$path = 'uploads/photos/';
            //move file1
            for ($i=0; $i < count($_FILES['file']['name']); $i++){
                $fileN = $_FILES['file']['name'][$i];
                if(!empty($fileN)){
                    $max_size = 11000000;
                    //Set default file extension whitelist
                    $whitelist_ext = array("jpeg", "jpg", "png");
                    //Set default file type whitelist
                    $whitelist_type = array('image/jpeg','image/png','image/gif');
                    // Get filename
                    $file_info = pathinfo($_FILES['file']['name'][$i]);
                    $name = $file_info['filename'];
                    $ext = $file_info['extension'];
                    $out = array('error'=>null);
                    //Check file has the right extension
                    if (!in_array($ext, $whitelist_ext)) {
                        $out['error'][] = "Invalid file Extension";
                    }

                    //Check that the file is of the right type
                    if (!in_array($_FILES['file']["type"][$i], $whitelist_type)) {
                        $out['error'][] = "Invalid file Type";
                    }

                    //Check that the file is not too big
                    if ($_FILES['file']["size"][$i] > $max_size) {
                        $out['error'][] = "File is too big";
                    }
                    //work on new filename
                    $namePart = clean($name);
                    $newname = $namePart.'.'.$ext;
                    //Check if file already exists on server
                    if (file_exists($path.$newname)) {
                        $newname = $namePart.'duplicate.'.$ext;
                    }
                    if (count($out['error']<1)){
                        if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $path.$newname)){
                            //save into the database
							$imgpath = $path.$newname;
							$image = new SimpleImage();
							$image-> load("uploads/photos/".$newname);
							$image-> resize(600,400);
							$msg = $image-> save("uploads/photos/".$newname);	
							
							//function to watermark pictures
							waterMark_Img($imgpath);
							savePropertyImage($property_ID,$newname, $imageDesc);
							echo '<script>window.location = "editPhotos.php"</script>';
                        }
                        else {
                            //when upload fails
							echo "Error";
                        }
                    }
                    else {
                        //when an error occurred
                    }
                }else{
                    //when a file field is empty
                }
            }
	
	
}
?>

<div class="prop_Name">
	<?php
		echo "Editing : ".getPropertyName($_SESSION["ref_num_Edit"]);
	?>
</div><!--End of propName-->
<button type="button" class="btn_ok" id="back_btn" style="margin-left: 110px;">BACK</button> 
<div id="form_small">
	<div class="prop_step" style="margin-top: 8px; margin-left: 10px;">ADD MORE PHOTOS</div>
    <div class="prop_step_liner clear" style="width: 1100px;"></div>
    <div class="prop_step_ball" style="padding-left: 3px;"><i class="fa fa-camera"></i></div>
    <div class="clear"></div>
    <div class="form_photo">
                <form enctype="multipart/form-data" action="" method="post">
                   <p class="instruct"> First Field is Compulsory. Only JPEG,PNG,JPG Type Image should be Uploaded. Image Size Should Be Less Than 6MB.</p>
              <br />
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div>
                    <br/>
                    <input type="button" id="add_more" class="upload btn_ok" value="Add More Files"/>
                    <input type="submit" value="Upload File" name="submit" id="upload" class="upload btn_ok"/>
                </form>
                </div>
</div>

<script>
//Back Button
 $('#back_btn').click(function(){
	 window.location = "editPhotos.php"			
});
</script>

<?php
include('footer.php');
?>

