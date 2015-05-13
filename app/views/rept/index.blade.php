@extends('rept.master')


@section('nav')
    @parent
@stop
@section('header')
    add product
@stop
@section('content')
    <form method="POST" action="/" accept-charset="UTF-8">
        <p>id:
            <input name="id" type="text" id="id">
        </p>
        <p>name:
            <input name="name" type="text" id="name">
        </p>
        <p>maker:
            <input name="maker" type="text" id="maker">
        </p>

        <p>
            <input type="button" value="add" class="submit">
        </p>
    </form>
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
</script>
@stop