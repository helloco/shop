@extends('home.master')

@section('left')
    <div class="col-md-8">
        <div class="panel-heading"> <a href="/bbs/postView" class="pull-right">创作一个新主题</a><h4><a href="#"><strong><i class="glyphicon glyphicon-comment"></i> 个人中心</strong></a></h4></div>
        <div class="well">
            <form class="form">
                <h4>修改密码<small><span class="label" style="color: red">(提示：密码不得少于6个字符)</span></small></h4>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">旧密码</span>
                    <input type="password" class="form-control pwd1" placeholder="original password" aria-describedby="basic-addon1">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">新密码</span>
                    <input type="password" class="form-control pwd2" placeholder="new password" aria-describedby="basic-addon1">
                </div>

                <br>

                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">确认密码</span>
                    <input type="password" class="form-control pwd3" placeholder="confirm password" aria-describedby="basic-addon1">
                </div>
                <br>
                <button type="button" class="btn btn-primary alterPwd">确认修改</button>
            </form>
        </div>


    </div>
@stop
@section('script')
    <script>
        $(function () {
            $(".alterPwd").click(function () {
                $.ajax({
                    type: "POST",
                    url: '{{URL::to('alterPwd')}}',
                    data: {
                        pwd1: $('.pwd1').val(),
                        pwd2: $('.pwd2').val(),
                        pwd3: $('.pwd3').val(),
                    }
                }).done(function (msg) {
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("填写有误，修改失败！");
                        } else {
                            alert("修改成功！请重新登录");

                            window.location="{{URL::to('logout')}}";
                        }
                    });
                });

            })
        });

    </script>

@stop