<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
		$(function(){
			$("#memName").bind("input propertychange", function(){
				if($("#memName").val().length < 3){
					$("#error_memName").html("帳號不得少於3個字數,謝謝!!");
					$("#error_memName").css("background-color", "red");
					$("#error_memName").css("color", "white");
				}else{
					$("#error_memName").html("");
				}
			});
			$("#memPwd").bind("input propertychange", function(){
				if($("#memPwd").val().length < 6){
					$("#error_memPwd").html("密碼不得少於6個字數,謝謝!!");
					$("#error_memPwd").css("background-color", "red");
					$("#error_memPwd").css("color", "white");
				}else{
					$("#error_memPwd").html("");
				}
			});
			$("#memEmail").bind("input propertychange", function(){
				if($("#memEmail").val().length < 10){
					$("#error_memEmail").html("電子信箱不得少於10個字數,謝謝!!");
					$("#error_memEmail").css("background-color", "red");
					$("#error_memEmail").css("color", "white");
				}else{
					$("#error_memEmail").html("");
				}
			});


			$("#reg_ok").bind("click", function(){
				$.ajax({
					type: "POST",
					url: "http://acgassistant2019.000webhostapp.com/BackEnd/member-create-api.php",
					data: {memName: $("#memName").val(),memPwd: $("#memPwd").val(),memEmail: $("#memEmail").val()},
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
	          location.href = "member-read.php";
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
				<label for="memName">memName帳號</label>
				<input type="text" name="memName" id="memName"/>
			</div>
			<div id="error_memName"></div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="memPwd">memPwd密碼</label>
				<input type="text" name="memPwd" id="memPwd"/>
			</div>
			<div id="error_memPwd"></div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="memEmail">memEmail電子信箱</label>
				<input type="text" name="memEmail" id="memEmail"/>
			</div>
			<div id="error_memEmail"></div>

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