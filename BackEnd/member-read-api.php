<?php
	require_once("ACG_tool.php");
	$link = create_connection();

	$sql = "SELECT * FROM member ORDER BY memID ASC";

	$result = execute_sql($link, "id8606975_acgassistant", $sql);
	$row = mysqli_fetch_assoc($result);

	$memberArray = Array();

	if(mysqli_num_rows($result) > 0){
		do{
			$memberArray[] = $row;
		}while($row = mysqli_fetch_assoc($result));

		echo json_encode($memberArray);
	}else {
		echo "查無會員紀錄!";
	}
?>