<?php
require_once("ACG_tool.php");

$ID=$_POST["ID"];
$cmtMemID=$_POST["cmtMemID"];
$cmtNews=$_POST["cmtNews"];
$cmtInfo=$_POST["cmtInfo"];


$link=create_connection();
mysqli_query($link,"SET NAMES UTF8");


$sql = "UPDATE comment SET cmtMemID='$cmtMemID', cmtNews='$cmtNews', cmtInfo= '$cmtInfo' WHERE cmtID='$ID'";
	
if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "updateFail";
}

mysqli_close($link);
?>