<?php

class UserController extends AdminController {


    public function __construct()
    {
        parent::__construct();
    }
    public function post()
    {
        $title = htmlspecialchars($_POST['title'],ENT_QUOTES);
        $content = $_POST['content'];

        $input = array(
            'title' => $title,
            'content' => $content,
        );
        $rules = array (
            'title' => 'required',
            'content' => 'required',
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
            $subject = new Subject();
            $result = $subject->addSubject($title , $content);
            $subjectsInfo = $subject->getSubject(self::INDEX_SUBJECT_NUM);
            $this->redis->set(self::KEY_INDEXSUBJECTS , serialize($subjectsInfo));
            if($result)
            {
                return Response::json(['success' => true]);
            } else {

                return Response::json(['success' => false]);
            }
        }

    }

    public function addComment()
    {
        $subjectId = htmlspecialchars($_POST['postId'],ENT_QUOTES);
        $message = htmlspecialchars($_POST['comment'],ENT_QUOTES);
        $input = array(
            'subjectId' => $subjectId,
            'message' => $message,
        );
        $rules = array (
            'subjectId' => 'required',
            'message' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails() )
        {
            if(Request::ajax())
            {
                return Response::json(['success' => false ]);
            } else{
                return Redirect::back()->withInput()->withErrors($validator);
            }

        } else {
            $reply = new Reply();
            $res = $reply->addComment($subjectId , $message);
            if($res)
            {
                $reply = new Reply();
                $replyInfo = $reply->getLatestReply();

                $this->redis->set(self::KEY_LATESREPLIES , serialize($replyInfo));
                return Response::json(['success' => true]);
            } else {
                return Response::json(['success' => false]);
            }
        }

    }

    public function index()
    {
        $latestReplyInfo = self::getLatesReply();

        $userInfo = self::getLatestUserInfo();
        return View::make('user.ucenter' , compact( 'latestReplyInfo' , 'userInfo'));
    }

    public function alterPwd()
    {
        $pwd1 = htmlspecialchars($_POST['pwd1'],ENT_QUOTES);
        $pwd2 = htmlspecialchars($_POST['pwd2'],ENT_QUOTES);
        $pwd3 = htmlspecialchars($_POST['pwd3'],ENT_QUOTES);
        if($pwd2 != $pwd3)
        {
            return Response::json(['success' => false ]);
        }
        $user = new User();
        if( ! $user->checkOldPassword($pwd1))
        {
            return Response::json(['success' => false ]);
        }

        $input = array(
            'password' => $pwd2,
        );
        $rules = array (
            'password' => 'required|min:6',
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails() )
        {
            if(Request::ajax())
            {
                return Response::json(['success' => false ]);
            } else{
                return Redirect::back()->withInput()->withErrors($validator);
            }

        } else {
            if($user->alterPwd($pwd2))
            {
                return Response::json(['success' => true ]);
            } else {
                return Response::json(['success' => false ]);
            }
        }
    }

//    private function getLatesReply()
//    {
//        if($this->redis->get(self::KEY_LATESREPLIES))
//        {
//            $latestReplyInfo = unserialize($this->redis->get(self::KEY_LATESREPLIES));
//        } else {
//            $reply = new Reply();
//            $latestReplyInfo = $reply->getLatestReply();
//            $this->redis->set(self::KEY_LATESREPLIES ,serialize($latestReplyInfo));
//        }
//        return $latestReplyInfo;
//    }

//    public function getLatestUserInfo()
//    {
//        if( $this->redis->get(self::KEY_USER_INFO) )
//        {
//            $userInfo = unserialize( $this->redis->get(self::KEY_USER_INFO) );
//        } else {
//            $user = new User();
//            $userInfo = $user->getLatestUser();
//            $this->redis->set(self::KEY_USER_INFO , serialize($userInfo));
//        }
//        return $userInfo;
//    }
}