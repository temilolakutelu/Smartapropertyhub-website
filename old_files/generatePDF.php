<?php
session_start();
ob_start();
error_reporting(0);
require('fpdf17/fpdf.php');
include ("XownCMS/link.php");
 
class PDF extends FPDF
{
// Page header
function PDF($orientation='P', $unit='mm', $size='A4'){
$this->FPDF($orientation,$unit,$size);
}
function Header()
{
	
	global $title;
	$this->SetCreator('propertyhub.com.ng', FALSE);
	$this->SetDisplayMode('real', 'default');
	$this->SetMargins(20, 20, 20);
	$this->Image('images/welcomeHeader.jpg', 0,2, 0,0,'JPEG','http://localhost:8081/prop');
	$this->SetRightMargin(10);
	$this->SetAutoPageBreak(true, 5);
	$this->SetTextColor(255, 255, 255);
	$this->SetFillColor('00','2C','53');
    $this->SetFont('Arial','', 8);
  	$this->Rect(0,0, 800, 5, 'FD');
	$this->SetTextColor(99, 99, 99);

    $this->SetX(0-$w);
	
  $this->SetDrawColor(0,80,180);
    
	  $this->Ln(10);
    // Save ordinate
	  $this->y0 = $this->GetY();
	
}


/*function Header()
{
    global $title;

    $this->SetFont('Arial', 'B', 15);
    $this->Cell(0, 10, $title, 1, 1, 'C');
}
*/
//$title = 'My title'; 


// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	 // Page footer
    $this->SetY(-30);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
//    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
//	$this->Cell(0,50,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$this->Image('images/welcomeHeader.jpg', 0, 282, 0,0,'JPEG','http://www.propertyhub.com.ng');
//	$this->Image($_FILES,$x, $y, 
}
}

// Instanciation of inherited class
if (isset($_GET['prop'])){
$propertyRefNum=$_GET['prop'];
$query="select * from agt_property where property_ID ='$propertyRefNum'";
	//echo $query;
	if (!$result=mysql_query($query, $link))
					{
							$err= mysql_error();
				//	echo $err;
					}
			else {
			 while ($array= mysql_fetch_array($result))
							{
							$propertyName=$array['property_Name'];
							/*$propertyType=$array['propertyType'];*/
							$propertyID=$array['property_ID'];
							$propertyRefNum=$array['property_Reference'];
							/*$propertyHouseNumber=$array['property_Street'];*/
							$propertyCityLocation=$array['property_City'];
							/*$propertyPostCode=$array['propertyPostCode'];*/
							$propertyAdditionalAddress=$array['property_Street'];
							$propertyNoOfRoom=$array['property_no_of_rooms'];
							/*$propertyFeatures=strip_tags(($array['propertyFeatures']));
							$furnishedStatus=$array['furnishedStatus'];*/
							$propertyDesc=strip_tags($array['property_Description']);
							$propertyPrice=strip_tags(number_format($array['property_Price'], 2));
							//echo $propertyPrice;
							/*$propertyPostCode=$array['propertyPostCode'];*/
						//	echo $propertyDesc;
//						$displayDescription	=$propertyDesc." " . $propertyFeatures;
							
							
							}



			}
			$selectPropertyImages="select * from prt_property_images where property_ID='$propertyID'";
			if (!$result=mysql_query($selectPropertyImages, $link))
					{
				//	echo "Internal error at the server side";
				//	exit();
					$err= mysql_error();
				//	echo $err;
					}
	else {
		//echo $selectPropertyImages;
		$counter=0;
	$displayImagesBegin='';
	 while ($array= mysql_fetch_array($result))
							{
							
							$propertyRefNum=$array["property_ID"];
							$propertyImageURL[$counter]='smartpro/uploads/photos/'.$array["imageURL"];
							//echo $propertyImageURL[0];
						//	$propertyFileURL[$counter]='ContentManagement/'.$array['propertyFileURL'];				
								//	echo $propertyImageURL;
							$imageID=$array["imageID"];
							$imageAltText=$array["imageDesc"];
							//$imageClass='image'. $counter;
							$counter+=1;
							//$displayImagesBegin .="	<img src=\"$propertyImageURL\">";
				}
		$displayImage=$displayImagesBegin;	
	}

$pdf = new PDF();
$title = '';
$pdf->SetTitle($title);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
$pdf->ln(20);

$pdf->Image($propertyImageURL[0],25,40,150,150);
$pdf->ln(165);
$pdf->SetFont('Arial','',14);
$pdf->SetTextColor(0,0,255);
$currency=html_entity_decode('&#8358;');
//$currency=htmlentities("&", ENT_QUOTES);
$newText0=$propertyHouseNumber. " ". $propertyAdditionalAddress;
$newText1=$currency.$propertyPrice;
$newText0 = iconv('UTF-8', 'windows-1252', $newText0);//to get rid of unwanted special characters
$newText1 = iconv('UTF-8', 'windows-1252', $newText1);
$propertyDesc = iconv('UTF-8', 'windows-1252', $propertyDesc);
$propertyFeatures = iconv('UTF-8', 'windows-1252', $propertyFeatures);



$pdf->Cell(0,0,$newText0,0,10,'C');
//$pdf->Write(5, $newText0);
$pdf->ln(5);
//$pdf->Write(5, $newText1);
$pdf->Cell(0,0,$newText1,0,10,'C');

$pdf->SetFont('Arial','',11);
$pdf->SetTextColor(B9,B9,B9);
$pdf->ln(10);
$pdf->Write(5, 'FULL DESCRIPTION');
$pdf->ln(8);
$pdf->Write(5, $propertyDesc);


$pdf->SetFont('Arial','B',11);
$pdf->SetTextColor(B9,B9,B9);
$pdf->ln(8);
$pdf->Write(8, 'PRICE');
$pdf->ln(5);
$pdf->Write(8, "N ".$propertyPrice);


//page 2
if (!(trim($propertyFeatures==''))) {
$pdf->AddPage();
$pdf->ln(10);
$pdf->Write(2, 'PROPERTY FEATURES');
$pdf->Write(5, 'Hello');
}
//page 3
$noPerPage=2;
//$counter=3;
$pdf->ln(10);
/*if ($counter - 1 > $noPerPage) {
	$reqPages=ceil($counter/$noPerPage);
} else {
$reqPages=1;
}
*/
//echo $reqPages;
//for ($j=0; $j<$reqPages; $j++){
$yPos=40;
$pdf->AddPage();

for ($i=1; $i<$counter; $i++) {
//$pdf->ln(20);
//$pdf->Image($propertyImageURL[$i], 10, 10, );
//$newPropertyImage=$propertyImageURL[$i];
//$pdf->Cell(0,0,$propertyImageURL[$i],0,10,'C');

$propertyImagePath= $propertyImageURL[$i];
//$propertyImagePath='ContentManagement/propertyImages/27_1340632603.jpeg';
//$pdf->Cell(0,0,$propertyImagePath,0,10,'C');

$pdf->Image(trim($propertyImagePath),50, $yPos,100,100,'JPEG');
$yPos=$yPos +(100*$i)+5;
if (($i%$noPerPage)==0){
$pdf->ln(10);
$yPos=40;
$pdf->AddPage();
}
}

$file = basename(tempnam('.', 'tmp'));
//echo $file;
//rename
rename($file, $propertyRefNum.'.pdf');
$file =$propertyRefNum .'.pdf';
//Save PDF to file
//echo $file;
chmod($file, 0644);
$pdf->Output($file, 'F');
//Redirect
header('Location: '.$file);
}
?>
