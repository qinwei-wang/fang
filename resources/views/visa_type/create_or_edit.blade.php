@extends('templates.dashboard')
@section('content')

    <section class="content-header">
        <h1>
            签证类型
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{route('tag.index')}}"><i class="fa fa-dashboard"></i> 签证类型</a></li>
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
                                <input type="text" class="form-control" name="name" value="{{$visa_type->name or ''}}">
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{$visa_type->id or ''}}">
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
                'url': '{{route('visa_type.save')}}',
                'data': $('form').serialize(),
                success: function (msg)
                {
                    if (msg.status == 'success') {
                        toastr.success('保存成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('visa_type.index')}}';
                        }, 2000);

                    } else {
                        toastr.error('保存失败:' + msg.message);
                    }
                }
            })
        })




    </script>
@endsection