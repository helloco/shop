<html>
<script src="http://libs.useso.com/js/jquery/2.0.0/jquery.min.js"></script>
<body>
<div class="nav">
    <ul>
        <li> {{ HTML::link('rept', '增加商品') }}</li>
        <li>{{ HTML::link('rept/addApplyView', '增加订单申请') }}</li>
        <li> {{ HTML::link('rept/viewProduct', '查看商品') }} </li>
        <li>{{ HTML::link('rept/viewOrder', '查看订单') }}</li>
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