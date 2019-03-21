<?php
require_once("ACG_tool.php");


$cmtMemID=$_POST["cmtMemID"];
$cmtNews=$_POST["cmtNews"];
$cmtInfo=$_POST["cmtInfo"];


$link = create_connection();

$sql = "INSERT INTO comment (cmtID, cmtMemID, cmtNews, cmtInfo) VALUES (NULL, '$cmtMemID','$cmtNews', '$cmtInfo')";

if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "新增失敗0000000000000";
}
mysqli_close($link);
?>