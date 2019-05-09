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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>国家名称:</label>
                                    <input type="text" name="name" value="{{request()->input('name', '')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" id="search">搜索</button>
                                </div>
                            </div>
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
                                    <th>国家</th>
                                    <th>国旗</th>
                                    <th>所属州</th>
                                    <th>创建时间</th>
                                    <th>设置</th>
                                </tr>
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td>{{$item->country->name}}</td>
                                        <td><img src="{{$item->country->flag}}" height="50" alt=""></td>
                                        <td>
                                            {{$item->country->region}}
                                        </td>
                                        <td>{{$item->created_at}}</td>
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
    </script>
@endsection