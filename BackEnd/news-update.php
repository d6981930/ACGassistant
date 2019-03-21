<?php
	$newsID=$_GET["ID"];  //這邊要跟read傳過來的一致

	require_once("ACG_tool.php");
	$link=create_connection();
	mysqli_query($link,"SET NAMES UTF8");

	$sql="SELECT * FROM news WHERE nwsID=$newsID";
	$result=execute_sql($link,"id8606975_acgassistant",$sql);


	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		echo $row["nws"];
	}else{
		echo "update error";
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>新聞資料修改</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>

</head>
<body>
	<!-- Home Page -->
	<div data-role="page" id="home">
		<!-- Header -->
		<div data-role="header" data-theme="b" data-position="fixed">
			<h3>新聞資料修改</h3>
			<a href="news-read.php" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a>
		</div>
		<!-- Content -->
		<div role="main" class="ui-content">
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="nwsType">nwsType</label>
				<input type="text" name="nwsType" id="nwsType" value="<?php echo $row["nwsType"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="nwsName">aniPic</label>
				<input type="text" name="nwsName" id="nwsName" value="<?php echo $row["nwsName"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="nwsPic">nwsPic</label>
				<input type="text" name="nwsPic" id="nwsPic" value="<?php echo $row["nwsPic"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="nwsInfo">nwsInfo</label>
				<input type="text" name="nwsInfo" id="nwsInfo" value="<?php echo $row["nwsInfo"]?>"/>
			</div>
			
			<div class="ui-grid">
				<div class="ui-block">
					<a href="" data-role="button" id="btnOK" data-id="<?php echo $row['nwsID']?>">更新</a>
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
						url: "http://acgassistant2019.000webhostapp.com/BackEnd/news-updateAPI.php",
						data:{ID:<?php echo $row['nwsID']?>,nwsType: $("#nwsType").val(),nwsName: $("#nwsName").val(),nwsPic: $("#nwsPic").val(),nwsInfo: $("#nwsInfo").val()},
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
				location.href = "news-read.php";
			}else{
				alert(data);
			}
		}
	</script>
</body>
</html>