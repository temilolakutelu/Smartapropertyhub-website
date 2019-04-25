<?php
$to_email = 'temilolakutelu@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: noreply @ gmail.com';
mail($to_email, $subject, $message, $headers);
