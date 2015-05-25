@extends('system.master')

@section('content')

    <div id="content-header">
        <h1>Tables</h1>
        <div class="btn-group" style="width: auto;">
            <a class="btn btn-large tip-bottom" data-original-title="Manage Files"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" data-original-title="Manage Users"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" data-original-title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
            <a class="btn btn-large tip-bottom" data-original-title="Manage Orders"><i class="icon-shopping-cart"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Tables</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
                        <h5>Static table</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>密码</th>
                                <th>角色</th>
                                <th>邮箱</th>
                                <th>最后登录时间</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($userInfo as $info)
                                <tr>
                                    <td>{{$info->id}}</td>
                                    <td>{{$info->name}}</td>
                                    <td>****</td>
                                    <td>{{$info->role}}</td>
                                    <td>{{$info->email}}</td>
                                    <td>{{ date("Y-m-d,h:m:s", $info->login) }}</td>
                                    <td><div class="delete" value="{{$info->id}}" ><a href="">删除</a></a></div></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="row-fluid">
            <div id="footer" class="span12">
                2012 © Unicorn Admin. Brought to you by <a href="https://wrapbootstrap.com/user/diablo9983">diablo9983</a>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script>
        $(function () {
            $(".delete").click(function () {
                $.ajax({
                    type: "POST",
                    url: 'deleteUser',
                    data: {
                        id: $(this).attr('value')
                    }
                }).done(function (msg) {
                    console.log(msg);
                    $.each(msg, function(index, value)
                    {
                        if (value.length != 0)
                        {
                            $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><strong>填写有误</strong><div>');
                        }
                    });
                });

            })
        });

    </script>
@stop