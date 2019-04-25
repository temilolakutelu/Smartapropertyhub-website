<?php
//This file is a template for printing pdf
?>
<!DOCTYPE html>
<head>
    <style>
        
        #body{
            font-family: 'verdana';
            font-size: 80%;
           width:100%;
           margin: 0 auto;
           background-image: url(https://images.pexels.com/photos/1725385/pexels-photo-1725385.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 20px;
        }
       
     #mail{
            position: relative;
    z-index: 1000;
    background: white;
    width: 50%;
    margin: 30px auto;
    border-radius: 20px;
    box-shadow: 2px 2px 4px 6px white;
        }
        p{
           font-size:13px; 
        }
        
        th{
         text-transform: uppercase;
        }
        table{
            margin-top:10px;
            text-align: center;
        }
         thead> tr> th{
            color: #14a0c4;
    border-bottom: 3px solid black;
        }
        footer{
            margin-top: 20px;
    border-top: 3px solid #e97c13;
    border-radius: 10px;  
        }
        table {
    border-collapse: collapse;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;
}
td{
    font-size:12px;
}

tr:nth-child(even) {
   
}
.mail_title{
    padding: 10px;
    width: 30%;
    margin: auto;
    display: flex;
}

.company_det{
    padding:20px;
} 
button{
    background: #e97c13;
    width: 80px;
    height: 30px;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    transition: width 2s;
  -webkit-transition: width 2s; 
}
button:focus,
button:hover{
    background: #2bb7d8;
    width: 100px;
    outline:none;
    -ms-transform: scaleY(1.5); /* IE 9 */
  -webkit-transform: scaleY(1.5); /* Safari 3-8 */
  transform: scaleY(1.5);
}
footer h4{
    background: #2bb7d8;
    color: #f0f5f7;
    padding: 10px;
    margin: auto;
    border-radius: 10px;
} 
footer h4 i{
    margin-left:20px;
}         
    </style>
</head>
<body>
<div id='body'>
<div id='mail'>
<div class="mail_title">
  <img src="http://smartpro.propertyhub.com.ng/images/smartlogo.jpg" alt="LOGO">
  </div>
   
    <div>&nbsp;</div>
    <div class="company_det">
    <h4 >Dear <span style='color:#ed7b1a;font-weight:bold;text-transform:uppercase;'><?= $firstname; '&nbsp'. $lastname; ?></span>,</h4>
    <h2>CONGRATULATIONS!!!</h2>
    <p>Thank you for registering to SMART PROPERTYHUB as <?= $agent_type ?> on <?= date('d F Y') ?></p>
    <p>We promise you a great user experience.</p>
        <a href="//http://propertyhub.com.ng/login" target="_blank"><button>Login</button></a>
    </div>
    <footer>
    <h4>Contact Us:  <marquee behavior="slide" direction="left">
            <i class="fa fa-phone"></i>01 2931012
          <i class="fa fa-envelope"></i>sales@propertyhub.com.ng
      </marquee></h4>
       
    </footer>
</div>
</div>
   
</body>
    
       