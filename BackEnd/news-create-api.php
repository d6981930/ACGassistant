<?php
require_once("ACG_tool.php");

$nwsType=$_POST["nwsType"];
$nwsName=$_POST["nwsName"];
$nwsPic=$_POST["nwsPic"];
$nwsInfo=$_POST["nwsInfo"];


$link = create_connection();

$sql = "INSERT INTO news (nwsID, nwsType, nwsName, nwsPic, nwsInfo) VALUES (NULL, '$nwsType','$nwsName', '$nwsPic', '$nwsInfo')";

if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "新增失敗0000000000000";
}
mysqli_close($link);
?>