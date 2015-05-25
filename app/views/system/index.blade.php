@extends('system.master')

@section('content')

        <div id="content-header">
            <h1>Form validation</h1>
            <div class="btn-group">
                <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
                <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
                <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
                <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#">Form elements</a>
            <a href="#" class="current">Validation</a>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                            <h5>Basic validation</h5>
                            <span class="label label-important">48 notices</span>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="/"  accept-charset="UTF-8" name="basic_validate" id="basic_validate" novalidate="novalidate" />

                            <div class="control-group">
                                <label class="control-label">Role</label>
                                <div class="controls">
                                    <select name="role" id="role">
                                        <option value="1"/>系统管理员
                                        <option value="2"/>仓库管理员
                                        <option value="3"/>连锁店管理员
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">User name</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password</label>
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
                                <input type="button" value="Add" class="submit" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div id="footer" class="span12">
                    2012 &copy; Unicorn Admin. Brought to you by <a href="https://wrapbootstrap.com/user/diablo9983">diablo9983</a>
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