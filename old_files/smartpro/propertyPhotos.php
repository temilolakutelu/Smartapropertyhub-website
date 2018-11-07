<?php
include('header.php');
include("../XownCMS/link.php");
include('functions.php');

include('SimpleImage.php');

if (!(isset($_SESSION["ref_num"]))){
echo '<script>window.location = "postProperty.php"</script>';
}

?>

<?php
if (isset($_POST["submit"])) {
	$property_ID = getPropertyID($_SESSION["ref_num"]);
	$imageDesc = "Null";

$path = 'uploads/photos/';
            //move file1
            for ($i=0; $i < count($_FILES['file']['name']); $i++){
                $fileN = $_FILES['file']['name'][$i];
                if(!empty($fileN)){
                    $max_size = 7000000;
                    //Set default file extension whitelist
                    $whitelist_ext = array("jpeg", "jpg", "png", "JPG");
                    //Set default file type whitelist
                    $whitelist_type = array('image/jpeg','image/png','image/gif');
                    // Get filename
                    $file_info = pathinfo($_FILES['file']['name'][$i]);
                    $name = $file_info['filename'];
                    $ext = $file_info['extension'];
                    //$out = array('error'=>null);
					$error = "";
                    //Check file has the right extension
                    if (!in_array($ext, $whitelist_ext)) {
                        $error .= "Invalid file Extension";
                    }

                    //Check that the file is of the right type
                    if (!in_array($_FILES['file']["type"][$i], $whitelist_type)) {
                        $error .= "Invalid file Type";
                    }				

                    //Check that the file is not too big
                    if ($_FILES['file']["size"][$i] > $max_size) {
                        $error .= "File is too big";
                    }
                    //work on new filename
                    $namePart = clean($name);
                    $newname = $namePart.'.'.$ext;
                    //Check if file already exists on server
                    if (file_exists($path.$newname)) {
                        $newname = $namePart.'duplicate.'.$ext;
                    }
                    if (empty($error)){
						
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
							echo '<script>window.location = "photosDescription.php"</script>';
							//echo "Success";
                        }
                        else {
                            //when upload fails
							echo '<div class="response error">'.$error.'</div>';
                        }
                    }
                    else {
                        //when an error occurred
						echo '<div class="response error">Error in uploading files!</div>';
                    }
                }else{
                    //when a file field is empty
					echo '<div class="response error">Field cannot be empty.</div>';
                }
            }
	
	
}
?>
<div class="prop_Name">
	<?php
		echo getPropertyName($_SESSION["ref_num"]);
	?>
</div><!--End of propName--> 
<div id="form_small">
	<div class="prop_step" style="margin-top: 8px; margin-left: 10px;">UPLOAD PROPERTY PHOTOS</div>
    <div class="prop_step_liner clear" style="width: 1100px;"></div>
    <div class="prop_step_ball" style="padding-left: 3px;"><i class="fa fa-camera"></i></div>
    <div class="clear"></div>
    <div class="form_photo">
                <form enctype="multipart/form-data" action="" method="post">
                   <p class="instruct"> First Field is Compulsory. Only JPEG,PNG,JPG Type Image should be Uploaded. <br /><br /><font class="red_instruct">Individual image size should be less than 500KB.</font></p>
              <br />
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="upload btn_ok" value="Add More Files"/>
                    <input type="submit" value="Upload File" name="submit" id="upload" class="upload btn_ok"/>
                </form>
                </div>
</div>

<?php
include('footer.php');
?>

