<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>member</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    	.table mt10{
    		margin-top: 10px;
    	}
      .mr5{
        margin-right: 5px;
        margin-bottom: 5px;
      }     
    </style>

  </head>

  <body>
<!-- //--------------------------- -->
<div class="navbar navbar-duomi navbar-static-top" role="navigation">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" id="logo">會員列表</a>
<!-- <a class="navbar-brand" href="/Admin/index.html" id="logo">動畫列表
</a> -->
</div>
</div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <ul id="main-nav" class="nav nav-tabs nav-stacked" style="">
        <li class="active">
        <a href="#">
          <i class="glyphicon glyphicon-th-large"></i>首页 
        </a>
        </li>
        <li>
        <a href="administrator-read.php">
          <i class="glyphicon glyphicon-credit-card"></i>administrator 管理者 
        </a>
        </li>
        <li>
        <a href="animation-read.php">
          <i class="glyphicon glyphicon-credit-card"></i>animation 動畫管理 
        </a>
        </li>
        <li>
        <a href="comment-read.php">
          <i class="glyphicon glyphicon-credit-card"></i>comment 評論管理 
        </a>
        </li>
        <li>
        <a href="event-read.php">
          <i class="glyphicon glyphicon-credit-card"></i>event 活動事件管理 
        </a>
        </li>
        <li>
        <a href="follow-read.php">
          <i class="glyphicon glyphicon-credit-card"></i>follow 跟隨管理 
        </a>
        </li>
        <li>
        <a href="member-read.php">
          <i class="glyphicon glyphicon-credit-card"></i>member 會員管理 
        </a>
        </li>
        <li>
        <a href="news-read.php">
          <i class="glyphicon glyphicon-credit-card"></i>news 新聞 
        </a>
        </li>
      </ul>
    </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
              <table class="table mt10">
                <thead>
                  <tr>
                    <tr><a href="member-create.php" class="btn btn-sm btn-success mr5">新增</a></tr>
                    <th>memID</th>
                    <th>memName</th>
                    <th>memPwd</th>
                    <th>memEmail</th>
                    <th>編輯</th>
                  </tr>
                </thead>
                <tbody id="member_list">
                </tbody>
              </table>          
          </div>
        </div>
      </div>
  </div>
</div>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script>
    	$(function(){
    		$.ajax({
    			type: "GET",
    			url: "http://acgassistant2019.000webhostapp.com/BackEnd/member-read-api.php",
    			dataType: "json",
    			success: showMember,
    			error:function(){
						alert("會員列表api回傳失敗");
					}
    		});
    	});

    	function showMember(data){
        for(i=0; i<data.length; i++){
          strHTML = "";
          strHTML = '<tr><td>'+data[i].memID+'</td><td>'+data[i].memName+'</td><td>'+data[i].memPwd+'</td><td>'+data[i].memEmail+'</td><td><a href="member-update.php?ID='+data[i].memID+'" class="btn btn-sm btn-primary mr5">更新</a><a data-id="'+data[i].memID+'" href="member-delete-api.php?ID='+data[i].memID+'" class="btn btn-sm btn-danger" onclick="del_item(this)">刪除</a></td></tr>';
          $("#member_list").append(strHTML);
        }
      }
    	
      function del_item(myevent){
        if(confirm("確定刪除資料"+$(myevent).data("id")+"??")){
          $.ajax({
            type: "POST",
            url: "http://acgassistant2019.000webhostapp.com/BackEnd/member-delete-api.php",
            data: {ID: $(myevent).data("id")},
            success:show,
            error: function(){
              alert("刪除資料API失敗");
            }
          });
        }else{

        }
      }

      function show(data){
        if(data){
          alert("刪除資料成功");
          location.href = "member-read.php";
          history.go(0);
        }else{
          alert("刪除會員失敗!");
        }
      }
    </script>
  </body>
</html>