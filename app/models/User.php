<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function checkLogin($name, $password)
	{
		$result = DB::select('select * from user where name = ? and password = ?', array($name , md5($password)));
		return $result ? $result : false;
	}


	public static function getUserInfo()
	{
		$result = DB::table('user')->get();
		return $result ? $result : null;
	}
	public function updataLogin($user , $loginTime)
	{
		$result = DB::table('user')->where('name' , $user)->update(array('login' => $loginTime));
		return $result ? true : false;
	}

	public function deleteUser($id)
	{
		if(empty($id))
		{
			return false;
		}
		$result = DB::table('user')->where('id' , $id)->delete();
		return $result ? true : false;
	}

	public static function getUsernameById($userId)
	{
		if(empty($userId))
		{
			return null;
		}
		$username = DB::table('user')->where('id' , $userId)->pluck('name');
		return $username ? $username : false;
	}

	public static function getIdByUsername($username)
	{
		if(empty($username))
		{
			return null;
		}
		$userId = DB::table('user')->where('name' , $username)->pluck('id');
		return $userId ? $userId : false;
	}

	public function addUser($role = 2 , $name , $password , $email = "")
	{
		$res = DB::table('user')->insert(
			array('name' => $name , 'password' => md5($password) , 'role' => $role , 'email' => $email , 'login' => time() ,'register_time' => time())
		);
		return $res ? true :false;
	}

	public function checkOldPassword($pwd)
	{
		$res = DB::table('user')->where('name' , '=' , Session::get('user.name'))->where('password' , '=' , md5($pwd))->first();
		return $res ? true : false;
	}

	public function alterPwd($pwd2)
	{
		$res = DB::table('user')->where('name' , '=' , Session::get('user.name'))->update(
			array('password' =>  md5($pwd2))
		);
		return $res ? true : false;
	}

	public function getLatestUser($num = 9)
	{
		$userInfo = DB::table('user')->orderBy('register_time' , 'desc')->take($num)->lists('name');
		return $userInfo ? $userInfo : false;
	}

}
