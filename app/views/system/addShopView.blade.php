@extends('system.master')

@section('content')

    <div id="content-header">
        <h1>添加店铺</h1>
    </div>
    <div id="breadcrumb">
        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 菜单</a>
        <a href="#" class="current">添加店铺</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                        <h5>Basic validation</h5>
                        <span class="label label-important">提示：店主姓名请与管理员姓名对应</span>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="/"  accept-charset="UTF-8" name="basic_validate" id="basic_validate" novalidate="novalidate" />

                        <div class="control-group">
                            <label class="control-label">Shop name</label>
                            <div class="controls">
                                <input type="text" name="name" id="name" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">店主姓名</label>
                            <div class="controls">
                                <input type="text" name="owner" id="owner" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">店铺简介</label>
                            <div class="controls">
                                <textarea name="desc" id="desc" ></textarea>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="button" value="添加" class="submit" />
                        </div>
                        </form>
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
            $(".submit").click(function () {
                $.ajax({
                    type: "POST",
                    url: 'addShop',
                    data: {
                        name: $('#name').val(),
                        owner: $('#owner').val(),
                        desc: $('#desc').val()

                    }
                }).done(function (msg) {
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("新增店铺失败！");
                        } else {
                            alert("新增店铺成功！");
                        }
                    });
                    location.reload();
                });

            })
        });
    </script>
@stop