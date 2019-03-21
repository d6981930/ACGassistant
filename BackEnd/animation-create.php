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
			$("#aniName").bind("input propertychange", function(){
				if($("#aniName").val().length < 2){
					$("#error_aniName").html("帳號不得少於2個字數,謝謝!!");
					$("#error_aniName").css("background-color", "red");
					$("#error_aniName").css("color", "white");
				}else{
					$("#error_aniName").html("");
				}
			});

			$("#reg_ok").bind("click", function(){
				$.ajax({
					type: "POST",
					url: "http://acgassistant2019.000webhostapp.com/BackEnd/animation-create-api.php",
					data: {aniName: $("#aniName").val(),aniPic: $("#aniPic").val(),aniStartDate: $("#aniStartDate").val(),aniEndDate: $("#aniEndDate").val(),aniUplaodDay: $("#aniUplaodDay").val(),aniTrailer: $("#aniTrailer").val(),aniInfo: $("#aniInfo").val()},
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
	          location.href = "animation-read.php";
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
				<label for="aniName">aniName</label>
				<input type="text" name="aniName" id="aniName"/>
			</div>
			<div id="error_aniName"></div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniPic">aniPic</label>
				<input type="text" name="aniPic" id="aniPic"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniStartDate">aniStartDate</label>
				<input type="date" name="aniStartDate" id="aniStartDate"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniEndDate">aniEndDate</label>
				<input type="date" name="aniEndDate" id="aniEndDate"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniUplaodDay">aniUplaodDay</label>
				<input type="text" name="aniUplaodDay" id="aniUplaodDay"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniTrailer">aniTrailer</label>
				<input type="text" name="aniTrailer" id="aniTrailer"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="aniInfo">aniInfo</label>
				<input type="text" name="aniInfo" id="aniInfo"/>
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