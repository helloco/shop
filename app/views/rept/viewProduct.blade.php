@extends('rept.master')

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
									<i class="icon-th"></i>
								</span>
                        <h5>Static table</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>商品编号</th>
                                <th>商品名称</th>
                                <th>生产商</th>
                                <th>添加时间</th>
                                <th>通过</th>
                                <th>驳回</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->maker}}</td>
                                    <td> {{ date('Y-m-d , h:m:s', strtotime($product->add_time)) }}</td>
                                    <td><div class="pass" value="{{$product->id}}" ><a href="">通过</a></div></td>
                                    <td><div class="reject" value="{{$product->id}}" ><a href="">驳回</a></div></td>
                                    <td><div class="delete" value="{{$product->id}}" ><a href="">删除</a></div></td>
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
                    url: 'addProduct',
                    data: {
                        id: $('#id').val(),
                        name: $('#name').val(),
                        maker: $('#maker').val()
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