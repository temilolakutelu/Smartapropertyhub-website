<?php
include('header.php');
include("../XownCMS/link.php");
include('functions.php');


if (isset($_GET["refNum"]))
{
$_SESSION["ref_num_Edit"] = $_GET['refNum'];
}



if (!(isset($_GET["refNum"])) and !($_SESSION["ref_num_Edit"])){
echo '<script>window.location = "listProperty.php"</script>';
}

if (isset($_POST["addphotos"])) 
{
	echo '<script>window.location = "addPhotos.php"</script>';
}

?>
<script src="js/script2.js"></script>
<script>
function lightbox_open(){
    window.scrollTo(0,0);
    document.getElementById('light2').style.display='block';
    document.getElementById('fade').style.display='block';  
}


function lightbox_close(){
    document.getElementById('light2').style.display='none';
    document.getElementById('fade').style.display='none';
	location.reload();
}
</script>

<div class="prop_Name">
	<?php
		echo "Editing : ".getPropertyName($_SESSION["ref_num_Edit"]);
	?>
</div><!--End of propName--> 
<button type="button" id="addMore" name="editdesc" class="btn_ok right" style="margin-right: 110px;">ADD MORE PHOTOS</button><button type="button" class="btn_ok" id="back_btn" style="margin-left: 110px;">BACK</button> 
<div id="prop_div">
  <div id="hor_div">
  
<?php
$imageDesc = '';

$property_ID = getPropertyID($_SESSION["ref_num_Edit"]);
$sql = "Select * from prt_property_images where property_ID='".$property_ID."'";
$res = mysql_query($sql);
while($arr = mysql_fetch_array($res))
{
    $filename = $arr['imageURL'];
	$imageDescription = $arr['imageDesc'];
	
	$Path = 'uploads/photos/';
	$imgpath = $Path.$filename;
	
    $image_im = $row['imageURL'];
    $imageID = $row['imageID'];
		
	$imageDesc .= '<div id="desc_div">';
	$imageDesc .= '<div class="image_div"><img src="uploads/photos/'.$filename.'" /></div>';
	$imageDesc .= '<div class="clear"></div>';
	$imageDesc .= '<div class="prop_img_det">
	<form action="editDesc.php" method="get">
		<textarea name="propDesc[]" id="propDesc" class="input_text" cols="5" rows="5" placeholder="Enter Property Description" >'.$imageDescription.'</textarea>
		<input type="hidden" name="imageID[]" id="imageID" value="'.$arr["imageID"].'" />
<br />
<button type="button" class="edit" onclick="lightbox_open();" id="small_btn" onclick="lightbox_open();" value="'.$arr["imageID"].'">
 Edit </button>
<button type="button" class="delete" id="small_btn" value="'.$arr["imageID"].'"> Delete </button>		
	 </div>';
	 $imageDesc .= '<div style="height:7px"></div>';
	$imageDesc .= '</div>';
}
echo $imageDesc;
echo '<div class="clear"></div>
<button type="submit" name="editdesc" class="btn_ok">POST PROPERTY</button>
</form>';
?>          
</div><!--End of hor_div-->
            
<div class="clear"></div>    
</div><!--End of prop_div-->

        <div id="light2">
        <button id="closeBox" onclick="lightbox_close();"> </button>
        <br/>        
<div class="main_file_div">
<p id='loading'><img src="images/ajax-loader.gif" /></p>
<div id="message">Image size must not exceed 500kb</div>
<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="image_ID" id="image_ID" />
<div id="image_preview"><img id="previewing" src="images/noimage.png" /></div>
<div id="selectImage">
<input type="file" name="file2" id="file2" required /><br />
<input type="submit" value="Upload" class="btn_ok" name="upload" />
<p>&nbsp;</p>
</div>
</form>
</div>
            </div><!--End of light-->
        <div id="fade" onClick="lightbox_close();"></div>


    <script type="text/javascript">
	
 $('.edit').click(function(){
	var imageID = $(this).val();
	$('#light2 #image_ID').val(imageID);			
});

//Add More photos Button
 $('#addMore').click(function(){
	 window.location = "addPhotos.php"			
});

//Back Button
 $('#back_btn').click(function(){
	 window.location = "editFeatures.php"			
});

//delete button

 $('.delete').click(function(){
	var newsNum = $(this).val();
	$.ajax({
		type: 'POST',							
		url: 'getNews.php', 
		data: { imageID: imageID },
		dataType: 'json',
		success: function(data){
		//alert('what is this '+data);
			
	},
	
	});
});

 </script>
<?php
include('footer.php');
?>