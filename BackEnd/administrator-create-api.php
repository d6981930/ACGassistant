<?php
require_once("ACG_tool.php");


$admName=$_POST["admName"];
$admPwd=$_POST["admPwd"];


$link = create_connection();

$sql = "INSERT INTO administrator (admID, admName, admPwd) VALUES (NULL, '$admName','$admPwd')";

if(execute_sql($link, "id8606975_acgassistant", $sql)){
	echo 1;
}else{
	echo "新增失敗0000000000000";
}
mysqli_close($link);
?>