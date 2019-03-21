<?php
require_once("ACG_tool.php");

$ID=$_POST["ID"];
$eveSubType=$_POST["eveSubType"];
$eveLocationType=$_POST["eveLocationType"];
$eveName=$_POST["eveName"];
$evePic=$_POST["evePic"];
$eveStartDate=$_POST["eveStartDate"];
$eveEndDate=$_POST["eveEndDate"];
$evelocation=$_POST["evelocation"];
$eveWeb=$_POST["eveWeb"];
$eveMap=$_POST["eveMap"];
$eveInfo=$_POST["eveInfo"];


$link=create_connection();
mysqli_query($link,"SET NAMES UTF8");


$sql = "UPDATE event SET eveSubType='$eveSubType', eveLocationType='$eveLocationType', eveName= '$eveName', evePic= '$evePic', eveStartDate= '$eveStartDate', eveEndDate= '$eveEndDate', evelocation= '$evelocation', eveWeb= '$eveWeb', eveMap= '$eveMap', eveInfo= '$eveInfo' WHERE eveID='$ID'";
	
if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "updateFail";
}

mysqli_close($link);
?>