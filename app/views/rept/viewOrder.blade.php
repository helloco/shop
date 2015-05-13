@extends('rept.master')


@section('nav')
    @parent
@stop
@section('header')
    view order list
@stop
@section('content')
    @foreach($orderLists as $orderList)
        <div>order id:{{$orderList->order_id}}</div>
        <div>proposer:{{$orderList->proposer}}</div>
        <div>status:{{$orderList->status}}</div>
        <div>apply time:{{$orderList->apply_time}}</div>
        <br><br>
    @endforeach
@stop

@stop