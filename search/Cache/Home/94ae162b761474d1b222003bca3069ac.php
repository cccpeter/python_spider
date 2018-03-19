<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>00shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <script src="/print/Public/jq/jquery-3.1.0.min.js"></script>
<script src='http://192.168.155.1:8000/CLodopfuncs.js'></script>
<script language="JavaScript" type="text/JavaScript">
//解析json数据
//json的处理
var refreshtime = 1000;
function focusbody(){
  window.setTimeout("time();",2*1000); 
}
function time(){
    var url = "<?php echo U('Home/Index/out');?>";
      $.ajax({  
        dataType:"JSON",
        type:"post",  
        url:url,//接口服务器地址  
        data:{},//请求数据  
        success:function(response){  
            //成功执行  
            // alert(response['goods'][0]['goods_name']);
            if(response['name']!=0){
               var goodstr = '';
               var name=response['name'];
               var address=response['address'];
               var phone=response['phone'];
               var amount=response['amount'];
               var time=response['time'];
              var strHTML=document.getElementsByTagName("html")[0].innerHTML;
              LODOP.PRINT_INITA(-16,-1,800,600,"零零小店专属");
              LODOP.ADD_PRINT_TEXT(27,50,100,20,"零零小店");
              LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
              LODOP.SET_PRINT_STYLEA(0,"Bold",1);
              LODOP.ADD_PRINT_TEXT(60,6,45,20,"商品名");
              LODOP.ADD_PRINT_TEXT(59,129,57,20,"商品数量");
               // alert(name+address+phone+amount+time);
               for (var i = 0; i < response['goods'].length; i++) {
                   //alert(response[i].messageId);
                   // goodstr +="商品名"+response['goods'][i].goods_name+"</br>";
                   // goodstr+="商品数量："+response['goods'][i].goods_num+"</br>";
                   // goodstr+="————————————————————————————————————————</br>";
                    LODOP.ADD_PRINT_TEXT(97+i*30,5,115,20,response['goods'][i].goods_name);
                    LODOP.ADD_PRINT_TEXT(97+i*30,145,30,20,response['goods'][i].goods_num);
               }
               // alert(goodstr);
               // $("#info").html(goodstr);
               //开始将订单打印出来
               
             
              LODOP.ADD_PRINT_TEXT(184,4,54,20,name);
              LODOP.ADD_PRINT_TEXT(212,4,171,20,address);
              LODOP.ADD_PRINT_TEXT(240,4,53,20,"应付:：");
              LODOP.ADD_PRINT_TEXT(240,73,62,20,amount);
              LODOP.ADD_PRINT_TEXT(182,75,100,20,phone);
              LODOP.ADD_PRINT_TEXT(269,4,175,20,time);
              LODOP.PRINT();

                
               window.setTimeout("time();",60*1000); 
             }else{
              // alert("11");
               window.setTimeout("time();",60*1000); 

             }
        },  
        error:function(e){  
            //失败执行  
            // alert(e.status+','+ e.statusText);  
             // $("#info").html(e.statusText);
             window.setTimeout("time();",60*1000); 
        }  
    }); 
}
</script>
</head>
<body onload="focusbody();">
<div id="showmsg"></div>
微支付平台<br/>
<a>短信API</a><br/>
<a>打印API</a><br/>
<a>优惠卷API</a>
<a>微支付API</a>
<div id="info"></div>
</body>
</html>
</html>