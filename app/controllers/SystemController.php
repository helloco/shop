<?php

class SystemController extends AdminController {

    public function __construct()
    {
       // echo Session::get('user.role');
        if(Session::get('user.role') != 1)
        {
            die("权限不够");
        }
    }

    public function index()
    {
        echo 111;
    }

    public function deleteSubject()
    {
        $subjectId = $name = htmlspecialchars($_POST['subjectId'],ENT_QUOTES);
        $subject = new Subject();
        $res = $subject->deleteSubject($subjectId);
        if($res)
        {
            return Response::json(['success' => true]);
        } else {
            return Response::json(['success' => false]);
        }
    }

    public function deleteReply()
    {
        $replyId = $name = htmlspecialchars($_POST['replyId'],ENT_QUOTES);
        $reply = new Reply();
        $res = $reply->deleteReply($replyId);
        if($res)
        {
            return Response::json(['success' => true]);
        } else {
            return Response::json(['success' => false]);
        }
    }
}