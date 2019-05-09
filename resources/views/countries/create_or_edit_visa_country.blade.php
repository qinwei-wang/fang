@extends('templates.dashboard')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_filter {
            text-align: right;
        }
    </style>

    <section class="content-header">
        <h1>
            签证国家
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{route('visa_countries')}}"><i class="fa fa-dashboard"></i> banner</a></li>
            <li class="active">设置</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-default">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <form role="form">
                            <div class="form-group">
                                <select name="type" id="" class="form-control">
                                    <option value="0">签证类型</option>
                                    <option value="1" @if ($visa_country->type == 1) selected @endif>签证入境</option>
                                    <option value="2" @if ($visa_country->type == 2) selected @endif>落地签入境</option>
                                    <option value="3" @if ($visa_country->type == 3) selected @endif>免签目的国</option>
                                    <option value="4" @if ($visa_country->type == 4) selected @endif>eVisa</option>
                                </select>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                {!! csrf_field() !!}
                                <input type="hidden" name="country_id" value="{{$visa_country->country_id or ''}}">
                                <input type="hidden" name="visa_country_id" value="{{$visa_country->visa_country_id or ''}}">
                                <button type="button" class="btn btn-primary" id="submit">提交</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>


    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        // toastr.success('保存成功!');
        $('#submit').click(function () {
            $.ajax({
                'type':'POST',
                'url': '{{route('save_visa_country')}}',
                'data': $('form').serialize(),
                success: function (msg)
                {
                    if (msg.status == 'success') {
                        toastr.success('保存成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('visa_countries', ['country_id' => $visa_country->country_id])}}';
                        }, 2000);

                    } else {
                        toastr.error('保存失败:' + msg.message);
                    }
                }
            })
        })


    </script>
@endsection