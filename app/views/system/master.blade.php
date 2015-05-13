<html>
<script src="http://libs.useso.com/js/jquery/2.0.0/jquery.min.js"></script>
<body>
<div class="nav">
    <ul>
        <li> {{ HTML::link('system/addUser', '增加管理员') }}</li>
        <li>{{ HTML::link('system/addShop', '增加店铺') }}</li>
        <li> {{ HTML::link('system/viewShop', '查看店铺') }} </li>
        <li>{{ HTML::link('system/viewOrder', '查看订单') }}</li>
        <li>查看库存</li>
    </ul>
    @yield('nav')
</div>
<div class="page-header">
    @yield('header')
</div>
<div class="container">
    @yield('content')
</div>
<div class="script">
    @yield('script')
</div>

</body>
</html>