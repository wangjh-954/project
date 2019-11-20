<?php
namespace app\index\validate;
use think\validate;

class Password extends Validate
{
	protected $rule = [
	
		
		'password|密码'=>'require|min:3|confirm:repassword',
		'oldpassword'=>'require'
		
	];
	protected $message = [
		'oldpassword.confirm'=>'旧密码不对',
		'password.require'=>'密码不能为空',
		'password.min'=>'密码长度不能少于3位',
		'password.confirm'=>'两次密码不一致',
		'oldpassword.require'=>'旧密码不能为空'
		

	];


}
