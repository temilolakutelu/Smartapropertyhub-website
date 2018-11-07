
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Smart Propertyhub Ltd.</title>
<link href="icon.jpg" rel="shortcut icon" type="images/jpg"/>
<link href="clock.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">

<script type="text/javascript">
function Clock_dg(prop) {
    var angle = 360/60,
        date = new Date();
        var h = date.getHours();
        if(h > 12) {
            h = h - 12;
        }

        hour = h;
        minute = date.getMinutes(),
        second = date.getSeconds(),
        hourAngle = (360/12) * hour + (360/(12*60)) * minute;

        $('#minute')[0].style[prop] = 'rotate('+angle * minute+'deg)';
        $('#second')[0].style[prop] = 'rotate('+angle * second+'deg)';
        $('#hour')[0].style[prop] = 'rotate('+hourAngle+'deg)';
}
$(function(){        
    var props = 'transform WebkitTransform MozTransform OTransform msTransform'.split(' '),
        prop,
        el = document.createElement('div');

    for(var i = 0, l = props.length; i < l; i++) {
        if(typeof el.style[props[i]] !== "undefined") {
            prop = props[i];
            break;
        }
    }
    setInterval(function(){
        Clock_dg(prop)
    },100);
});
</script>
<style>
    body{ 
        font-family: 'Open Sans' !important;
    }
    </style>
</head>

<body>
<div class="container">
    <div class="row rowOne">
        <div class="col-md-12">
            <img src="logo.jpg" class="img-responsive" alt="SPH Properties Logo" />
         
        </div>
    </div>
    <div class="row rowTwo">
        <div class="col-md-6 col-xs-6 time">         
            <div id="clock">
                <div id="hour" style="transform: rotate(334.5deg); position:; top:-42px; left:-42px;"><img src="m3.png"></div>
                <div id="minute" style="transform: rotate(54deg); position:; top:-42px; left:-42px;"><img src="m2.png" ></div>
                <div id="second" style="transform: rotate(108deg); position:; top:48px; left:144px; "><img src="http://demo.web3designs.com/images/sechand.png"></div>
            </div>
        </div>
        
        <div class="col-md-6 col-xs-6 text">
            <div id=""><h1>Smart PropertyHub Limited<br/>
                <h2> <span>WEBSITE BEING UPGRADED</span><br/>
                
                </h2>
                <p>For Enquiries &amp; Requests: </p>
                <img  class="mail-img"src="mail.png" width="40">
                <p class="mail"><i class="fa fa-envelope" style="color:#83d7f3;"></i> support@propertyhub.com.ng</p>
				           <img class="phone-img" src="phone.png" width="40">
                <p class="phone"><i class="fa fa-phone" style="color:#83d7f3;"></i> +254 715 828 676</p>
            </div>
        </div>
    </div>

    <div class="row rowThree">
        <div class="col-md-12">
            <p>Website Under Maintenance</p>
			
        </div>
    </div>



</div>







</body>
</html>