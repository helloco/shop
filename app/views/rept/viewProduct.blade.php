@extends('rept.master')

@section('content')

    <div id="content-header">
        <h1>增加订单申请</h1>

    </div>
    <div id="breadcrumb">
        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 菜单</a>
        <a href="#" class="current">查看商品</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
                        <h5>查看商品</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>商品编号</th>
                                <th>商品名称</th>
                                <th>生产商</th>
                                <th>添加时间</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->maker}}</td>
                                    <td> {{ date('Y-m-d , h:m:s', $product->add_time) }}</td>
                                    <td><div class="delete" value="{{$product->id}}" ><a href="#">删除</a></div></td>
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
                2015 &copy; Shop Admin. Brought to you by <a href="#">coco</a>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(function () {
            $(".delete").click(function () {
                $.ajax({
                    type: "POST",
                    url: 'deleteProduct',
                    data: {
                        id: $(this).attr('value')
                    }
                }).done(function (msg) {
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("删除失败！");
                        } else {
                            alert("删除成功！");
                        }
                    });
                    location.reload();
                });

            })
        });
    </script>
@stop