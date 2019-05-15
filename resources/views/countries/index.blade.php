@extends('templates.dashboard')
@section('content')
    <section class="content-header">
        <h1>
            精选国家列表
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>国家</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <form action="">
                        <div class="row">
                            <div class="pull-right">

                                <div class="form-group">
                                    <button type="button" class="btn btn-success" id="add">添加</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                    <th>排序值</th>
                                    <th>国家</th>
                                    <th>中文名称</th>
                                    <th>国旗</th>
                                    <th>所属州</th>
                                    <th>创建时间</th>
                                    <th>更新时间</th>
                                    <th>设置</th>
                                </tr>
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td><input type="text" value="{{$item->sort}}" name="sort" size="1"></td>
                                        <td>{{$item->country->name}}</td>
                                        <td>{{$item->country->ch_name}}</td>
                                        <td><img src="{{$item->country->flag}}" height="50" alt=""></td>
                                        <td>
                                            {{$item->country->region}}
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td>
                                            <a href="{{route('country_detail', ['country_id' => $item->country->id])}}">
                                                <button class="btn btn-info">
                                                    编辑
                                                </button>
                                            </a>
                                            <a href="{{route('visa_countries', ['country_id' => $item->country->id])}}">
                                                <button class="btn btn-info">
                                                    签证国家
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
        $("#add").click(function() {
            layer.open({
                type: 2,
                title: 'select country',
                shadeClose: true,
                shade: 0.8,
                area: ['50%', '90%'],
                content: "{{route('select_countries')}}" //iframe的url
            });
        })

        //询问框


        $(".delete").click(function() {
            var id = $(this).parent().parent().attr('data-id');
            layer.confirm('确定删除吗？', {
                btn: ['是','否'] //按钮
            }, function(){
                $.ajax({
                    'type': 'delete',
                    'url': '{{route('country.delete')}}',
                    'data': {'id': id,'_token': '{{csrf_token()}}'},
                    success: function (msg) {
                        if (msg.status == 'success') {
                            toastr.success('删除成功!');
                            setTimeout(function () {
                                window.location.href = '{{route('country')}}';
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