<?php
require_once("ACG_tool.php");

$ID=$_POST["ID"];
$nwsType=$_POST["nwsType"];
$nwsName=$_POST["nwsName"];
$nwsPic=$_POST["nwsPic"];
$nwsInfo=$_POST["nwsInfo"];

$link=create_connection();
mysqli_query($link,"SET NAMES UTF8");


$sql = "UPDATE news SET nwsType='$nwsType', nwsName='$nwsName', nwsPic= '$nwsPic', nwsInfo= '$nwsInfo' WHERE nwsID='$ID'";
	
if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "updateFail";
}

mysqli_close($link);
?>