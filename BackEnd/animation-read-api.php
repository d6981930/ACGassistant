<?php
	require_once("ACG_tool.php");
	$link = create_connection();

	$sql = "SELECT * FROM animation ORDER BY aniID ASC";

	$result = execute_sql($link, "id8606975_acgassistant", $sql);
	$row = mysqli_fetch_assoc($result);

	$animationArray = Array();

	if(mysqli_num_rows($result) > 0){
		do{
			$animationArray[] = $row;
		}while($row = mysqli_fetch_assoc($result));

		echo json_encode($animationArray);
	}else {
		echo "查無動漫紀錄!";
	}
?>