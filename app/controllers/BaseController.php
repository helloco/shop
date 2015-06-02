<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	const INDEX_SUBJECT_NUM = 24;
	const KEY_LATESREPLIES = 'latestReplies';
	const KEY_INDEXSUBJECTS = 'indexSubject';
	const KEY_USER_INFO = 'userInfo';

	public $redis;
	public function __construct()
	{
		$this->redis = $this->initRedis();
	}

	public function initRedis()
	{
		$redis = new Redis();
		$redis->connect('127.0.0.1', 6379);
		return $redis;
	}

	public function getLatesReply()
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

}
