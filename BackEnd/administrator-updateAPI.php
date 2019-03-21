<?php
require_once("ACG_tool.php");

$ID=$_POST["ID"];
$admName=$_POST["admName"];
$admPwd=$_POST["admPwd"];

$link=create_connection();
mysqli_query($link,"SET NAMES UTF8");


$sql = "UPDATE administrator SET admName='$admName', admPwd='$admPwd' WHERE admID='$ID'";
	
if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "updateFail";
}

mysqli_close($link);
?>