@extends('templates.dashboard')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_filter {
            text-align: right;
        }
    </style>

    <section class="content-header">
        <h1>
            banner
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{route('banner')}}"><i class="fa fa-dashboard"></i> banner</a></li>
            <li class="active">设置</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    @if (!isset($banner))
                    <ul class="nav nav-tabs">
                        <li class="@if(request()->input('platform','PC') == 'PC')active @endif"><a href="?platform=PC" >PC</a></li>
                        <li class="@if(request()->input('platform', 'PC') == 'H5')active @endif"><a href="?platform=H5">H5</a></li>
                    </ul>
                    @endif
                    <div class="tab-content">
                        <div class="">
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-content">
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">标题</label>
                                            <input type="text" name="title" value="{{$banner->title or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">上传图片或视频</label>
                                            @if(!isset($banner))
                                            <input type="file" id="exampleInputFile">
                                            @else
                                            <div>
                                                <img src="{{$banner->img}}" height="200" alt="">
                                            </div>
                                            @endif
                                            <input type="hidden" name="img" value="{{$banner->img or ''}}">

                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">描述</label>
                                                <input type="text" name="description" value="{{$banner->description or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">排序值</label>
                                                <input type="text" name="sort" value="@if(isset($banner)) {{$banner->sort}}@endif" class="form-control" id="exampleInputEmail1" placeholder="">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$banner->id or ''}}">
                                        <input type="hidden" name="platform" value="{{request()->input('platform', 'PC')}}">
                                        <button type="button" class="btn btn-primary" id="submit">提交</button>
                                    </div>
                                </form>

                            </div>
                        </div>
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
                'url': '{{route('banner.store')}}',
                'data': $('form').serialize(),
                success: function (msg)
                {
                    if (msg.status == 'success') {
                        toastr.success('保存成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('banner')}}';
                        }, 2000);

                    } else {
                        toastr.error('保存失败:' + msg.message);
                    }
                }
            })
        })
    </script>
@endsection