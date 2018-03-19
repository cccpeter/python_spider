<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>吴阿贵</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/jewelry/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/jewelry/Public/css/all.css">
    <script src="/jewelry/Public/jq/jquery-3.1.0.min.js"></script>
    <script src="/jewelry/Public/bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
      .p-style{
        padding:2px 20px;
        border-bottom:1px solid #ABABAB;
      }
      .word_hidden
        {

          overflow:hidden; 

          text-overflow:ellipsis;

          display:-webkit-box; 

          -webkit-box-orient:vertical;

          -webkit-line-clamp:3; 
        }
        .price_style
        {
          color:#ED6F00;
          font-size:15px;

        }
        .fsize{
          font-size: 16px;
        }
    </style>
    <script type="text/javascript">
    function sclick(goods_id){  
      var url="<?php echo U('Home/Index/shopcontent');?>"+"?goods_id="+goods_id;
      onclick=window.open(url);
    }
    </script>
  </head>
  <body style="margin-bottom:5px">
    <nav class="navbar navbar-default" role="navigation" height="20px"> 
    <div class="container"> 
        <ul class="nav navbar-nav" style="padding:0 0 0 50px">
            <li class="fsize"><a href="<?php echo U('Index/index');?>">首页</a></li>
            <li class="fsize"><a href="<?php echo U('Search/index');?>">搜索</a></li>
            <li class="fsize"><a href="<?php echo U('Index/personal');?>">我的</a></li>
        </ul>
    
        <ul class="nav navbar-nav navbar-right"> 
            <li class="fsize"><a href="<?php echo U('Index/loginout');?>"><span class="glyphicon glyphicon-log-in"></span> 退出</a></li> 
        </ul>
    </div> 
</nav>

  
  <div class="container" style="width:80%;height:25%;">
        


    <div style="width:22%;float:left"">
      <img src="/jewelry/Public/images/bookstores.png"
                 alt="通用的占位符缩略图" width="230px" height="74px">
    <div style="border-bottom:2px solid #ABABAB;border-top:1px solid #ABABAB;border-right:2px solid #ABABAB;border-left:2px solid #ABABAB;width:100%;height:100%;">
       <div class="col-xs-12" style="padding:2px 0px 0px 0px">
            <p  style="font-size:16px;background-color:#FFCCCC;color:white">首饰类别</p>
            
      <?php if(is_array($type)): foreach($type as $key=>$vo): ?><p class="p-style">
          <a href="<?php echo U('Home/Search/type',array('type_id'=>$vo['type_id']));?>">
            <span class="glyphicon glyphicon-resize-small" style="font-size:20px; "><?php echo ($vo["type_name"]); ?></span>
          </a>
        </p><?php endforeach; endif; ?>

      </div>
    </div><!--导航栏结束-->


    <!--留言栏目，7-->


    <div style="margin-top:-10px;border-bottom:2px solid #ABABAB;border-top:2px solid #ABABAB;border-right:2px solid #ABABAB;border-left:2px solid #ABABAB;width:100%;height:100%;">
      <div class="col-xs-12" style="padding:0px 0px">
        <p  style="font-size:16px;background-color:#FFCCCC;color:white">最新留言</p>
      <?php if(is_array($message)): foreach($message as $key=>$vo): ?><div  class="row" style="border-bottom:1px solid #ABABAB;margin-right:-4px " onclick="sclick('<?php echo ($vo["book_id"]); ?>')">
          <div class="col-xs-3" style="  border-right:1px solid #666;">
            <a href="#" >
            <!--用户头像-->
               <img src="/jewelry/Public/uploads/<?php echo ($vo["user_photo"]); ?>" width="100%" height="100%">
            </a>
          </div>
          <div class="col-xs-8" style="padding:0px 0px 0px 10px;font-size:16px">
            <p>
              <span><?php echo ($vo["user_name"]); ?></span>
              <span style="padding:0px 0px 0px 30px ;font-size:13px"> <?php echo ($vo["message_time"]); ?></span>
            </p>
            <div class="word_hidden" style="font-size:14px;">
              <?php echo ($vo["message_content"]); ?>
            </div>
          </div>
        </div><?php endforeach; endif; ?>
      </div><!--留言板-->

    </div>

  </div>
    <!--索索栏目-->
  <form action="<?php echo U('Search/index');?>" method="post">
    <div style="width:78%;margin-top:20px;margin-bottom:20px;float:right;"">
      <div class="col-xs-2" style=" text-align: right; vertical-align: center; padding:6px 1px 1px 1px">
        <span >搜索首饰</span>
      </div>
      <div class="col-xs-7">
        <input type="text" class="form-control" name="search" placeholder="请输入要搜索的首饰" size="10">  
      </div>
      <div class="col-xs-3">
        <button type="submit" class="btn btn-default">搜索</button>
      </div>
    </div>
    <div id="myCarousel" class=" carousel slide" style="width:78%;height:25%;float:right;">
  </form>
      <!-- 轮播（Carousel）指标 -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>   
      <!-- 轮播（Carousel）项目 -->
      <div class="carousel-inner" >
        <div class="item active" >
          <img src="/jewelry/Public/uploads/one.jpg" alt="Third slide" style="width:900px;height:240px">
        </div>
        <div class="item" >
          <img src="/jewelry/Public/uploads/two.jpg" alt="Third slide" style="width:900px;height:240px">
        </div>
        <div class="item" >
          <img src="/jewelry/Public/uploads/th.jpg" alt="Third slide" style="width:900px;height:240px">
        </div>
      </div>
      <!-- 轮播（Carousel）导航 -->
      <a class="carousel-control left" href="#myCarousel" 
         data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#myCarousel" 
         data-slide="next">&rsaquo;</a>
    </div>


    <!-- 新书上架 12个-->


    <div style="width:78%;height:25%;float:right;padding:20px 0px 0px  0px">
      <div class="row " style="width:100%;margin-top:-21px;margin-left:1px;border-bottom:2px solid #FFCCCC;border-left:1px solid #FFCCCC;border-right:1px solid #FFCCCC;border-top:1px solid #FFCCCC;padding:5px 0px 0px 3px;">
        <div class="col-xs-12" style="text-align:left;padding:5px;font-size:18px; ">
          <a href="#">          
            新品上架
          </a>
        </div>
        

      </div>
    <link href="/jewelry/Public/css/index.css" type="text/css" rel="stylesheet">
      <div class="row" style="width:100%;font-size:16px;line-height:30px;padding:5px 0px 3px 0px;border-bottom:1px solid #FFCCCC;border-left:1px solid #FFCCCC;border-right:1px solid #FFCCCC;margin-left:1px;">
        <div class="row">
        <?php if(is_array($goods)): foreach($goods as $key=>$vo): ?><div class="col-sm-6 col-md-3" onclick="sclick('<?php echo ($vo["goods_id"]); ?>')" >
               <!-- <div class="thumbnail">
                  <img src="/jewelry/Public/uploads/<?php echo ($vo["goods_urls"]); ?>" 
                   alt="通用的占位符缩略图" style="width:160px;height:105px">
                  <div class="caption">
                      <h5><?php echo ($vo["goods_name"]); ?>|<?php echo ($vo["goods_author"]); ?></h5>
                      <p class="price_style"><?php echo ($vo["goods_price"]); ?></p>
                      
                  </div>
               </div> -->
               <li class="fore1" >            
            <div class="p-img">
                <img data-lazy-img="done"  width="130" height="130" title="<?php echo ($vo["goods_content"]); ?>" src="/jewelry/Public/uploads/<?php echo ($vo["goods_url"]); ?>" class="">
            </div>                
            <div class="p-info"> 
              <div class="p-name">
                <a href="#" target="_blank" title="<?php echo ($vo["goods_content"]); ?>" style="color: #666;font: 12px/150% Arial,Verdana;" ><?php echo ($vo["goods_content"]); ?>
                </a>
              </div>
              <div class="p-price" data-lazyload-fn="done"><a style="color:red;"><i>¥</i><?php echo ($vo["goods_price"]); ?></a></div>            
            </div>        
          </li> 
          </div><?php endforeach; endif; ?>

        </div>
      </div>

    </div> 
  </div>


   <div><!--底部了-->
  <div class="container" style="width:78%;padding:20px 0px 0px  0px ;height:25%;border-top:2px solid #FFCCCC;">
    <div style="text-align:center;">
      <div  class="col-xs-4" style="border-right:1px solid #ABABAB;">
        <img src="/jewelry/Public/images/zheng.png" class="img-circle" width="70px" height="70px">
        正品保障
      </div>
      <div class="col-xs-4" style="border-right:1px solid #ABABAB;；">
        <img src="/jewelry/Public/images/gou.png" class="img-circle" width="70px" height="70px">
        放心购物
      </div>
      <div class="col-xs-4" >
        <img src="/jewelry/Public/images/mian.png" class="img-circle" width="70px" height="70px">
        免运费
      </div>
      
    </div>
    

  </div>

  <!--底部导航栏-->
  <div style="width:100%;margin-top:20px;padding:5px 5px 0px  0px ;height:25%;border-top:2px solid #C9CABB;text-align:center;font-size:12px">
      <p>
      Copyright (C) 吴阿贵 2017, All Rights Reserved
      </p>
      <p>
        联系地址：广州市从化区温泉大道882号中山大学南方学院 邮编:510970
      </p>
    </div> 
  
  </body>
</html>