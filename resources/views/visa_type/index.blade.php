@extends('templates.dashboard')
@section('content')

    <section class="content-header">
        <h1>
            地铁
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>地铁</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <a href="{{route('visa_type.create')}}">
                        <button class="btn btn-success pull-right" id="add">添加</button>

                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-content">
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>名称</th>
                                    <th>创建时间</th>
                                    <th>设置</th>
                                </tr>
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td><font  color="{{$item->color}}">{{$item->name}}</font></td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <a href="{{route('visa_type.edit', ['id' => $item->id])}}">
                                                <button class="btn btn-info">
                                                    编辑
                                                </button>
                                            </a>
                                            <button class="btn btn-danger delete">
                                                删除
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
{{--                            {!! $list->appends(request()->all())->links() !!}--}}
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </section>
@endsection
@section('scripts')
    <script>
        $(".delete").click(function() {
            var id = $(this).parent().parent().attr('data-id');
            console.log(id);
            $.ajax({
                'type': 'delete',
                'url': '{{route('visa_type.delete')}}',
                'data': {'id': id,'_token': '{{csrf_token()}}'},
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('删除成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('visa_type.index')}}';
                        }, 2000);

                    } else {
                        toastr.error('删除失败:' + msg.message);
                    }
                }
            })
        })

    </script>
@endsection