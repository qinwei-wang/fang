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
                                    <input type="text" name="ch_name" value="{{request()->input('ch_name', '')}}" placeholder="国家名称">
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
                                    <th>中文名称</th>
                                    <th>国旗</th>
                                    <th>所属州</th>
                                </tr>
                                @foreach ($list as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td><input type="checkbox" name="country_ids[]" value="{{$item->id}}"></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->ch_name}}</td>
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
        var index = parent.layer.getFrameIndex(window.name);
        $("#add").click(function () {
            var country_ids = [];
            $('input[type=checkbox]:checked').each(function (i) {
                country_ids[i] = $(this).val();
            });

            $.ajax({
                'type': 'POST',
                'url': '{{route('save_select_country')}}',
                'data': {'country_ids': country_ids,  '_token': "{{csrf_token()}}"},
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('保存成功!');
                        setTimeout(function () {
                            window.parent.location.href = "{{route('country')}}";
                        }, 2000);

                    } else {
                        toastr.error('保存失败:' + msg.message);
                    }
                }
            })
        })
    </script>
@endsection