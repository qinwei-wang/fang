@extends('templates.dashboard')
@section('content')

    <section class="content-header">
        <h1>
            二手房
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>二手房</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <a href="{{route('secondHandHouse.create')}}">
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
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>主图</th>
                                    <th>价格</th>
                                    <th>地区位置</th>
                                    <th>建筑面积</th>
                                    <th>预计落成时间</th>
                                    <th>户型</th>
                                    <th>创建时间</th>
                                    <th>设置</th>
                                </tr>
                                
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->_id}}">
                                        <td>{{$item->_id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td><img src="{{img_url($item->images[0])}}" alt="" width="100"></td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->location}}</td>
                                        <td>{{$item->area}}</td>
                                        <td>{{$item->finish_at}}</td>
                                        <td>
                                            @foreach ($item->house_types as $house) 
                                            户型： {{$house['type']}} 
                                            面价： {{$house['area']}} 
                                            套数： {{$house['total']}}
                                            价格: {{$house['price']}} <br>
                                            @endforeach
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <a href="{{route('secondHandHouse.edit', ['id' => $item->_id])}}">
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
        $(".delete").click(function() {
            var id = $(this).parent().parent().attr('data-id');
            console.log(id);
            $.ajax({
                'type': 'delete',
                'url': "{{route('secondHandHouse.delete')}}",
                'data': {'id': id,'_token': '{{csrf_token()}}'},
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('删除成功!');
                        setTimeout(function () {
                            window.location.href = "{{route('secondHandHouse')}}";
                        }, 2000);

                    } else {
                        toastr.error('删除失败:' + msg.message);
                    }
                }
            })
        })

    </script>
@endsection