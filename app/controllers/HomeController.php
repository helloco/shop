<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function login()
	{
		return View::make('home.index');
	}

	public function postLogin()
	{
		if ($_POST)
		{
			$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
			$password = htmlspecialchars($_POST['password'],ENT_QUOTES);
			$role = htmlspecialchars($_POST['role'],ENT_QUOTES);
			if(User::checkLogin($name, $password, $role))
			{
				Session::put('user.name',$name);
				Session::put('user.role',$role);
//				return Redirect::action('SystemController@index');
//				return Redirect::route('system.index');
//				echo "OKKK";exit;
				if ($role == self::ROLE_SYSTEM)
				{
					return Redirect::to('system');
				} elseif ($role == self::ROLE_REPERTORY)
				{
					return Redirect::to('rept');
				} elseif ($role == self::ROLE_SHOP)
				{
					return Redirect::to('shop');
				}
			}else {
				return Redirect::to('/')->with('errors', '请您正确填写下列数据')->withInput();
			}
		}
		else {
			echo "sorry";exit;
			// 登录失败，跳回
			return Redirect::back()
				->withInput()
				->withErrors(array('attempt' => '“用户名”或“密码”错误，请重新登录！'));
		}
	}

	// insert data
	public function fuck()
	{
		$user = User::find(1);

		Auth::login($user);
		var_dump("<pre>",$user);
//		$user = new User();
//
//		$user->name = 'coco';
//		$user->password = Hash::make('coco');
//		$user->role = 1;
//		$user->email = 'coco@coco.cn';
//		$user->login = '11';
//		$user->save();
	}
}
