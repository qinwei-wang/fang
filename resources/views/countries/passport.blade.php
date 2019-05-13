@extends('templates.dashboard')
@section('content')

    <section class="content-header">
        <h1>
            签证国家
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{route('country')}}"><i class="fa fa-dashboard"></i>国家列表</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                        <button class="btn btn-success pull-right" id="add">添加</button>
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
                                    <th>国家</th>
                                    <th>国旗</th>
                                    <th>签证类型</th>
                                    <th>创建时间</th>
                                    <th>设置</th>
                                </tr>
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->id}}" data-visa-country-id="{{$item->visa_country_id}}">
                                        <td>{{$item->country->name}}</td>
                                        <td><img src="{{$item->country->flag}}" height="50" alt=""></td>
                                        <td>
                                            <select name="type" id="">
                                                <option value="0" >签证类型</option>
                                                <option value="1" @if ($item->type == 1)selected @endif>签证入境</option>
                                                <option value="2" @if ($item->type==2) selected @endif>落地签入境</option>
                                                <option value="3" @if ($item->type==3) selected @endif>免签目的国</option>
                                                <option value="4" @if ($item->type == 4) selected @endif>eVisa</option>
                                            </select>
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            {{--<a href="{{route('visa_country.show', ['id' => $item->id])}}">--}}
                                                {{--<button class="btn btn-info">--}}
                                                    {{--编辑--}}
                                                {{--</button>--}}
                                            {{--</a>--}}
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
                content: "{{route('select_visa_countries', ['country_id'=>request()->country_id])}}" //iframe的url
            });
        })

        $(".delete").click(function() {
            var id = $(this).parent().parent().attr('data-id');
            console.log(id);
            $.ajax({
                'type': 'delete',
                'url': '{{route('visa_country.delete')}}',
                'data': {'id': id,'_token': '{{csrf_token()}}'},
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('删除成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('visa_countries', ['country_id'=> request()->country_id])}}';
                        }, 2000);

                    } else {
                        toastr.error('删除失败:' + msg.message);
                    }
                }
            })
        })

        $('select[name=type]').change(function () {
            var type = $(this).val();
            var visa_country_id = $(this).parent().parent().attr('data-visa-country-id');
            $.ajax({
                'type': 'post',
                'url': '{{route('save_visa_country')}}',
                'data': {'country_id': '{{request()->country_id}}', 'visa_country_id': visa_country_id,'_token': '{{csrf_token()}}', 'type': type},
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('签证类型修改成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('visa_countries', ['country_id'=> request()->country_id])}}';
                        }, 2000);

                    } else {
                        toastr.error('签证类型修改失败:' + msg.message);
                    }
                }
            })

        })

    </script>
@endsection