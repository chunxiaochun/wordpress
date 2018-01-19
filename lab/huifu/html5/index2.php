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
<div class="content">
	<div class="top"></div>
	<div class="price"><span class="int">6880.</span><span class="float">00</span><span class="unit">元</span></div>
	<div class="info">
		<p>订单时间: <b>2012/04/24</b></p>
		<p>订单编号: <b>12332221001210</b></p>		
		<p>商户名称: <b>京东360</b></p>
	</div>
	<div class="input choose">
		<p>最近常用的银行卡：</p>
		<div class="list" >
			<ul id="list">
				<li><a href="javascript:chooseCard(0)"><img src="images/banks/nongye.png" width="17" height="17"> 农业银行储蓄卡 - 9697</a></li>
				<li><a href="javascript:chooseCard(1)"><img src="images/banks/zhaoshang.png" width="17" height="17"> 招商银行储蓄卡 - 3375</a></li>
				<li><a href="index.php"><img src="images/add.png" width="17" height="17"> 新增银行卡</a></li>
			</ul>
		</div>
	</div>
	<div class="input check">
		<section>
			<input class="phone" name="phone" placeholder="13818822222" type="tel" maxlength="15" />
			<label>请输入手机号码 :</label>
		</section>
		<section>
			<input class="code" name="code" placeholder="666666" type="tel" maxlength="6" />
			<label>请输入验证码 :</label>
			<button class="send_code on"></button>
		</section>
</div>	
</div>
<button class="pay on" onClick="javascript: document.location.href='success.php'"></button>
</body>
</html>