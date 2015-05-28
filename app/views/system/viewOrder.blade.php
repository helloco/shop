@extends('system.master')

@section('content')

        <div id="content-header">
            <h1>查看订单</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> 菜单</a>
            <a href="#" class="current">查看订单</a>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
                            <h5>查看订单</h5>
                            <span class="label label-important">订单状态说明：1代表初提交，2代表已通过，3代表被驳回</span>
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
                                        <td><div class="pass" value="{{$orderList->order_id}}" ><a href="#">通过</a></div></td>
                                        <td><div class="reject" value="{{$orderList->order_id}}" ><a href="#">驳回</a></div></td>
                                        <td><div class="delete" value="{{$orderList->order_id}}" ><a href="#">删除</a></div></td>
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

        $(function () {
            $('.pass').click(function () {
                $.ajax({
                    type:'post',
                    url :'passOrder',
                    data:{
                        id: $(this).attr('value')
                    }
                }).done(function (msg) {
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("申请通过失败，请重试！");
                        } else {
                            alert("申请已通过！");
                        }
                    });
                    location.reload();
                });
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
                }).done(function (msg) {
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("申请驳回失败，请重试！");
                        } else {
                            alert("申请已驳回！");
                        }
                    });
                    location.reload();
                });
            })
        });
    </script>
@stop