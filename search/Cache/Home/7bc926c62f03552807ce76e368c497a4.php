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
    function sclick(hole_id){  
      var url="<?php echo U('Index:shudongcontent');?>"+"?hole_id="+hole_id;
      onclick=window.open(url);
    }
    </script>
  </head>
  <body style="margin-bottom:80px;">
  <nav class="navbar navbar-inverse navbar-right navbar-fixed-top" role="navigation"  style="width:100%;margin:0 0">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--导航条按钮添加 -->
           <div style="padding:10px 0px 0px 0px" style="width:100%;margin:0 0">
           <div class="form-group col-xs-7" style="color:white;font-size:19px; text-align: right; ">
              消息
            </div>
            
      </div>     
      </div>     
    </nav>
  <div class="container"  style="margin-top:45px; ">
  <!-- 遍历 -->
  <?php if(is_array($holemessage)): foreach($holemessage as $key=>$vo): ?><div class="row " style="padding:15px  0px;"   onclick="sclick('<?php echo ($vo["hole_id"]); ?>')">
        <div class="col-xs-2" >
           <a href="#" ><!--用户头像-->
            <img src="/bookstore/Public/uploads/<?php echo ($vo["user_photo"]); ?>" width="40px" height="40px">
          </a>
        </div>
        <div class="col-xs-10" style="font-size:16px">
          <p>
            <span ><?php echo ($vo["user_name"]); ?></span>
            <span style="padding:0px 0px 0px 80px"><?php echo ($vo["holemessage_time"]); ?></span>
          </p>                    
          <div class="border_btm" style="font-size:16px;word-wrap: break-word;">
             回复内容:
             &nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["holemessage_message"]); ?>
        </div>
        <div style="font-size:14px;word-wrap: break-word;color:#727272;">
            来源于：<?php echo ($vo["hole_message"]); ?>
        </div>
        </div>
      </div><?php endforeach; endif; ?>
    </div>
      

    <!-- 底栏 -->
    <nav class="navbar navbar-inverse  navbar-fixed-bottom" role="navigation" style="width:100%;margin:0 0" >
    
        <ul class="nav navbar-nav " >
          <li class="li-style col-xs-3">
            <a href="<?php echo U('/home/Index/index');?>" class="btn btn-lg buttom">
              <span class="glyphicon glyphicon-home " aria-hidden="true"></span>
            </a>
          </li>
          <li class="li-style ">
            <a href="<?php echo U('/home/Index/shudong');?>" class="btn btn-lg buttom">
              <span class="glyphicon glyphicon-comment " aria-hidden="true"></span>
            </a> 
          </li>
          <li class="li-style col-xs-3 ">
            <a href="<?php echo U('/home/Index/addgoods');?>" class="btn btn-lg buttom">
              <span class="glyphicon glyphicon-plus " aria-hidden="true"></span>
            </a>
          </li> 
          <li class=" active  li-style  ">
            <a href="<?php echo U('/home/Index/message');?>" class="btn btn-lg buttom">
              <span class="glyphicon glyphicon-envelope " aria-hidden="true"></span>
            </a> 
          </li>
          <li class="li-style  col-xs-2">
            <a href="<?php echo U('/home/Index/personal');?>" class="btn btn-lg buttom">
              <span class="glyphicon glyphicon-user " aria-hidden="true"></span>
            </a> 
          </li>
     
        </ul>
</nav>
</div>
  
    
  </body>
</html>