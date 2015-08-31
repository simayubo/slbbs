<?php
/**
* 后台帖子模块控制器
*/
namespace Slbbsadmin\Controller;
use Think\Controller;
class TopicController extends Controller
{
	/**
	 * 帖子状态操作 0=》未审核 1=》正常
	 * @param $id 		帖子ID
	 * @param $value 	值
	 */
	public function audit(){
		is_login();
		$id 	= 	I('get.id');
		$value	=	I('get.value');
		$data['hide'] = $value;
		$r = M('Topic') ->where("id = %d", $id) ->save($data);
		if ($r > 0) {
			$this ->success("操作成功");
		}else{
			$this ->error('操作失败！');
		}
	}
	/**
	 * 精华帖子操作
	 * @param $id 		帖子ID
	 * @param $value 	值
	 */
	public function best(){
		is_login();
		$id 	= 	I('get.id');
		$value	=	I('get.value');
		$data['best'] = $value;
		$r = M('Topic') ->where("id = %d", $id) ->save($data);
		if ($r > 0) {
			$this ->success("操作成功");
		}else{
			$this ->error('操作失败！');
		}
	}
	/**
	 * 置顶消顶操作
	 * @param $id 		帖子ID
	 * @param $value 	值
	 */
	public function top(){
		is_login();
		$id 	= 	I('get.id');
		$value	=	I('get.value');
		$data['top'] = $value;
		$r = M('Topic') ->where("id = %d", $id) ->save($data);
		if ($r > 0) {
			$this ->success("操作成功");
		}else{
			$this ->error('操作失败！');
		}
	}
	/**
	 * 帖子删除操作 =》get传入id
	 */
	public function del(){
		is_login();
		$id = I('get.id');
		$r = M('Topic') ->where("id = %d", $id) ->delete();
		if ($r > 0) {
			$this ->redirect('Slbbsadmin/Content/index');
		}else{
			$this ->error('删除失败！');
		}
	}
}



?>