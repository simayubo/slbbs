<?php
/**
* 文件操作类
*/
namespace Home\Controller;
use Think\Controller;
class FileController extends Controller
{
	/**
	 * 文件列表读取
	 * $table: 表属性; $bid: 要操作的id号
	 */
	function showFileList($table,$id)
	{
		$d_f=D('File');
		$r=$d_f->getFileList($table,$id);
		$file=array();
		foreach ($r as $key => $value) 
		{
			if ($value['type']=='file') $file['file'][] =$value; 
			elseif ($value['type']=='image') $file['images'][]=$value; 
		}
		return $file;
	}
	/**
	 * 上传文件
	 */
	public function upLodeFile(){
		if (!IS_POST) {
			$this->error("页面错误！");
		}
		$config = array(
    		'maxSize'    =>    1024*1024*10,
    		'rootPath'   =>    './Upload/',
    		'savePath'   =>    '',
    		'exts'       =>    array('jpg', 'gif', 'png', 'jpeg', 'rar', 'zip', 'apk', 'txt'),
		);
 		$upload = new \Think\Upload($config);// 实例化上传类
    	// 上传文件 
    	$info = $upload->upload();
    	if(!$info) {
    		echo "<script type='text/javascript'>alert('".$upload->getError()."');</script>"
    		exit();
    	}else{
    		
    		//路径写入数据库
    		$data=array();
    		foreach($info as $file){
    			$data['avatar']=$file['savepath'].$file['savename'];
   			}
   			if (!$u->where('id=%d',$id)->save($data)) $this->redirect('User/edit?msg=写入路径失败！');
   			else $this->redirect('User/edit?msg=上传成功！');
    	}
	}
	
}


?>