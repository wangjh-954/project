<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Info as InfoModel;
use app\index\validate\Info as InfoValidate;
use app\index\validate\Password as PasswordValidate;
use think\Session;
class Info extends Controller
{
	public function member_center()
	{
		return $this->fetch('index/member_center');
	}
	public function make_password()
	{
		return $this->fetch('index/center_make_password');
	}
	public function make_head()
	{
		return $this->fetch('index/center_make_head');
	}
	public function indentity()
	{
		return $this->fetch('index/center_indentity_prove');
	}
		
	public function update_info()
	{
		$data = input('post.');

		$username = Session::get('username');
		$val = new InfoValidate();
		if (!$val->check($data)){
			$this->error($val->getError());
			exit;
		}
		$info = new InfoModel();
		$ret = Db::table('user_info')->where('username',$username)->update(['name' => $data['name'],'email' => $data['email'],'sex' => $data['sex'],'phonenumber' => $data['phonenumber'],'idnumber' =>$data['idnumber'],'idtype' => $data['idtype'],'birthday' => $data['birthday'],'birthplace' => $data['birthplace'],'nickname'=>$data['nickname']]);
		if ($ret){
			$this->success('修改成功','index/login');
		}else{
			$this->error('修改失败');
		}
	}

	public function update_password(){
		$data = input('post.');

		$username = Session::get('username');
		// $passwrod = Session::get('password');
		$val = new PasswordValidate();
		if (!$val->check($data)){
			$this->error($val->getError());
			exit;
		}
		$info = new InfoModel();
		$ret = Db::table('user_data')->where('username',$username)->update(['password' => $data['password']]);
		if ($ret){
			$this->success('修改成功','index/login');
		}else{
			$this->error('修改失败');
			}
	}
	 public function upload(){
   		 $file = $this->request->file("image");
   		 $new_file = $file->move("./static/uploads");
   		 $image = $new_file->getSaveName();
   		 Db::table('user_info')->where('username',123)->update(['image' => $image]);
   		 $data = Db::table('user_info')->where('username',123)->select();
   		 Session('image',$data[0]['image']);
   		if ($image){
			$this->success('上传成功');
		}else{
			$this->error('修改失败');
			}
  
	}
}