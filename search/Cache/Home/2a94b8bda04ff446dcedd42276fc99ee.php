<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cc搜索引擎</title>
<link href="/search/Public/css/style.css" rel="stylesheet" type="text/css" />
<link href="/search/Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
	<div id="bd">
        <div id="main">
        	<h1 class="title">
            	<div class="logo large"></div>
            </h1>
            <div class="inputArea">
            	<input type="text" class="searchInput" />
                <input type="button" class="searchButton" onclick="add_search()" />
                <ul class="dataList">
                	
                </ul>
            </div>

            <div class="historyArea">
            </div>
        </div><!-- End of main -->
    </div><!--End of bd-->

    <div class="foot">
    	<div class="wrap">
            <div class="copyright">Copyright &copy;cc</div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="/search/Public/js/jquery.js"></script>
<script type="text/javascript" src="/search/Public/js/global.js"></script>
<script type="text/javascript">
    var suggest_url = "<?php echo U('Home/Index/getsearch');?>";
    var search_url = "<?php echo U('Home/Index/result');?>";


	$('.searchList').on('click', '.searchItem', function(){
		$('.searchList .searchItem').removeClass('current');
		$(this).addClass('current');
	});

    function removeByValue(arr, val) {
      for(var i=0; i<arr.length; i++) {
        if(arr[i] == val) {
          arr.splice(i, 1);
          break;
        }
      }
    }


    // 搜索建议
    $(function(){
        $('.searchInput').bind(' input propertychange ',function(){
            var searchText = $(this).val();
            var tmpHtml = ""

            $.post(suggest_url,
                {s:searchText,s_type:$(".searchItem.current").attr('data-type')},
                function(data){
                    // alert(data[0]);
                  for (var i=0;i<data.length;i++){
                        tmpHtml += '<li><a href="'+search_url+'?q='+data[i]+'">'+data[i]+'</a></li>'
                    }
                    $(".dataList").html("")
                    $(".dataList").append(tmpHtml);
                    if (data.length == 0){
                        $('.dataList').hide()
                    }else {
                        $('.dataList').show()
                    }
              },
              "json");//这里返回的类型有：json,html,xml,text
        } );
    })

    hideElement($('.dataList'), $('.searchInput'));

</script>
<script>
    var searchArr;
    //定义一个search的，判断浏览器有无数据存储（搜索历史）
    if(localStorage.search){
    //如果有，转换成 数组的形式存放到searchArr的数组里（localStorage以字符串的形式存储，所以要把它转换成数组的形式）
        searchArr= localStorage.search.split(",")
    }else{
    //如果没有，则定义searchArr为一个空的数组
        searchArr = [];
    }
    //把存储的数据显示出来作为搜索历史
    MapSearchArr();

    function add_search(){
        var val = $(".searchInput").val();
        if (val.length>=2){
            //点击搜索按钮时，去重
            KillRepeat(val);
            //去重后把数组存储到浏览器localStorage
            localStorage.search = searchArr;
            //然后再把搜索内容显示出来
            MapSearchArr();
        }

        window.location.href=search_url+'?q='+val;

    }

    function MapSearchArr(){
        var tmpHtml = "";
        var arrLen = 0
        if (searchArr.length >= 5){
            arrLen = 5
        }else {
            arrLen = searchArr.length
        }
        for (var i=0;i<arrLen;i++){
            tmpHtml += '<a href="'+search_url+'?q='+searchArr[i]+'">'+searchArr[i]+'</a>'
        }
        $(".mysearch .all-search").html(tmpHtml);
    }
    //去重
    function KillRepeat(val){
        var kill = 0;
        for (var i=0;i<searchArr.length;i++){
            if(val===searchArr[i]){
                kill ++;
            }
        }
        if(kill<1){
            searchArr.unshift(val);
        }else {
            removeByValue(searchArr, val)
            searchArr.unshift(val)
        }
    }


</script>
</html>