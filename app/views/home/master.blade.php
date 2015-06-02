<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Easy Communicate With Each Other</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('public/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('public/css/starter-template.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="{{ URL::asset('public/assets/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->
    <script src="{{ URL::asset('public/assets/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--外部css-->
    <link href="{{ URL::asset('public/css/styles.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/custom.css') }}" rel="stylesheet">


    </head>

    <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::to('home')}}">Happy Coding</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if(Session::has('user.name') )
                        <li><a href="{{URL::to('i')}}" role="button" data-toggle="modal">{{Session::get('user.name')}}</a></li>
                        <li><a href="/bbs/logout">Logout</a></li>
                    @else
                        <li><a href="#loginModal" role="button" data-toggle="modal">Login</a></li>
                        <li class="active"><a href="#RegisterModal" role="button" data-toggle="modal">Sign up</a></li>
                    @endif

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>


    <div class="container">

        <div class="row">
            @yield('left')


            <div class="col-md-4">
                <div class="panel-heading"> <h4><i class="glyphicon glyphicon-comment"></i>最新回复</h4></div>
                <ul class="list-group">
                   @foreach($latestReplyInfo as $replyItem)
                        <li class="list-group-item"><a href='{{URL::to("t/$replyItem->subject_id")}}'><i class="glyphicon glyphicon-heart"></i> <small>({{date('m-d,h:m:s' , $replyItem->post_time)}})</small>
                                {{$replyItem->message}}</a>
                        </li>

                    @endforeach
                </ul>

                <div class="panel panel-default">
                    <div class="panel-heading"> <h4>欢迎新会员</h4></div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($userInfo as $index => $userName)

                                <div class="col-xs-4"><a class="btn btn-success center-block" href="#">{{$userName}}</a></div>

                                @if(($index+1) % 3 == 0)
                                    <br><br><br>
                                @endif
                            @endforeach
                        </div>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->



    <div class="container">

        <!--login modal-->
        <div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h2 class="text-center">Login</h2>
                    </div>
                    <div class="modal-body">
                        <form class="form col-md-12 center-block form-horizontal" method="post" action="/" accept-charset="UTF-8" novalidate="novalidate" >
                            <div class="form-group">
                                <input type="text" name="username" class="form-control input-lg username" placeholder="用户名">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control input-lg password" placeholder="密码">
                            </div>
                            <div class="form-group">
                                {{--<button class="btn btn-primary btn-lg btn-block">Sign In</button>--}}
                            <input type="button" value="Sign In" class="submit btn btn-primary btn-lg btn-block" />
                            <span class="pull-right"><a href="#">Register</a></span><span class="message" style="color:red"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

        <div id="RegisterModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h2 class="text-center">Register</h2>
                    </div>
                    <div class="modal-body">
                        <form class="form col-md-12 center-block form-horizontal" method="post" action="/" accept-charset="UTF-8" novalidate="novalidate" >
                            <div class="form-group">
                                <input type="text" name="username" class="form-control input-lg reg_username" placeholder="用户名">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control input-lg reg_password" placeholder="密码">
                            </div>
                            <div class="form-group">
                                {{--<button class="btn btn-primary btn-lg btn-block">Sign In</button>--}}
                                <input type="button" value="Sign up" class="register btn btn-primary btn-lg btn-block" />
                                <span class="pull-right"><a href="#loginModal">Login in</a></span><span class="message" style="color:red"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

</div><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://cdn.bootcss.com/jquery/2.0.2/jquery.min.js"></script>
<script src="{{ URL::asset('public/dist/js/bootstrap.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ URL::asset('public/assets/js/ie10-viewport-bug-workaround.js') }}"></script>

<script src="{{ URL::asset('public/js/scripts.js') }}"></script>

<!--self js-->

<script>
    $(function () {
        $(".submit").click(function () {
            $.ajax({
                type: "POST",
                url: '/bbs/login',
                data: {
                    username: $('.username').val(),
                    password: $('.password').val(),
                }
            }).done(function (msg) {
                $.each(msg, function(index, value)
                {
                    if(value != true)
                    {
                        $('.message').text('登录失败');
                    } else {
                        $('.message').text('登录成功! 正在跳转..');

                    }
                });
                setTimeout(function(){
                    location.reload();
                }, 1200);

            });

        })
    });

    $(function () {
        $(".register").click(function () {
            console.log($('.password').val());
            $.ajax({
                type: "POST",
                url: '/bbs/register',
                data: {
                    username: $('.reg_username').val(),
                    password: $('.reg_password').val(),
                }
            }).done(function (msg) {
                //var aa = msg.responseJSON;

                $.each(msg, function(index, value)
                {
                    if(value != true)
                    {
                        $('.message').text('用户名被占用，或者信息填写错误');
                    } else {
                        $('.message').text('注册成功！正在跳转..');
                        setTimeout(function(){
                            location.reload();
                        }, 1200);
                    }
                });
            });

        })
    });

</script>
    <div class="script">
        @yield('script')
    </div>
</body>
</html>
