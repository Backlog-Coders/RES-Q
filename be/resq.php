<?php
$dct = $_POST['dct'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$Bloodgrp = $_POST['Bloodgrp'];
$units = $_POST['units'];
$spl = $_POST['other'];
$pincode = $_POST['pincode'];
$Address = $_POST['Address'];
$email = "resqwb@gmail.com";
$formcontent=" $dct \n From: $name \n Phone: $contact \n Blood Group: $Bloodgrp \n Units: $units \n Special note: $spl \n Pincode: $pincode \n Address: $Address \n\n\n\n -----------------------.THIS IS A SYSTEM GENERATED MAIL.----------------------";
$recipient = "pablouka@gmail.com , abhraaich2012@gmail.com";
$subject = "BLOOD REQUEST";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Your request has been lodged. Our executive will get in touch with you shortly." . " -" . "<a href='index.html' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
?>