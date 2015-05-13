@extends('rept.master')


@section('nav')
    @parent
@stop
@section('header')
    add apply list
@stop
@section('content')
    {{ Form::open(array('url' => 'rept/addApply' , 'method' => 'post')) }}
        <p>id:
            <input name="id1" type="text" id="id">
            name( not necessary):
            <input name="name1" type="text" id="name1">
            num:
            <input name="num1" type="text" id="num1">
            price:
            <input name="price1" type="text" id="price1">
        </p>
        <input type="button" value="+" class="add">
            <input type="submit" value="add" class="submit">

    {{ Form::close() }}
    <div id="validation-errors">

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

        var num = 1;
        $(function () {
            $(".add").click(function(){
                num++;
                console.log(num);
                $('p:last').append("" +
                "<p>id: <input name='id"+num+"' type='text' id='id'> name( not necessary): <input name='name"+num+"' type='text' id='name"+num+"'>num: <input name='num"+num+"' type='text' id='num"+num+"'>price: <input name='price"+num+"' type='text' id='price"+num+"'> </p>");
            })
        });
    </script>
@stop