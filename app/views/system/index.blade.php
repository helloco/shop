@extends('system.master')


@section('nav')
    @parent
@stop
@section('header')
    add user
@stop
@section('content')
    <p>This is my body content.</p>
    <form method="POST" action="/" accept-charset="UTF-8"><input name="_token" type="hidden" value="4hC6qzZy180kFRmx0WRPnlYc74a0CHZ1lip3cGHp">
        <p>role:
            <select name="role" id="role">
                <option value="1">系统管理员</option>
                <option value="2">仓库管理员</option>
                <option value="3">连锁店管理员</option>
            </select>
        </p>
        <p>user name:
            <input name="name" type="text" id="name">
        </p>
        <p>pwd:
            <input name="password" type="password" id="password">
        </p>
        <p>email:
            <input name="email" type="text" id="email">
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
                url: 'addUser',
                data: {
                    role: $('#role').val(),
                    name: $('#name').val(),
                    password: $('#password').val(),
                    email: $('#email').val()

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