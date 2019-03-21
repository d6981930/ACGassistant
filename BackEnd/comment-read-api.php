<?php
	require_once("ACG_tool.php");
	$link = create_connection();

	$sql = "SELECT * FROM comment ORDER BY cmtID ASC";

	$result = execute_sql($link, "id8606975_acgassistant", $sql);
	$row = mysqli_fetch_assoc($result);

	$commentArray = Array();

	if(mysqli_num_rows($result) > 0){
		do{
			$commentArray[] = $row;
		}while($row = mysqli_fetch_assoc($result));

		echo json_encode($commentArray);
	}else {
		echo "查無評論紀錄!";
	}
?>