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
                    <li class="active" data-name="banner"><a href="#activity" data-toggle="tab">banner图设置</a></li>
                    <li data-name="base-config"><a href="#timeline" data-toggle="tab">基础信息设置</a></li>
                    <li data-name="detail"><a href="#timeline" data-toggle="tab">详情</a></li>
                </ul>
                <div class="tab-content">
                    <div class="box-content">
                        <form role="form">
                            <div class="box-body" data-name="banner">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">标题</label>
                                    <input type="text" name="banner[title]" value="{{$country_detail->banner['title'] or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">banner</label>
                                    @if(!isset($country_detail) ||   empty($country_detail->banner['img']))
                                        <input type="file" id="exampleInputFile">
                                    @else
                                        <div>
                                            <img src="{{$country_detail->banner['img']}}" height="200" alt="">
                                        </div>
                                    @endif
                                    <input type="hidden" name="banner['img']" value="{{$country_detail->banner['img'] or ''}}">

                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">描述</label>
                                        <input type="text" name="banner[description]" value="{{$country_detail->banner['description'] or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body" data-name="base-config" style="display:none">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">主图</label>
                                    <input type="file" name="img" value="{{$country_detail->img or ''}}"  id="exampleInputEmail1" placeholder="">
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
                                        <input type="text" name="ID_type" value="{{$country_detail->ID_type or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>
                            </div>


                            <div class="box-body" data-name="detail" style="display:none">
                                <div class="form-group">
                                    <div class="form-group">
                                        <textarea name="description" id="" cols="120" rows="10">

                                        </textarea>
                                    </div>
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



    </script>
@endsection