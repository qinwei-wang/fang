@extends('templates.dashboard')
@section('content')
@section('css')
<link href='{{asset("imgLunbo/upload.css")}}' />
<link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link href="/bower_components/bootstrap-datepicker/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-colorpicker.css" type="text/css" rel="stylesheet">

@endsection
<section class="content-header">
    <h1>
        新房
        <small></small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> 新房</a></li>
        <li class="active">设置</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form">
                <div class="box box-default">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <h3 class="box-title">基本信息</h3>
                    </div>
                    <!-- form start -->
                    <div class="box-body">

                        <div class="form-group">
                            <label for="">标题</label>
                            <input type="text" class="form-control" name="title" value="{{$house->title or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">标题tag (逗号分开)</label>
                            <input type="text" class="form-control" name="title_tags" value="{{$house->title_tags or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">楼盘名称</label>
                            <input type="text" class="form-control" name="name" value="{{$house->name or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">楼盘tags (逗号隔开）</label>
                            <input type="text" class="form-control" name="name" value="{{$house->house_tags or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">主图</label>
                            <div id="cupload-4"></div>

                        </div>
                        <div class="form-group">
                            <label for="">套图</label>
                            <div id="cupload-5"></div>
                        </div>
                        <div class="form-group">
                            <label for="">价格</label>
                            <input type="text" class="form-control" name="price" value="{{$house->price or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">开发商</label>
                            <input type="text" class="form-control" name="developer" value="{{$house->developer or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">地区位置</label>
                            <input type="text" class="form-control" name="location" value="{{$house->location or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="addr" value="{{$house->addr or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">房产类型</label>
                            <input type="text" class="form-control" name="type" value="{{$house->type or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">产权</label>
                            <input type="text" class="form-control" name="property" value="{{$house->property or ''}}">
                        </div>

                        <div class="form-group">
                            <label for="">建筑面积</label>
                            <input type="text" class="form-control" name="area" value="{{$house->area or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">开盘日期</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="start_at" class="form-control pull-right" id="datepicker1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">预计落成日期</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="finish_at" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">交通 (逗号隔开）</label>
                            <input type="text" class="form-control" name="traffic" value="{{$house->traffic or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">交通提示 ）</label>
                            <input type="text" class="form-control" name="traffic_tips" value="{{$house->traffic_tips or ''}}">
                        </div>

                        <div class="form-group">
                            <label for="">公寓设施 (逗号隔开）</label>
                            <input type="text" class="form-control" name="facilities" value="{{$house->facilities or ''}}">
                        </div>


                        <div class="form-group">
                            <label for="">房源介绍</label>
                            <textarea class="form-control" name="description" id="" rows="5">{{$house->description or ''}}</textarea>
                        </div>

                    </div>
                </div>
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">户型设置</h3>
                    </div>
                    <div class="box-body">
                        @if (!empty($house->house_types))
                        @foreach ($house->house_types as $houseType)
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="">户型</label>
                                <input type="text" name="house_types[type][]" value="{{$houseType['type']}}" class="form-control" placeholder=".col-xs-3">
                            </div>

                            <div class="col-xs-2">
                                <label for="">面积</label>
                                <input type="text" name="house_types[area][]" value="{{$houseType['area']}}" class="form-control" placeholder=".col-xs-4">
                            </div>
                            <div class="col-xs-2">
                                <label for="">套数</label>
                                <input type="text" name="house_types[total][]" value="{{$houseType['total']}}" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-2">
                                <label for="">价格</label>
                                <input type="text" name="house_types[price][]" value="{{$houseType['price']}}" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-2">
                                <label for="">均价</label>
                                <input type="text" name="house_types[average_price][]" value="{{!empty($houseType['average_price']) ? $houseType['average_price'] : ''}}" class="form-control" placeholder=".col-xs-5">
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="">户型</label>
                                <input type="text" name="house_types[type][]" value="" class="form-control" placeholder=".col-xs-3">
                            </div>

                            <div class="col-xs-2">
                                <label for="">面积</label>
                                <input type="text" name="house_types[area][]" value="" class="form-control" placeholder=".col-xs-4">
                            </div>
                            <div class="col-xs-2">
                                <label for="">套数</label>
                                <input type="text" name="house_types[total][]" value="" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-2">
                                <label for="">价格</label>
                                <input type="text" name="house_types[price][]" value="" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-2">
                                <label for="">均价</label>
                                <input type="text" name="house_types[average_price][]" value="" class="form-control" placeholder=".col-xs-5">
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px">
                            <div class="col-xs-3">
                                <button class="btn" type="button" id="add_house_types">+</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-default">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <h3 class="box-title">相册</h3>
                    </div>
                    <!-- form start -->
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputFile">上传效果图片</label>
                            <div id="cupload-1"></div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">上传样板间图片</label>
                            <div id="cupload-2"></div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">上传周边配套图片</label>
                            <div id="cupload-3"></div>
                        </div>
                    </div>
                </div>

                <div>
                    {!! csrf_field() !!}
                    <input type="hidden" class="form-control" name="id" value="{{$house->_id or ''}}">
                    <button type="button" class="btn btn-primary" id="submit">提交</button>
                </div>
            </form>
        </div>
    </div>


</section>
@endsection
@section('scripts')
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- <script src='{{asset("imgLunbo/upload.js")}}' type="text/javascript"></script> -->
<script src="{{asset('static/js/cupload.js')}}"></script>
<script type="text/javascript" src="/bower_components/bootstrap-datepicker/dist/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript">
    var effectImages = '{{isset($house) ? json_encode($house->effect_images) : ""}}'
    effectImages = effectImages.replace(new RegExp('&quot;', "gm"), '"')
    var demoImages = '{{isset($house) ? json_encode($house->demo_images) : ""}}'
    demoImages = demoImages.replace(new RegExp('&quot;', "gm"), '"')
    var surroundingImages = '{{isset($house) ? json_encode($house->surrounding_images) : ""}}'
    surroundingImages = surroundingImages.replace(new RegExp('&quot;', "gm"), '"')

    var images = '{{isset($house) ? json_encode($house->images) : ""}}'
    images = images.replace(new RegExp('&quot;', "gm"), '"')
    var cupload1 = new Cupload({
        ele: '#cupload-1',
        num: 20,
        name: "effect_images",
        data: "{{!empty($house)}}" ? JSON.parse(effectImages) : null,
    });
    var cupload2 = new Cupload({
        ele: '#cupload-2',
        num: 20,
        name: "demo_images",
        data: "{{!empty($house)}}" ? JSON.parse(demoImages) : null,

    });
    var cupload3 = new Cupload({
        ele: '#cupload-3',
        num: 20,
        name: "surrounding_images",
        data: "{{!empty($house)}}" ? JSON.parse(surroundingImages) : null,
    });

    var cupload4 = new Cupload({
        ele: '#cupload-4',
        num: 1,
        name: "image",
        data: "{{!empty($house->image)}}" ? ["{{!empty($house->image) ? img_url($house->image) : ''}}"] : null,
    });

    var cupload5 = new Cupload({
        ele: '#cupload-5',
        num: 20,
        name: "images",
        data: "{{!empty($house)}}" ? JSON.parse(images) : null, 
    });
    // toastr.success('保存成功!');
    $('#submit').click(function() {
        $.ajax({
            'type': 'POST',
            'url': "{{route('newHouse.save')}}",
            'data': $('form').serialize(),
            success: function(msg) {
                if (msg.status == 'success') {
                    toastr.success('保存成功!');
                    setTimeout(function() {
                        window.location.href = '{{route("newHouse")}}';
                    }, 2000);

                } else {
                    toastr.error('保存失败:' + msg.message);
                }
            }
        })
    })


    $("#add_house_types").click(function() {
        var houseTypesHtml = $(this).parent().parent().prev().html();
        $(this).parent().parent().before('<div class="row">' + houseTypesHtml + '</div>');
        console.log(houseTypesHtml);
    })

    var isEdit = '{{$house->id or ""}}';
    if (!isEdit) {
        $('#datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            pickTime: true
        })
        $('#datepicker1').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            pickTime: true
        })
    } else {
        $('#datepicker').datepicker("setDate", '{{$house->finish_at or ""}}');
        $('#datepicker1').datepicker("setDate", '{{$house->start_at or ""}}');
    }

    // 基本实例化:
    $('#demo').colorpicker();
    // 添加change事件 改变背景色
    $('#demo').on('change', function(event) {
        $('#demo').css('background-color', event.color.toString()).val('');
        $("#color").text(event.color.toString());
    });
</script>
@endsection