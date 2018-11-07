<?php
include('includes/header.php');

?>

<div class="wrapper">
    	<div class="content" style="margin-left: 5px;">

<div id="salesRent" style="font-family: Dax; font-size: 20px;">USER LOGIN</div>
	<?php if (isset($_GET['status'])) {
		echo " <span class=\"txtLabel\">&nbsp;</span><span class=\"errorMsg\"> ";
		echo $_GET['status'];	
		echo "</span>";
		} ?>
  <div id="rentSale">
    <form action="loginprocessor.php" method="post">
     
     
      <div class="txtLabel" >E-mail:</div><input type="text" name="userEmail" class="textbox"  id="userEmail"  required pattern="([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Invalid E-mail' : '');" /><br/>
     
      <div class="txtLabel" >Password:</div><input type="password" name="userPassword" class="textbox" id="userPassword"   required pattern='.{8,}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Incorrect Password' : '');" /><br/>
      <span class="txtLabel">&nbsp;</span> <input type="submit" name="userLogin" id="userLogin" class="search" value="LOGIN &#9654"/>
		<p>&nbsp;</p>
    <span class="txtLabel">&nbsp;</span><p class="linRels"> Forgot Your Password? <a href="forgotPassword.php">Click Here</a></p>
    </form>
  </div>
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
					$img = '../XownCMS/'.$img;
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
           </div>

        <div id="light">
        <button id="closeBox" onclick="lightbox_close();"> </button>
        <br/>
            <p id="newsHead"> </p>
            <p id="newsBody"></p>
            </div>
        <div id="fade" onClick="lightbox_close();"></div>
         
		<div class="clear"></div> 

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
							<input type="text" required  name="subscribe" id ="subscribe"  placeholder="Newsletter Email Address.."/>
							<input type="submit"  name="subSubscribe" id ="subSubscribe" value="GO &#9654"  />
						</form>
					</div>


		
	</div><!--End of sidebar-->
        
    </div><!--End of wrapper-->

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


<div class="clear"></div>

<?php
include('includes/footer.php');
?>