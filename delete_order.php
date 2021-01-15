<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
$oid = get_safe_value($_POST['oid']);
deleteOrderById($oid);
return true;
