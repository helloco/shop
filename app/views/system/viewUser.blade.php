@extends('system.master')

@section('content')

    <div id="content-header">
        <h1>查看管理员</h1>

    </div>
    <div id="breadcrumb">
        <a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> 菜单</a>
        <a href="#" class="current">查看管理员</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
                        <h5>查看管理员</h5>
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
                                    <td><div class="delete" value="{{$info->id}}" ><a href="#">删除</a></a></div></td>
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
                2015 &copy; Shop Admin. Brought to you by <a href="#">coco</a>
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
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("删除失败！");
                        } else {
                            alert("删除成功！");
                        }
                    });
                    location.reload();
                });

            })
        });

    </script>
@stop