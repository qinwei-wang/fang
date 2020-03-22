@extends('templates.dashboard')
@section('content')
    <section class="content-header">
        <h1>
            新闻
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>新闻</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <a href="{{route('news.create')}}">
                        <button class="btn btn-success pull-right">添加</button>
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
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>分类</th>
                                    <th>图片</th>
                                    <th>是否推荐</th>
                                    <th>创建时间</th>
                                    <th>更新时间</th>
                                    <th>设置</th>
                                </tr>
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td><img src="{{$item->img}}" height="50" alt=""></td>
                                        <td>
                                            {{$item->is_recommend ? "是" : "否"}}
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td>
                                            <a href="{{route('news.edit', ['id' => $item->id])}}">
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
                            {!! $list->appends(request()->all())->links() !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </section>
@endsection
@section('scripts')
    <script>


        //询问框
        $(".delete").click(function() {
            var id = $(this).parent().parent().attr('data-id');
            layer.confirm('确定删除吗？', {
                btn: ['是','否'] //按钮
            }, function(){
                $.ajax({
                    'type': 'delete',
                    'url': '{{route('news.delete')}}',
                    'data': {'id': id,'_token': '{{csrf_token()}}'},
                    success: function (msg) {
                        if (msg.status == 'success') {
                            toastr.success('删除成功!');
                            setTimeout(function () {
                                window.location.href = '{{route('news')}}';
                            }, 2000);

                        } else {
                            toastr.error('删除失败:' + msg.message);
                        }
                    }
                })
            }, function(){

            });

        })

        $('input[name=sort]').change(function () {
            var sort = $(this).val();
            var id = $(this).parent().parent().attr('data-id');
            $.ajax({
                'type': 'post',
                'url': '{{route('country.sort')}}',
                'data': {'id': id,'_token': '{{csrf_token()}}', 'sort': sort},
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('排序成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('country')}}';
                        }, 2000);

                    } else {
                        toastr.error('排序失败:' + msg.message);
                    }
                }
            })

        })
    </script>
@endsection
