<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
	public function login(){
		return $this->fetch('index/login');
	}

	public function check()
	{
		$data = input('post.');
		$result = Db::table('user_data')->where('username',$data['username'])->find();
		$info = Db::table('user_info')->where('username',$data['username'])->select();
		// dump($info[0]['image']);
		// die;
		if ($result){
			if($result['password'] ===$data['password']){
				session('username',$data['username']);
				session('password',$data['password']);
				session('info',$info);
				session('image',$info[0]['image']);
			$this->success('恭喜登录成功','Info/member_center');
				}else{
				$this->error('密码不正确');
			}
		}else{
			$this->error('用户名不存在');
			exit;
		}
	}



}