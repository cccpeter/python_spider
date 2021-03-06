<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>BookStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bookstore/Public/css/all.css">
    <link rel="stylesheet" href="/bookstore/Public/css/bootstrap.min.css">
    <script type="text/javascript" src="/bookstore/Public/js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="/bookstore/Public/js/bootstrap.min.js"></script>
    <style type="text/css">
      .word_hidden
        {

          overflow:hidden; 

          text-overflow:ellipsis;

          display:-webkit-box; 

          -webkit-box-orient:vertical;

          -webkit-line-clamp:3; 
        }
    </style>
    <script type="text/javascript">
    function sclick(hole_id){  
      var url="<?php echo U('Index:shudongcontent');?>"+"?hole_id="+hole_id;
      onclick=window.open(url);
    }
    </script>
    <script type="text/javascript">
        function sub(){
          alert("树洞发布成功");
          document.getElementById("form1").submit();
    }
    </script>
    <style type="text/css">
      .imgfile {  display:inline-block; background-image: url("/bookstore/Public/images/upload.jpg"); height:50px; width:50px; overflow:hidden; cursor:pointer;float: left;}
      .imgfile input{ opacity: 0; height:50px; width:50px;}
      .photo_info{float: right;}
    </style>
  </head>
  <body style="margin-bottom:80px;background-color:#EFF0DC">
  
    <nav class="navbar navbar-inverse navbar-right navbar-fixed-top" role="navigation"  style="width:100%;margin:0 0">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--导航条按钮添加 -->
           <div style="padding:10px 0px 0px 0px" style="width:100%;margin:0 0">
           <div class="form-group col-xs-7" style="color:white;font-size:19px; text-align: right; ">
              树洞
            </div>
            <div class="form-group col-xs-5" style="text-align:right; ">
               <a data-toggle="modal" href='#modal-id' type="button" class="glyphicon glyphicon-plus" style="padding:5px;color:white;"></a>
            </div>
            
      </div>     
      </div>     
    </nav>


    
        
    
    <!--中间段-->
    </div><!-- container结束 -->
    <!--contaniner   middle-->
    <?php if(is_array($hole)): foreach($hole as $key=>$vo): ?><div class="container" style="margin-top:55px;padding:5px;overflow-x:hidden;background-color:white; overflow-x:hidden;"  onclick="sclick('<?php echo ($vo["hole_id"]); ?>')">
      <div class="row" >
        <div class="col-xs-3" style="margin-left:5px;margin-bottom:2px"">
          <a href="#">
              <img src="/bookstore/Public/uploads/<?php echo ($vo["user_photo"]); ?>" class="img-circle" width="50px" height="50px">
          </a>
        </div>
        <div class="col-xs-8" style="font-size:18px;padding:5px">
           <p><?php echo ($vo["user_name"]); ?></p>
          <p style="font-size:10px;color:#727272;margin-top:-5px;"><?php echo ($vo["hole_time"]); ?></p>
        </div>

      </div>
     
      <div class="word_hidden" style="word-wrap: break-word;font-size:16px;padding:5px;">
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo ($vo["hole_message"]); ?>
          
      </div>
     <!--  <div class="col-xs-12" style="font-size:14px;border-bottom:1px dashed #ABABAB;padding:2px;">
         <div class="col-xs-6" style="border-right:1px dashed #ABABAB;"> 留言图片</div>
        <div class="col-xs-6"> 留言数:<?php echo ($vo["number"]); ?></div>
      </div> -->
       
         <?php if($vo["hole_url"] == -1): else: ?>
          <img src="/bookstore/Public/uploads/<?php echo ($vo["hole_url"]); ?>" width="100px" height="100px"><?php endif; ?>
      <div class="col-xs-12" style="line-height:30px;border-top:1px dashed #ABABAB;">
        <div class="col-xs-6" style="text-align:left;padding:5px;">
          <?php echo ($vo["number"]); ?>评论
        </div>
        <div  class="col-xs-6" style="text-align:right;padding:5px;">
          
          <a class=" glyphicon glyphicon-share-alt" onclick="sclick('<?php echo ($vo["hole_id"]); ?>')">
            
          </a>
        </div>

      </div>  
        
        
  </div><?php endforeach; endif; ?>
  <div class="modal fade" id="modal-id">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding:10px">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">树洞留言</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo U('Home/Index/holemessage');?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" id="form1" >
                        <!--信息填写-->
                        <div id="org1">
                          <input type="hidden" value="0" name="is">
                        </div><!--勿删-->
                          <div style="padding:0px 0px 10px 10px">
                           <!--textarea 设置ID传值-->
                            <textarea name="content" rows="5" cols="35" style=" resize:none;"></textarea>
                            <!-- <input type="checkbox" name="isname" value="1"> 是否匿名 --> 
                          </div>
                          <!-- 
                          <div>
                            <input name="imgfile" type="file" accept="image/gif, image/jpeg"/>
                            <!-- <input name="upload" type="submit" value="上传" /> -->
                          </div>
                          <!--图片上传-->
                          <table>
                          <tr>
                          <td>
                            <a href="javascript:" class="imgfile"><input name="info_photo" type="file" value="" id="info_photo" onchange='PreviewImage(this)' width="50px" height="50px" /></a>
                            <!-- <input name="upload" type="submit" value="上传" /> -->
                          </td>
                          <td id="photo_info" class="photo_info"></td>
                          </tr>
                          </table>
                          <div style="padding:0px 0px 30px 30px ">
                          <!--跳转-->
                          <a onclick="sub();" type="button" class="btn btn-default" style="padding:5px;color:white;background:#34352C;width:90%;height:100%;">发布留言</a>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    
    
      
 

    <!-- 底栏 -->
    <nav class="navbar navbar-inverse  navbar-fixed-bottom" role="navigation" style="width:100%;margin:0 0" >
    
        <ul class="nav navbar-nav " >
          <li class=" li-style col-xs-3">
            <a href="<?php echo U('/home/Index/index');?>" class="btn btn-lg buttom">
              <span class="glyphicon glyphicon-home " aria-hidden="true"></span>
            </a>
          </li>
          <li class=" active li-style ">
            <a href="<?php echo U('/home/Index/shudong');?>" class="btn btn-lg buttom">
              <span class="glyphicon glyphicon-comment " aria-hidden="true"></span>
            </a> 
          </li>
          <li class="li-style col-xs-3 ">
            <a href="<?php echo U('/home/Index/addgoods');?>" class="btn btn-lg buttom">
              <span class="glyphicon glyphicon-plus " aria-hidden="true"></span>
            </a>
          </li> 
          <li class="li-style  ">
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
  <?php if(isset($errors)): ?><script type="text/javascript">
                        $(function(){
                                  $('#modal-id').modal('show');
                        });
          </script><?php endif; ?>
        <script type="text/javascript">
      function PreviewImage(imgFile) {
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'is');
        input.setAttribute('value',"1");
        var pc = document.getElementById("org1");
        pc.insertBefore(input,null);
      var filextension = imgFile.value.substring(imgFile.value
        .lastIndexOf("."), imgFile.value.length);
      filextension = filextension.toLowerCase();
      if ((filextension != '.jpg') && (filextension != '.gif')
        && (filextension != '.jpeg') && (filextension != '.png')
        && (filextension != '.bmp')) {
       alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");
       imgFile.focus();
      } else {
       var path;
       if (document.all)//IE
       {
        imgFile.select();
        path = document.selection.createRange().text;
        document.getElementById("photo_info").innerHTML = "";
        document.getElementById("photo_info").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\""
          + path + "\")";//使用滤镜效果  
       } else//FF
       {
        path = window.URL.createObjectURL(imgFile.files[0]);// FF 7.0以上
        //path = imgFile.files[0].getAsDataURL();// FF 3.0
        document.getElementById("photo_info").innerHTML = "<img id='img1' width='120px' height='100px' src='"+path+"'/>";
        //document.getElementById("img1").src = path;
       }
      }
     }
    </script>
    
  </body>
</html>