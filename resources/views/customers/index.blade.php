@extends('templates.dashboard')
@section('content')
    <section class="content-header">
        <h1>
            客户列表
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>客户</a></li>
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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>姓名:</label>
                                    <input type="text" name="name" value="{{request()->input('name', '')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>邮箱:</label>
                                    <input type="text" name="email" value="{{request()->input('email', '')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>手机号码:</label>
                                    <input type="text" name="phone" value="{{request()->input('phone', '')}}">
                                </div>
                            </div>
                            <div class="pull-right">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" id="search">搜索</button>
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
                                    <th>姓名</th>
                                    <th>邮箱</th>
                                    <th>手机号码</th>
                                    <th>创建时间</th>
                                </tr>
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>
                                            {{$item->phone}}
                                        </td>
                                        <td>{{$item->created_at}}</td>
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
@endsection