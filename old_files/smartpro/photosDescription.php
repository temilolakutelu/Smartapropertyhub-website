<?php
include('header.php');
include("../XownCMS/link.php");
include('functions.php');


include('SimpleImage.php');


if (!(isset($_SESSION["ref_num"]))){
echo '<script>window.location = "postProperty.php"</script>';
}

?>

<div class="prop_Name">
	<?php
		echo getPropertyName($_SESSION["ref_num"]);
	?>
</div><!--End of propName--> 
<div id="prop_div">
	
  <div id="hor_div">
<?php
$imageDesc = '';

$property_ID = getPropertyID($_SESSION["ref_num"]);
$sql = "Select * from prt_property_images where property_ID='".$property_ID."'";
$res = mysql_query($sql);
while($arr = mysql_fetch_array($res))
{
    $filename = $arr['imageURL'];
	
	$Path = 'uploads/photos/';
	$imgpath = $Path.$filename;
	
    $image_im = $row['imageURL'];
    $imageID = $row['imageID'];
	$image = new SimpleImage();
    $image-> load("uploads/photos/".$filename);
    $image-> resize(600,400);
    $msg = $image-> save("uploads/photos/".$filename);	
	
	//function to watermark pictures
	waterMark_Img($imgpath);
		
	$imageDesc .= '<div id="desc_div">';
	$imageDesc .= '<div class="image_div"><img src="uploads/photos/'.$filename.'" /></div>';
	$imageDesc .= '<div class="clear"></div>';
	$imageDesc .= '<div class="prop_img_det">
	<form action="insertDesc.php" method="get">
		<textarea name="propDesc[]" id="propDesc" class="input_text" cols="5" rows="5" placeholder="Enter Property Description" ></textarea>
		<input type="hidden" name="imageID[]" id="imageID" value="'.$arr["imageID"].'" />
	 </div>';
	 $imageDesc .= '<div style="height:7px"></div>
<div id="flash" align="left"></div>
<div id="display" align="left"></div>';
	$imageDesc .= '</div>';
}
echo $imageDesc;
echo '<div class="clear"></div>
<button type="submit" name="post" class="btn_ok">POST PROPERTY</button>
</form>';
?>          
</div><!--End of hor_div-->
            
<div class="clear"></div>    
</div><!--End of prop_div-->
<?php
include('footer.php');
?>