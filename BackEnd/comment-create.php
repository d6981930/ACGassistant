<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>comment新增</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
		$(function(){
			$("#cmtMemID").bind("input propertychange", function(){
				if($("#cmtMemID").val().length < 1){
					$("#error_cmtMemID").html("字數不得少於1個字數,謝謝!!");
					$("#error_cmtMemID").css("background-color", "red");
					$("#error_cmtMemID").css("color", "white");
				}else{
					$("#error_cmtMemID").html("");
				}
			});
			$("#cmtNews").bind("input propertychange", function(){
				if($("#cmtNews").val().length < 1){
					$("#error_cmtNews").html("字數不得少於1個字數,謝謝!!");
					$("#error_cmtNews").css("background-color", "red");
					$("#error_cmtNews").css("color", "white");
				}else{
					$("#error_cmtNews").html("");
				}
			});
			$("#cmtInfo").bind("input propertychange", function(){
				if($("#cmtInfo").val().length < 2){
					$("#error_cmtInfo").html("帳號不得少於2個字數,謝謝!!");
					$("#error_cmtInfo").css("background-color", "red");
					$("#error_cmtInfo").css("color", "white");
				}else{
					$("#error_cmtInfo").html("");
				}
			});


			$("#reg_ok").bind("click", function(){
				$.ajax({
					type: "POST",
					url: "http://acgassistant2019.000webhostapp.com/BackEnd/comment-create-api.php",
					data: {cmtMemID: $("#cmtMemID").val(),cmtNews: $("#cmtNews").val(),cmtInfo: $("#cmtInfo").val()},
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
	          location.href = "comment-read.php";
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
				<label for="cmtMemID">cmtMemID</label>
				<input type="text" name="cmtMemID" id="cmtMemID"/>
			</div>
			<div id="error_cmtMemID"></div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="cmtNews">cmtNews</label>
				<input type="text" name="cmtNews" id="cmtNews"/>
			</div>
			<div id="error_cmtNews"></div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="cmtInfo">cmtInfo</label>
				<input type="text" name="cmtInfo" id="cmtInfo"/>
			</div>
			<div id="error_cmtInfo"></div>
			
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