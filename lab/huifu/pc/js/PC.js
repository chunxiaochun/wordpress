function listenCardNo(){
	if($("#CardNo").valDelWS().length < 15){
		disalbeAllButton();
		return false;
	}

	if(! checkCardNo()){
		disalbeAllButton();
		return false;
	}

	validCardNo();

	return checkShowButton();
}

function validCardNo(){
	$("#CardNo").delWS();

	if(invalidValue($("#CardNo").val())){
		if(validValue($("#GateId").val())){
			if(validValue($("#SuccessGateId").val())
					&& $("#SuccessGateId").val() == 'Y'){
				showExistCardHint($("#GateId").val());
			}else{
				//不支持传入的网关号对应的银行
				$("#CardNoErr").show();
				$("#CardNoIcon").show();
				$("#bankHint").hide();
			}
		}else{
			$("#CardNoErr").hide();
			$("#CardNoIcon").hide();
			$("#bankHint").hide();
		}

		return false;
	}

	var cardNo = $("#CardNo").val();

	if(cardNo.length < 6){
		showCardFail("您输入的银行卡号格式错误。<span></span>");
		return false;
	}

	var cardBin = $("#CardNo").val().substr(0, 6);

	if(cardBin != "436748" && cardBin != "622700"){
		showCardFail("暂不支持该银行卡，请检查输入是否有误。<span></span>");
		return false;
	}

	if(! /^\d{15,19}$/.test($("#CardNo").val())){
		showCardFail("您输入的银行卡号格式错误。<span></span>");
		return false;
	}


	var tempGateId = "";
	if(invalidValue($("#ChoiceGateId").val())){
		if(cardBin == "436748"){
			tempGateId = "T1";
			$("#ChoiceGateId").val("T1");
		}else{
			tempGateId = "TX";
			$("#ChoiceGateId").val("TX");
		}
	}else{
		tempGateId = $("#ChoiceGateId").val();
	}

	//显示或隐藏信用卡信息
	if("436748" == cardBin){
		showCreditInfo();
		$("#CardType").val("C");
	}else{
		hideCreditInfo();
		$("#CardType").val("D");
	}

	showExistCardHint(tempGateId);
	return true;
}

//检查卡信息输入是否正确
function showCardFail(errMsg){
	$("#CardNoIcon").removeAttr("style");
	showFail("CardNo", errMsg);
	$("#bankHint").hide();
}

function checkCardNo(){
	if(invalidValue($("#CardNo").valDelWS())){
		return false;
	}

	var cardNo = $("#CardNo").valDelWS();

	if(cardNo.length < 6){
		return false;
	}

	var cardBin = $("#CardNo").valDelWS().substr(0, 6);

	if(cardBin != "436748" && cardBin != "622700"){
		return false;
	}

	if(! /^\d{15,19}$/.test($("#CardNo").valDelWS())){
		return false;
	}else{
		return true;
	}
}

function listenValidMonth(){
	if($("#Month").valDelWS().length != 2){
		disalbeAllButton();
		removeIcon('Month');
		return false;
	}

	if(! checkValidMonth()){
		disalbeAllButton();
		removeIcon('Month');
		return false;
	}

	validValidMonth();

	return checkShowButton();
}

function validValidMonth(){
	$("#Month").delWS();
	$("#Year").delWS();

	if(! checkValidMonth()){
		if(invalidValue($("#Month").val())){
			dateCheckEmpty("Month");
		}else{
			$("#DateErr").html("您输入的银行卡有效期月份格式错误。<span></span>");
			dateCheckFail("Month");
		}

		return false;
	}

	if(invalidValue($("#Year").val())){
		//月份正确，年份错误
		dateCheckSuccess("Month");
		dateCheckEmpty("Year");
		return false;
	}

	if(! checkValidYear("Year", /^\d{2}$/)){
		//月份正确，年份错误
		$("#DateErr").html("您输入的银行卡有效期年份格式错误。<span></span>");
		dateCheckSuccess("Month");
		dateCheckFail("Year");
		return false;
	}

	if(! checkValidDateLimit()){
		//月份，年份错误
		$("#DateErr").html("您输入的银行卡有效期不小于当前月份。<span></span>");
		dateCheckFail("Month");
		dateCheckFail("Year");
		return false;
	}

	dateCheckSuccess("Month");
	dateCheckSuccess("Year");

	return true;
}

function checkValidMonth(){
	if(invalidValue($("#Month").valDelWS())){
		return false;
	}

	if(! /^0[1-9]|1[0-2]$/.test($("#Month").valDelWS())){
		return false;
	}

	return true;
}

function listenValidYear(){
	if($("#Year").valDelWS().length != 2){
		disalbeAllButton();
		removeIcon('Year');
		return false;
	}

	if(! checkValidYear()){
		disalbeAllButton();
		removeIcon('Year');
		return false;
	}

	validValidYear();

	return checkShowButton();
}

function validValidYear(){
	$("#Year").delWS();
	$("#Month").delWS();

	if(! checkValidYear()){
		if(invalidValue($("#Year").val())){
			dateCheckEmpty("Year");
		}else{
			$("#DateErr").html("您输入的请输入银行卡有效期年份格式错误。<span></span>");
			dateCheckFail("Year");
		}

		return false;
	}

	if(invalidValue($("#Month").val())){
		//月份正确，年份错误
		dateCheckSuccess("Year");
		dateCheckEmpty("Month");
		return false;
	}

	if(! checkValidMonth()){
		$("#DateErr").html("您输入的银行卡有效期月份格式错误。<span></span>");
		dateCheckSuccess("Year");
		dateCheckFail("Month");
	}

	if(! checkValidDateLimit()){
		$("#DateErr").html("您输入的银行卡有效期不小于当前月份。<span></span>");
		dateCheckFail("Month");
		dateCheckFail("Year");
		return false;
	}

	dateCheckSuccess("Year");
	dateCheckSuccess("Month");

	return true;
}

function checkValidYear(){

	if(invalidValue($("#Year").valDelWS())){
		return false;
	}

	if(! /^\d{2}$/.test($("#Year").valDelWS())){
		return false;
	}

	return true;
}

function dateCheckFail(eleName){
	$("#DateErr").show();

	var eleNameIcon = eleName + "Icon";
	$("#" + eleNameIcon).removeClass("o");
	$("#" + eleNameIcon).addClass("x");
	$("#" + eleNameIcon).show();
}

function dateCheckEmpty(eleName){
	$("#DateErr").hide();

	var eleNameIcon = eleName + "Icon";
	$("#" + eleNameIcon).removeClass("o");
	$("#" + eleNameIcon).removeClass("x");
	$("#" + eleNameIcon).hide();
}

function dateCheckSuccess(eleName){
	$("#DateErr").hide();

	var eleNameIcon = eleName + "Icon";
	$("#" + eleNameIcon).removeClass("x");
	$("#" + eleNameIcon).addClass("o");
	$("#" + eleNameIcon).show();
}

//有效期不能小于当前月份
function checkValidDateLimit(){

	if(invalidValue($("#Year").val())){
		return true;
	}

	if(invalidValue($("#Month").val())){
		return true;
	}

	var date = new Date();

	var year = (date.getFullYear() + "").substr(2, 2);
	var month = (date.getMonth() + 1) + "";

	if(parseFloat($("#Year").val()) > parseFloat(year)){
		return true;
	}

	if(parseFloat($("#Year").val()) < parseFloat(year)){
		print("年份小于当前");
		return false;
	}

	if(parseFloat($("#Month").val()) < parseFloat(month)){
		print("年份等于当前，但月份小于当前");
		return false;
	}

	return true;
}

function listenCvv2(){
	if($("#CVV").valDelWS().length != 3){
		disalbeAllButton();
		removeIcon('CVV');
		return false;
	}

	if(! checkCvv2()){
		disalbeAllButton();
		removeIcon('CVV');
		return false;
	}

	validCvv2();

	return checkShowButton();
}

function validCvv2(){
	$("#CVV").delWS();

	if(invalidValue($("#CVV").val())){
		showEmpty("CVV");
		return false;
	}

	if(! checkCvv2()){
		$("#CVVErr").html("您输入的银行卡CVV格式错误，应为3位数字。<span></span>");
		showFail("CVV");
		return false;
	}

	showSuccess("CVV");
	return true;
}

function checkCvv2(){
	if(invalidValue($("#CVV").valDelWS())){
		return false;
	}

	if(! /^\d{3}$/.test($("#CVV").valDelWS())){
		return false;
	}

	return true;
}

function listenCardName(){
	if(invalidValue($("#CardName").valDelWS())){
		disalbeAllButton();
		removeIcon('CardName');
		return false;
	}

	if(! checkCardName()){
		disalbeAllButton();
		removeIcon('CardName');
		return false;
	}

	validCardName();

	return checkShowButton();
}

function validCardName(){
	$("#CardName").delWS();

	if(invalidValue($("#CardName").val())){
		showEmpty("CardName");
		return false;
	}

	if(! checkCardName()){
		$("#CardNameErr").html("您输入的持卡人姓名格式错误。请输入中文姓名<span></span>");
		showFail("CardName");
		return false;
	}

	showSuccess("CardName");
	return true;
}

function checkCardName(){
	if(invalidValue($("#CardName").valDelWS())){
		return false;
	}

	if(! /^[\u4E00-\u9FA5]*$/.test($("#CardName").valDelWS())){
		return false;
	}

	return true;
}

function listenCertId(){
	if($("#CertId").valDelWS().length != 15
			&& $("#CertId").valDelWS().length != 18){
		disalbeAllButton();
		removeIcon('CertId');
		return false;
	}

	if(! checkCertId()){
		disalbeAllButton();
		removeIcon('CertId');
		return false;
	}

	validCertId();

	return checkShowButton();
}

function checkCertId(){
	return deepCheckCertId();
}

function validCertId(){
	$("#CertId").delWS();

	if(! deepCheckCertId()){
		if(invalidValue($("#CertId").val())){
			showEmpty("CertId");
		}else{
			$("#CertIdErr").html("您输入的身份证号码格式错误，应由15或18位数字或字母x组成。<span></span>");
			showFail("CertId");
		}

		return false;
	}else{
		showSuccess("CertId");
		return true;
	}
}

function listenUsrMp(){
	if($("#UsrMp").valDelWS().length != 11 ){
		disalbeAllButton();
		removeIcon('UsrMp');
		return false;
	}

	if(! checkUsrMp()){
		disalbeAllButton();
		removeIcon('UsrMp');
		return false;
	}

	validUsrMp();

	return checkShowButton();
}

function validUsrMp(){
	$("#UsrMp").delWS();

	if(invalidValue($("#UsrMp").val())){
		showEmpty("UsrMp");
		return false;
	}

	if(! checkUsrMp()){
		$("#UsrMpErr").html("您输入的手机号格式错误。<span></span>");
		showFail("UsrMp");
		return false;
	}

	showSuccess("UsrMp");
	return true;
}

function checkUsrMp(){
	if(invalidValue($("#UsrMp").valDelWS())){
		return false;
	}

	if(! /^1\d{10}$/.test($("#UsrMp").valDelWS())){
		return false;
	}

	return true;
}

function listenAuthCode(){
	if($("#AuthCode").valDelWS().length != 6 ){
		disablePayButton();
		removeIcon('AuthCode');
		return false;
	}

	if(! checkAuthCode()){
		disablePayButton();
		removeIcon('AuthCode');
		return false;
	}

	validAuthCode();

	reablePayButton();

	return true;
}

function validAuthCode(){
	$("#AuthCode").delWS();

	if(invalidValue($("#AuthCode").val())){
		showEmpty("AuthCode");
		return false;
	}

	if(! checkAuthCode()){
		$("#AuthCodeErr").html("您输入的验证码格式错误。<span></span>");
		showFail("AuthCode");
		return false;
	}

	showSuccess("AuthCode");
	return true;
}

function checkAuthCode(){
	if(invalidValue($("#AuthCode").valDelWS())){
		return false;
	}

	if(! /^\d{6}$/.test($("#AuthCode").valDelWS())){
		return false;
	}

	return true;
}

function removeIcon(eleName){

	var iconName = eleName + "Icon";

	if($("#" + iconName).hasClass("o")){
		$("#" + iconName).removeClass("o");
	    $("#" + iconName).hide();
	}
}

function disalbeAllButton(){
	disablePayButton();
	disableAuthCode();
}

function checkShowButton(){
	if(! checkAll()){
		disablePayButton();
		disableAuthCode();
		return false;
	}

	reableAuthCode();

	if(!checkAuthCode()){
		disablePayButton();
		return false;
	}

	reablePayButton();

	return true;
}

function checkAll(){

	if(! checkCardNo()){
		return false;
	}

	if(validValue($("#CardType").val())
			&& $("#CardType").val() == "C"){
		if(! checkValidMonth()){
			return false;
		}

		if(! checkValidYear()){
			return false;
		}

		if(! checkCvv2()){
			return false;
		}
	}

	if(! checkCardName()){
		return false;
	}

	if(! checkCertId()){
		return false;
	}

	if(! checkUsrMp()){
		return false;
	}

	if( invalidValue($("#ChoiceGateId").val())){
		return false;
	}

	return true;
}

function reableAuthCode(){
	if(invalidValue($("#countDown").val())
			|| $("#countDown").val() == "N"){
		$("#sendMpCode").removeClass("send_code_disable");
		$("#sendMpCode").addClass("send_code");
		$("#sendMpCode").attr("href", "javascript:sendCode()");
	}
}

function reablePayButton(){
	$("#payButton").removeClass("btn_disable");
	$("#payButton").addClass("btn");
	$("#payButton").attr("href", "javascript:gotoPay()");
}

//测试要素是否符合正则表达式
function checkElement(eleName, pattern){

	var eleNameErr = eleName + "Err";
	var eleNameIcon = eleName + "Icon";

	if( pattern.test($("#" + eleName).val())){
		showSuccess(eleName);
		return true;
	}else{

		if(invalidValue($("#" + eleName).val())){
			showEmpty(eleName);
			return false;
		}

		showFail(eleName);
		return false;
	}
}

//发送短信验证码
function sendCode(){

	if(! checkAll()){
		return ;
	}

	$("#AuthCodeErr").hide();
	showTime("sendMpCode", 60000);
}

function authCodeErr(errMsg){
	$("#AuthCodeErr").html(errMsg);
	$("#AuthCodeErr").show();
}

//发送验证码按钮倒计时
function showTime(objId, time){

	if(time < 0){
		$("#" + objId).html("点击重发");

		if(checkAll()){
			//变正常
			$("#countDown").val("N");
			reableAuthCode();
		}else{
			disablePayButton();
			disableAuthCode();
		}

		return;
	}

	if(time > 0){
		$("#" + objId).html("点击重发(" + time/1000 + "秒)");
		disableAuthCode();
		$("#countDown").val("Y");
	}

	time = time - 1000;
	setTimeout("showTime('" + objId + "', '" + time + "')", 1000);
}

//首次支付，根据银行号前六位，获取卡Bin信息
function captureCardInfoByCardBin(){

	var cardNo = $("#CardNo").valDelWS();

	if(cardNo.length < 6){
		return ;
	}

	var cardBin = $("#CardNo").valDelWS().substr(0, 6);

	if("436748" == cardBin || "622700" == cardBin){

		//显示或隐藏信用卡信息
		if("436748" == cardBin){
			showCreditInfo();
			$("#CardType").val("C");
		}else{
			hideCreditInfo();
			$("#CardType").val("D");
		}

		$("#CardNoErr").hide();

		$("#CardNoIcon").removeClass("o");
		$("#CardNoIcon").removeClass("x");

		if("436748" == cardBin){
			var imageUrl = 'images/banks/T1.png';
		}else{
			var imageUrl = 'images/banks/TX.png';
		}


		$("#CardNoIcon").css("background-image", "url(" + imageUrl + ")");
		$("#CardNoIcon").show();

		if("436748" == cardBin){
			var cardInfo = "<b>中国建设银行信用卡, </b>,该卡单笔限额为<b>100.00</b>元,每日限额<b>1000.00</b>。<span></span>";
		}else{
			var cardInfo = "<b>浦东发展银行借记卡, </b>,该卡单笔限额为<b>200.00</b>元,每日限额<b>2000.00</b>。<span></span>";
		}

		if("436748" == cardBin){
			$("#ChoiceGateId").val("T1");
		}else{
			$("#ChoiceGateId").val("TX");
		}

		$("#bankHint").html(cardInfo);
		$("#bankHint").show();

		$("#successCardBin").val(cardBin);
		$("#failCardBin").val("");
		$("#notGivenCardBin").val("");
		return;
	}else{
		hideCardHint();
		canNotGetCardInfo("暂不支持该银行卡，请检查输入是否有误。<span></span>");
		$("#failCardBin").val(cardBin);
		$("#successCardBin").val("");
		$("#notGivenCardBin").val("");
		return ;
	}
}

function canNotGetCardInfo(errMsg){
	$("#CardNoErr").html(errMsg);
	$("#CardNoErr").show();
	$("#CardNoIcon").addClass("x");
	$("#CardNoIcon").show();
}

function hideCardHint(){
	$("#CardNoIcon").hide();
	$("#bankHint").hide();
}

//显示银行卡信息
function showCardHint(gateId, cardType, amtLimit, dayAmtLimit, gateDesc){
	$("#CardNoErr").hide();

	$("#CardNoIcon").removeClass("o");
	$("#CardNoIcon").removeClass("x");

	var imageUrl = 'images/banks/' + gateId + '.png';

	$("#CardNoIcon").css("background-image", "url(" + imageUrl + ")");
	$("#CardNoIcon").show();

	var cardInfo = joinCardInfo($("#BankName").val()+"", cardType, amtLimit, dayAmtLimit);

	if(validValue(gateDesc)){
		cardInfo = cardInfo + gateDesc;
	}

	$("#bankHint").html(cardInfo);
	$("#bankHint").show();
}

//展示目前隐藏着的卡信息，不用重新拼接卡信息
function showExistCardHint(gateId){

	$("#CardNoErr").hide();

	$("#CardNoIcon").removeClass("o");
	$("#CardNoIcon").removeClass("x");

	if("T1" == gateId){
		var imageUrl = 'images/banks/T1.png';
	}else{
		var imageUrl = 'images/banks/TX.png';
	}

	$("#CardNoIcon").css("background-image", "url(" + imageUrl + ")");
	$("#CardNoIcon").show();

	if("T1" == gateId){
		var cardInfo = "<b>中国建设银行信用卡, </b>,该卡单笔限额为<b>100.00</b>元,每日限额<b>1000.00</b>。<span></span>";
	}else{
		var cardInfo = "<b>浦东发展银行借记卡, </b>,该卡单笔限额为<b>200.00</b>元,每日限额<b>2000.00</b>。<span></span>";
	}

	$("#bankHint").html(cardInfo);
	$("#bankHint").show();
}

//要素匹配正则，隐藏错误信息，显示打勾
function showSuccess(eleName){
	var eleNameErr = eleName + "Err";
	var eleNameIcon = eleName + "Icon";

	$("#" + eleNameErr).hide();

	$("#" + eleNameIcon).removeClass("x");
	$("#" + eleNameIcon).addClass("o");
	$("#" + eleNameIcon).show();
}

//要素不匹配正则，展示错误信息，显示打叉
function showFail(eleName, errMsg){
	var eleNameErr = eleName + "Err";
	var eleNameIcon = eleName + "Icon";

	if(validValue(errMsg)){
		$("#" + eleNameErr).html(errMsg);
	}

	$("#" + eleNameErr).show();

	$("#" + eleNameIcon).removeClass("o");
	$("#" + eleNameIcon).addClass("x");
	$("#" + eleNameIcon).show();
}

function showEmpty(eleName){
	var eleNameErr = eleName + "Err";
	var eleNameIcon = eleName + "Icon";

	$("#" + eleNameErr).hide();

	$("#" + eleNameIcon).removeClass("o");
	$("#" + eleNameIcon).removeClass("x");
	$("#" + eleNameIcon).hide();
}

//首次支付如果是信用卡，展示信用卡输入要素
function showCreditInfo(){
	$("#validDateDt").show();
	$("#validDateDd").show();
	$("#cvvDt").show();
	$("#cvvDd").show();
}

//首次支付如果不是信用卡，隐藏信用卡输入要素
function hideCreditInfo(){
	$("#validDateDt").hide();
	$("#validDateDd").hide();
	$("#cvvDt").hide();
	$("#cvvDd").hide();
}

/*
 * ====================================
 * 二次支付使用的方法
 * ====================================
 */
function listenBindCardPayButton(){
	if($("#AuthCode").valDelWS().length < 6){
		//达到6位才判断
		disablePayButton();
		removeIcon("AuthCode");
		return false;
	}

	if(! mpAndAuthCodeOk()){
		disablePayButton();
		removeIcon("AuthCode");
		return false;
	}

	payButtonReableGotoPay();

	return true;
}

function mpAndAuthCodeOk(){
	if(! checkCardMp()){
		return false;
	}

	if(!validAuthCode()){
		return false;
	}

	return true;
}

//二次支付检查银行卡对应的手机号要素
function checkCardMp(){

	if(! checkElement("ChoiceUsrMp", /^1\d{10}$/)){
		$("#ChoiceUsrMpErr").html("请选择银行卡。<span></span>");
		return false;
	}

	return true;
}

function sendCodeNoCheck(){

	if(! checkCardMp()){
		return ;
	}

	$("#AuthCodeErr").hide();
	showTimeNoCheck(60000);
}

function showTimeNoCheck(time){

	if(time < 0){
		$("#sendMpCode").html("点击重发");
		authCodeReableNoCheck();
		return;
	}

	if(time > 0){
		$("#sendMpCode").html("点击重发(" + time/1000 + "秒)");
		disableAuthCode();
	}

	time = time - 1000;
	setTimeout("showTimeNoCheck('" + time + "')", 1000);
}

//二次支付时根据银行号前六位，获取卡Bin信息. index表示显示第几张卡的信息
function captureBindedCardInfo(index){

	$(".list_hint").hide();
	$("#bankHint" + index).show();
}

function authCodeReableNoCheck(){
	$("#sendMpCode").removeClass("send_code_disable");
	$("#sendMpCode").addClass("send_code");
	$("#sendMpCode").attr("href", "javascript:sendCodeNoCheck()");
}

function payButtonReableGotoPay(){
	$("#payButton").removeClass("btn_disable");
	$("#payButton").addClass("btn");
	$("#payButton").attr("href", "javascript:gotopay()");
}

/*
 * =======================================
 * 基础公用方法
 * =======================================
 */
jQuery.fn.extend({
	valDelWS : function(){return this.val().replace(/[ ]/g, "");},  //去空格后的值
	delWS: function(){return this.val(this.valDelWS())}             //将值去除空格后重新赋值
})

function disableAuthCode(){
	$("#sendMpCode").removeClass("send_code");
	$("#sendMpCode").addClass("send_code_disable");
	$("#sendMpCode").removeAttr("href");
}

function disablePayButton(){
	$("#payButton").removeClass("btn");
	$("#payButton").addClass("btn_disable");
	$("#payButton").removeAttr("href");
}

/*
 * 银行卡信息提示
 */
function joinCardInfo(bankName, cardType, amtLimit, dayAmtLimit){
	var cardInfo = new Array("<b>", bankName, getCardTypeDesc(cardType),
			"</b>,该卡单笔限额为<b>", amtLimit, "</b>元,每日限额<b>", dayAmtLimit, "</b>。<span></span>");

	return cardInfo.join("");
}

function getCardTypeDesc(cardType){
	return cardType == 'C' ? "信用卡" : "借记卡";
}

//出错信息层展示和关闭
function showErrDl(){
	$("#errorDl").show();
}
function hideErrDl(){
	$("#errorDl").hide();
}

//是否合法的值
function invalidValue(value){
	return ! (validValue(value));
}

function validValue(value){
	return value != undefined && value != null && value !="" && value != 'null';
}

function print(msg){
	//alert(msg);
}

//严格的分析身份证号
function deepCheckCertId(){
	var certId = $("#CertId").val();

	if(invalidValue(certId)){
		print("证件号为空");
		return false;
	}

	certId = certId.toUpperCase();
	//身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X。
    if (!(/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(certId))) {
        print("输入的身份证号长度不对，或者号码不符合规定！");
        return false;
    }
    //判断地区
    var City={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",
    		34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",
    		52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"};
    if(City[parseInt(certId.substr(0,2))]==null){
    	print("未找到对应的省份，请核实后重新输入！");
        return false;
    }

    //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
    //下面分别分析出生日期和校验位
    var len, re;
    len = certId.length;
    if (len == 15) {
        re = new RegExp(/^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/);
        var arrSplit = certId.match(re);

        //检查生日日期是否正确
        var dtmBirth = new Date('19' + arrSplit[2] + '/' + arrSplit[3] + '/' + arrSplit[4]);
        var bGoodDay;
        bGoodDay = (dtmBirth.getYear() == Number(arrSplit[2])) && ((dtmBirth.getMonth() + 1) == Number(arrSplit[3])) && (dtmBirth.getDate() == Number(arrSplit[4]));
        if (!bGoodDay) {
        	print("请核实出生日期后重新输入！");
            return false;
        }
        else {
            //将15位身份证转成18位
            //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
            var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
            var nTemp = 0, i;
            certId = certId.substr(0, 6) + '19' + certId.substr(6, certId.length - 6);
            for (i = 0; i < 17; i++) {
                nTemp += certId.substr(i, 1) * arrInt[i];
            }
            certId += arrCh[nTemp % 11];

            print("证件输入合法！");
            return true;
        }
    }
    if (len == 18) {
        re = new RegExp(/^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/);
        var arrSplit = certId.match(re);

        //检查生日日期是否正确
        var dtmBirth = new Date(arrSplit[2] + "/" + arrSplit[3] + "/" + arrSplit[4]);
        var bGoodDay;
        bGoodDay = (dtmBirth.getFullYear() == Number(arrSplit[2])) && ((dtmBirth.getMonth() + 1) == Number(arrSplit[3])) && (dtmBirth.getDate() == Number(arrSplit[4]));
        if (!bGoodDay) {
        	print("请核实出生日期后重新输入！");
            return false;
        }
        else {
            //检验18位身份证的校验码是否正确。
            //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
            var valnum;
            var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
            var nTemp = 0, i;
            for (i = 0; i < 17; i++) {
                nTemp += certId.substr(i, 1) * arrInt[i];
            }

            valnum = arrCh[nTemp % 11];

            if (valnum != certId.substr(17, 1)) {
            	print("身份证的校验码不正确！,请核实后重新输入！");
                return false;
            }

            print("证件输入合法！");
            return true;
        }
    }
}