<?php
include("../XownCMS/link.php");
include('functions.php');

include('SimpleImage.php');



if(isset($_POST["upload"]))
{
		$image_ID = $_POST["image_ID"];
		//echo $image_ID;	
		$imageDesc = "Null";
		
if(isset($_FILES["file2"]["type"]))
{
	$fileN = $_FILES['file2']['name'];
	if(!empty($fileN)){
					$path = 'uploads/photos/';
					$max_size = 11000000;
                    //Set default file extension whitelist
                    $whitelist_ext = array("jpeg", "jpg", "png");
                    //Set default file type whitelist
                    $whitelist_type = array('image/jpeg','image/png','image/gif');
					
                    // Get filename
                    $file_info = pathinfo($_FILES['file2']['name']);
                    $name = $file_info['filename'];
                    $ext = $file_info['extension'];
                    $out = array('error'=>null);
                    //Check file has the right extension
                    if (!in_array($ext, $whitelist_ext)) {
                        $out['error'][] = "Invalid file Extension";
                    }

                    //Check that the file is of the right type
                    if (!in_array($_FILES['file2']["type"], $whitelist_type)) {
                        $out['error'][] = "Invalid file Type";
                    }

                    //Check that the file is not too big
                    if ($_FILES['file2']["size"][$i] > $max_size) {
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
                        if (move_uploaded_file($_FILES['file2']['tmp_name'], $path.$newname)){
                            //save into the database
							$imgpath = $path.$newname;
							$image = new SimpleImage();
							$image-> load("uploads/photos/".$newname);
							$image-> resize(600,400);
							$msg = $image-> save("uploads/photos/".$newname);	
							
							//function to watermark pictures
							waterMark_Img($imgpath);							
							$stausMsg = editPropertyImage($image_ID, $newname);
							echo $stausMsg;
                        }
                        else {
                            //when upload fails
							echo "Error";
                        }
                    }
                    else {
                        echo "Error in uploading file";//when an error occurred
                    }
                }else{
                    echo "Field is Empty";//when a file field is empty
                }					

}	
	
}

?>