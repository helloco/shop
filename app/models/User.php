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

	public static function checkLogin($name, $password, $role)
	{
		$result = DB::select('select * from user where name = ? and password = ? and role = ?', array($name, md5($password), $role));
		return $result ? true : false;
	}

	public static function addUser($role , $name , $password , $email = null)
	{
		$result = DB::table('user')->insert(
			array('role' => $role, 'name' => $name , 'password' => md5($password) , 'email' => $email )
		);
		return $result ? true : false;
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
}
