<?php
require_once("ACG_tool.php");

$memName=$_POST["memName"];
$memPwd=$_POST["memPwd"];
$memEmail=$_POST["memEmail"];

$link = create_connection();

$sql = "INSERT INTO member (memID, memName, memPwd, memEmail) VALUES (NULL, '$memName','$memPwd', '$memEmail')";

if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "新增失敗0000000000000";
}
mysqli_close($link);
?>