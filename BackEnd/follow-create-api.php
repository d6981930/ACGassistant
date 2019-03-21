<?php
require_once("ACG_tool.php");


$floMemID=$_POST["floMemID"];
$floItemID=$_POST["floItemID"];
$floType=$_POST["floType"];



$link = create_connection();

$sql = "INSERT INTO follow (floID, floMemID, floItemID, floType) VALUES (NULL, '$floMemID','$floItemID', '$floType')";

if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "新增失敗0000000000000";
}
mysqli_close($link);
?>