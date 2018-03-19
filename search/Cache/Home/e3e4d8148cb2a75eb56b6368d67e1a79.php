<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>BookStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bookstore/Public/css/all.css">
    <link rel="stylesheet" href="/bookstore/Public/css/bootstrap.min.css">
    <script type="text/javascript" src="/bookstore/Public/js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="/bookstore/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function sub(){
      var url="<?php echo U('Home/Index/leavehole');?>";
      var hole_id="<?php echo ($hole_id); ?>";
      var indexurl=$('#hole_id').val();
      var message=$('#message').val();
      $.post(url,{hole_id:hole_id,message:message},
        function(data){
          if(data=="0"){
           alert("你的网络有问题！");
          }else{
            alert("留言成功");
            location.href=indexurl;
          }
      },
      "text");//这里返回的类型有：json,html,xml,text
    }
    </script>
  </head>
  <body>
 
    <nav class="navbar navbar-inverse navbar-right navbar-fixed-top" role="navigation" style="overflow-x:hidden;">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--导航条按钮添加 -->
          <div style="padding:10px 0px 0px 0px" style="width:100%;margin:0 0">
            <div class="form-group col-xs-4">
               <a href="<?php echo U('/Home/Index/shudongcontent',array('hole_id'=>$hole_id));?>" type="button" class="glyphicon glyphicon-chevron-left" style="padding:5px;color:white"></a>
            </div>
            <div class="form-group col-xs-7" style="color:white;font-size:19px">
              我要留言
            </div>
      </div>     
    </nav>
     <input type="hidden" id="hole_id" value="<?php echo U('/Home/Index/shudongcontent',array('hole_id'=>$hole_id));?>">
    <div id="box" style="overflow-x:hidden;">
      <div style="padding:80px 0px 0px 0px ;text-align: center; ">
       <!--textarea 设置ID传值-->
        <textarea rows="8" cols="40" style=" resize:none;" id="message"></textarea>
      </div>
      <div style="padding:30px 0px 30px 30px ">
      <!--跳转-->
      <a type="button" class="btn btn-default" style="padding:5px;color:white;background:#34352C;width:90%;height:100%;" onclick="sub();">发布留言</a>
      </div>

      

    </div>



    
  </body>
</html>