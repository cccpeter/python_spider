<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>BookStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/bookstore/Public/css/all.css">
    <link rel="stylesheet" href="/bookstore/Public/css/bootstrap.min.css">
    <script type="text/javascript" src="/bookstore/Public/js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="/bookstore/Public/js/bootstrap.min.js"></script>
  </head>
  <body style="margin-bottom:30px;">
  <nav class="navbar navbar-inverse navbar-right navbar-fixed-top" role="navigation"  style="overflow-x:hidden">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--导航条按钮添加 -->
           <div style="padding:10px 0px 0px 0px" style="width:100%;margin:0 0">
           <div class="form-group col-xs-5">
               <a href="<?php echo U('Index/orderlist');?>" type="button" class="glyphicon glyphicon-chevron-left" style="padding:5px;color:white"></a>
            </div>
            <div class="form-group col-xs-6" style="color:white;font-size:19px">
              订单详情
            </div>
            
      </div>     
      </div>     
    </nav>
  <div class="container" >
  <div class="row border_btm" style="font-size:18px;padding:40px 10px 0px 0px;">
        <div class="col-xs-3" >
            <img src="/bookstore/Public/uploads/<?php echo ($order['user_photo']); ?>" width="100px" height="100px">
          </div>
        <div class="col-xs-8" style=" text-align: left; ">
          <span style="font-size:16px;padding:20px 0px 0px 0px;">
              <?php echo ($order['user_name']); ?>
          </span>
        </div>
      </div>
      <div class="row border_btm" style="font-size:18px;padding:20px 10px 0px 0px;">
          <div class="col-xs-4" >
            书名：
          </div>
          <div class="col-xs-8" style=" text-align: right; ">
             <?php echo ($book['book_name']); ?>
          </div>
        </div>
        <div class="row border_btm" style="font-size:18px;padding:10px 0px">
          <div class="col-xs-4" >
            作者：
          </div>
          <div class="col-xs-8" style=" text-align: right; ">
            <?php echo ($book['book_author']); ?>
            </div>
        </div>
        <div class="row border_btm" style="font-size:18px;padding:10px 0px">
          <div class="col-xs-3" >
            数量：
          </div>
          <div class="col-xs-8" style=" text-align: right; ">
            <?php echo ($book['book_number']); ?>
            </div>
        </div>
        <div class="row border_btm" style="font-size:18px;padding:10px 0px">
          <div class="col-xs-4" >
            价格：
          </div>
          <div class="col-xs-8" style=" text-align: right; ">
            <?php echo ($book['book_price']); ?>
            </div>
        </div>
        <div class="row border_btm" style="font-size:18px;padding:10px 0px">
          <div class="col-xs-4" >
            几成新
          </div>
          <div class="col-xs-8" style=" text-align: right; ">
            <?php echo ($book['book_old']); ?>
            </div>
          </div>
        <div class="row border_btm" style="font-size:18px;padding:10px 0px">
          <div class="col-xs-4" >
            简介：
          </div>
          <div class="col-xs-8" style=" text-align: right; ">
            <!--textarea 设置ID传值-->
            <?php echo ($book['book_content']); ?>
          </div>
        </div>
        <div class="row border_btm" style="font-size:18px;padding:10px 0px">
          <div class="col-xs-4" >
            买家留言：
          </div>
          <div class="col-xs-9" style=" text-align: right; ">
            <!--textarea 设置ID传值-->
            <?php echo ($order['order_remark']); ?>
          </div>
        </div>
        <div class="row border_btm" style="font-size:18px;padding:10px 0px">
          
          <div class="col-xs-4" >
            下单时间：
          </div>
          <div class="col-xs-8" style=" text-align: right; ">
            <!--textarea 设置ID传值-->
            <?php echo ($order['time']); ?>
          </div>
        </div>
        <div class="row " style="font-size:18px;padding:10px 0px">
          <div class="col-xs-4" >
            收货地址：
          </div>
          <div style="font-size:14px;color:#727272;text-align:right;">*仅在本校范围内</div>
          </div>
        </div>
    </div>
    <nav class="navbar navbar-inverse  navbar-fixed-bottom" role="navigation" style=" overflow-x:hidden;">
   
    
      <div class="col-xs-6" style="text-align: left; padding:10px;">

        <label class="glyphicon glyphicon-shopping-cart" style="font-size:18px;color:white;"><?php echo ($book['book_price']); ?></label>
      </div>       
    </nav>

       
  </body>
</html>