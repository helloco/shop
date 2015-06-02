<?php

class Reply extends Eloquent
{
    protected $table = 'reply';
    public function addComment($subject_id , $comment)
    {
        $res = DB::table('reply')->insert(
            array('message' => $comment , 'subject_id' => $subject_id ,'post_time' => time() , 'author_id' =>  User::getIdByUsername(Session::get('user.name')),'author' => Session::get('user.name'))
        );
        return $res ? true :false;
    }

    public static function getReplyBySubjectId($subjectId)
    {
        $replies = DB::table('reply')->where('subject_id' , '=' , $subjectId)->get();
        return $replies ? $replies : null;
    }

    public function deleteReply($replyId)
    {
        $res = DB::table('reply')->where('id' , '=' , $replyId)->delete();
        return $res ? true :false;
    }

    public function getLatestReply($num = 10)
    {
        $replies = DB::table('reply')->orderBy('post_time' , 'desc')->take($num)->get();
        return $replies ? $replies : null;
    }
}