@extends('home.master')

@section('left')
    <div class="col-md-8">
        <div class="panel-heading"> <a href="/bbs/postView" class="pull-right">创作一个新主题</a><h4><a href="#"><strong><i class="glyphicon glyphicon-comment"></i> 帖子详情</strong></a></h4></div>

        <ul class="list-group">

        </ul>
        <div class="panel panel-default">
            <div class="panel-heading"> @if(Session::get('user.role') == 1 )<a href="#" class="pull-right deleteSubject"> × </a>  &nbsp; @endif<a href="#" class="pull-right">  {{$subjectInfo['author']}} </a> <h4>{{$subjectInfo['title']}}</h4></div>
            <div class="panel-body">
                <input type="hidden" class="subjectId" name="subjectId" value="{{$subjectInfo['id']}}">
                {{$subjectInfo['content']}}
            </div>
        </div>


        @if(empty($replies))
            <div class="panel panel-default">
                <div class="panel-body">
                    暂无回复...
                </div>
            </div>
        @else
            <div class="panel panel-default">
                @if(Session::get('user.role') == 1 )
                    @foreach($replies as $reply)
                        <div class="panel-body">
                            <input type="hidden" class="replyId" name="replyId" value="{{$reply->id}}">
                            <a href="#" class="pull-right deleteReply" value="{{$reply->id}}"> × </a><a href="#" class="pull-right"> {{ date("m-d,h:m:s", $reply->post_time)}} &nbsp; {{$reply->author}} </a>
                            {{$reply->message}}
                        </div>
                        </hr>
                    @endforeach
                @else
                    @foreach($replies as $reply)
                        <div class="panel-body">
                            <a href="#" class="pull-right"> {{ date("m-d,h:m:s", $reply->post_time)}} &nbsp; {{$reply->author}} </a>
                            {{$reply->message}}
                        </div>
                        </hr>
                    @endforeach
                @endif
            </div>
        @endif

        <div class="well">
            <form class="form-horizontal" role="form">
                <h4>添加一条回复</h4>
                <div class="form-group" style="padding:14px;">
                    <textarea class="textarea form-control" placeholder="Add your comment"></textarea>
                    <input type="hidden" name="text" value="{{$subjectInfo['id']}}" class="postId">
                </div>
                <button class="addComment btn btn-success pull-right" type="button">Post</button><ul class="list-inline"><li><a href="#"><i class="glyphicon glyphicon-align-left"></i></a></li><li><a href="#"><i class="glyphicon glyphicon-align-center"></i></a></li><li><a href="#"><i class="glyphicon glyphicon-align-right"></i></a></li></ul>
            </form>
        </div>


    </div>
@stop

@section('script')
    <script>
        $(function () {
            $(".addComment").click(function () {
                $.ajax({
                    type: "POST",
                    url: '/bbs/addComment',
                    data: {
                        postId: $('.postId').val(),
                        comment: $('.textarea').val()
                    }
                }).done(function (msg) {
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("回帖失败");
                        } else {
                            alert("回帖成功！");

                        }
                    });
                    location.reload();
                });

            })
        });


        $(function () {
            $(".deleteSubject").click(function () {
                $.ajax({
                    type: "POST",
                    url: '/bbs/deleteSubject',
                    data: {
                        subjectId: $('.subjectId').val(),
                    }
                }).done(function (msg) {
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("删除失败");
                        } else {
                            alert("删除成功！");

                        }
                    });
                    window.location="{{URL::to('home')}}";
                });

            })
        });


        $(function () {
            $(".deleteReply").click(function () {

                $.ajax({
                    type: "POST",
                    url: '/bbs/deleteReply',
                    data: {
                        replyId: $(this).attr('value'),
                    }
                }).done(function (msg) {
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("删除失败");
                        } else {
                            alert("删除成功！");
                            window.location="{{URL::to('home')}}";
                        }
                    });
                });

            })
        });
    </script>
    @stop