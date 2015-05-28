@extends('system.master')

@section('content')

        <div id="content-header">
            <h1>添加用户</h1>

        </div>
        <div id="breadcrumb">
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 菜单</a>
            <a href="#" class="current">添加用户（管理员）</a>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                            <h5>添加用户（管理员）</h5>
                            <span class="label label-important">提示：用户名和密码不得少于8个字符</span>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="/"  accept-charset="UTF-8" name="basic_validate" id="basic_validate" novalidate="novalidate" />

                            <div class="control-group">
                                <label class="control-label">角色</label>
                                <div class="controls">
                                    <select name="role" id="role">
                                        <option value="1"/>系统管理员
                                        <option value="2"/>仓库管理员
                                        <option value="3"/>连锁店管理员
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">用户名</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">密码</label>
                                <div class="controls">
                                    <input type="password" name="password" id="password" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" name="email" id="email" />
                                </div>
                            </div>

                            <div class="form-actions">
                                <input type="button" value="添加" class="submit" />
                            </div>
                            </form>
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
        $(".submit").click(function () {
            $.ajax({
                type: "POST",
                url: 'addUserInfo',
                data: {
                    role: $('#role').val(),
                    name: $('#name').val(),
                    password: $('#password').val(),
                    email: $('#email').val()

                }
            }).done(function (msg) {
                $.each(msg, function(index, value)
                {
                    if(value != true)
                    {
                        alert("添加失败！请检查填写的信息！");
                    } else {
                        alert("添加成功！");
                    }
                });
                location.reload();
            });

        })
    });
</script>
@stop