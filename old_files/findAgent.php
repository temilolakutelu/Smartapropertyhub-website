<?php
include('includes/header.php');
include ('XownCMS/link.php');
?>

<div class="wrapper_div">
    	<div class="content_div">
  <div id="salesRent">FIND AN AGENT</div>
  <div id="rentSale">
    <form action="" method="post">
      <input type="text" name="searchAgent" class="bigSearchBox" placeholder="Search By Location or Agent Code"/><br/>
      
      <input type="submit" name="search"  id="seach" class="search" value="SEARCH &#9654"/>
    </form>
    
    <br/> <br/> <br/>
  </div>

<!-- <div id="agt_list_main"> 
 
<div id="agt_list">
	<div class="agt_details">
    sf
    </div>
    
    <div class="agt_image">
    vfs
    </div>
        
</div>

</div> End of agt_list_main -->

 </div><!--End of content-->


	<div class="sideBar">
		<div class="socials">
			<ul>
				<li><a href="#" class="gplus" target="_blank"></a></li>
				<li><a href="#" class="twitter" target="_blank"></a></li>
				<li><a href="https://www.facebook.com/pages/Propertyhub/234415650016031?fref=ts" class="facebook" target="_blank"></a></li>
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