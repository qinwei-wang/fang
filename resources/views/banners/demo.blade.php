@extends('Framework::template.default')
@section('css')
    <link rel="stylesheet" media="screen" type="text/css" href="{{asset('/assets/color-picker/css/colorpicker.css')}}" />
@endsection
@section('title')
    {{trans('common.system_name')}}
@endsection
@inject('presenter','App\Modules\BaseConfig\Presenters\HomeConfigPresenter')
<?php
$content_arr = $webConfig ? json_decode($webConfig->content, true) : [];
?>
@section('content')
    <section class="content-header">
        <h1>
            @if($webConfig && !$isCopy)
                @lang('BaseConfig::web_config.home_config.edit_title')
            @else
                @lang('BaseConfig::web_config.home_config.create_title')
            @endif
            @lang($configData['title'])
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('homeConfig.index')}}"><i class="fa fa-sign-in"></i>@lang('Framework::template.Base Configure')</a></li>
            <li class="active">@lang('BaseConfig::web_config.home_config.title')</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <form class="form-horizontal" name="form" method="post" id="home_config_form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="config_name" value="{{$configName}}">
                <input type="hidden" name="id" value="@if($webConfig && !$isCopy){{$webConfig->id}}@else{{'0'}}@endif"/>
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="daterange" class="form-control"
                                               value="@if($webConfig){{$presenter->getSchedule($webConfig)}}@else{{old('daterange')}}@endif"
                                               placeholder="@lang('BaseConfig::web_config.home_config.scheduling_time')">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select class="select2 form-control" name="status">
                                        @foreach($presenter->getStatus() as $key => $state)
                                            <option value='{{$key}}'
                                                    @if($webConfig)
                                                    @if($webConfig->status == $key) selected @endif
                                                    @else
                                                    @if(!(old('status') === null) && old('status') == $key) selected @endif
                                                    @endif
                                            >@lang($state)</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="desc" class="form-control" value="@if($webConfig){{$webConfig->desc}}@else{{old('desc')}}@endif" placeholder="@lang('BaseConfig::web_config.home_config.desc')">
                                </div>
                                <div class="col-sm-2 margin pull-right">
                                    <div class="btn-group  pull-right">
                                        <button type="submit" id="submit" class="btn btn-block btn-info"><i class="fa fa-circle-thin"></i>
                                            @if($webConfig && !$isCopy)
                                                @lang('BaseConfig::web_config.home_config.update')
                                            @else
                                                @lang('BaseConfig::web_config.home_config.create')
                                            @endif
                                        </button>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="height: 50px;margin-bottom: 10px">
                                    <div class="form-group inline">
                                        <label style="float: left;">语言：</label>
                                        <div class="inline">
                                            <div class="checkbox inline margin-10px">
                                                <label>
                                                    <input type="checkbox" class="checkbox_all" name="language_ids_all" value="1">
                                                    全部
                                                </label>
                                            </div>
                                            @foreach($presenter->getLanguages() as $language)
                                                <div class="checkbox inline checkbox_item margin-10px">
                                                    <label>
                                                        <input type="checkbox" class="checkbox_item" name="language_ids[]"
                                                               value="{{ $language->id }}" @if(in_array($language->id, explode(',', trim($webConfig->language_ids, ',')))) checked @endif>
                                                        {{ $language->name_zh }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#h5_top_banner" class="text-muted" data-toggle="tab">H5 Top Banner</a></li>
                                    <li><a href="#pc_top_banner" class="text-muted" data-toggle="tab">PC Top Banner</a></li>
                                    <li><a href="#new_users" class="text-muted" data-toggle="tab">New Users</a></li>
                                    <li><a href="#tab_slide" class="text-muted" data-toggle="tab">Slide</a></li>
                                    <li><a href="#tab_mobile_slide" class="text-muted" data-toggle="tab">Mobile Slide</a></li>
                                    <li><a href="#tab_app_slide" class="text-muted" data-toggle="tab">App Slide</a></li>
                                    <li><a href="#tab_slide_right" class="text-muted" data-toggle="tab">Slide Right</a></li>
                                    <li><a href="#tab_daily_specials" class="text-muted" data-toggle="tab">Daily Specials</a></li>
                                    <li><a href="#tab_daily_recommended" class="text-muted" data-toggle="tab">Daily Recommended</a></li>
                                    <li><a href="#tab_patpat_life" class="text-muted" data-toggle="tab">Patpat Life</a></li>
                                    <li><a href="#tab_wap_selections" class="text-muted" data-toggle="tab">Wap Selections</a></li>
                                    <li><a href="#tab_web_selections" class="text-muted" data-toggle="tab">Web Selections</a></li>
                                    <li><a href="#tab_categories" class="text-muted" data-toggle="tab">Categories</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="h5_top_banner">
                                        <a class="btn btn-default J_add_tr" data-id="h5_top_banner_tr">新增top banner</a>
                                        <p></p>
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Img Url</th>
                                                <th>Img File</th>
                                                <th>Href</th>
                                                <th>Time</th>
                                                <th>倒计时字体颜色</th>
                                                <th>前台倒计时</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($content_arr['h5_top_banner'] as $k=>$h5_top_banner)
                                                <tr class="">
                                                    <td>
                                                        <input type="text" placeholder="img URL" style="width: 100%"
                                                               name="jsonData[h5_top_banner][{{$k}}][img]"
                                                               value="{{ $h5_top_banner['img'] or '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="file" name="img_file_h5_top_banner_1_img_file" class="upload_img" accept="image/gif,image/jpeg,image/jpg,image/png">
                                                        <span style="display: none">正在上传...</span>
                                                    </td>
                                                    <td>
                                                        <input name="jsonData[h5_top_banner][{{$k}}][href]" type="text" value="{{ $h5_top_banner['href'] or '' }}" placeholder="href" class="col-md-12">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="jsonData[h5_top_banner][{{$k}}][time]" class="form-control daterange"
                                                               value="{{$presenter->getSchedule($h5_top_banner['time'])}}">
                                                    </td>
                                                    <td>
                                                        <input name="jsonData[h5_top_banner][{{$k}}][time_text_color]" type="text" placeholder="" value="{{ $h5_top_banner['time_text_color'] or '' }}" class="col-md-12 colorpickerField">
                                                    </td>
                                                    <td>
                                                        <input name="jsonData[h5_top_banner][{{$k}}][enable]" type="checkbox" @if($h5_top_banner['enable']) checked @endif value="1" class="col-md-12">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade in" id="pc_top_banner">
                                        <a class="btn btn-default J_add_tr" data-id="pc_top_banner_tr">新增top banner</a>
                                        <p></p>
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Img Url</th>
                                                <th>Img File</th>
                                                <th>Href</th>
                                                <th>Time</th>
                                                <th>倒计时字体颜色</th>
                                                <th>前台倒计时</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($content_arr['pc_top_banner'] as $k=>$pc_top_banner)
                                                <tr class="">
                                                    <td>
                                                        <input type="text" placeholder="img URL" style="width: 100%"
                                                               name="jsonData[pc_top_banner][{{$k}}][img]"
                                                               value="{{ $pc_top_banner['img'] or '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="file" name="img_file_pc_top_banner_1_img_file" class="upload_img" accept="image/gif,image/jpeg,image/jpg,image/png">
                                                        <span style="display: none">正在上传...</span>
                                                    </td>
                                                    <td>
                                                        <input name="jsonData[pc_top_banner][{{$k}}][href]" type="text" value="{{ $pc_top_banner['href'] or '' }}" placeholder="href" class="col-md-12">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="jsonData[pc_top_banner][{{$k}}][time]" class="form-control daterange"
                                                               value="{{$presenter->getSchedule($pc_top_banner['time'])}}">
                                                    </td>
                                                    <td>
                                                        <input name="jsonData[pc_top_banner][{{$k}}][time_text_color]" type="text"  placeholder="" value="{{ $pc_top_banner['time_text_color'] or '' }}" class="col-md-12 colorpickerField">
                                                    </td>
                                                    <td>
                                                        <input name="jsonData[pc_top_banner][{{$k}}][enable]" type="checkbox" @if($pc_top_banner['enable']) checked @endif value="1" class="col-md-12">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade in" id="new_users">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th></th>
                                                <th>Img Url</th>
                                                <th>Img File</th>
                                                <th>Href</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    H5 入口:
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="img URL" style="width: 100%"
                                                           name="jsonData[new_users][h5][img]"
                                                           value="{{ $content_arr['new_users']['h5']['img'] or '' }}">
                                                </td>
                                                <td>
                                                    <input type="file" name="img_file_new_users_1_img_file" class="upload_img" accept="image/gif,image/jpeg,image/jpg,image/png">
                                                    <span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[new_users][h5][href]" type="text" value="{{ $content_arr['new_users']['h5']['href'] or '' }}" placeholder="href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    PC 入口:
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="img URL" style="width: 100%"
                                                           name="jsonData[new_users][pc][img]"
                                                           value="{{ $content_arr['new_users']['pc']['img'] or '' }}">
                                                </td>
                                                <td>
                                                    <input type="file" name="img_file_new_users_1_img_file" class="upload_img" accept="image/gif,image/jpeg,image/jpg,image/png">
                                                    <span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[new_users][pc][href]" type="text" value="{{ $content_arr['new_users']['pc']['href'] or '' }}" placeholder="href" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_slide">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Img url</th>
                                                <th>Img file</th>
                                                <th>Href</th>
                                                <th>Top Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[slide][0][title]" type="text" value="{{ $content_arr['slide'][0]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][0][subtitle]" type="text" value="{{ $content_arr['slide'][0]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][0][img]" type="text" value="{{ $content_arr['slide'][0]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_slide_0_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][0][href]" type="text" value="{{ $content_arr['slide'][0]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][0][top_value]" type="text" value="{{ $content_arr['slide'][0]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[slide][1][title]" type="text" value="{{ $content_arr['slide'][1]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][1][subtitle]" type="text" value="{{ $content_arr['slide'][1]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][1][img]" type="text" value="{{ $content_arr['slide'][1]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_slide_1_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][1][href]" type="text" value="{{ $content_arr['slide'][1]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][1][top_value]" type="text" value="{{ $content_arr['slide'][1]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[slide][2][title]" type="text" value="{{ $content_arr['slide'][2]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][2][subtitle]" type="text" value="{{ $content_arr['slide'][2]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][2][img]" type="text" value="{{ $content_arr['slide'][2]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_slide_2_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][2][href]" type="text" value="{{ $content_arr['slide'][2]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][2][top_value]" type="text" value="{{ $content_arr['slide'][2]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[slide][3][title]" type="text" value="{{ $content_arr['slide'][3]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][3][subtitle]" type="text" value="{{ $content_arr['slide'][3]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][3][img]" type="text" value="{{ $content_arr['slide'][3]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_slide_3_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][3][href]" type="text" value="{{ $content_arr['slide'][3]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][3][top_value]" type="text" value="{{ $content_arr['slide'][3]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[slide][4][title]" type="text" value="{{ $content_arr['slide'][4]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][4][subtitle]" type="text" value="{{ $content_arr['slide'][4]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][4][img]" type="text" value="{{ $content_arr['slide'][4]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_slide_4_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][4][href]" type="text" value="{{ $content_arr['slide'][4]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide][4][top_value]" type="text" value="{{ $content_arr['slide'][4]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_mobile_slide">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Img url</th>
                                                <th>Img file</th>
                                                <th>Href</th>
                                                <th>Top Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[mobile_slide][0][title]" type="text" value="{{ $content_arr['mobile_slide'][0]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][0][subtitle]" type="text" value="{{ $content_arr['mobile_slide'][0]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][0][img]" type="text" value="{{ $content_arr['mobile_slide'][0]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_mobile_slide_0_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][0][href]" type="text" value="{{ $content_arr['mobile_slide'][0]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][0][top_value]" type="number" value="{{ $content_arr['mobile_slide'][0]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[mobile_slide][1][title]" type="text" value="{{ $content_arr['mobile_slide'][1]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][1][subtitle]" type="text" value="{{ $content_arr['mobile_slide'][1]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][1][img]" type="text" value="{{ $content_arr['mobile_slide'][1]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_mobile_slide_1_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][1][href]" type="text" value="{{ $content_arr['mobile_slide'][1]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][1][top_value]" type="number" value="{{ $content_arr['mobile_slide'][1]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[mobile_slide][2][title]" type="text" value="{{ $content_arr['mobile_slide'][2]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][2][subtitle]" type="text" value="{{ $content_arr['mobile_slide'][2]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][2][img]" type="text" value="{{ $content_arr['mobile_slide'][2]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_mobile_slide_2_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][2][href]" type="text" value="{{ $content_arr['mobile_slide'][2]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][2][top_value]" type="number" value="{{ $content_arr['mobile_slide'][2]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[mobile_slide][3][title]" type="text" value="{{ $content_arr['mobile_slide'][3]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][3][subtitle]" type="text" value="{{ $content_arr['mobile_slide'][3]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][3][img]" type="text" value="{{ $content_arr['mobile_slide'][3]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_mobile_slide_3_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][3][href]" type="text" value="{{ $content_arr['mobile_slide'][3]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][3][top_value]" type="number" value="{{ $content_arr['mobile_slide'][3]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[mobile_slide][4][title]" type="text" value="{{ $content_arr['mobile_slide'][4]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][4][subtitle]" type="text" value="{{ $content_arr['mobile_slide'][4]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][4][img]" type="text" value="{{ $content_arr['mobile_slide'][4]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_mobile_slide_4_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][4][href]" type="text" value="{{ $content_arr['mobile_slide'][4]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[mobile_slide][4][top_value]" type="number" value="{{ $content_arr['mobile_slide'][4]['top_value'] or 0 }}" placeholder="top value" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_app_slide">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Img url</th>
                                                <th>Img file</th>
                                                <th>Event Type</th>
                                                <th>Event Path</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[app_slide][0][img]" type="text" value="{{ $content_arr['app_slide'][0]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_app_slide_0_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <?php
                                                $app_slide_0_event_type = isset($content_arr['app_slide'][0]['event_type']) ? $content_arr['app_slide'][0]['event_type'] : '';
                                                $app_slide_0_event_value = isset($content_arr['app_slide'][0]['event_value']) ? $content_arr['app_slide'][0]['event_value'] : '';
                                                ?>
                                                <td>
                                                    <select class="pp_type" name="jsonData[app_slide][0][event_type]" id="" style="width: 100%">
                                                        <option value="id"
                                                                @if($app_slide_0_event_type == 'id') selected @endif>
                                                            Event ID
                                                        </option>
                                                        <option value="url"
                                                                @if($app_slide_0_event_type == 'url') selected @endif>
                                                            Event URL
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="pp_type_value" name="jsonData[app_slide][0][id_value]" id="" style="@if($app_slide_0_event_type == 'url') display:none; @endif width: 100%">
                                                        <option value="">Please select event</option>
                                                        @foreach($all_events as $id => $name)
                                                            <option value="{{ $id }}"
                                                                    @if($app_slide_0_event_type == 'id' and $app_slide_0_event_value == $id) selected @endif>
                                                                {{ '(' . $id . ') - ' . $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input class="pp_type_value" type="text" value="@if($app_slide_0_event_type == 'url'){{ $app_slide_0_event_value }}@endif"
                                                           name="jsonData[app_slide][0][url_value]"
                                                           placeholder="href" style="@if($app_slide_0_event_type != 'url') display:none; @endif width: 100%">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[app_slide][1][img]" type="text" value="{{ $content_arr['app_slide'][1]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_app_slide_1_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <?php
                                                $app_slide_1_event_type = isset($content_arr['app_slide'][1]['event_type']) ? $content_arr['app_slide'][1]['event_type'] : '';
                                                $app_slide_1_event_value = isset($content_arr['app_slide'][1]['event_value']) ? $content_arr['app_slide'][1]['event_value'] : '';
                                                ?>
                                                <td>
                                                    <select class="pp_type" name="jsonData[app_slide][1][event_type]" id="" style="width: 100%">
                                                        <option value="id"
                                                                @if($app_slide_1_event_type == 'id') selected @endif>
                                                            Event ID
                                                        </option>
                                                        <option value="url"
                                                                @if($app_slide_1_event_type == 'url') selected @endif>
                                                            Event URL
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="pp_type_value" name="jsonData[app_slide][1][id_value]" id="" style="@if($app_slide_1_event_type == 'url') display:none; @endif width: 100%">
                                                        <option value="">Please select event</option>
                                                        @foreach($all_events as $id => $name)
                                                            <option value="{{ $id }}"
                                                                    @if($app_slide_1_event_type == 'id' and $app_slide_1_event_value == $id) selected @endif>
                                                                {{ '(' . $id . ') - ' . $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input class="pp_type_value" type="text" value="@if($app_slide_1_event_type == 'url'){{ $app_slide_1_event_value }}@endif"
                                                           name="jsonData[app_slide][1][url_value]"
                                                           placeholder="href" style="@if($app_slide_1_event_type != 'url') display:none; @endif width: 100%">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[app_slide][2][img]" type="text" value="{{ $content_arr['app_slide'][2]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_app_slide_2_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <?php
                                                $app_slide_2_event_type = isset($content_arr['app_slide'][2]['event_type']) ? $content_arr['app_slide'][2]['event_type'] : '';
                                                $app_slide_2_event_value = isset($content_arr['app_slide'][2]['event_value']) ? $content_arr['app_slide'][2]['event_value'] : '';
                                                ?>
                                                <td>
                                                    <select class="pp_type" name="jsonData[app_slide][2][event_type]" id="" style="width: 100%">
                                                        <option value="id"
                                                                @if($app_slide_2_event_type == 'id') selected @endif>
                                                            Event ID
                                                        </option>
                                                        <option value="url"
                                                                @if($app_slide_2_event_type == 'url') selected @endif>
                                                            Event URL
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="pp_type_value" name="jsonData[app_slide][2][id_value]" id="" style="@if($app_slide_2_event_type == 'url') display:none; @endif width: 100%">
                                                        <option value="">Please select event</option>
                                                        @foreach($all_events as $id => $name)
                                                            <option value="{{ $id }}"
                                                                    @if($app_slide_2_event_type == 'id' and $app_slide_2_event_value == $id) selected @endif>
                                                                {{ '(' . $id . ') - ' . $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input class="pp_type_value" type="text" value="@if($app_slide_2_event_type == 'url'){{ $app_slide_2_event_value }}@endif"
                                                           name="jsonData[app_slide][2][url_value]"
                                                           placeholder="href" style="@if($app_slide_2_event_type != 'url') display:none; @endif width: 100%">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[app_slide][3][img]" type="text" value="{{ $content_arr['app_slide'][3]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_app_slide_3_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <?php
                                                $app_slide_3_event_type = isset($content_arr['app_slide'][3]['event_type']) ? $content_arr['app_slide'][3]['event_type'] : '';
                                                $app_slide_3_event_value = isset($content_arr['app_slide'][3]['event_value']) ? $content_arr['app_slide'][3]['event_value'] : '';
                                                ?>
                                                <td>
                                                    <select class="pp_type" name="jsonData[app_slide][3][event_type]" id="" style="width: 100%">
                                                        <option value="id"
                                                                @if($app_slide_3_event_type == 'id') selected @endif>
                                                            Event ID
                                                        </option>
                                                        <option value="url"
                                                                @if($app_slide_3_event_type == 'url') selected @endif>
                                                            Event URL
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="pp_type_value" name="jsonData[app_slide][3][id_value]" id="" style="@if($app_slide_3_event_type == 'url') display:none; @endif width: 100%">
                                                        <option value="">Please select event</option>
                                                        @foreach($all_events as $id => $name)
                                                            <option value="{{ $id }}"
                                                                    @if($app_slide_3_event_type == 'id' and $app_slide_3_event_value == $id) selected @endif>
                                                                {{ '(' . $id . ') - ' . $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input class="pp_type_value" type="text" value="@if($app_slide_3_event_type == 'url'){{ $app_slide_3_event_value }}@endif"
                                                           name="jsonData[app_slide][3][url_value]"
                                                           placeholder="href" style="@if($app_slide_3_event_type != 'url') display:none; @endif width: 100%">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[app_slide][4][img]" type="text" value="{{ $content_arr['app_slide'][4]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_app_slide_4_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <?php
                                                $app_slide_4_event_type = isset($content_arr['app_slide'][4]['event_type']) ? $content_arr['app_slide'][4]['event_type'] : '';
                                                $app_slide_4_event_value = isset($content_arr['app_slide'][4]['event_value']) ? $content_arr['app_slide'][4]['event_value'] : '';
                                                ?>
                                                <td>
                                                    <select class="pp_type" name="jsonData[app_slide][4][event_type]" id="" style="width: 100%">
                                                        <option value="id"
                                                                @if($app_slide_4_event_type == 'id') selected @endif>
                                                            Event ID
                                                        </option>
                                                        <option value="url"
                                                                @if($app_slide_4_event_type == 'url') selected @endif>
                                                            Event URL
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="pp_type_value" name="jsonData[app_slide][4][id_value]" id="" style="@if($app_slide_4_event_type == 'url') display:none; @endif width: 100%">
                                                        <option value="">Please select event</option>
                                                        @foreach($all_events as $id => $name)
                                                            <option value="{{ $id }}"
                                                                    @if($app_slide_4_event_type == 'id' and $app_slide_4_event_value == $id) selected @endif>
                                                                {{ '(' . $id . ') - ' . $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input class="pp_type_value" type="text" value="@if($app_slide_4_event_type == 'url'){{ $app_slide_4_event_value }}@endif"
                                                           name="jsonData[app_slide][4][url_value]"
                                                           placeholder="href" style="@if($app_slide_4_event_type != 'url') display:none; @endif width: 100%">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_slide_right">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Img url</th>
                                                <th>Img file</th>
                                                <th>Href</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[slide_right][0][title]" type="text" value="{{ $content_arr['slide_right'][0]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide_right][0][subtitle]" type="text" value="{{ $content_arr['slide_right'][0]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide_right][0][img]" type="text" value="{{ $content_arr['slide_right'][0]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_slide_right_0_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide_right][0][href]" type="text" value="{{ $content_arr['slide_right'][0]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[slide_right][1][title]" type="text" value="{{ $content_arr['slide_right'][1]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide_right][1][subtitle]" type="text" value="{{ $content_arr['slide_right'][1]['subtitle'] or '' }}" placeholder="Subtitle" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide_right][1][img]" type="text" value="{{ $content_arr['slide_right'][1]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_slide_right_1_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[slide_right][1][href]" type="text" value="{{ $content_arr['slide_right'][1]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_daily_specials">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Event ids</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[daily_specials]" type="text" value="{{ $content_arr['daily_specials'] or '' }}" placeholder="活动 ID，多个活动 ID 则英文逗号分隔" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_daily_recommended">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Product ids</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[daily_recommended][0][product_ids]" type="text" value="{{ $content_arr['daily_recommended'][0]['product_ids'] or '' }}" placeholder="Product ids" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_patpat_life">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Img Url</th>
                                                <th>Img File</th>
                                                <th>Href</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[patpat_life][0][img]" type="text" value="{{ $content_arr['patpat_life'][0]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_patpat_life_0_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[patpat_life][0][href]" type="text" value="{{ $content_arr['patpat_life'][0]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[patpat_life][1][img]" type="text" value="{{ $content_arr['patpat_life'][1]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_patpat_life_1_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[patpat_life][1][href]" type="text" value="{{ $content_arr['patpat_life'][1]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[patpat_life][2][img]" type="text" value="{{ $content_arr['patpat_life'][2]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_patpat_life_2_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[patpat_life][2][href]" type="text" value="{{ $content_arr['patpat_life'][2]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[patpat_life][3][img]" type="text" value="{{ $content_arr['patpat_life'][3]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_patpat_life_3_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[patpat_life][3][href]" type="text" value="{{ $content_arr['patpat_life'][3]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[patpat_life][4][img]" type="text" value="{{ $content_arr['patpat_life'][4]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_patpat_life_4_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[patpat_life][4][href]" type="text" value="{{ $content_arr['patpat_life'][4]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[patpat_life][5][img]" type="text" value="{{ $content_arr['patpat_life'][5]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_patpat_life_5_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[patpat_life][5][href]" type="text" value="{{ $content_arr['patpat_life'][5]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[patpat_life][6][img]" type="text" value="{{ $content_arr['patpat_life'][6]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_patpat_life_6_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[patpat_life][6][href]" type="text" value="{{ $content_arr['patpat_life'][6]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[patpat_life][7][img]" type="text" value="{{ $content_arr['patpat_life'][7]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_patpat_life_7_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[patpat_life][7][href]" type="text" value="{{ $content_arr['patpat_life'][7]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_wap_selections">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Img Url</th>
                                                <th>Img File</th>
                                                <th>Href</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[wap_selections][0][img]" type="text" value="{{ $content_arr['wap_selections'][0]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_wap_selections_0_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[wap_selections][0][href]" type="text" value="{{ $content_arr['wap_selections'][0]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[wap_selections][1][img]" type="text" value="{{ $content_arr['wap_selections'][1]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_wap_selections_1_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[wap_selections][1][href]" type="text" value="{{ $content_arr['wap_selections'][1]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[wap_selections][2][img]" type="text" value="{{ $content_arr['wap_selections'][2]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_wap_selections_2_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[wap_selections][2][href]" type="text" value="{{ $content_arr['wap_selections'][2]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_web_selections">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Img Url</th>
                                                <th>Img File</th>
                                                <th>Href</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[web_selections][0][img]" type="text" value="{{ $content_arr['web_selections'][0]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_web_selections_0_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[web_selections][0][href]" type="text" value="{{ $content_arr['web_selections'][0]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[web_selections][1][img]" type="text" value="{{ $content_arr['web_selections'][1]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_web_selections_1_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[web_selections][1][href]" type="text" value="{{ $content_arr['web_selections'][1]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[web_selections][2][img]" type="text" value="{{ $content_arr['web_selections'][2]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_web_selections_2_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[web_selections][2][href]" type="text" value="{{ $content_arr['web_selections'][2]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_categories">
                                        <table class="table table-hover darkborder-table">
                                            <thead>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>Title</th>
                                                <th>Img Url</th>
                                                <th>Img File</th>
                                                <th>Href</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[categories][0][title]" type="text" value="{{ $content_arr['categories'][0]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][0][img]" type="text" value="{{ $content_arr['categories'][0]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_categories_0_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][0][href]" type="text" value="{{ $content_arr['categories'][0]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[categories][1][title]" type="text" value="{{ $content_arr['categories'][1]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][1][img]" type="text" value="{{ $content_arr['categories'][1]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_categories_1_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][1][href]" type="text" value="{{ $content_arr['categories'][1]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[categories][2][title]" type="text" value="{{ $content_arr['categories'][2]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][2][img]" type="text" value="{{ $content_arr['categories'][2]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_categories_2_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][2][href]" type="text" value="{{ $content_arr['categories'][2]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[categories][3][title]" type="text" value="{{ $content_arr['categories'][3]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][3][img]" type="text" value="{{ $content_arr['categories'][3]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_categories_3_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][3][href]" type="text" value="{{ $content_arr['categories'][3]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[categories][4][title]" type="text" value="{{ $content_arr['categories'][4]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][4][img]" type="text" value="{{ $content_arr['categories'][4]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_categories_4_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][4][href]" type="text" value="{{ $content_arr['categories'][4]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="jsonData[categories][5][title]" type="text" value="{{ $content_arr['categories'][5]['title'] or '' }}" placeholder="Title" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][5][img]" type="text" value="{{ $content_arr['categories'][5]['img'] or '' }}" placeholder="Img url" class="col-md-12">
                                                </td>
                                                <td>
                                                    <input name="img_file_categories_5_img_file" type="file" class="upload_img col-md-12"><span style="display: none">正在上传...</span>
                                                </td>
                                                <td>
                                                    <input name="jsonData[categories][5][href]" type="text" value="{{ $content_arr['categories'][5]['href'] or '' }}" placeholder="Href" class="col-md-12">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <table class="hidden">
                <tbody id="h5_top_banner_tr">
                <tr>
                    <td>
                        <input type="text" placeholder="img URL" style="width: 100%"
                               name="jsonData[h5_top_banner][$k][img]"
                               value="">
                    </td>
                    <td>
                        <input type="file" name="img_file_h5_top_banner_1_img_file" class="upload_img" accept="image/gif,image/jpeg,image/jpg,image/png">
                        <span style="display: none">正在上传...</span>
                    </td>
                    <td>
                        <input name="jsonData[h5_top_banner][$k][href]" type="text" value="" placeholder="href" class="col-md-12">
                    </td>
                    <td>
                        <input type="text" name="jsonData[h5_top_banner][$k][time]" class="form-control daterange"
                               value="">
                    </td>
                    <td>
                        <input name="jsonData[h5_top_banner][$k][time_text_color]" type="text" placeholder="" value="" class="col-md-12 colorpickerField">
                    </td>
                    <td>
                        <input name="jsonData[h5_top_banner][$k][enable]" type="checkbox" value="1" class="col-md-12">
                    </td>
                </tr>
                </tbody>

                <tbody id="pc_top_banner_tr">
                <tr>
                    <td>
                        <input type="text" placeholder="img URL" style="width: 100%"
                               name="jsonData[pc_top_banner][$k][img]"
                               value="">
                    </td>
                    <td>
                        <input type="file" name="img_file_pc_top_banner_1_img_file" class="upload_img" accept="image/gif,image/jpeg,image/jpg,image/png">
                        <span style="display: none">正在上传...</span>
                    </td>
                    <td>
                        <input name="jsonData[pc_top_banner][$k][href]" type="text" value="" placeholder="href" class="col-md-12">
                    </td>
                    <td>
                        <input type="text" name="jsonData[pc_top_banner][$k][time]" class="form-control daterange"
                               value="">
                    </td>
                    <td>
                        <input name="jsonData[pc_top_banner][$k][time_text_color]" type="text"  placeholder="" value="" class="col-md-12 colorpickerField">
                    </td>
                    <td>
                        <input name="jsonData[pc_top_banner][$k][enable]" type="checkbox" value="1" class="col-md-12">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset ("/assets/js/jquery.form.js") }}"></script>
    <script src="{{ asset ("/assets/color-picker/js/colorpicker.js") }}"></script>
    <script>
        $('.colorpickerField').ColorPicker({
            onSubmit: function(hsb, hex, rgb, el) {
                $(el).val(hex);
                $(el).ColorPickerHide();
            },
            onBeforeShow: function () {
                $(this).ColorPickerSetColor(this.value);
            }
        })
            .bind('keyup', function(){
                $(this).ColorPickerSetColor(this.value);
            });
    </script>
    <script type="text/javascript">
        $('input[name=daterange],input.daterange').daterangepicker({
            timePicker: true,
            timePickerIncrement: 5,
            locale: {format: 'YYYY-MM-DD HH:mm:ss', applyLabel: '应用', cancelLabel: '取消'}
        });

        $('.checkbox_all').change(function () {
            $(this).closest('div').parent().find('input.checkbox_item').prop('checked', $(this).prop('checked'));
        });
        $('.checkbox_item').change(function () {
            let all = true;
            $(this).closest('div').parent().find('input.checkbox_item').each(function () {
                if (!$(this).prop('checked')) {
                    all = false;
                }
            });
            $(this).closest('div').parent().find('input.checkbox_all').prop('checked', all);
        });
        // 回显
        let checkAll = function () {
            $('.checkbox_all').closest('div').parent().each(function () {
                let all = true;
                $(this).find('input.checkbox_item').each(function () {
                    if (!$(this).prop('checked')) {
                        all = false;
                    }
                });
                $(this).find('input.checkbox_all').prop('checked', all);
            });
        };
        checkAll();

        $('body').delegate('.upload_img','change',function(){
            let _this = $(this);
            let img_name = _this.attr("name");
            let url = '{{URL::route("homeConfig.update_image")}}';
            if(_this.parent('form').length==0){
                _this.wrap("<form id="+img_name+" action="+url+" method='post' enctype='multipart/form-data'></form>");
            }
            $("#"+img_name).ajaxSubmit({
                dataType:  'json',
                data: {
                    "_token": "{{Session::token()}}",
                    "img_name": img_name
                },
                beforeSend: function() {
                    _this.parent().next("span").attr("style", "display: block");
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    console.log('进度'+percentComplete);
                },
                success: function(data) {
                    _this.parent().next("span").attr("style", "display:none");
                    if (data.status == true) {
                        _this.parent().parent().prev().children("input").val(data.img_url);
                        toastr.success('图片上传成功');
                    } else {
                        toastr.warning(data.errMsg);
                    }
                },
                error:function(xhr){
                    toastr.warning(xhr.responseText, "图片上传失败");
                }
            });
        });

        // event type 切换
        $('.pp_type').change(function () {
            var type = $(this).val();
            if (type === 'id') {
                $(this).closest('tr').find("input.pp_type_value").hide();
                $(this).closest('tr').find("select.pp_type_value").show();
            } else {
                $(this).closest('tr').find("input.pp_type_value").show();
                $(this).closest('tr').find("select.pp_type_value").hide();
            }
        });

        $("#submit").on('click', function () {
            let data = $("#home_config_form").serialize();
            $.ajax({
                method: "post",
                url: "{{route('homeConfig.createOrEdit')}}",
                data: data,
                beforeSend: function () {
                    // 禁用按钮防止重复提交
                    $("#submit").html('<i class="fa fa-spin fa-spinner"></i>正在提交...');
                    $("#submit").attr({ disabled: "disabled" });
                },
                success: function (data) {console.log(data);
                    if (data.status == 200) {
                        toastr.success('保存成功!');
                        $("#submit").removeAttr("disabled");
                        var config_url = "{{route('homeConfig.createOrEdit', ['config_name'=>$configName])}}";
                        config_url = config_url+'&id='+data.content.id;
                        $(location).prop('href', config_url)
                    } else {
                        $("#submit").removeAttr("disabled");
                        $("#submit").html("确认并保存");
                        toastr.warning(data.msg, "保存失败");
                        return false;
                    }
                },
                error: function (data) {
                    let json=eval("("+data.responseText+")");
                    $("#submit").removeAttr("disabled");
                    $("#submit").html("确认并保存");
                    toastr.warning(json.msg, "缺少必要信息，请重试!");
                },
                complete: function (data) {
                    $("#submit").html('<i class="fa fa-check"></i>完成提交');
                }
            });
            return false;
        });

        (function(){
            $('.J_add_tr').on('click',function(){
                var id = $(this).attr('data-id');
                var $table = $(this).siblings('table');
                var idx = $table.find('tbody tr').length;
                var $tr = $('#'+id+' tr');
                var $tableWrap = $table.find('tbody');
                $tableWrap.append($tr[0].outerHTML);
                $tableWrap.find('tr:last input').each(function(k,v){
                    var oldname =$(this).attr('name');
                    var name = oldname.replace('$k',idx);
                    $(this).prop('name',name);
                });
                datePicker($table.find('input.daterange'));
                colorPicker($table.find('input.colorpickerField'));
            });

            function datePicker($tar){
                $tar.daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 5,
                    locale: {format: 'YYYY-MM-DD HH:mm:ss', applyLabel: '应用', cancelLabel: '取消'}
                });
            }
            function colorPicker($tar){
                $tar.ColorPicker({
                    onSubmit: function(hsb, hex, rgb, el) {
                        $(el).val(hex);
                        $(el).ColorPickerHide();
                    },
                    onBeforeShow: function () {
                        $(this).ColorPickerSetColor(this.value);
                    }
                })
                    .bind('keyup', function(){
                        $(this).ColorPickerSetColor(this.value);
                    });
            }
        })();
    </script>
@endsection
