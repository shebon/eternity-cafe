<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
$name =  get_safe_value($_POST['name']);
$email =  get_safe_value($_POST['email']);
$message =  get_safe_value($_POST['message']);
$added_on = date('Y-m-d h:i:s');
mysqli_query($con, "insert into contact_us(name,email,message,added_on) values('$name','$email','$message','$added_on')");
header("Location: index.php#contact");
exit();
