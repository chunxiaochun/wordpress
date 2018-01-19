<?php
//获取客户端设备的类型
function get_device_type(){
	$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$type = 'other';
	if(strpos($agent, 'iphone') || strpos($agent, 'ipad')){
		$type = 'ios';
	}else{
		$type = 'android';
	}
	/*if(strpos($agent, 'android')){
		$type = 'android';
	}*/
	return $type;
} 
?>