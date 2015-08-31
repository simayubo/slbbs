<?php
/**
* MessageController.class.php 文件
* ==============================================
* 版权所有 2015-2020 http://www.slbbs.com
* ----------------------------------------------
* 这不是一个自由软件，未经授权不许任何使用和传播。
* ==============================================
* @date: 2015-6-1 下午4:56:11
* @author: BO
* @version: 1.0
*/
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller
{
	/**
	 * 私信
	 */
	public function inbox() {
		is_login();
		$p=A('Public');
		$common=$p->common();
		$d_message=D('Message');
		//分页
		$num = 10; //每页显示几条
		$page_count = ceil($d_message->getMessageNum('list')/$num); //总页数
		$page_now = empty(I('get.page'))?1:I('get.page'); //当前页
		$page=$p->pageShow($page_count,$page_now,'message','inbox');

		$message=$this->regroup($d_message->getMessage(session('user_id'),($page_now-1)*$num,$num,'inbox'),2,'list'); //获取收信列表
		$title="个人信箱 - ".$common['website']['site_title'];

		$this->assign('title',$title);
		$this->assign('common',$common);
		$this->assign('message',$message);
		$this->assign('page',$page);
		$this->display();
	}
	/**
	 * 发私信
	 * @param int $id 发送者id
	 * @param int $send_id  收信人id
	 */
	public function sendMessage($type = '') {
		is_login();

		if (empty($_POST['send_id']) || empty($_POST['content'])) $this->error("请完整填写表单！");
		if ($_POST['send_id'] == 1) $this->error("不能向系统发私信！");
		if ($_POST['send_id'] == session('user_id')) $this->error("你不能向自己发私信！");

		$n=D('User')->where("id=%d",addslashes(I('post.send_id')))->count('id');
		if ($n==0) $this->error("很抱歉，我们没有查到此用户，请检查你的输入是否正确！");

		$data = array(
			'send_id' 	=> 	I('post.send_id'),
			'uid'		=>	session('user_id'), 
			'content'	=>	I('post.content'), 
			'time'		=>	date('Y-m-d H:i:s',time()),
			'message_id'=>	empty(I('post.message_id'))?0:I('post.message_id'),
			);
		//var_dump($data);
		$m_message=M('Message');
		$r=$m_message->add($data);
		if ($r>0) {
			if ($type == 'm') {
				//重置私信对话为未读状态
				$data2['id']=$data['message_id'];
				$data2['read_on']=0;
				$m_message->save($data2);
			}
			D('User')->upUnReadMsg($data['send_id']); //更新接受者未读私信条数

			if ($type == 'm') $this->success('发送成功！',U('Message/m/'.$data['message_id']));
			else $this->success('发送成功！',U('Message/m/'.$r));
		}else{
			$this->error('发送失败!');
		}
	}
	/**
	 * [m 消息对话页面]
	 * @param  [int] $id [传入消息对话id]
	 * @return [type]     [description]
	 */
	public function m($id) {
		is_login();
		$id=I('get.id');
		$common=A('Public')->common();
		$d_message=D('Message');
		$message=$this->regroup($d_message->getMessageById($id ,'inbox'),1); //获取消息主内容
		if (($message['uid'] == session('user_id') || $message['send_id'] == session('user_id')) && $message['message_id']==0) {
			$title="与".$message['username']."的私信 - ".$common['website']['site_title'];
			//获取对话列表信息
			$message_list=$this->regroup(D('Message')->getConMessage($message['id'],0,10),2,'m');
			D('User')->upUnReadMsg(session('user_id'));
			//var_dump($message);
		}else{
			$this->error('抱歉！找不到此条私信！');
			//var_dump($message);
		}
		//var_dump($message);

		$this->assign('title',$title);
		$this->assign('common',$common);
		$this->assign('message',$message);
		$this->assign('message_list',$message_list);
		$this->display();
	}
	/**
	 * 消息数组重组
	 * @param array $arr 传入数组
	 * @param string $type 1 => 一维数组 2 => 二维数组
	 * @return Ambigous <multitype:, unknown>
	 */
	private function regroup( $arr, $type, $list){
		$res_arr=array();
		if ($type==1) {
			foreach ($arr as $key => $value){
				switch ($key){
					case 'read_on':
						if ($value==0) $res_arr[$key]="【主题内容】(对方未阅读)";
						else if ($value==1) $res_arr[$key]="【主题内容】[对方于 ".$arr['read_time']." 已读]";
						break;
					case 'time': $res_arr[$key]=date_rewrite(strtotime($value));
						break;
					case "avatar":
						if ($value==0) {
							$res_arr['avatar']="http://".SLBBS_ROOT."/Public/icon/avatar/default.png";
						}else {
							$res_arr['avatar']="http://".SLBBS_ROOT."/Public/icon/avatar/".$value."";
						}
						break;
					case 'send_id':
							if ($value==session('user_id') && $arr['read_on']==0) {
								D('Message')->upReadMessage($arr['id']); //标记已读
							}
							$res_arr[$key]=$value;
						break;
					default:
						$res_arr[$key]=$value;
						break;
				}
			}
		}else if ($type==2){
			foreach ($arr as $key => $value){
				foreach ($value as $_key => $_value){
					switch ($_key){
						case 'send_id':
							if ($_value==session('user_id') && $value['read_on']==0) {
								D('Message')->upReadMessage($value['id']); //标记已读
							}
							break;
						case 'read_on':
							if ($_value==0) {
								if ($list=='list') $res_arr[$key][$_key]="<font color='red'>[有新动态]</font>";
								else $res_arr[$key][$_key]="<font color='red'>[对方未读]</font>";
							}
							elseif ($_value==1) {
								if ($list=='list') $res_arr[$key][$_key]="";
								else $res_arr[$key][$_key]=" [对方于 ".$value['read_time']." 已读]";
							}
							break;
						case 'time': $res_arr[$key][$_key]=date_rewrite(strtotime($_value));
						break;
						case "avatar":
							if ($_value==0) {
								$res_arr[$key]['avatar']="http://".SLBBS_ROOT."/Public/icon/avatar/default.png";
							}else {
								$res_arr[$key]['avatar']="http://".SLBBS_ROOT."/Public/icon/avatar/".$_value."";
							}
							break;
						default:
							$res_arr[$key][$_key]=$_value;
							break;
					}
				}
			}
		}
		
		return $res_arr;
	}
}


?>