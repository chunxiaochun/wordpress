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
<button class="btn_home" onClick="javascript: document.location.href='index.php'">Home</button>
</header>
<div class="content success" align="center">
	<div class="top"></div>
	<img src="images/success.png" width="285" height="65" alt="success">
	<p>您本次支付金额为：<b>6888.</b><small>00</small> 元</p>
</div>
<div class="bottom"></div>
</body>
</html>