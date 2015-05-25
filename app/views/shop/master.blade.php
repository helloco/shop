<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unicorn Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/colorpicker.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/datepicker.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/unicorn.main.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/unicorn.grey.css') }}" class="skin-color" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>


<div id="header">
    <h1><a href="./dashboard.html">仓库管理员</a></h1>
</div>

<div id="search">
    <input type="text" placeholder="Search here..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
        <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
        <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#">new message</a></li>
                <li><a class="sInbox" title="" href="#">inbox</a></li>
                <li><a class="sOutbox" title="" href="#">outbox</a></li>
                <li><a class="sTrash" title="" href="#">trash</a></li>
            </ul>
        </li>
        <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
        <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>

<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-th-list"></i> Common Elements</a>
    <ul>
        <li><a href=""><i class="icon icon-home"></i> <span>Dashboard</span></a></li>

        <li>{{ HTML::link('shop/viewProduct', '商品列表') }}</li>
        <li>{{ HTML::link('shop/addApplyView', '增加订单申请') }}</li>
        <li>{{ HTML::link('shop/viewOrder', '查看订单') }}</li>

    </ul>

</div>

<div id="style-switcher">
    <i class="icon-arrow-left icon-white"></i>
    <span>Style:</span>
    <a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
    <a href="#blue" style="background-color: #2D2F57;"></a>
    <a href="#red" style="background-color: #673232;"></a>
</div>


<div class="container" id="content">
    @yield('content')
</div>


<script src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
<div class="script">
    @yield('script')
</div>

<script src="{{ URL::asset('public/js/jquery.ui.custom.js') }}"></script>
<script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('public/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ URL::asset('public/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('public/js/jquery.uniform.js') }}"></script>
<script src="{{ URL::asset('public/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('public/js/unicorn.js') }}"></script>
<script src="{{ URL::asset('public/js/unicorn.form_common.js') }}"></script>
</body>
</html>