@extends('shop.master')

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
        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 菜单</a>
        <a href="#" class="current">增加进货订单申请</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                        <h5>增加进货订单申请</h5>
                        <span class="label label-important">点击“+”号添加多个商品</span>
                    </div>
                    <div class="widget-content nopadding">
                        {{ Form::open(array('url' => 'shop/addApply' , 'method' => 'post')) }}

                        <p>
                        <div class="control-group">
                            <div class="controls">
                                ID：<input type="text" name="id1" id="id" />
                                数量：<input name="num1" type="text" id="num1">
                                价格：<input name="price1" type="text" id="price1">
                            </div>
                        </div>

                        </p>

                        <div class="widget-title">
								<span class="icon">
									<a href="#"><i class="icon-plus-sign" id="add"></i> （添加）</a>
								</span>
                        </div>

                        <h4><input type="submit" value="add" class="btn btn-primary"></h4>
                        {{ Form::close() }}
                        <div id="validation-errors">

                        </div>
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

        var num = 1;
        $(function () {
            $("#add").click(function(){
                num++;
                console.log(num);
                $('p:last').append("" +
                "<p>ID： <input name='id"+num+"' type='text' id='id'> 数量： <input name='num"+num+"' type='text' id='num"+num+"'>价格：<input name='price"+num+"' type='text' id='price"+num+"'> </p>");
            })
        });
    </script>
@stop