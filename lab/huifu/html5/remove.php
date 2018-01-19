<? include('inc/inc.php');?>
<!DOCTYPE html>
<!-- base版本 -->
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>汇付天下</title>
<meta name="author" content="m.chinapnr.com" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<link rel="stylesheet" rev="stylesheet" type="text/css" href="<?=get_device_type()?>.css" media="screen" />
<script type="text/javascript">
window.addEventListener('load', function(){
setTimeout(function(){
window.scrollTo(0, 0);
}, 100);
});
var oId=0;
function chooseCard(index){
	var lis = document.getElementById("list").getElementsByTagName("li");
	lis[oId].className="";
	lis[index].className="current";
	oId = index;
}
</script>
</head>
<body>
<header>
<button class="btn_back" onClick="history.go(-1)">Back</button>
<button class="btn_home" onClick="javascript: document.location.href='index.php'">Home</button>
<button class="btn_more" onClick="javascript: document.location.href='more.php'">More</button>
</header>
<div class="content remove">
	<div class="top"></div>	
	<div class="choose remove">
		<p>银行卡解除绑定：</p>
		<div class="list" >
			<ul id="list">
				<li><a href="javascript:chooseCard(0)"><img src="images/banks/nongye.png" width="17" height="17"> 农业银行储蓄卡 - 9697</a></li>
				<li><a href="javascript:chooseCard(1)"><img src="images/banks/zhaoshang.png" width="17" height="17"> 招商银行储蓄卡 - 3375</a></li>
				<li><a href="javascript:chooseCard(2)"><img src="images/banks/zhaoshang.png" width="17" height="17"> 招商银行储蓄卡 - 8273</a></li>
			</ul>
		</div>
		<button class="btn_remove" onClick="javascript: document.location.href='more.php'">解除绑定</button>
	</div>
</div>
<div class="bottom"></div>
</body>
</html>