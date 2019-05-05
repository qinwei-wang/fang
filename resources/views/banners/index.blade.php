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
            <li><a href="#"><i class="fa fa-dashboard"></i> banner</a></li>
            <li class="active">列表</li>
        </ol>


    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <a href="{{route('banner.create')}}">
                        <button class="btn btn-success pull-right">添加</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="@if(request()->input('platform','PC') == 'PC')active @endif"><a href="?platform=PC">PC</a>
                        </li>
                        <li class="@if(request()->input('platform', 'PC') == 'H5')active @endif"><a href="?platform=H5">H5</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="box-content">
                            <div class="box-content">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>排序值</th>
                                        <th>标题</th>
                                        <th>图片</th>
                                        <th>描述</th>
                                        <th width="200">编辑</th>
                                    </tr>
                                    @foreach ($list as $item)
                                        <tr data-id="{{$item->id}}">
                                            <td>{{$item->sort}}</td>
                                            <td>{{$item->title}}</td>
                                            <td><img src="{{$item->img}}" height="100" alt=""></td>
                                            <td>{{$item->description}}</td>
                                            <td>
                                                <a href="{{route('banner.edit', ['id' => $item->id])}}" class="edit">
                                                    <button class="btn btn-primary btn-sm">编辑</button>
                                                </a>
                                                <button class="btn btn-danger btn-sm delete">删除</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="box-footer">

                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>
@endsection
@section('scripts')
    <script>

        //删除
        $('.delete').click(function () {

            $.ajax({
                'type':'delete',
                'url': '{{route('banner.delete')}}',
                'data': {'id':  $(this).parent().parent().attr('data-id'), '_token': '{{csrf_token()}}'},
                success: function (msg)
                {
                    if (msg.status == 'success') {
                        toastr.success('删除成功!');
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error('删除失败:' + msg.message);
                    }
                }
            })
        })
    </script>
@endsection