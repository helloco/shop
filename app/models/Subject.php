<?php

class Subject extends Eloquent
{
    protected $table = 'subject';

    public function addSubject($title , $content)
    {
        if(empty($title) || empty($content))
        {
            return false;
        }
        $res = DB::table('subject')->insert(
            array('title' => $title , 'post_time' => time() , 'author' => Session::get('user.name') , 'content' => $content )
        );
        return $res ? true :false;
    }

    public function getSubject($num)
    {
        $subjectsInfo = DB::table('subject')->orderBy('post_time' , 'desc')->take($num)->get();
        return $subjectsInfo ? $subjectsInfo : false;
    }

    public function getOneSubject($id)
    {
        $subjectsInfo = DB::table('subject')->where('id' , '=' , $id)->get();
        return $subjectsInfo ? $subjectsInfo : false;
    }

    public function deleteSubject($subjectId)
    {
        $res = DB::table('subject')->where('id' , '=' , $subjectId)->delete();
        return $res ? true :false;
    }
}