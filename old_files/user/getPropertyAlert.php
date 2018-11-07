<?php
	
	if(isset($_POST['search']))
	{
		$propType = $_POST['propertyType'];
		$propetyLocation = $_POST['propertyLocation'];
		$minPrice = $_POST['minPrice'];
		$maxPrice = $_POST['maxPrice'];
		$roomNums = $_POST['numberOfRooms'];
		$propertyCategory = $_POST['propertyCat'];
		
		$query = "INSERT INTO pst_saved_alerts (prospect_ID,propertyLowerBand,propertyUpperBand,property_no_of_rooms,status,propertyType,propertyLocation,propertyCategory)".
		"VALUES ('$pid','$minPrice','$maxPrice','$roomNums','passive','$propType','$propetyLocation','$propertyCategory')";
		$result = mysql_query($query, $link);
		if(mysql_affected_rows($link) == 1)
			{
				$statusMsg ="<div class='errorMsg'>Property specification saved. <br/>You will be alerted when there is a property that matches your spcification.</div>";
			}
		else
			{
				$statusMsg ="<div class='errorMsg'>Unable to save your specification. <br/>Please contact the administrator.</div>";	
			}
	}
 
 
 ?>
 <div id="salesRent">NOTIFY ME WHEN THIS PROPERTY IS AVAILABLE </div>
 <?php
 	echo $statusMsg;
	
 ?>  
<div id="rentSale">
<form action="" method="post" accept-charset="utf-8" name="form1" id="form1">
					  		
     
     <select name="propertyType" class="rightMargin30">
        <option value="">Choose Property Type</option>
        <?php
		$query = "SELECT purpose_Name, purpose_Sub_Name FROM prt_purpose";
		$result = mysql_query($query,$link);
		if(mysql_num_rows($result) > 0 )
		{
			
			while($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
				if($row['purpose_Sub_Name'] != '')
				{
					echo'
					<option value="'.$row['purpose_Sub_Name'].'">'.$row['purpose_Sub_Name'].'</option>';
				}
				else
				{
					echo'
					<option value="'.$row['purpose_Name'].'">'.$row['purpose_Name'].'</option>';
				}
			
			}
		}
		
		?>
      </select>
      
      <input type="text" name="propertyLocation" id="propertyLocation" class="textbox" placeholder="Property Location"/>
      <br/>
     
      <input type="text" name="minPrice" class="Price textbox rightMargin30 currency" pattern="^((\d+)|(\d{1,3})(\,\d{3}|)*)(\.\d{2}|)$"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Invalid Amount.' : '');" placeholder="Minimum Price" id="minPrice" /> <input type="text" name="maxPrice" class="maxPrice textbox currency" id="maxPrice" pattern="^((\d+)|(\d{1,3})(\,\d{3}|)*)(\.\d{2}|)$" oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Invalid Amount.' : '');" placeholder="Maximum Price"  /><br/>
      
      <input type="number" name="numberOfRooms" placeholder="Number of Rooms" id="numberOfRooms" class="textbox"/>
      <select name="propertyCat" class="rightMargin30">
      <option value="">Choose Property Category</option>
      	<?php
		$query = "SELECT category_Name FROM prt_category";
		$result = mysql_query($query,$link);
		if(mysql_num_rows($result) > 0 )
		{
			
			while($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
			echo'
			<option value="'.$row['category_Name'].'">'.$row['category_Name'].'</option>';
			
			}
		}
		
		?>
      </select>
      <br/>
      <input type="submit" name="search"  id="seach" class="search" value="ALERT ME &#9654"/>
</form>   
 <div class="clear"></div>



<script type="text/javascript" >
$('.currency').live('keydown', function(e) {
        var key = e.keyCode || e.which; 

          if (key== 9 || key == 13) { //tab and enter keys check
           // e.preventDefault(); 
              if( isNaN( parseFloat( this.value ) ) ) return;
                    this.value = parseFloat(this.value).toFixed(2);
           
          }         

    });


 </script>