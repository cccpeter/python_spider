<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>吴阿贵</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/jewelry/Public/bootstrap/css/bootstrap.min.css">
    <link href="/jewelry/Public/css/index.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/jewelry/Public/css/all.css">
    <link rel="stylesheet" href="/jewelry/Public/css/search.css">
    <link rel="stylesheet" href="/jewelry/Public/css/tips.css">
    <script src="/jewelry/Public/jq/jquery-3.1.0.min.js"></script>
    <script src="/jewelry/Public/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="/jewelry/Public/js/wl.js"></script> -->
    <script src="/jewelry/Public/js/td.js"></script>
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
        ul.pagination {
          display: inline-block;
          padding: 0;
          margin: 0;
        }

      ul.pagination li {display: inline;}

      ul.pagination li a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 5px;
        }

      ul.pagination li a.active {
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
      }

      ul.pagination li a:hover:not(.active) {background-color: #ddd;}
    </style>
     <script type="text/javascript">
    function sclick(goods_id){  
      var url="<?php echo U('Home/Index/shopcontent');?>"+"?goods_id="+goods_id;
      onclick=window.open(url);
    }
    </script>
    <script type="text/javascript">
     var time_id="1";
     var search="<?php echo ($search); ?>";
     var type_id="<?php echo ($type[0]['type_id']); ?>";
      function time(){
        time_id="1";
        search1();
      } 
      function price(){
        time_id="2";
        search1();
      }    
      function search1(){
        var p1 = document.getElementById("search2");  
        var p2 = document.getElementById("type_id");  
        var p3 = document.getElementById("time_id");  
        p1.value=search;
        p2.value=type_id;
        p3.value=time_id;
        document.getElementById("fo").submit();
      }
    </script>
  </head>
  <body style="margin-bottom:5px">
    <nav class="navbar navbar-default" role="navigation" height="20px"> 
    <div class="container"> 
         <!--    <div class="navbar-header"> 
            <a class="navbar-brand" href="#">goodsStore</a> 
        </div>-->
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
</div>
  
   <!--栏目-->
         <form action="<?php echo U('Search/index');?>" method="post">
    <div style="width:78%;margin-top:20px;margin-bottom:20px;float:right;"">
      <div class="col-xs-2" style=" text-align: right; vertical-align: center; padding:6px 1px 1px 1px">
        <span >搜索商品</span>
      </div>
      <div class="col-xs-7">
        <input type="text" class="form-control" name="search" placeholder="请输入要搜索的首饰" size="10">  
      </div>
      <div class="col-xs-3">
        <button type="submit" class="btn btn-default" style="height: 30px;">搜索</button>
      </div>
    </div>
  </form>

      <div style="width:78%;height:25%;float:right;padding:20px 0px 0px  0px">
      <div class="row " style="width:100%;margin-top:-21px;margin-left:1px;border-bottom:2px solid #080D5E;border-top:1px solid #C9CABB;padding:5px 0px 0px 3px;">
        <div class="col-xs-12" style="text-align:left;padding:5px;font-size:18px; ">
          <a href="#">          
            搜索结果
          </a>
        </div>
        

      </div>
      <div class="row clearfix" style="padding:5px 0px;">
        <div class="col-md-12 column">
          <div class="btn-group">
            <button  class="btn btn-default" type="button" onclick="price();" style="height: 30px;">
              <em></em>
              价格 
            </button> 
            <button class="btn btn-default" type="button" onclick="time();" style="height: 30px;">
              <em></em> 
              上架时间
            </button> 
          </div>
        </div>
      </div>
      <form action="<?php echo U('Home/Search/search');?>" method="post" id="fo">
        <input type="hidden" name="search" id="search2" value="1">
        <input type="hidden" name="time_id" id="time_id" value="1">
        <input type="hidden" id="type_id" name="type_id" value="0">
      </form>
      <div class="row">
       <?php if(is_array($goods_search)): foreach($goods_search as $key=>$vo): ?><div class="col-sm-6 col-md-3" onclick="sclick('<?php echo ($vo["goods_id"]); ?>')" >
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
        <div align="center">
        <!-- <ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a href="#" class="active">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">6</a></li>
          <li><a href="#">7</a></li>
          <li><a href="#">»</a></li>
        </ul> -->
        <?php echo ($show); ?>
        </div>
        <!-- 结束  --> 
          
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