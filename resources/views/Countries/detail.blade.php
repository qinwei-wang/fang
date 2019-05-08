@extends('templates.dashboard')
@section('content')
    <section class="content-header">
        <h1>
            移居国家设置
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{route('banner')}}"><i class="fa fa-dashboard"></i>移居国家</a></li>
            <li class="active">设置</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">

                    <div class="form-group">
                        <button type="button" class="btn btn-success" id="save">保存</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active" data-name="base-config"><a href="#activity" data-toggle="tab">基础信息设置</a></li>
                    <li  data-name="banner"><a href="#timeline" data-toggle="tab">banner图设置</a></li>
                    <li data-name="detail"><a href="#timeline" data-toggle="tab">详情</a></li>
                    <li data-name="passport"><a href="#timeline" data-toggle="tab">护照</a></li>
                </ul>
                <div class="tab-content">
                    <div class="box-content">
                        <form role="form">
                            <div class="box-body" data-name="base-config">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">状态：</label>
                                    <input type="radio" name="status" value="1" @if (!isset($country_detail) || $country_detail->status == 1) checked @endif> 展示
                                    <input type="radio" name="status" value="0" @if (isset($country_detail) && $country_detail->status == 0) checked @endif>  关闭
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片或视频</label>
                                    <div>
                                        <img src="{{$country_detail->img or ''}}" height="200" alt="">
                                    </div>
                                    <input type="file" class="upload_file">

                                    <input class="file_path" type="hidden" name="img" value="{{$banner->img or ''}}">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">居住要求</label>
                                    <input type="text" name="live" value="{{$country_detail->live or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">免签国家</label>
                                        <input type="text" name="visa" value="{{$country_detail->visa or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">移民周期</label>
                                        <input type="text" name="migrate" value="{{$country_detail->migrate or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">证件类型</label>
                                        <select name="ID_type" id="" class="form-control">
                                            <option value="1" @if ($country_detail->ID_type == 1) selected @endif>护照</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body" data-name="banner"  style="display:none">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">标题</label>
                                    <input type="text"  name="banner[title]" value="{{$country_detail->banner['title'] or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">banner</label>
                                    <div>
                                        <img src="{{$country_detail->banner['img'] or ''}}" height="200" alt="">
                                    </div>
                                    <input type="file" class="upload_file">

                                    <input class="file_path" type="hidden" name="banner[img]" value="{{$banner->banner['img'] or ''}}">

                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">描述</label>
                                        <input type="text" name="banner[description]" value="{{$country_detail->banner['description'] or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>
                            </div>



                            <div class="box-body" data-name="detail" style="display:none">
                                <div class="form-group">
                                    <div class="form-group">
                                        <textarea name="description" id="" cols="120" rows="10">
                                            {{$country_detail->description}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body" data-name="passport" style="display:none">
                                <div class="form-group">
                                    <label for="exampleInputFile">上传护照</label>
                                    <div>
                                        <img src="{{$country_detail->img or ''}}" height="200" alt="">
                                    </div>
                                    <input type="file" class="upload_file">

                                    <input class="file_path" type="hidden" name="img" value="{{$banner->img or ''}}">

                                </div>
                            </div>

                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{$country_detail->id or ''}}">
                            <input type="hidden" name="country_id" value="{{request()->country_id}}">

                        </form>

                    </div>
                </div>
            </div>
        </div>



    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        //tab切换
        $('ul li').click(function () {
            var tabName = $(this).attr('data-name');
            console.log(tabName);
            $('form').children().hide();
            $('div[data-name=' + tabName + ']').show();
            $('form').find('.box-footer').show();


        })

        //保存
        $('#save').click(function () {
            $.ajax({
                'type': 'POST',
                'url': '{{route('country_detail.save')}}',
                'data': $("form").serialize(),
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('保存成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('country')}}';
                        }, 2000);

                    } else {
                        toastr.error('保存失败:' + msg.message);
                    }
                }
            })
        })

        //上传图片
        $("input[type=file]").change(function () {
            var _this = $(this);
            var formData = new FormData();
            formData.append("file", _this.parent().find('.upload_file')[0].files[0]);
            formData.append("_token", '{{csrf_token()}}');
            $.ajax({
                'type': 'POST',
                'url': '{{route('upload')}}',
                'data': formData,
                /**
                 *必须false才会自动加上正确的Content-Type
                 */
                contentType: false,
                /**
                 * 必须false才会避开jQuery对 formdata 的默认处理
                 * XMLHttpRequest会对 formdata 进行正确的处理
                 */
                processData: false,
                success: function (msg) {
                    if (msg.status == 'success') {
                        toastr.success('上传成功!');
                        _this.parent().find('.file_path').val(msg.data);
                        _this.parent().find('img').attr('src', msg.data);
                    } else {
                        toastr.error('上传失败:' + msg.message);
                    }
                },
            })
        })



    </script>
@endsection