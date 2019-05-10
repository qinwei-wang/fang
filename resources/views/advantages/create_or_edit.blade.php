@extends('templates.dashboard')
@section('content')

    <section class="content-header">
        <h1>
            优势模块
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{route('advantage.index')}}"><i class="fa fa-dashboard"></i> 优势模块</a></li>
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
                                <label for="">标题</label>
                                <input type="text" class="form-control" name="title" value="{{$advantage->title or ''}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">图片</label>
                                <div>
                                    <img src="{{$advantage->img or ''}}" height="200" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="img" value="{{$advantage->img or ''}}">

                            </div>

                            <div class="form-group">
                                <label for="">描述</label>
                                <input type="text" class="form-control" name="description" value="{{$advantage->description or ''}}">
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{$advantage->id or ''}}">
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
    <script type="text/javascript">
        // toastr.success('保存成功!');
        $('#submit').click(function () {
            $.ajax({
                'type':'POST',
                'url': '{{route('advantage.save')}}',
                'data': $('form').serialize(),
                success: function (msg)
                {
                    if (msg.status == 'success') {
                        toastr.success('保存成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('advantage.index')}}';
                        }, 2000);

                    } else {
                        toastr.error('保存失败:' + msg.message);
                    }
                }
            })
        })


        //上传图片
        $("input[type=file]").change(function () {
            var _this = $(this);
            var formData = new FormData();
            formData.append("file", _this.parent().find('.upload_file')[0].files[0]);
            formData.append("_token", '{{csrf_token()}}');
            $.ajax({
                'type': 'POST',
                'url': '{{route('upload')}}',
                'data': formData,
                /**
                 *必须false才会自动加上正确的Content-Type
                 */
                contentType: false,
                /**
                 * 必须false才会避开jQuery对 formdata 的默认处理
                 * XMLHttpRequest会对 formdata 进行正确的处理
                 */
                processData: false,
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('上传成功!');
                        _this.parent().find('.file_path').val(msg.data);
                        _this.parent().find('img').attr('src', msg.data);
                    } else {
                        toastr.error('上传失败:' + msg.message);
                    }
                },
            })
        })


    </script>
@endsection