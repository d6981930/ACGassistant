<?php
require_once("ACG_tool.php");

$aniName=$_POST["aniName"];
$aniPic=$_POST["aniPic"];
$aniStartDate=$_POST["aniStartDate"];
$aniEndDate=$_POST["aniEndDate"];
$aniUplaodDay=$_POST["aniUplaodDay"];
$aniTrailer=$_POST["aniTrailer"];
$aniInfo=$_POST["aniInfo"];
$aniType="ani";


$link = create_connection();

$sql = "INSERT INTO animation (aniID, aniType, aniName, aniPic, aniStartDate, aniEndDate, aniUplaodDay, aniTrailer, aniInfo) VALUES (NULL, '$aniType','$aniName', '$aniPic', '$aniStartDate', '$aniEndDate', '$aniUplaodDay', '$aniTrailer', '$aniInfo')";

if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "新增失敗0000000000000";
}
mysqli_close($link);
?>