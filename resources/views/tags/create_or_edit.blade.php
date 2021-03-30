@extends('templates.dashboard')
@section('content')

    <section class="content-header">
        <h1>
            公共设施
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{route('tag.index')}}"><i class="fa fa-dashboard"></i> 公共设施</a></li>
            <li class="active">设置</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-default">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <form role="form">
                            <div class="form-group">
                                <label for="">名称</label>
                                <input type="text" class="form-control" name="name" value="{{$tag->name or ''}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">图片</label>
                                <div id="cupload-1"></div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{$tag->id or ''}}">
                                <button type="button" class="btn btn-primary" id="submit">提交</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>


    </section>
@endsection
@section('scripts')
<script src="{{asset('static/js/cupload.js')}}"></script>
    <script type="text/javascript">
    
     var images = '{{isset($tag) ? json_encode($tag->image) : ""}}'
    images = images.replace(new RegExp('&quot;', "gm"), '"')
    var cupload1 = new Cupload({
        ele: '#cupload-1',
        num: 1,
        name: "image",
        data: "{{!empty($tag->image)}}" ? ["{{!empty($tag->image) ? img_url($tag->image) : ''}}"] : null,
    });
        // toastr.success('保存成功!');
        $('#submit').click(function () {
            $.ajax({
                'type':'POST',
                'url': '{{route('tag.save')}}',
                'data': $('form').serialize(),
                success: function (msg)
                {
                    if (msg.status == 'success') {
                        toastr.success('保存成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('tag.index')}}';
                        }, 2000);

                    } else {
                        toastr.error('保存失败:' + msg.message);
                    }
                }
            })
        })




    </script>
@endsection