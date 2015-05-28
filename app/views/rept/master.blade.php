<!DOCTYPE html>
<html lang="en">
<head>
    <title>连锁店管理系统</title>
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

</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
           <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#">new message</a></li>
                <li><a class="sInbox" title="" href="#">inbox</a></li>
                <li><a class="sOutbox" title="" href="#">outbox</a></li>
                <li><a class="sTrash" title="" href="#">trash</a></li>
            </ul>
        </li>
        <li class="btn btn-inverse"><a title="" href="logout"><i class="icon icon-share-alt"></i> <span class="text">注销</span></a></li>
    </ul>
</div>

<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-th-list"></i> Common Elements</a>
    <ul>
        <li><a href=""><i class="icon icon-home"></i> <span>仓库管理员</span></a></li>

        <li>{{ HTML::link('rept/addProductView', '增加商品') }}</li>
        <li>{{ HTML::link('rept/addApplyView', '增加订单申请') }}</li>
        <li>{{ HTML::link('rept/viewProduct', '查看商品') }}</li>
        <li>{{ HTML::link('rept/viewOrder', '查看订单') }}</li>

    </ul>

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