<h2></h2><? include('inc/inc.php');?>
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
<ul class="more">
	<li>
		<a href="remove.php" class="remove">
			<h2>银行卡解除绑定</h2>
			<p>解除您已经绑定过的银行卡</p>
		</a>
	</li>
	<li>
		<a href="tel:13816832641" class="call">
			<h2>拨打客服电话 400-820-5623</h2>
			<p>如需要人工服务请拨打24小时客服电话</p>
		</a>
	</li>
	<li>
		<a href="help.php" class="help">
			<h2>使用帮助</h2>
			<p>使用过程中出现的一些常见问题的解答和使用说明</p>
		</a>
	</li>
	<li>
		<a href="javascript:void(0)" class="about">
			<h2>关于汇付天下</h2>
			<p>金融支付专家，提供定制化综合支付运营方案</p>
		</a>
	</li>
</ul>
</body>
</html>