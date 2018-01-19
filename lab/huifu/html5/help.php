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
<ul class="help">
	<li>
		<h2>快捷支付介绍</h2>
		<p>快捷支付是汇付天下联合各大银行推出的全新的支付方式。付款时无需开通或登录网上银行，输入相应信息与手机校验码即可完成付款。</p>
	</li>
	<li>
		<h2>为什么要填写个人信息</h2>
		<p>为了保障您的资金安全，首次使用快捷支付需要将您的信息与银行核对，核对成功后，下次支付无需再次输入，凭手机校验码即可完成付款。</p>
	</li>
	<li>
		<h2>为何提示支付失败？</h2>
		<p>支付失败的原因可能有：短信验证码错误，输入信息与银行预留信息不匹配，卡内余额不足等，如无法解决，请拨打汇付天下客服电话。</p>
	</li>
	<li>
		<h2>银行卡已经注销了，怎么解除银行卡的绑定？</h2>
		<p>二次支付时，可以对绑定过的银行卡解绑。</p>
	</li>
</ul>
</body>
</html>