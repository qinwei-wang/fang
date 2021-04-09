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
    保留型店屋 
        <small></small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> 保留型店屋</a></li>
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
                            <label for="">坐标地址</label>
                            <input type="text" class="form-control" name="title" value="{{$house->coordinate or ''}}">
                        </div>
                       
                       
                        <!-- <div class="form-group">
                            <label for="">主图</label>
                            <div id="cupload-4"></div>

                        </div> -->
                        <div class="form-group">
                            <label for="">套图</label>
                            <div id="cupload-5"></div>
                        </div>
                        <div class="form-group">
                            <label for="">vr看房</label>
                            <input type="text" class="form-control" name="vr_link" value="{{$house->vr_link or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">价格</label>
                            <input type="text" class="form-control" name="price" value="{{$house->price or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">居住面积</label>
                            <input type="text" class="form-control" name="area" value="{{$house->area or ''}}">
                        </div>
                       
                        <div class="form-group">
                            <label for="">店屋地址</label>
                            <input type="text" class="form-control" name="addr" value="{{$house->addr or ''}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="">交通 (逗号隔开）</label>
                            @foreach ($dities as $item) 
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="{{$item->id}}" name="traffic[]" @if (!empty($house->traffic) && in_array($item->id, $house->traffic)) checked @endif> <font color="{{$item->color}}">{{$item->name}}</font>
                            </label>

                            @endforeach
                        </div>
                       
                        <div class="form-group">
                            <label for="">项目介绍</label>
                            <textarea class="form-control" name="description" id="" rows="5">{{$house->description or ''}}</textarea>
                        </div>

                    </div>
                </div>
              

                <div>
                    {!! csrf_field() !!}
                    <input type="hidden" class="form-control" name="id" value="{{$house->_id or ''}}">
                    <input type="hidden" class="form-control" name="type" value="6">
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
  

    var images = '{{isset($house) ? json_encode($house->images) : ""}}'
    images = images.replace(new RegExp('&quot;', "gm"), '"')
   

    // var cupload4 = new Cupload({
    //     ele: '#cupload-4',
    //     num: 1,
    //     name: "image",
    //     data: "{{!empty($house->image)}}" ? ["{{!empty($house->image) ? img_url($house->image) : ''}}"] : null,
    // });

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
            'url': "{{route('retention.save')}}",
            'data': $('form').serialize(),
            success: function(msg) {
                if (msg.status == 'success') {
                    toastr.success('保存成功!');
                    setTimeout(function() {
                        window.location.href = '{{route("retention")}}';
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