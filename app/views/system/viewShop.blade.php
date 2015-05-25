@extends('system.master')

@section('content')

    <div id="content-header">
        <h1>Tables</h1>
        <div class="btn-group" style="width: auto;">
            <a class="btn btn-large tip-bottom" data-original-title="Manage Files"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" data-original-title="Manage Users"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" data-original-title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
            <a class="btn btn-large tip-bottom" data-original-title="Manage Orders"><i class="icon-shopping-cart"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Tables</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
                        <h5>Static table</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>店铺编号</th>
                                <th>店铺名称</th>
                                <th>店铺主人</th>
                                <th>描述</th>
                                <th>修改店铺信息</th>
                                <th>删除店铺</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($shopInfo as $shop)
                                <tr>
                                    <td>{{$shop->id}}</td>
                                    <td>{{$shop->name}}</td>
                                    <td>{{$shop->owner}}</td>
                                    <td>{{$shop->description}}</td>
                                    <td><div class="edit" value="{{$shop->id}}" >
                                            <a id="add-event" data-toggle="modal" href="#modal-add-event" class="btn btn-success btn-mini"><i class="icon-pencil icon-white"></i> Edit</a>
                                        </div></td>
                                    <td><div class="delete" value="{{$shop->id}}" >删除</div></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="buttons">
                    <div class="modal hide" id="modal-add-event" aria-hidden="true" style="display: none;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>Add a new event</h3>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <p>店铺编号：<input id="shopId" type="text" ></p>

                                <p>店铺名称：<input id="shopName" type="text"></p>

                                <p>店铺主人：<input id="shopOwner" type="text"></p>

                                <p>店铺描述：<input id="shopDesc" type="text"></p>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                            <a href="#" id="add-event-submit" class="btn btn-primary">Update</a>
                        </div>
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
                    url: 'deleteShop',
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
            $('.edit').click(function () {
                $('#shopId').val($(this).attr('value'));
                $('#shopName').val($('.edit').parent().parent().children("td:eq(1)").html());
                $('#shopOwner').val($('.edit').parent().parent().children("td:eq(2)").html());
                $('#shopDesc').val($('.edit').parent().parent().children("td:eq(3)").html());
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
            $('#add-event-submit').click(function () {
                $.ajax({
                    type:'post',
                    url :'updateShopInfo',
                    data:{
                        id: $('#shopId').val(),
                        shopName:$('#shopName').val(),
                        shopOwner:$('#shopOwner').val(),
                        shopDesc:$('#shopDesc').val(),

                    }
                })
            })
        });
    </script>
@stop