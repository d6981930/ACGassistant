<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>news新增</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
		$(function(){
			$("#nwsType").bind("input propertychange", function(){
				if($("#nwsType").val().length < 1){
					$("#error_nwsType").html("字數不得少於1個字數,謝謝!!");
					$("#error_nwsType").css("background-color", "red");
					$("#error_nwsType").css("color", "white");
				}else{
					$("#error_nwsType").html("");
				}
			});

			$("#reg_ok").bind("click", function(){
				$.ajax({
					type: "POST",
					url: "http://acgassistant2019.000webhostapp.com/BackEnd/news-create-api.php",
					data: {nwsType: $("#nwsType").val(),nwsName: $("#nwsName").val(),nwsPic: $("#nwsPic").val(),nwsInfo: $("#nwsInfo").val()},
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
	          location.href = "news-read.php";
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
				<label for="nwsType">nwsType</label>
				<input type="text" name="nwsType" id="nwsType"/>
			</div>
			<div id="error_nwsType"></div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="nwsName">nwsName</label>
				<input type="text" name="nwsName" id="nwsName"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="nwsPic">nwsPic</label>
				<input type="text" name="nwsPic" id="nwsPic"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="nwsInfo">nwsInfo</label>
				<input type="text" name="nwsInfo" id="nwsInfo"/>
			</div>
			
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