<?php
	require_once("ACG_tool.php");
	$link = create_connection();

	$sql = "SELECT * FROM news ORDER BY nwsID ASC";

	$result = execute_sql($link, "id8606975_acgassistant", $sql);
	$row = mysqli_fetch_assoc($result);

	$newsArray = Array();

	if(mysqli_num_rows($result) > 0){
		do{
			$newsArray[] = $row;
		}while($row = mysqli_fetch_assoc($result));

		echo json_encode($newsArray);
	}else {
		echo "查無新聞紀錄!";
	}
?>