{{ Form::open(array('url' => 'postLogin'))}}
<p>name:
    {{ Form::text('name') }}
</p>
<p>pwd:
    {{ Form::password('password') }}
</p>
<p>role:
        {{ Form::select('role',array(
        '1' => '系统管理员',
        '2' => '仓库管理员',
        '3' => '连锁店管理员'
    )) }}
</p>
<p>
    {{ Form::submit('submit') }}
</p>
{{ Form::close() }}