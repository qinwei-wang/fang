@extends('templates.dashboard')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_filter {
            text-align: right;
        }
    </style>

<section class="content-header">

    <h1>
        banner设置
        <small></small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> banner设置</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="@if(request()->input('platform','PC') == 'PC')active @endif"><a href="?platform=PC" >PC</a></li>
                <li class="@if(request()->input('platform', 'PC') == 'H5')active @endif"><a href="?platform=H5">H5</a></li>
            </ul>
            <div class="tab-content">
                <div class="box">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-content">
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">标题</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="填写标题">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片或视频</label>
                                    <input type="file" id="exampleInputFile">

                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">描述</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="填写描述">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


</section><!-- /.content -->
@endsection