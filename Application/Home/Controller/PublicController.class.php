<?php
/*
 * 公共控制器
 */
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller
{
	/**
	 * 手机，PC模板自动切换
	 */
	Public function _initialize(){
        //移动设备浏览，则切换模板
        if (is_mobile()) {
           	//设置默认默认主题为 Mobile
           	C('DEFAULT_THEME','Mobile');
       	}else{

       		
       		//header("content-type:text/html;charset=utf-8");
       		//echo "WEB版暂停访问！";
       		//exit();
       		C('DEFAULT_THEME','Default');
       	}
    }
	/*
	 * 公共配置 
	 */
	public function common()
	{
		G('begin');
		$d_website=D('Website');
		$common=array
		(
			'website'	=>	$d_website->getWebsite(),  //网站信息
		);
		if($common['website']['site_switch']==0)
		{
			$this->assign('intor',$common['website']['site_off_reason']);
			$this->display('Error/maintenance');
			exit();
		}
		if (!empty(session('user_id'))) 
		{
			//获取登录会员的信息
			$user_arr=D('User')->getCommonUser(session('user_id'));
			$common['user']=A('User')->regroup($user_arr,1); //重组数组
		}
		return $common; //返回公共信息
		
	}
	/*
	 * 生成分页显示列表
	 * page_count: 页数
	 * page_now:当前页
	 * m : 参数
	 * n : 参数值
	*/
	function pageShow($page_count,$page_now,$m,$n=''){
		$re = '';
		for ($i = $page_now - 3; $i <= $page_now + 3 && $i <= $page_count; $i++) {
			if ($i > 0) {
				if ($i == $page_now) {
					$re .= "<li class='active'><a href=\"#\">$i</a></li>";
				} 
				elseif ($i == 1) {
					$url=empty($n)?U("$m/$i"):U("$m/$n/$i");
					$re .= "<li><a href=\"$url\">$i</a></li>";
				} else {
					$url=empty($n)?U("$m/$i"):U("$m/$n/$i");
					$re .= "<li><a href=\"$url\">$i</a></li>";
				}
			}
		}
		if ($page_now > 4) {
			$url=empty($n)?U("$m/1"):U("$m/$n/1");
			$re = "<li><a href=\"$url\" title=\"首页\">&laquo;</a></li>$re";
		}
		if ($page_now + 3 < $page_count) {
			$url=empty($n)?U("$m/$page_count"):U("$m/$n/$page_count");
			$re .= "<li><a href=\"$url\" title=\"尾页\">&raquo;</a></li>";
		}
		if ($page_count <= 1)
			$re = '';
		return $re;
	}
	/**
	 * 帖子删除操作 =》get传入id
	 */
	public function del(){
		if (empty(session('admin'))) {
			$this ->redirect('Slbbsadmin/User/login');
			exit();
		}
		$id 	= I('get.id');
		$forum 	= I('get.forum');
		$r = M('Topic') ->where("id = %d", $id) ->delete();
		if ($r > 0) {
			$this ->success('删除成功！',U('Forum/'.$forum.''));
		}else{
			$this ->error('删除失败！');
		}
	}
	/*
	 * 验证码
	 */
	function verify() {
		$config = array(    
			'fontSize'    =>    17,    // 验证码字体大小    
			'length'      =>    4,     // 验证码位数    
			'useNoise'    =>    false, // 关闭验证码杂点
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry(1);
		return $Verify;
	}
	/**
     * [textClean 文本过滤]
     * @param  [string] $str [传入字符串]
     * @return [string]      [返回字符串]
     */
    public function textClean($str){
    	//$str = htmlspecialchars_decode($str);
    	
        return $str;
    }
    /**
     * @功能的实现
     * @param  string $str 	传入要处理的字符串
     * @param  array  $result $result['content']=>替换后内容，
     *                        $result['i']=>标识，用于后续判断是否发送通知信息给被@的用户
     *                        1 =>需要发送通知 0=>不需要
     */
    public function aite($str = '') {
    	is_login();
    	preg_match('/@(.*?)\,/',$str,$username);
    	$m_u = M('User');
    	$where['username'] = $username[1];
    	$r = $m_u ->where($where) ->find();
    	$result = array();
    	if ($r) {
    		$replace 			= "<a href='".U('Member/'.$r['id'].'')."'>@".$r['username']."</a>,";
    		$result['content'] 	= preg_replace('/@(.*?)\,/',$replace,$str);
    		$result['i'] 		= 1; 
    		$result['uid'] 		= $r['id'];
    		$result['username'] = $r['username'];
    	}else{
    		$result['content'] 	= $str;
    		$result['i'] = 0; 
    	}
    	return $result;
    	//var_dump($result);
    }
	
	/*
	 * 用于调试测试
	 */
 	function test()
 	{
		header("content-type:text/html;charset=utf-8");
		
		A('Topic')->del();
		//$this->display();
		
	}
}

?>