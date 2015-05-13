@extends('system.master')


@section('nav')
    @parent
@stop
@section('header')
    add user
@stop
@section('content')
    @foreach($orderLists as $orderList)
        <div>order id:{{$orderList->order_id}}</div>
        <div>proposer:{{$orderList->proposer}}</div>
        <div>status:{{$orderList->status}}</div>
        <div>apply time:{{$orderList->apply_time}}</div>
        <div class="pass" value="{{$orderList->order_id}}" >通过</div>
        <div class="reject" value="{{$orderList->order_id}}" >驳回</div>
        <div class="delete" value="{{$orderList->order_id}}" >删除</div>
        <br><br>
    @endforeach
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