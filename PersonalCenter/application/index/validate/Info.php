<?php
namespace app\index\validate;
use think\validate;

class Info extends Validate
{
	protected $rule = [
		'name'=>'require',
		// 'password|密码'=>'require|min:6|confirm:repassword'
		'nickname'=>'require|min:2',
		'phonenumber'=>'require',
		'email'=>'require',
		'idtype'=>'require',
		'idnumber'=>'require',
		'birthday'=>'require',
		'birthplace'=>'require',

	];
	protected $message = [
		'name.require'=>'真实姓名不能为空',
		'nickname.require'=>'昵称不能为空',
		'nickname.min'=>'昵称长度不能少于2位',
		'phonenumber.require'=>'电话号码不能为空',
		'email.require'=>'电子邮箱不能为空',
		'idtype.require'=>'身份类型不能为空',
		'idnumber.require'=>'身份证号不能为空',
		'birthday.require'=>'生日不能为空',
		'birthplace.require'=>'出生地不能为空',

		// 'password.require'=>'密码不能为空',
		// 'password.min'=>'密码长度不能少于6位',
		// 'password.confirm'=>'两次密码不一致',


	];


}
