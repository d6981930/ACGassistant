<?php
	require_once("ACG_tool.php");
	$link = create_connection();

	$sql = "SELECT * FROM follow ORDER BY floID ASC";

	$result = execute_sql($link, "id8606975_acgassistant", $sql);
	$row = mysqli_fetch_assoc($result);

	$followArray = Array();

	if(mysqli_num_rows($result) > 0){
		do{
			$followArray[] = $row;
		}while($row = mysqli_fetch_assoc($result));

		echo json_encode($followArray);
	}else {
		echo "查無跟隨紀錄!";
	}
	mysqli_close($link);
?>