<?php
	$animationID=$_GET["ID"];  //這邊要跟read傳過來的一致

	require_once("ACG_tool.php");
	$link=create_connection();
	mysqli_query($link,"SET NAMES UTF8");

	$sql="SELECT * FROM animation WHERE aniID=$animationID";
	$result=execute_sql($link,"id8606975_acgassistant",$sql);


	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		echo $row["ani"];
	}else{
		echo "update error";
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>

</head>
<body>
	<!-- Home Page -->
	<div data-role="page" id="home">
		<!-- Header -->
		<div data-role="header" data-theme="b" data-position="fixed">
			<h3>動畫資料修改</h3>
			<a href="animation-read.php" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a>
		</div>
		<!-- Content -->
		<div role="main" class="ui-content">
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniName">aniName</label>
				<input type="text" name="aniName" id="aniName" value="<?php echo $row["aniName"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniPic">aniPic</label>
				<input type="text" name="aniPic" id="aniPic" value="<?php echo $row["aniPic"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniStartDate">aniStartDate</label>
				<input type="text" name="aniStartDate" id="aniStartDate" value="<?php echo $row["aniStartDate"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniEndDate">aniEndDate</label>
				<input type="text" name="aniEndDate" id="aniEndDate" value="<?php echo $row["aniEndDate"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniUplaodDay">aniUplaodDay</label>
				<input type="text" name="aniUplaodDay" id="aniUplaodDay" value="<?php echo $row["aniUplaodDay"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniTrailer">aniTrailer</label>
				<input type="text" name="aniTrailer" id="aniTrailer" value="<?php echo $row["aniTrailer"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniInfo">aniInfo</label>
				<input type="text" name="aniInfo" id="aniInfo" value="<?php echo $row["aniInfo"]?>"/>
			</div>
			
			<div class="ui-grid">
				<div class="ui-block">
					<a href="" data-role="button" id="btnOK" data-id="<?php echo $row['aniID']?>">更新</a>
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
						url: "http://acgassistant2019.000webhostapp.com/BackEnd/animation-updateAPI.php",
						data:{ID:<?php echo $row['aniID']?>,aniName: $("#aniName").val(),aniPic: $("#aniPic").val(),aniStartDate: $("#aniStartDate").val(),aniEndDate: $("#aniEndDate").val(),aniUplaodDay: $("#aniUplaodDay").val(),aniTrailer: $("#aniTrailer").val(),aniInfo: $("#aniInfo").val()},
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
				location.href = "animation-read.php";
			}else{
				alert(data);
			}
		}
	</script>
</body>
</html>