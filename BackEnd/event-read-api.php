<?php
	require_once("ACG_tool.php");
	$link = create_connection();

	$sql = "SELECT * FROM event ORDER BY eveID ASC";

	$result = execute_sql($link, "id8606975_acgassistant", $sql);
	$row = mysqli_fetch_assoc($result);

	$eventArray = Array();

	if(mysqli_num_rows($result) > 0){
		do{
			$eventArray[] = $row;
		}while($row = mysqli_fetch_assoc($result));

		echo json_encode($eventArray);
	}else {
		echo "查無活動事件紀錄!";
	}
?>