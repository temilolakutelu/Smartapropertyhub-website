<?php
include('includes/header.php');

$pageURL= curPageURL();
$id= $_GET['pageID'];
$query= "select * from pagecontent where pageID=$id";
$result= mysql_query($query);
$numOfRow= mysql_num_rows($result);
if ($numOfRow == 1) 
{
	$arr= mysql_fetch_array($result);
	$pageTitle= $arr['pageTitle'];
	$pageContent= html_entity_decode($arr['pageContent']);
	$pageBrief = strip_tags($pageContent);
	$pageMetaData= $arr['pageMetaData'];
	$pageName= $arr['PageName'];
	$catID=$arr['categoryID'];
	$position2= 130;
	$brief = substr($pageBrief, 0, $position2);
	
}
else
{
	header('Location: 404.php');
}
if(isset ($pageTitle))
		{
			$pageTitle =  $pageTitle; 
		}
	else 
		{
			$pageTitle = 'PropertyHub';
		}
?>


<div class="wrapper_div">

<div class="content_div">

<?php



$quer= "select * from pagecontent where categoryID=$catID";
$result1= mysql_query($quer);


$que="select * from pagecategory where categoryID=$catID";
$r= mysql_query($que);
$a= mysql_fetch_array($r);
$categoryName= $a['categoryName'];

$sql="select * from banners where pageID=$id";
$res= mysql_query($sql);
$row= mysql_fetch_array($res);


  echo'<div id="salesRent" style="font-family: Dax; font-size: 20px;">
   			'.$pageName.'
    </div>
	<div id="terms">';
  	//Always group text in paragraphs for better presentation here.
	//Thats when you are updating pages from from CMS.
	echo $pageContent;
		
   
  echo' </div>';
  ?> 

 </div><!--End of content-->


	<div class="sideBar">
		<div class="socials">
			<ul>
				<li><a href="#" class="gplus" target="_blank"></a></li>
				<li><a href="#" class="twitter" target="_blank"></a></li>
				<li><a href="#" class="facebook" target="_blank"></a></li>
				<li><a href="#" class="socialLove" target="_blank"></a></li>
			</ul>
		</div>
        
   <div class="clear"></div>
        
		<div class="vticker">
                   			
		     <ul id="ticker_02" class="ticker">
        <?php
			$newsContent='';
			$query = "SELECT newsID, newsTitle, newsDetails, newsImage FROM  news";
			$result = mysql_query($query,$link);
			if(mysql_num_rows($result) > 0)
			{
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))
				{	
					$img = $row['newsImage'];
					$img = 'XownCMS/'.$img;
					$title  = $row['newsTitle'];
					$title = substr($title, 0, 30);
					$details = html_entity_decode($row['newsDetails']);
					$details = strip_tags($details);
					$details = substr($details, 0, 60);
					$newsID = $row['newsID'];
			
		
		
	              	$newsContent .='<li>';
					$newsContent .='<div class="left"><img src="'.$img.'" width="97" height="89" /></div>';
					$newsContent .='<p class="right">';
					$newsContent .='<p class="tit">'.strtolower(ucwords(($title))).'</p>';
					$newsContent .='<p class="newsCon">'.$details.'...<br />';
					$newsContent .='<button class="readMore" onclick="lightbox_open();" value="'.$newsID.'"> Read More </button>';
					$newsContent .='</p></p></li>';
				}
				}
				echo $newsContent;
			 ?>
			 
			</ul>
		</div><!--End of vticker-->
        
        <div id="light">
        <button id="closeBox" onclick="lightbox_close();"> </button>
        <br/>
            <p id="newsHead"> </p>
            <p id="newsBody"></p>
            </div>
        <div id="fade" onClick="lightbox_close();"></div>
         


		<div class="stakeholdersLog">
			<div class="accordion_example">
                <div class="accordion_in" style="border-radius:8px;">
                  <div class="acc_head" >LOGIN AREA FOR STAKEHOLDERS </div>
                  <div class="acc_content firstcontent">
                  <li><a href="smartpro/index.php">Agent Login/Landlord Login</a></li>
				  <br/>
				  <li><a href="user/index.php">User Login</a></li>
                  <br/>
                  </div>
                </div>  
            </div>
		
		</div><!--End of stakeholdersLog-->
        
                   <div class="subscriberForm">
						<form name="subForm" class="subForm" action="" method="post">
							<input type="text" required  name="subscribe" id ="subscribe"  placeholder="Newsletter Email Address..."/>
							<input type="submit"  name="subSubscribe" id ="subSubscribe" value="GO &#9654"  />
						</form>
					</div>


		
	</div><!--End of sidebar-->
    <script type="text/javascript">
	
 $('.readMore').click(function(){
	var newsNum = $(this).val();
	$.ajax({
		type: 'POST',							
		url: 'getNews.php', 
		data: { newsNum: newsNum },
		dataType: 'json',
		success: function(data){
		//alert('what is this '+data);
		
		if (data)
		{
			newsTitle = JSON.stringify(data.newsTitle);
			newsTitle = newsTitle.replace(/"/g,'');
			//newsTitle +="\n";
			newsDetails = JSON.stringify(data.newsDetails);
			
			newsDetails = newsDetails.replace(/"/g,'');
			
			$('#light #newsHead').text(newsTitle);
			$('#light #newsBody').text(newsDetails);
		
		}
			
	},
	
	});
});

 
 
 </script>      
</div><!--End of wrapper-->

<?php
include('includes/footer.php');
?>
