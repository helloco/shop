@extends('home.master')

@section('left')

    <div class="col-md-8">
        <div class="panel-heading"> <a href="/bbs/postView" class="pull-right">创作一个新主题</a><h4><strong><i class="glyphicon glyphicon-comment"></i> 最新主题</strong></h4></div>
        <ul class="list-group">
            @foreach($subjectsInfo as $subjectInfo)
                <li class="list-group-item"><span class="pull-right"><a href="#">{{$subjectInfo->author}}</a></span><a href='{{URL::to("t/$subjectInfo->id")}}'><i class="glyphicon glyphicon-flash"></i>  {{$subjectInfo->title}}</a><small>( {{ date("Y-m-d,h:m:s", $subjectInfo->post_time) }} )</small></li>

            @endforeach
        </ul>


    </div>
    @stop