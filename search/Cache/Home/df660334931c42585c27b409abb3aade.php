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
  <body>
  <nav class="navbar navbar-inverse navbar-right navbar-fixed-top" role="navigation"  style="width:100%;margin:0 0">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--导航条按钮添加 -->
          <div style="padding:10px 0px 0px 0px" style="width:100%;margin:0 0">
            <div class="form-group col-xs-4">
               <a  type="button" class="glyphicon glyphicon-chevron-left" style="padding:5px;color:white"></a>
            </div>
            <div class="form-group col-xs-7" style="color:white;font-size:19px">
              书籍留言
            </div>
      </div>         
      </div>     
    </nav>
  <div class="container"  style="padding:60px 0px 0px 0px;overflow-x:hidden;">
  <!-- 遍历 -->
  <?php if(is_array($holemessage)): foreach($holemessage as $key=>$vo): ?><div class="row border_btm"  onclick="sclick('<?php echo ($vo["book_id"]); ?>')">
        <div class="col-xs-3" >
           <a href="#" ><!--用户头像-->
            <img src="/bookstore/Public/uploads/<?php echo ($vo["user_photo"]); ?>" width="70px" height="50px">
          </a>
        </div>
        <div class="col-xs-8" style="border-left:1px solid #666;padding:0px 0px 0px 10px;font-size:16px">
          <p>
            <span ><?php echo ($vo["user_name"]); ?></span>
            <span style="padding:0px 0px 0px 80px"><?php echo ($vo["message_time"]); ?></span>
          </p>                    
          <div style="font-size:16px;word-wrap: break-word;">
             回复内容:
             &nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["message_content"]); ?>
        </div>
        <div style="font-size:14px;word-wrap: break-word;color:#727272;">
            来源于：<?php echo ($vo["book_name"]); ?>
        </div>
        </div>
      </div><?php endforeach; endif; ?>
    </div>
      

    <!-- 底栏 -->
  
</div>
  
    
  </body>
</html>