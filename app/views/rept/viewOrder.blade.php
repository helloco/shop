@extends('rept.master')

@section('content')

    <div id="content-header">
        <h1>Tables</h1>
        <div class="btn-group" style="width: auto;">
            <a class="btn btn-large tip-bottom" data-original-title="Manage Files"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" data-original-title="Manage Users"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" data-original-title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
            <a class="btn btn-large tip-bottom" data-original-title="Manage Orders"><i class="icon-shopping-cart"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Tables</a>
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
                                <th>订单编号</th>
                                <th>订单产生者</th>
                                <th>订单状态</th>
                                <th>申请时间</th>
                                <th>通过</th>
                                <th>驳回</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orderLists as $orderList)
                                <tr>
                                    <td>{{$orderList->order_id}}</td>
                                    <td>{{$orderList->proposer}}</td>
                                    <td>{{$orderList->status}}</td>
                                    <td> {{ date('Y-m-d , h:m:s', strtotime($orderList->apply_time)) }}</td>
                                    <td><div class="pass" value="{{$orderList->order_id}}" ><a href="">通过</a></div></td>
                                    <td><div class="reject" value="{{$orderList->order_id}}" ><a href="">驳回</a></div></td>
                                    <td><div class="delete" value="{{$orderList->order_id}}" ><a href="">删除</a></div></td>
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
                2012 © Unicorn Admin. Brought to you by <a href="https://wrapbootstrap.com/user/diablo9983">diablo9983</a>
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
                    url: 'deleteOrder',
                    data: {
                        id: $(this).attr('value')
                    }
                }).done(function (msg) {
                    console.log(msg);
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

        $(function () {
            $('.pass').click(function () {
                $.ajax({
                    type:'post',
                    url :'passOrder',
                    data:{
                        id: $(this).attr('value')
                    }
                })
            })
        });

        $(function () {
            $('.reject').click(function () {
                $.ajax({
                    type:'post',
                    url :'rejectOrder',
                    data:{
                        id: $(this).attr('value')
                    }
                })
            })
        });
    </script>
@stop