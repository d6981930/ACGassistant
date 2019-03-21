<?php
	$eventID=$_GET["ID"];  //這邊要跟read傳過來的一致

	require_once("ACG_tool.php");
	$link=create_connection();
	mysqli_query($link,"SET NAMES UTF8");

	$sql="SELECT * FROM event WHERE eveID=$eventID";
	$result=execute_sql($link,"id8606975_acgassistant",$sql);


	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		echo $row["eve"];
	}else{
		echo "update error";
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>活動事件資料修改</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>

</head>
<body>
	<!-- Home Page -->
	<div data-role="page" id="home">
		<!-- Header -->
		<div data-role="header" data-theme="b" data-position="fixed">
			<h3>活動事件資料修改</h3>
			<a href="event-read.php" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a>
		</div>
		<!-- Content -->
		<div role="main" class="ui-content">
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveSubType">eveSubType</label>
				<input type="text" name="eveSubType" id="eveSubType" value="<?php echo $row["eveSubType"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveLocationType">eveLocationType</label>
				<input type="text" name="eveLocationType" id="eveLocationType" value="<?php echo $row["eveLocationType"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveName">eveName</label>
				<input type="text" name="eveName" id="eveName" value="<?php echo $row["eveName"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="evePic">evePic</label>
				<input type="text" name="evePic" id="evePic" value="<?php echo $row["evePic"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveStartDate">eveStartDate</label>
				<input type="date" name="eveStartDate" id="eveStartDate" value="<?php echo $row["eveStartDate"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveEndDate">eveEndDate</label>
				<input type="date" name="eveEndDate" id="eveEndDate" value="<?php echo $row["eveEndDate"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="evelocation">evelocation</label>
				<input type="text" name="evelocation" id="evelocation" value="<?php echo $row["evelocation"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveWeb">eveWeb</label>
				<input type="text" name="eveWeb" id="eveWeb" value="<?php echo $row["eveWeb"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveMap">eveMap</label>
				<input type="text" name="eveMap" id="eveMap" value="<?php echo $row["eveMap"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveInfo">eveInfo</label>
				<input type="text" name="eveInfo" id="eveInfo" value="<?php echo $row["eveInfo"]?>"/>
			</div>
			
			<div class="ui-grid">
				<div class="ui-block">
					<a href="" data-role="button" id="btnOK" data-id="<?php echo $row['eveID']?>">更新</a>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<div data-role="footer" data-theme="b" data-position="fixed">
			<h4>版權所有</h4>
		</div>
	</div>
	<script>
		$(function(){
			$("#btnOK").bind("click",function(){
				if (confirm("確認更新資料"+$(this).data("id")+"的資料?")) {
					$.ajax({
						type:"POST",
						url: "http://acgassistant2019.000webhostapp.com/BackEnd/event-updateAPI.php",
						data:{ID:<?php echo $row['eveID']?>,eveSubType: $("#eveSubType").val(),eveLocationType: $("#eveLocationType").val(),eveName: $("#eveName").val(),evePic: $("#evePic").val(),eveStartDate: $("#eveStartDate").val(),eveEndDate: $("#eveEndDate").val(),evelocation: $("#evelocation").val(),eveWeb: $("#eveWeb").val(),eveMap: $("#eveMap").val(),eveInfo: $("#eveInfo").val()},
						success:update,
						error:function(){
							alert("更新api回傳失敗");
						}
					});	//ajax end
				}else{
				}
			});
		});
		function update(data){
			if(data == 1){
				alert("更新成功");
				location.href = "event-read.php";
			}else{
				alert(data);
			}
		}
	</script>
</body>
</html>