<?php
require_once("ACG_tool.php");

$ID=$_POST["ID"];
$memName=$_POST["memName"];
$memPwd=$_POST["memPwd"];
$memEmail=$_POST["memEmail"];


$link=create_connection();
mysqli_query($link,"SET NAMES UTF8");


$sql = "UPDATE member SET memName='$memName', memPwd='$memPwd', memEmail= '$memEmail' WHERE memID='$ID'";
	
if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "updateFail";
}

mysqli_close($link);
?>