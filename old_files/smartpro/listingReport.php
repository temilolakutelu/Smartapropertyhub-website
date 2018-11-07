<?php

	$chart = new KoolChart("chart");
	$chart->scriptFolder="../XownCMS/KoolControls/KoolChart";
	$chart->Legend->Appearance->Visible = true;	
	$chart->Width = 390;
	$chart->Height = 300;
	$chart->Title->Text = "";
	
	$_series = new PieSeries("Posted Property");	
	$_series->LabelsAppearance->DataFormatString="{0}%";
 	
	$total = getTotalPostedProperty($user_ID);
	$forSale = getPropertyTypePosted($user_ID, '1');
	$forAuction = getPropertyTypePosted($user_ID, '3');
	$forRent = getPropertyTypePosted($user_ID, '2');
	
	$_item = new PieItem($forSale/$total  * 100,"For Sale");
	$_item->BackgroundColor = "#2E3B62";
	$_item->Exploded = true;
	$_series->AddItem($_item);
		
	$_item = new PieItem($forAuction/$total  * 100,"For Auction");
	$_item->BackgroundColor = "#A9A9A9";
	$_series->AddItem($_item);
	
	$_item = new PieItem($forRent/$total  * 100,"For Rent");
	$_item->BackgroundColor = "#7E2828";
	$_series->AddItem($_item);
	
		
	$chart->PlotArea->AddSeries($_series);
 


echo $chart->Render();
?>
