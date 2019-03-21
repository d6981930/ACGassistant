<?php
require_once("ACG_tool.php");

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


$link = create_connection();

$sql = "INSERT INTO event (eveID, eveType, eveSubType, eveLocationType, eveName, evePic, eveStartDate, eveEndDate, evelocation, eveWeb, eveMap, eveInfo) VALUES (NULL, 'eve','$eveSubType', '$eveLocationType', '$eveName', '$evePic', '$eveStartDate', '$eveEndDate', '$evelocation', '$eveWeb', '$eveMap', '$eveInfo')";

if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "新增失敗0000000000000";
}
mysqli_close($link);
?>