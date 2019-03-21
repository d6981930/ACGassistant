<?php
require_once("ACG_tool.php");

$ID=$_POST["ID"];
$floMemID=$_POST["floMemID"];
$floItemID=$_POST["floItemID"];
$floType=$_POST["floType"];


$link=create_connection();
mysqli_query($link,"SET NAMES UTF8");


$sql = "UPDATE follow SET floMemID='$floMemID', floItemID='$floItemID', floType= '$floType' WHERE floID='$ID'";
	
if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "updateFail";
}

mysqli_close($link);
?>