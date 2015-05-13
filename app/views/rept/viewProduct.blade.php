@extends('rept.master')


@section('nav')
    @parent
@stop
@section('header')
    view product
@stop
@section('content')
    @foreach($products as $product)
    <div>id:{{$product->id}}</div>
    <div>name:{{$product->name}}</div>
    <div>maker:{{$product->maker}}</div>
    <div>add time:{{$product->add_time}}</div>
        <br><br>
    @endforeach

    <br>

    <?php echo $products->links(); ?>
@stop