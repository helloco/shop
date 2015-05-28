@extends('rept.master')

@section('content')

    <div id="content-header">
        <h1>添加商品</h1>
        {{--<div class="btn-group">--}}
            {{--<a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>--}}
            {{--<a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>--}}
            {{--<a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>--}}
            {{--<a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>--}}
        {{--</div>--}}
    </div>
    <div id="breadcrumb">
        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 菜单</a>
        <a href="#" class="current">添加商品</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                        <h5>添加商品</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="/"  accept-charset="UTF-8" name="basic_validate" id="basic_validate" novalidate="novalidate" />

                        <div class="control-group">
                            <label class="control-label">商品ID</label>
                            <div class="controls">
                                <input type="text" name="id" id="id" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">商品名称</label>
                            <div class="controls">
                                <input type="text" name="name" id="name" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">制造商</label>
                            <div class="controls">
                                <input type="text" name="maker" id="maker" />
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="button" value="Add" class="submit" />
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div id="footer" class="span12">
                2012 &copy; Shop Admin. Brought to you by <a href="#">coco</a>
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
                    url: 'addProduct',
                    data: {
                        id: $('#id').val(),
                        name: $('#name').val(),
                        maker: $('#maker').val()
                    }
                }).done(function (msg) {
                    $.each(msg, function(index, value)
                    {
                        if(value != true)
                        {
                            alert("添加失败,请检查填写的信息！");
                        } else {
                            alert("添加成功");
                        }
                    });
                    location.reload();
                });

            })
        });
    </script>
@stop