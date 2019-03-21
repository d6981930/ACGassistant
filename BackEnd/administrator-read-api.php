<?php
	require_once("ACG_tool.php");
	$link = create_connection();

	$sql = "SELECT * FROM administrator ORDER BY admID ASC";

	$result = execute_sql($link, "id8606975_acgassistant", $sql);
	$row = mysqli_fetch_assoc($result);

	$administratorArray = Array();

	if(mysqli_num_rows($result) > 0){
		do{
			$administratorArray[] = $row;
		}while($row = mysqli_fetch_assoc($result));

		echo json_encode($administratorArray);
	}else {
		echo "查無會員(administrator)紀錄!";
	}
	mysqli_close($link);
?>