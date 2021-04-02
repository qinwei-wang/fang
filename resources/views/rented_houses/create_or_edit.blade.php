@extends('templates.dashboard')
@section('content')
@section('css')
<link href='{{asset("imgLunbo/upload.css")}}' />
<link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection
<section class="content-header">
    <h1>
        新房
        <small></small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> 租房</a></li>
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
                            <label for="">租赁方式</label>
                            <input type="text" class="form-control" name="rent_type" value="{{$house->rent_type or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">房屋类型</label>
                            <input type="text" class="form-control" name="house_type" value="{{$house->house_type or ''}}">
                        </div>
                       
                        <div class="form-group">
                            <label for="">主图</label>
                            <div id="cupload-4"></div>

                        </div>
                        <div class="form-group">
                            <label for="">套图</label>
                            <div id="cupload-5"></div>
                        </div>
                        <div class="form-group">
                            <label for="">vr看房</label>
                            <input type="text" class="form-control" name="vr_link" value="{{$house->vr_link or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">价格</label>
                            <input type="text" class="form-control" name="price" value="{{$house->price or ''}}">
                        </div>

                        <div class="form-group">
                            <label for="">交通 (逗号隔开）</label>
                            <input type="text" class="form-control" name="traffic" value="{{$house->traffic or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">交通提示 ）</label>
                            <input type="text" class="form-control" name="traffic_tips" value="{{$house->traffic_tips or ''}}">
                        </div>
                        
                        <!-- <div class="form-group">
                            <label for="">地区位置</label>
                            <input type="text" class="form-control" name="location" value="{{$house->location or ''}}">
                        </div> -->
                        <div class="form-group">
                            <label for="">面积</label>
                            <input type="text" class="form-control" name="area" value="{{$house->area or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">楼层</label>
                            <input type="text" class="form-control" name="floor" value="{{$house->floor or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">车位</label>
                            <label class="radio-inline">
                                <input type="radio" name="has_parking"  value="1" @if (!empty($house) && $house->has_parking == 1) checked @endif> 有
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="has_parking"  value="0" @if (empty($house->has_parking)) checked @endif> 无
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="">用电</label>
                            <label class="radio-inline">
                                <input type="radio" name="electricity"  value="1" @if (!empty($house) && $house->electricity == 1) checked @endif> 民电
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="electricity"  value="0" @if (empty($house->electricity)) checked @endif> 商业用电
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">租期</label>
                            <input type="text" class="form-control" name="lease" value="{{$house->lease or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">入住</label>
                            <input type="text" class="form-control" name="live_time" value="{{$house->live_time or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">电梯</label>
                            <label class="radio-inline">
                                <input type="radio" name="has_elevator"  value="1" @if (!empty($house) && $house->has_elevator == 1) checked @endif> 有
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="has_elevator"  value="0" @if (empty($house->has_elevator)) checked @endif> 无
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">用水</label>
                            <label class="radio-inline">
                                <input type="radio" name="water"  value="1" @if (!empty($house) && $house->water == 1) checked @endif> 民水
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="water"  value="0" @if (empty($house->water)) checked @endif> 商业用水
                            </label>
                        </div>
                      

                        <div class="form-group">
                            <label for="">燃气</label>
                            <label class="radio-inline">
                                <input type="radio" name="has_gas"  value="1" @if (!empty($house) && $house->has_gas == 1) checked @endif> 有
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="has_gas"  value="0" @if (empty($house->has_gas)) checked @endif> 无
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">看房</label>
                            <input type="text" class="form-control" name="checking_house" value="{{$house->checking_house or ''}}">
                        </div>



                       

                        <div class="form-group">
                            <label for="">配套设施 </label>
                            @foreach ($tags as $tag)
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="{{$tag->id}}" name="facilities[]" @if (!empty($house) && in_array($tag->id, $house->facilities)) checked @endif> {{$tag->name}}
                            </label>
                            @endforeach
                          
                        </div>



                        <div class="form-group">
                            <label for="">房源介绍</label>
                            <textarea class="form-control" name="description" id="" rows="5">{{$house->description or ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">周边配套 (逗号隔开）</label>
                            <input type="text" class="form-control" name="surrounding_facilities" value="{{$house->surrounding_facilities or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">小区介绍 (逗号隔开）</label>
                            <input type="text" class="form-control" name="community" value="{{$house->community or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">付款方式</label>
                            <input type="text" class="form-control" name="pay_type" value="{{$house->pay_type or ''}}">
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
                    <div class='tab tab1' name="tab1">
                         <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="map[traffic][name]" value="{{isset($house->map['traffic']['name']) ?$house->map['traffic']['name']: ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">描述</label>
                            <input type="text" class="form-control" name="map[traffic][desc]" value="{{$house->map['traffic']['desc'] ?? ''}}">
                        </div> 
                    </div>
                    <div class='tab tab2' style="display:none" name="tab2">
                         <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="map[edua][name]" value="{{$house->map['edua']['name'] ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">描述</label>
                            <input type="text" class="form-control" name="map[edua][desc]" value="{{$house->map['edua']['desc'] ?? ''}}">
                        </div> 
                    </div>
                    <div class='tab tab3' style="display:none" name="tab3">
                         <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="map[hospital][name]" value="{{$house->map['hospital']['name'] ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">描述</label>
                            <input type="text" class="form-control" name="map[hospital][desc]" value="{{$house->map['hospital']['desc'] ?? ''}}">
                        </div> 
                    </div>
                    <div class='tab tab4' style="display:none" name="tab4">
                         <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="map[bank][name]" value="{{$house->map['bank']['name'] ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">描述</label>
                            <input type="text" class="form-control" name="map[bank][desc]" value="{{$house->map['bank']['desc'] ?? ''}}">
                        </div> 
                    </div>
                    <div class='tab tab5' style="display:none" name="tab5">
                         <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="map[casual][name]" value="{{$house->map['casual']['name'] ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">描述</label>
                            <input type="text" class="form-control" name="map[casual][desc]" value="{{$house->map['casual']['desc'] ?? ''}}">
                        </div> 
                    </div>
                    <div class='tab tab6' style="display:none" name="tab6">
                         <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="map[food][name]" value="{{$house->map['food']['name'] ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">描述</label>
                            <input type="text" class="form-control" name="map[food][desc]" value="{{$house->map['food']['desc'] ?? ''}}">
                        </div> 
                    </div>
                    <div class='tab tab7' style="display:none" name="tab7">
                         <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="map[shopping][name]" value="{{$house->map['shopping']['name'] ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">描述</label>
                            <input type="text" class="form-control" name="map[shopping][desc]" value="{{$house->map['shopping']['desc'] ?? ''}}">
                        </div> 
                    </div>
                    <div class='tab tab8' style="display:none" name="tab8">
                         <div class="form-group">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="map[fitness][name]" value="{{$house->map['fitness']['name'] ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">描述</label>
                            <input type="text" class="form-control" name="map[fitness][desc]" value="{{$house->map['fitness']['desc'] ?? ''}}">
                        </div> 
                    </div>
                    </div>
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
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->price_index) && in_array(0, $house->price_index)) checked @endif name="price_index[]" value="0">&nbsp;&nbsp;100万以下
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->price_index) && in_array(100,$house->price_index)) checked @endif name="price_index[]" value="100">&nbsp;&nbsp;100万-200万
                            </label>

                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->price_index) && in_array(200, $house->price_index)) checked @endif name="price_index[]" value="200">&nbsp;&nbsp;200万-500万
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->price_index) && in_array(500, $house->price_index)) checked @endif name="price_index[]" value="500">&nbsp;&nbsp;500万以上
                            </label>
                            <!-- <input type="text" class="form-control" name="title_tags" value="{{$house->title_tags or ''}}"> -->
                        </div>
                        <div class="form-group">
                            <label for="">面积</label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(0, $house->area_index)) checked @endif name="area_index[]" value="0">&nbsp;&nbsp;50m2以下
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(50, $house->area_index)) checked @endif name="area_index[]" value="50">&nbsp;&nbsp;50m2-70m2
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(70, $house->area_index)) checked @endif name="area_index[]" value="70">&nbsp;&nbsp;70m2-100m2
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(100, $house->area_index)) checked @endif name="area_index[]" value="100">&nbsp;&nbsp;100m2-150m2
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->area_index) && in_array(150, $house->area_index)) checked @endif name="area_index[]" value="150">&nbsp;&nbsp;150m2以上
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="">户型</label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(1, $house->house_index)) checked @endif name="house_index[]" value="1">&nbsp;&nbsp;studio
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(2, $house->house_index)) checked @endif name="house_index[]" value="2">&nbsp;&nbsp;一卧室
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(3, $house->house_index)) checked @endif name="house_index[]" value="3">&nbsp;&nbsp;2卧室
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(4, $house->house_index)) checked @endif name="house_index[]" value="4">&nbsp;&nbsp;3卧室
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(5, $house->house_index)) checked @endif name="house_index[]" value="5">&nbsp;&nbsp;4卧室
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(6, $house->house_index)) checked @endif name="house_index[]" value="6">&nbsp;&nbsp;5卧室
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(7, $house->house_index)) checked @endif name="house_index[]" value="7">&nbsp;&nbsp;独栋洋房
                            </label>
                            <label class="item_label">
                                <input type="checkbox" class="table-radio minimal" @if (!empty($house->house_index) && in_array(8, $house->house_index)) checked @endif name="house_index[]" value="8">&nbsp;&nbsp;半独立洋房
                            </label>
                        </div>
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
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- <script src='{{asset("imgLunbo/upload.js")}}' type="text/javascript"></script> -->
<script src="{{asset('static/js/cupload.js')}}"></script>
<script type="text/javascript">
    
    var images = '{{isset($house) ? json_encode($house->images) : ""}}'
    images = images.replace(new RegExp('&quot;', "gm"), '"')
    var cupload5 = new Cupload({
        ele: '#cupload-5',
        num: 20,
        name: "images",
        data: "{{!empty($house)}}" ? JSON.parse(images) : null, 
    });

    var cupload4 = new Cupload({
        ele: '#cupload-4',
        num: 1,
        name: "image",
        data: "{{!empty($house)}}" ? ["{{!empty($house->image) ? img_url($house->image) : ''}}"] : null,
    });
    // toastr.success('保存成功!');
    $('#submit').click(function() {
        $.ajax({
            'type': 'POST',
            'url': "{{route('rentedHouse.save')}}",
            'data': $('form').serialize(),
            success: function(msg) {
                if (msg.status == 'success') {
                    toastr.success('保存成功!');
                    setTimeout(function() {
                        window.location.href = '{{route("rentedHouse")}}';
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

    var isEdit = '{{$house->id or ""}}';
    if (!isEdit) {
        $('#datepicker').datepicker({
            autoclose: true
        })
        $('#datepicker1').datepicker({
            autoclose: true
        })
    } else {
        $('#datepicker').datepicker("setViewDate", new Date('{{$house->finish_at or ""}}'));
        $('#datepicker1').datepicker("setViewDate", new Date('{{$house->start_at or ""}}'));
    }

    $(".house-tab").click(function () {
            var _this = $(this);
            $('.tab').hide();
            var name = _this.attr('name');
            $('.' + name).show();

        })
</script>
@endsection