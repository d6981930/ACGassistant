<?php
	$memID = $_GET["ID"];

	require_once("ACG_tool.php");
	$link = create_connection();//
	$sql = "DELETE FROM member WHERE memID = $memID";

	if (execute_sql($link,"id8606975_acgassistant",$sql)) {
		// echo 1;//刪除成功自動換頁
		header('Location: member-read.php');
		history.go(0);
	}else{
		echo 0;//刪除失敗
	}

?>
