<?php
	$memberID=$_GET["ID"];  //這邊要跟read傳過來的一致

	require_once("ACG_tool.php");
	$link=create_connection();
	mysqli_query($link,"SET NAMES UTF8");

	$sql="SELECT * FROM member WHERE memID=$memberID";
	$result=execute_sql($link,"id8606975_acgassistant",$sql);


	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		echo $row["mem"];
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
			<h3>會員資料修改</h3>
			<a href="member-read.php" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a>
		</div>
		<!-- Content -->
		<div role="main" class="ui-content">
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="memName">memName帳號</label>
				<input type="text" name="memName" id="memName" value="<?php echo $row["memName"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="memPwd">memPwd密碼</label>
				<input type="text" name="memPwd" id="memPwd" value="<?php echo $row["memPwd"]?>"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="memEmail">memEmail電子信箱</label>
				<input type="text" name="memEmail" id="memEmail" value="<?php echo $row["memEmail"]?>"/>
			</div>
			
			<div class="ui-grid">
				<div class="ui-block">
					<a href="" data-role="button" id="btnOK" data-id="<?php echo $row['memID']?>">更新</a>
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
						url: "http://acgassistant2019.000webhostapp.com/BackEnd/member-updateAPI.php",
						data:{ID:<?php echo $row['memID']?>,memName: $("#memName").val(),memPwd: $("#memPwd").val(),memEmail: $("#memEmail").val()},
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
				location.href = "member-read.php";
			}else{
				alert(data);
			}
		}
	</script>
</body>
</html>