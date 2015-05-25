<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unicorn Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/unicorn.login.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/custom.css') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div id="logo">
    <img src="{{ URL::asset('public/img/logo.png') }}" alt="" />
</div>
<div id="loginbox">
    {{ Form::open(array('url' => 'postLogin' , 'method' => 'post' , 'class' => 'form-vertical' , 'id'=> 'loginform')) }}
    <p>Enter username and password to continue.</p>
    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span><input name="name" type="text" placeholder="Username" />
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span><input name="password" type="password" placeholder="Password" />
            </div>
        </div>
    </div>

    <div class="control-group">

        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-warning-sign"></i></span>
                <select name="role">
                    <option value="1"/>系统管理员
                    <option value="2"/>仓库管理员
                    <option value="3"/>连锁店管理员
                </select>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
    </div>
    {{ Form::close() }}
</div>

<script src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public/js/unicorn.login.js') }}"></script>
</body>
</html>
