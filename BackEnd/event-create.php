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

			$("#reg_ok").bind("click", function(){
				$.ajax({
					type: "POST",
					url: "http://acgassistant2019.000webhostapp.com/BackEnd/event-create-api.php",
					data: {eveSubType: $("#eveSubType").val(),eveLocationType: $("#eveLocationType").val(),eveName: $("#eveName").val(),evePic: $("#evePic").val(),eveStartDate: $("#eveStartDate").val(),eveEndDate: $("#eveEndDate").val(),evelocation: $("#evelocation").val(),eveWeb: $("#eveWeb").val(),eveMap: $("#eveMap").val(),eveInfo: $("#eveInfo").val()},
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
	          location.href = "event-read.php";
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
				<label for="eveSubType">eveSubType</label>
				<input type="text" name="eveSubType" id="eveSubType"/>
			</div>
			
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveLocationType">eveLocationType</label>
				<input type="text" name="eveLocationType" id="eveLocationType"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveName">eveName</label>
				<input type="text" name="eveName" id="eveName"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="evePic">evePic</label>
				<input type="text" name="evePic" id="evePic"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveStartDate">eveStartDate</label>
				<input type="date" name="eveStartDate" id="eveStartDate"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveEndDate">eveEndDate</label>
				<input type="date" name="eveEndDate" id="eveEndDate"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="evelocation">evelocation</label>
				<input type="text" name="evelocation" id="evelocation"/>
			</div>
			<!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveWeb">eveWeb</label>
				<input type="text" name="eveWeb" id="eveWeb"/>
			</div><!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveMap">eveMap</label>
				<input type="text" name="eveMap" id="eveMap"/>
			</div><!-- Input -->
			<div data-role="fieldcontain">
				<label for="eveInfo">eveInfo</label>
				<input type="text" name="eveInfo" id="eveInfo"/>
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