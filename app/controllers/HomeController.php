<?php

class HomeController extends BaseController {


	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->redis->get(self::KEY_INDEXSUBJECTS))
		{
			$subjectsInfo = unserialize($this->redis->get(self::KEY_INDEXSUBJECTS));
		} else {
			$subject = new Subject();
			$subjectsInfo = $subject->getSubject(self::INDEX_SUBJECT_NUM);
			$this->redis->set(self::KEY_INDEXSUBJECTS , serialize($subjectsInfo));
		}

		$latestReplyInfo = self::getLatesReply();

		$userInfo = self::getLatestUserInfo();
		return View::make('home.index',compact('subjectsInfo' , 'userInfo' , 'latestReplyInfo') );
	}

	public function login()
	{
		if ($_POST)
		{
			$name = htmlspecialchars($_POST['username'],ENT_QUOTES);
			$password = htmlspecialchars($_POST['password'],ENT_QUOTES);
			$user = new User();
			$result = $user->checkLogin($name, $password);
			if($result)
			{
				$userInfo = (array)$result[0];
				Session::put('user.name',$name);
				Session::put('user.role',$userInfo['role']);

				try {
					$user->updataLogin($name , time());
				} catch (Exception $e) {
				}
				return Response::json(['success' => true  ]);
			}else {
				return Redirect::to('/')->with('errors', '请您正确填写下列数据')->withInput();
			}
		}
		else {
			echo "sorry";exit;
			// 登录失败，跳回
		}
	}

	public function register()
	{
		$name = htmlspecialchars($_POST['username'],ENT_QUOTES);
		$password = htmlspecialchars($_POST['password'],ENT_QUOTES);
		$input = array(
			'name' => $name,
			'password' => $password,
		);
		$rules = array (
			'name' => 'required|unique:user',
			'password' => 'required|min:6',
		);
		$validator = Validator::make($input, $rules);
		if ( $validator->fails() )
		{
			if(Request::ajax())
			{
				return Response::json(['success' => false]);
			} else{
				return Redirect::back()->withInput()->withErrors($validator);
			}

		} else {
			$user = new User();
			$res = $user->addUser($role = 2, $name , $password , $email = "");
			if($res)
			{
				return Response::json(['success' => true]);
			} else {
				return Response::json(['success' => false]);
			}
		}
	}

	public function postView()
	{
		return View::make('home.postView');
	}

	public function postDetail($id)
	{
		$subject = new Subject();
		$subjectInfo = $subject->getOneSubject($id);
		$subjectInfo = (array)$subjectInfo[0];

		// get comment message
		$replies = Reply::getReplyBySubjectId($subjectInfo['id']);
		$latestReplyInfo = self::getLatesReply();
		// get latest user info
		$userInfo = self::getLatestUserInfo();
		//var_dump($userInfo);exit;
		return View::make('home.postDetail' ,compact('replies' , 'subjectInfo' ,'userInfo' , 'latestReplyInfo'));

	}

	public function logout()
	{
		Session::flush();
		return Redirect::to('/');

	}
/****
	private function getLatesReply()
	{
		if($this->redis->get(self::KEY_LATESREPLIES))
		{
			$latestReplyInfo = unserialize($this->redis->get(self::KEY_LATESREPLIES));
		} else {
			$reply = new Reply();
			$latestReplyInfo = $reply->getLatestReply();
			$this->redis->set(self::KEY_LATESREPLIES ,serialize($latestReplyInfo));
		}
		return $latestReplyInfo;
	}

	public function getLatestUserInfo()
	{
		if( $this->redis->get(self::KEY_USER_INFO) )
		{
			$userInfo = unserialize( $this->redis->get(self::KEY_USER_INFO) );
		} else {
			$user = new User();
			$userInfo = $user->getLatestUser();
			$this->redis->set(self::KEY_USER_INFO , serialize($userInfo));
		}
		return $userInfo;
	}
****/
}
