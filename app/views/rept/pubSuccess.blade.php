@extends('rept.master')

@section('content')

    <div id="content-header">
        <h1>添加商品</h1>
        {{--<div class="btn-group">--}}
        {{--<a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>--}}
        {{--<a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>--}}
        {{--<a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>--}}
        {{--<a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>--}}
        {{--</div>--}}
    </div>
    <div id="breadcrumb">
        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 菜单</a>
        <a href="#" class="current">添加订单申请</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                        <h5>添加订单申请</h5>
                    </div>
                    添加成功！
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div id="footer" class="span12">
                2012 &copy; Shop Admin. Brought to you by <a href="#">coco</a>
            </div>
        </div>
    </div>
@stop

@section('script')

@stop