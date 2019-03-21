<?php
require_once("ACG_tool.php");

$ID=$_POST["ID"];
$aniName=$_POST["aniName"];
$aniPic=$_POST["aniPic"];
$aniStartDate=$_POST["aniStartDate"];
$aniEndDate=$_POST["aniEndDate"];
$aniUplaodDay=$_POST["aniUplaodDay"];
$aniTrailer=$_POST["aniTrailer"];
$aniInfo=$_POST["aniInfo"];


$link=create_connection();
mysqli_query($link,"SET NAMES UTF8");


$sql = "UPDATE animation SET aniName='$aniName', aniPic='$aniPic', aniStartDate= '$aniStartDate', aniEndDate= '$aniEndDate', aniUplaodDay= '$aniUplaodDay', aniTrailer= '$aniTrailer', aniInfo= '$aniInfo' WHERE aniID='$ID'";
	
if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "updateFail";
}

mysqli_close($link);
?>