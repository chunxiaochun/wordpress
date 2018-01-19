<? include('inc/inc.php');?>
<!DOCTYPE html>
<!-- base版本 -->
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>汇付天下</title>
<meta content="m.chinapnr.com" name="author" />
<meta content="" name="keywords" />
<meta content="" name="description" />
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
/*function changeCardType(_type){
	document.getElementById('id_card_txt').innerHTML = _type;
	if (_type=="身份证"){
		document.getElementsByName('id_card')[0].placeholder = "请输入持卡人身份证号码"
	}else if (_type=="护照"){
		document.getElementsByName('id_card')[0].placeholder = "请输入持卡人护照号码"
	}
}*/
</script>
</head>
<body>
<header>
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
	<div class="input card">
		<section>
			<input class="card_no" name="card_no" placeholder="请输入使用的银行卡卡号" type="tel" tabindex="1" maxlength="20" />
			<label>银行卡号 :</label>
			<b></b>
		</section>
		<p>请按照信息提示输入银行卡信息</p>
		<section>
			<input class="expire" name="expire " placeholder="YY-MM" type="month" tabindex="3" />
			<label>银行卡有效期 :</label>
		</section>
		<section>
			<input class="cvv2" name="cvv2" placeholder="位于银行卡背面签名条处末3位" type="tel" tabindex="2" maxlength="3"/>
			<label>银行卡CVV2码 :</label>
		</section>
		<section>
			<input class="name" name="name" placeholder="请输入持卡人中文姓名/英文名" tabindex="4" />
			<label>持卡人姓名 :</label>
		</section>
		<section>
			<input class="id_card" name="id_card" placeholder="请输入持卡人身份证号码" type="tel" maxlength="20" />
			<label>身份证 :</label>
			<!--<div id="id_card_txt" class="id_card_txt">身份证</div>
			<select class="id_card_select" name="id_card_type" onChange="changeCardType(this.value)">
			<option>身份证</option>
			<option>护照</option>
			</select>-->
		</section>
	</div>
	<div class="input check">
		<section>
			<input class="phone" name="phone" placeholder="13818822222" type="tel" maxlength="15" />
			<label>请输入手机号码 :</label>
		</section>
		<section>
			<input class="code" name="code" placeholder="666666" type="tel" maxlength="6" />
			<label>请输入验证码 :</label>
			<button class="send_code"></button>
		</section>
	</div>	
</div>
<button class="pay" onClick="javascript: document.location.href='index2.php'"></button>
</body>
</html>