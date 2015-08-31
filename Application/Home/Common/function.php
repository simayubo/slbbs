<?php
/*
 * 前台公共函数
 */

/**
 * 手机移动端判断
 * @return [type] [description]
 */
function is_mobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;
    
    //此条摘自TPM智能切换模板引擎，适合TPM开发
    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
        return true;
    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
        //找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
    //判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
        );
        //从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    //协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
 }

/*
 * 处理时间
 * $time : 传入时间戳值
 */
function date_rewrite($time){
	$now=time();
	$day=date('Y-m-d',$time);
	$today=date('Y-m-d');
	$dayArr=explode('-',$day);
	$todayArr=explode('-',$today);
	//距离的天数，这种方法超过30天则不一定准确，但是30天内是准确的，因为一个月可能是30天也可能是31天
	$days=($todayArr[0]-$dayArr[0])*365+(($todayArr[1]-$dayArr[1])*30)+($todayArr[2]-$dayArr[2]);
	//距离的秒数
	$secs=$now-$time;
	if($todayArr[0]-$dayArr[0]>0 && $days>3){//跨年且超过3天
		return date('Y-m-d',$time);
	}else{
		if($days<1){//今天
			if($secs<60) return $secs.'秒前';
			elseif($secs<3600) return floor($secs/60)."分钟前";
			else return floor($secs/3600)."小时前";
		}else if($days<2){
			$hour=date('h',$time);
			return "一天前";
		}else if($days<3){
			$hour=date('h',$time);
			return "两天前";
		}else if($days<5){
			return date('m月d日',$time);
		}else{//三天前
			return date('Y-m-d',$time);

		}
	}
}
//判断登录状态
function is_login(){
	if (!session('?user_id')) {
		header("Location: ".U('User/login')."");
		exit();
	}
}
/**
 * 计算开发时间
 */
function developTime(){
    date_default_timezone_set('PRC');//时区设置
    $startdate="2015-6-10 00:00:00";
    $enddate=date("Y-m-d H:i:s");
    $date=floor((strtotime($enddate)-strtotime($startdate))/86400);
    $hour=floor((strtotime($enddate)-strtotime($startdate))%86400/3600);
    $time=array(
        'day'  => $date,
        'hour' => $hour+$date*24,
    );
    return $time;
}
/**
 * 提示信息
 */
function msg($data){
	 return '<script type="text/javascript"> alert("'.$data.'"); </script>';
}


?>