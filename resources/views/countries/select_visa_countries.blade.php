@extends('templates.default')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="hidden" name="country_id" value="{{request()->country_id}}">
                                    <input type="text" name="name" value="{{request()->input('name', '')}}" placeholder="国家名称">
                                    <button type="submit" class="btn btn-success" id="search">搜索</button>

                                </div>
                            </div>
                            <div>
                            </div>
                            <div class="pull-right">
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" id="add">添加</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">签证类型</label>
            <select name="type" id="" class="form-control">
                <option value="0">签证类型</option>
                <option value="1">签证入境</option>
                <option value="2">落地签入境</option>
                <option value="3">免签目的国</option>
                <option value="4">eVisa</option>
            </select>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-content">
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>选择</th>
                                    <th>国家</th>
                                    <th>国旗</th>
                                    <th>所属州</th>
                                </tr>
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td><input type="radio" name="select" value="{{$item->id}}"></td>
                                        <td>{{$item->name}}</td>
                                        <td><img src="{{$item->flag}}" height="50" alt=""></td>
                                        <td>
                                            {{$item->region}}
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
        var country_id = "{{request()->country_id}}";
        var index = parent.layer.getFrameIndex(window.name);
        $("#add").click(function () {
            var visa_country_id = $('input[type=radio]:checked').val();
            var type = $('select[name=type]').val();

            $.ajax({
                'type': 'POST',
                'url': '{{route('save_visa_country')}}',
                'data': {'country_id': country_id, 'visa_country_id': visa_country_id, '_token': "{{csrf_token()}}", 'type' : type},
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('保存成功!');
                        setTimeout(function () {
                            window.parent.location.href = "{{route('visa_countries', ['country_id' => request()->country_id])}}";
                        }, 2000);

                    } else {
                        toastr.error('保存失败:' + msg.message);
                    }
                }
            })
        })
    </script>
@endsection