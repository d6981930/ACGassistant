<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>新增</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
		$(function(){
			$("#admName").bind("input propertychange", function(){
				if($("#admName").val().length < 2){
					$("#error_admName").html("帳號不得少於2個字數,謝謝!!");
					$("#error_admName").css("background-color", "red");
					$("#error_admName").css("color", "white");
				}else{
					$("#error_admName").html("");
				}
			});
			$("#admPwd").bind("input propertychange", function(){
				if($("#admPwd").val().length < 2){
					$("#error_admPwd").html("密碼不得少於2個字數,謝謝!!");
					$("#error_admPwd").css("background-color", "red");
					$("#error_admPwd").css("color", "white");
				}else{
					$("#error_admPwd").html("");
				}
			});

			$("#reg_ok").bind("click", function(){
				$.ajax({
					type: "POST",
					url: "http://acgassistant2019.000webhostapp.com/BackEnd/administrator-create-api.php",
					data: {admName: $("#admName").val(),admPwd: $("#admPwd").val()},
					success: reg,
					error:function(){
						alert("新增api回傳失敗");
					}
				}); // end ajax
			});
		}); // end function()


		function reg(data){
	        if(data==1){
	        	alert("新增成功");
	          location.href = "administrator-read.php";
	        }else{
	          alert(data);
	        }
		}
	</script>
</head>
<body>
	<div data-role="page" id="home">
		<div data-role="header" data-position="fixed" id="home" data-theme="b">
			<h1>新增</h1>
		</div>
		<div role="main" class="ui-content">
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="admName">admName</label>
				<input type="text" name="admName" id="admName"/>
			</div>
			<div id="error_admName"></div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="admPwd">admPwd</label>
				<input type="text" name="admPwd" id="admPwd"/>
			</div>
			<div id="error_admPwd"></div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="b" onClick="history.back()">取消</a>	
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" id="reg_ok">確定</a>		
				</div>
			</div>
		</div>
		<div data-role="footer" data-position="fixed" data-theme="b">
			<h1>版權所有</h1>
		</div>
	</div>
</body>
</html>		