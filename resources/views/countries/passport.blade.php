@extends('templates.dashboard')
@section('content')
    <section class="content-header">
        <h1>
            签证国家
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>签证国家</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <a href="{{route('banner.create', ['platform' => request()->input('platform', 'PC')])}}">
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
                                    <th>国家</th>
                                    <th>签证类型</th>
                                    <th>创建时间</th>
                                    <th>设置</th>
                                </tr>
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td>{{$item->name}}</td>
                                        <td><img src="{{$item->flag}}" height="50" alt=""></td>
                                        <td>
                                            {{$item->region}}
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <a href="{{route('country_detail', ['country_id' => $item->id])}}">
                                                <button class="btn btn-info">
                                                    编辑
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            {{--{!! $list->appends(request()->all())->links() !!}--}}
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </section>
@endsection
@section('scripts')
@endsection