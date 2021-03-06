<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>BookStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bookstore/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bookstore/Public/css/all.css">
    <script src="/bookstore/Public/jq/jquery-3.1.0.min.js"></script>
    <script src="/bookstore/Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function del(book_id){
      var url="<?php echo U('Index/insalebook');?>";
      $.post(url,{book_id:book_id},
        function(data){
          if(data=="0"){
           alert("你的网络有问题！");
          }else{
            alert("下架成功");
          }
      },
      "text");
    }
    </script>
  </head>
  <body style="padding-bottom:20px">
 
    <nav class="navbar navbar-inverse navbar-right navbar-fixed-top" role="navigation" style=" overflow-x:hidden;">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--导航条按钮添加 -->
          <div style="padding:10px 0px 0px 0px" style="width:100%;margin:0 0">
            <div class="form-group col-xs-4">
               <a href="<?php echo U('Index/personal');?>" type="button" class="glyphicon glyphicon-chevron-left" style="padding:5px;color:white"></a>
            </div>
            <div class="form-group col-xs-7" style="color:white;font-size:19px">
              在售书籍列表
            </div>
      </div>     
    </nav>
    <div style="padding:30px 0px"></div>
   <!--商品详情图片-->
   <?php if(is_array($book)): foreach($book as $key=>$vo): ?><div class="container-fuild" style=" overflow-x:hidden;padding:5px 0px ;">      
      <div class="row" style="font-size:16px;line-height:28px;border-bottom:1px solid #C3C5C9;">
        <div class="col-xs-4 " style="text-align:center">
          <a href="#" >
              <img src="/bookstore/Public/uploads/<?php echo ($vo["book_urls"]); ?>"
                   alt="通用的占位符缩略图" width="100px" height="80px"> 
          </a>
        </div>
        <div class="col-xs-8" style="float:left">
           <span >
              <?php echo ($vo["book_name"]); ?> | <?php echo ($vo["book_author"]); ?>
            </span>
            <div  style="color:#ED6F00;font-size:16px">
               <?php echo ($vo["book_price"]); ?>
            </div>
            <div  style="font-size:14px">
              <span>交易状态：</span>
              <span style="color:#ED6F00;">待售</span>
              
              <span style="color:#ED6F00;">
                <button style="margin-left:65px" type="button" class="btn btn-default" onclick="del(<?php echo ($vo["book_id"]); ?>);">下架</button>
              </span>
            </div>
        </div>              
      </div>      
    </div><?php endforeach; endif; ?>
 
  </body>
</html>