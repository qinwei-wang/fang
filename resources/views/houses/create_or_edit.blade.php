@extends('templates.dashboard')
@section('content')
@section('css')
<link href='{{asset("imgLunbo/upload.css")}}' />
<link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link href="/bower_components/bootstrap-datepicker/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-colorpicker.css" type="text/css" rel="stylesheet">

@endsection
<section class="content-header">
    <h1>
        新房
        <small></small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> 新房</a></li>
        <li class="active">设置</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form">
                <div class="box box-default">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <h3 class="box-title">基本信息</h3>
                    </div>
                    <!-- form start -->
                    <div class="box-body">

                        <div class="form-group">
                            <label for="">标题</label>
                            <input type="text" class="form-control" name="title" value="{{$house->title or ''}}">
                        </div>
                      
                        <div class="form-group">
                            <label for="">标题tag (逗号分开)</label>
                            <input type="text" class="form-control" name="title_tags" value="{{$house->title_tags or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">坐标地址</label>
                            <input type="text" class="form-control" name="coordinate" value="{{$house->coordinate or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">楼盘名称</label>
                            <input type="text" class="form-control" name="name" value="{{$house->name or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">楼盘tags (逗号隔开）</label>
                            <input type="text" class="form-control" name="house_tags" value="{{$house->house_tags or ''}}">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">主图</label>
                            <div id="cupload-4"></div>

                        </div> -->
                        @if (empty($house->images))
                        <div class="form-group">
                            <label for="">套图</label>
                            <div>
                                <div>
                                    <img src="" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="images[]" value="">
                                <button class="btn image_delete" type="button">x</button>

                            </div>
                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-3">
                                    <button class="btn add_image" type="button" class="add_image">+</button>
                                </div>
                            </div>
                        </div>
                        @else
                       
                        <div class="form-group">
                            <label for="">套图</label>
                            @foreach ($house->images as $k => $image)
                            <div>
                                <div>
                                    <img src="{{$image}}" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">
                                <button class="btn image_delete" type="button">x</button>

                                <input class="file_path" type="hidden" name="images[]" value="{{$image}}">

                            </div>
                            @endforeach 

                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-3">
                                    <button class="btn add_image" type="button" class="add_image">+</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="">vr看房</label>
                            <input type="text" class="form-control" name="vr_link" value="{{$house->vr_link or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">价格</label>
                            <input type="text" class="form-control" name="price" value="{{$house->price or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">开发商</label>
                            <input type="text" class="form-control" name="developer" value="{{$house->developer or ''}}">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">地区位置</label>
                            <input type="text" class="form-control" name="location" value="{{$house->location or ''}}">
                        </div> -->
                        <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="addr" value="{{$house->addr or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">房产类型</label>
                            <input type="text" class="form-control" name="type" value="{{$house->type or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">产权</label>
                            <input type="text" class="form-control" name="property" value="{{$house->property or ''}}">
                        </div>

                        <div class="form-group">
                            <label for="">建筑面积</label>
                            <input type="text" class="form-control" name="area" value="{{$house->area or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">开盘日期</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="start_at" class="form-control pull-right" id="datepicker1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">预计落成日期</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="finish_at" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">交通 (逗号隔开）</label>
                            @foreach ($dities as $item) 
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="{{$item->id}}" name="traffic[]" @if (!empty($house->traffic) && in_array($item->id, $house->traffic)) checked @endif> <font color="{{$item->color}}">{{$item->name}}</font>
                            </label>

                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="">交通提示</label>
                         
                            <input type="text" class="form-control" name="traffic_tips" value="{{$house->traffic_tips or ''}}">
                        </div>

                        <div class="form-group">
                            <label for="">公寓设施 (逗号隔开）</label>
                            @foreach ($tags as $tag)
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="{{$tag->id}}" name="facilities[]" @if (!empty($house->facilities) && in_array($tag->id, $house->facilities)) checked @endif> {{$tag->name}}
                            </label>
                            @endforeach
                        </div>


                        <div class="form-group">
                            <label for="">房源介绍</label>
                            <textarea class="form-control" name="description" id="" rows="5">{{$house->description or ''}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">推荐id</label>
                         
                            <input type="text" class="form-control" name="recommend_ids" value="{{$house->recommend_ids or ''}}">
                        </div>

                    </div>
                </div>
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">户型设置</h3>
                    </div>
                    <div class="box-body">
                        @if (!empty($house->house_types))
                        @foreach ($house->house_types as $houseType)
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="">户型</label>
                                <input type="text" name="house_types[type][]" value="{{$houseType['type']}}" class="form-control" placeholder=".col-xs-3">
                            </div>

                            <div class="col-xs-1">
                                <label for="">面积</label>
                                <input type="text" name="house_types[area][]" value="{{$houseType['area']}}" class="form-control" placeholder=".col-xs-4">
                            </div>
                            <div class="col-xs-1">
                                <label for="">套数</label>
                                <input type="text" name="house_types[total][]" value="{{$houseType['total']}}" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-1">
                                <label for="">价格</label>
                                <input type="text" name="house_types[price][]" value="{{$houseType['price']}}" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-1">
                                <label for="">均价</label>
                                <input type="text" name="house_types[average_price][]" value="{{!empty($houseType['average_price']) ? $houseType['average_price'] : ''}}" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-1">
                                <label for="">vr看房</label>
                                <input type="text" name="house_types[vr_link][]" value="{{!empty($houseType['vr_link']) ? $houseType['vr_link'] : ''}}" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-2">
                                <label for="exampleInputFile">上传图片</label>
                                <div>
                                    <img src="{{!empty($houseType['image']) ? $houseType['image'] : ''}}" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="house_types[image][]" value="{{$houseType['image'] or ''}}">

                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="">户型</label>
                                <input type="text" name="house_types[type][]" value="" class="form-control" placeholder=".col-xs-3">
                            </div>

                            <div class="col-xs-1">
                                <label for="">面积</label>
                                <input type="text" name="house_types[area][]" value="" class="form-control" placeholder=".col-xs-4">
                            </div>
                            <div class="col-xs-1">
                                <label for="">套数</label>
                                <input type="text" name="house_types[total][]" value="" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-1">
                                <label for="">价格</label>
                                <input type="text" name="house_types[price][]" value="" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-1">
                                <label for="">均价</label>
                                <input type="text" name="house_types[average_price][]" value="" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-1">
                                <label for="">vr看房</label>
                                <input type="text" name="house_types[vr_link][]" value="" class="form-control" placeholder=".col-xs-5">
                            </div>
                            <div class="col-xs-2">
                                <label for="exampleInputFile">上传图片</label>
                                <div>
                                    <img src="{{!empty($houseType['image']) ? $houseType['image'] : ''}}" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="house_types[image][]" value="{{$houseType['image'] or ''}}">

                            </div>
                        </div>

                        <div class="row" style="margin-top:20px">
                            <div class="col-xs-3">
                                <button class="btn" type="button" id="add_house_types">+</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">筛选项</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">地区</label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->region_index) && in_array('east', $house->region_index)) checked @endif name="region_index[]" value="east">&nbsp;&nbsp;东部
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->region_index) && in_array('west',$house->region_index)) checked @endif name="region_index[]" value="west">&nbsp;&nbsp;西部
                            </label>

                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->region_index) && in_array('urban',$house->region_index)) checked @endif name="region_index[]" value="urban">&nbsp;&nbsp;市区
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->region_index) && in_array('middle', $house->region_index)) checked @endif name="region_index[]" value="middel">&nbsp;&nbsp;中部
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->region_index) && in_array('south', $house->region_index)) checked @endif name="region_index[]" value="south">&nbsp;&nbsp;南部
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->region_index) && in_array('north',$house->region_index)) checked @endif name="region_index[]" value="north">&nbsp;&nbsp;北部
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->region_index) && in_array('east_north', $house->region_index)) checked @endif name="region_index[]" value="east_north">&nbsp;&nbsp;东北部
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->region_index) && in_array('other', $house->region_index)) checked @endif name="region_index[]" value="other">&nbsp;&nbsp;其他地区
                            </label>

                        </div>
                        <div class="form-group">
                            <label for="">价格</label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->price_index) && in_array(1, $house->price_index)) checked @endif name="price_index[]" value="1">&nbsp;&nbsp;100万以下
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->price_index) && in_array(2,$house->price_index)) checked @endif name="price_index[]" value="2">&nbsp;&nbsp;100万-200万
                            </label>

                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->price_index) && in_array(3, $house->price_index)) checked @endif name="price_index[]" value="3">&nbsp;&nbsp;200万-500万
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->price_index) && in_array(4, $house->price_index)) checked @endif name="price_index[]" value="4">&nbsp;&nbsp;500万以上
                            </label>
                            <!-- <input type="text" class="form-control" name="title_tags" value="{{$house->title_tags or ''}}"> -->
                        </div>
                        <div class="form-group">
                            <label for="">面积</label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(1, $house->area_index)) checked @endif name="area_index[]" value="1">&nbsp;&nbsp;50m2以下
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(2, $house->area_index)) checked @endif name="area_index[]" value="2">&nbsp;&nbsp;50m2-70m2
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(3, $house->area_index)) checked @endif name="area_index[]" value="3">&nbsp;&nbsp;70m2-100m2
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(4, $house->area_index)) checked @endif name="area_index[]" value="4">&nbsp;&nbsp;100m2-150m2
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(5, $house->area_index)) checked @endif name="area_index[]" value="5">&nbsp;&nbsp;150m2以上
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="">户型</label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(1, $house->house_index)) checked @endif name="house_index[]" value="1">&nbsp;&nbsp;一卧室
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(2, $house->house_index)) checked @endif name="house_index[]" value="2">&nbsp;&nbsp;一室一厅
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(3, $house->house_index)) checked @endif name="house_index[]" value="3">&nbsp;&nbsp;一室一厅+书房
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(4, $house->house_index)) checked @endif name="house_index[]" value="4">&nbsp;&nbsp;两室一厅
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(5, $house->house_index)) checked @endif name="house_index[]" value="5">&nbsp;&nbsp;两室一厅+书房
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if(!empty($house->house_index) && in_array(6, $house->house_index)) checked @endif name="house_index[]" value="6">&nbsp;&nbsp;一厅+书房
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(7, $house->house_index)) checked @endif name="house_index[]" value="7">&nbsp;&nbsp;四室一厅
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(8, $house->house_index)) checked @endif name="house_index[]" value="8">&nbsp;&nbsp;四室一厅+书房
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(9, $house->house_index)) checked @endif name="house_index[]" value="9">&nbsp;&nbsp;顶层复式楼
                            </label>
                        </div>
                    </div>
                </div>

                <div class="box box-default">
                    <div class="box-body">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default house-tab" name="tab1">交通</button>
                            <button type="button" class="btn btn-default house-tab" name="tab2">教育</button>
                            <button type="button" class="btn btn-default house-tab" name="tab3">医院</button>
                            <button type="button" class="btn btn-default house-tab" name="tab4">银行</button>
                            <button type="button" class="btn btn-default house-tab" name="tab5">休闲</button>
                            <button type="button" class="btn btn-default house-tab" name="tab6">美食</button>
                            <button type="button" class="btn btn-default house-tab" name="tab7">购物</button>
                            <button type="button" class="btn btn-default house-tab" name="tab8">健身</button>

                        </div>
                        <div>
                            <div class='tab tab1' name="tab1">
                                @if (!empty($house->map['traffic']))
                                @foreach($house->map['traffic'] as $item)
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[traffic][name][]" value="{{$item['name']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[traffic][desc][]" value="{{$item['desc']}}">
                                    </div>
                                </div> 
                                @endforeach
                                @else
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[traffic][name][]" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[traffic][desc][]" value="">
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class='tab tab2' style="display:none" name="tab2">
                            @if (!empty($house->map['edua']))
                                @foreach($house->map['edua'] as $item)
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[edua][name][]" value="{{$item['name']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[edua][desc][]" value="{{$item['desc']}}">
                                    </div>
                                </div> 
                                @endforeach
                                @else
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[edua][name][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[edua][desc][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                </div>
                                @endif

                            </div>
                            <div class='tab tab3' style="display:none" name="tab3">
                            @if (!empty($house->map['hospital']))
                                @foreach($house->map['hospital'] as $item)
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[hospital][name][]" value="{{$item['name']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[hospital][desc][]" value="{{$item['desc']}}">
                                    </div>
                                </div> 
                                @endforeach
                                @else
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[hospital][name][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[hospital][desc][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                </div>
                                @endif

                            </div>
                            <div class='tab tab4' style="display:none" name="tab4">
                            @if (!empty($house->map['bank']))
                                @foreach($house->map['bank'] as $item)
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[bank][name][]" value="{{$item['name']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[bank][desc][]" value="{{$item['desc']}}">
                                    </div>
                                </div> 
                                @endforeach
                                @else
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[bank][name][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[bank][desc][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class='tab tab5' style="display:none" name="tab5">
                            @if (!empty($house->map['casual']))
                                @foreach($house->map['casual'] as $item)
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[casual][name][]" value="{{$item['name']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[casual][desc][]" value="{{$item['desc']}}">
                                    </div>
                                </div> 
                                @endforeach
                                @else
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[casual][name][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[casual][desc][]" value="">
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class='tab tab6' style="display:none" name="tab6">

                            @if (!empty($house->map['food']))
                                @foreach($house->map['food'] as $item)
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[food][name][]" value="{{$item['name']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[food][desc][]" value="{{$item['desc']}}">
                                    </div>
                                </div> 
                                @endforeach
                                @else
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[food][name][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[food][desc][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class='tab tab7' style="display:none" name="tab7">
                            @if (!empty($house->map['shopping']))
                                @foreach($house->map['shopping'] as $item)
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[shopping][name][]" value="{{$item['name']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[shopping][desc][]" value="{{$item['desc']}}">
                                    </div>
                                </div> 
                                @endforeach
                                @else
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[shopping][name][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[shopping][desc][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class='tab tab8' style="display:none" name="tab8">
                            @if (!empty($house->map['fitness']))
                                @foreach($house->map['fitness'] as $item)
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[fitness][name][]" value="{{$item['name']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[fitness][desc][]" value="{{$item['desc']}}">
                                    </div>
                                </div> 
                                @endforeach
                                @else
                                <div>
                                    <div class="form-group">
                                        <label for="">地址</label>
                                        <input type="text" class="form-control" name="map[fitness][name][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">描述</label>
                                        <input type="text" class="form-control" name="map[fitness][desc][]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-3">
                                    <button class="btn" type="button" id="add_tab">+</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row" style="margin-top:20px">
                            <div class="col-xs-3">
                                <button class="btn" type="button" id="add_house_types">+</button>
                            </div>
                        </div> -->

                    </div>
                </div>
                <div class="box box-default">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <h3 class="box-title">相册</h3>
                    </div>
                    <!-- form start -->
                    <div class="box-body">

                        
                        @if (empty($house->effect_images))
                        <div class="form-group">
                            <label for="">上传效果图片</label>
                            <div>
                                <div>
                                    <img src="" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="effect_images[]" value="">
                                <button class="btn image_delete" type="button">x</button>

                            </div>
                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-3">
                                    <button class="btn add_image" type="button" class="add_image">+</button>
                                </div>
                            </div>
                        </div>
                        @else
                       
                        <div class="form-group">
                            <label for="">上传效果图片</label>
                            @foreach ($house->effect_images as $k => $image)
                            <div>
                                <div>
                                    <img src="{{$image}}" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="effect_images[]" value="{{$image}}">
                                <button class="btn image_delete" type="button">x</button>

                            </div>
                            @endforeach 

                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-3">
                                    <button class="btn add_image" type="button" class="add_image">+</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (empty($house->demo_images))
                        <div class="form-group">
                            <label for="">上传样板间图片</label>
                            <div>
                                <div>
                                    <img src="" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="demo_images[]" value="">
                                <button class="btn image_delete" type="button">x</button>

                            </div>
                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-3">
                                    <button class="btn add_image" type="button" class="add_image">+</button>
                                </div>
                            </div>
                        </div>
                        @else
                       
                        <div class="form-group">
                            <label for="">上传样板间图片</label>
                            @foreach ($house->demo_images as $k => $image)
                            <div>
                                <div>
                                    <img src="{{$image}}" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="demo_images[]" value="{{$image}}">
                                <button class="btn image_delete" type="button">x</button>

                            </div>
                            @endforeach 

                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-3">
                                    <button class="btn add_image" type="button" class="">+</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (empty($house->surrounding_images))
                        <div class="form-group">
                            <label for="">上传周边配套图片</label>
                            <div>
                                <div>
                                    <img src="" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="surrounding_images[]" value="">
                                <button class="btn image_delete" type="button">x</button>

                            </div>
                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-3">
                                    <button class="btn add_image" type="button" class="add_image">+</button>
                                </div>
                            </div>
                        </div>
                        @else
                       
                        <div class="form-group">
                            <label for="">上传周边配套图片</label>
                            @foreach ($house->surrounding_images as $k => $image)
                            <div>
                                <div>
                                    <img src="{{$image}}" height="50" alt="">
                                </div>
                                <input type="file" class="upload_file">

                                <input class="file_path" type="hidden" name="surrounding_images[]" value="{{$image}}">
                                <button class="btn image_delete" type="button">x</button>

                            </div>
                            @endforeach 

                            <div class="row" style="margin-top:20px">
                                <div class="col-xs-3">
                                    <button class="btn add_image" type="button" class="add_image">+</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div>
                    {!! csrf_field() !!}
                    <input type="hidden" class="form-control" name="id" value="{{$house->_id or ''}}">
                    <button type="button" class="btn btn-primary" id="submit">提交</button>
                </div>
            </form>
        </div>
    </div>


</section>
@endsection
@section('scripts')
<script charset="utf-8" src="{{asset('/bower_components/kindediter/kindeditor.js')}}"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- <script src='{{asset("imgLunbo/upload.js")}}' type="text/javascript"></script> -->
<script src="{{asset('static/js/cupload.js')}}"></script>
<script type="text/javascript" src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript">
    
    

    // toastr.success('保存成功!');
    $('#submit').click(function() {
        $.ajax({
            'type': 'POST',
            'url': "{{route('newHouse.save')}}",
            'data': $('form').serialize(),
            success: function(msg) {
                if (msg.status == 'success') {
                    toastr.success('保存成功!');
                    setTimeout(function() {
                        window.location.href = '{{route("newHouse")}}';
                    }, 2000);

                } else {
                    toastr.error('保存失败:' + msg.message);
                }
            }
        })
    })


    $("#add_house_types").click(function() {
        var houseTypesHtml = $(this).parent().parent().prev().html();
        $(this).parent().parent().before('<div class="row">' + houseTypesHtml + '</div>');
        console.log(houseTypesHtml);
    })

    $(".add_image").click(function() {
        console.log(33);
        var houseTypesHtml = $(this).parent().parent().prev().html();
        $(this).parent().parent().before('<div>' + houseTypesHtml + '</div> ');
        console.log(houseTypesHtml);
    })

    $(document).on('click', '.image_delete', function () {
        console.log($(this).parent().html())
        console.log(33);
        $(this).parent().remove(); 
    })

    // $(".image_delete").click(function() {
    //     console.log($(this).parent().html())
    //     console.log(33);
    //     $(this).parent().remove();
    // })

    var isEdit = '{{$house->_id or ""}}';
    $('#datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm",
            pickTime: true
        })
        $('#datepicker1').datepicker({
            autoclose: true,
            format: "yyyy-mm",
            pickTime: true
        })
    if (!isEdit) {
       
    } else {
        
        $('#datepicker').datepicker("setDate", '{{$house->finish_at or ""}}');
        $('#datepicker1').datepicker("setDate", '{{$house->start_at or ""}}');
    }

    $(document).on('change', '.upload_file', function() {
        var _this = $(this);
        console.log(this);
        var formData = new FormData();
        formData.append("file", this.files[0]);
        formData.append("_token", '{{csrf_token()}}');
        $.ajax({
            'type': 'POST',
            'url': '{{route("upload")}}',
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
            success: function(msg) {
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

    $(".house-tab").click(function() {
        var _this = $(this);
        $('.tab').hide();
        var name = _this.attr('name');
        $('.' + name).show();

    })

    $("#add_tab").click(function() {
        var tab = $(this).parent().parent().parent().find('.tab').filter(function() {
            return $(this).css('display') != 'none';
        })
        var node = tab.children(":first");
       
        tab.append(node.html());
    })

    $(document).ready(function(){
            //初始化editor
            initEditor('textarea[name=description]');

        });

        /**
         * 设置editor
         * @param el
         */
        function initEditor(el)
        {
            KindEditor.ready(function(K) {
                editor = K.create(el, {
                    cssPath : '{{asset("/bower_components/kindediter/plugins/code/prettify.css")}}',
                    uploadJson : '{{URL::route("kindediter.upload")}}?_token={{csrf_token()}}',
                    fileManagerJson : '{{asset("/bower_components/kindediter/php/file_manager_json.php")}}',
                    allowFileManager : true,
                    syncType: true,
                    afterCreate : function() {
                        var self = this;
                        K.ctrl(document, 13, function() {
                            self.sync();
                            K('form[name=example]')[0].submit();
                        });
                        K.ctrl(self.edit.doc, 13, function() {
                            self.sync();
                            K('form[name=example]')[0].submit();
                        });
                    },
                    afterBlur: function () { this.sync(); }
                });
            });
        }
</script>
@endsection