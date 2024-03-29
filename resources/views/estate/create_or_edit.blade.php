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
        新加坡商业地产
        <small></small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> 新加坡商业地产</a></li>
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
                            <label for="">套图</label>
                            <input id="upload1" type="file" class="file  file-loading sin-upload" multiple>
                        </div> 
                      
                        <div class="form-group">
                            <label for="">介绍</label>
                            <textarea class="form-control" name="description" id="" rows="5">{{$house->description or ''}}</textarea>
                        </div>

                    </div>
                </div>
              

                <div>
                    {!! csrf_field() !!}
                    <input type="hidden" class="form-control" name="id" value="{{$house->_id or ''}}">
                    <input type="hidden" class="form-control" name="type" value="4">
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
   

  

   var images = "{{!empty($house->images) ? json_encode($house->images) : '[]'}}";
    images = JSON.parse(images.replace(new RegExp('&quot;', "gm"), '"'))
    var imagestr = [];
    for (const item of images) {
        imagestr.push(['<img src="' + item + '" class="file-preview-image">']);
        var input = $('<input type="hidden" name="images[]">');
        input.attr('value', item);
        $('form').append(input);
    }
    $("#upload1").fileinput({
        uploadUrl: "{{route('home.upload')}}",
        initialPreview: images,
        initialPreviewAsData: true,
        overwriteInitial: false,
    });  

    $('#upload1').on('fileuploaded', function(event, data, previewId, index) {
        var url = data.jqXHR.responseJSON.data;
        console.log(url)
        images.push(url);
        var input = $('<input type="hidden" name="images[]">');
        input.attr('value', url);
       
        $('form').append(input);
    });

   
    // toastr.success('保存成功!');
    $('#submit').click(function() {
        $.ajax({
            'type': 'POST',
            'url': "{{route('estate.save')}}",
            'data': $('form').serialize(),
            success: function(msg) {
                if (msg.status == 'success') {
                    toastr.success('保存成功!');
                    setTimeout(function() {
                        window.location.href = '{{route("estate")}}';
                    }, 2000);

                } else {
                    toastr.error('保存失败:' + msg.message);
                }
            }
        })
    })


   
  

    // 基本实例化:
    $('#demo').colorpicker();
    // 添加change事件 改变背景色
    $('#demo').on('change', function(event) {
        $('#demo').css('background-color', event.color.toString()).val('');
        $("#color").text(event.color.toString());
    });
</script>
@endsection