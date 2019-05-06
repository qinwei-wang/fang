@extends('Framework::template.default')
@section('title')
    {{trans('common.system_name')}}
@endsection
@inject('categoryService', 'App\Modules\CategoryV2\Services\CategoryV2Service')
@section('css')
    <link href="{{asset('assets/css/event.min.css')}}" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
    <link href="{{asset('assets/css/jquery.mloading.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <style>
        .add-img {
            width: 100px;
        }
        .span-rgt span{
            padding-right: 6px;
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1 class="category-title">
            @if(isset($category))编辑 @else 新建 @endif
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('categoryv2.index', ['platform' => isset($category) ? $category->platform : request('platform')])}}"><i class="fa fa-sign-in">@if ($categoryService->categoryType() == 1)类目管理@else落地页管理@endif</i></a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="content">
                        <form name="form" method="post" id="category_form">
                            <div class="pro-info">
                                @if (isset($rel) && $rel != '/' || isset($category) && $category->rel != '/')
                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label"><span class="required">* &nbsp;</span>@if ($categoryService->categoryType() == 1)所属类目: @else所属落地页: @endif </label>
                                        <div class="col-sm-9 release-input">
                                            <input type="text" class="form-control" disabled  name="rel" value="{{$category->rel or $rel}}">
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group clearfix">
                                    <label class="col-sm-2 control-label"><span class="required">* &nbsp;</span>@if ($categoryService->categoryType() == 1)英语名称:@else落地页名称: @endif</label>
                                    <div class="col-sm-9 release-input">
                                        <input type="text"  class="form-control" name="name" value="{{$category->name or ''}}" required @if (isset($category->name)) readonly="readonly" @endif>
                                    </div>
                                </div>
                                @if ($categoryService->categoryType() == 1)
                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">@if ($categoryService->categoryType() == 1)阿拉伯语名称:@else落地页名称: @endif</label>
                                        <div class="col-sm-9 release-input">
                                            <input type="text" class="form-control" name="ar_name" value="{{$language_categroies['ar_name'] or ''}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">@if ($categoryService->categoryType() == 1)葡萄牙语名称:@else落地页名称: @endif</label>
                                        <div class="col-sm-9 release-input">
                                            <input type="text" class="form-control" name="pt_name" value="{{$language_categroies['pt_name'] or ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">@if ($categoryService->categoryType() == 1)西班牙语名称:@else落地页名称: @endif</label>
                                        <div class="col-sm-9 release-input">
                                            <input type="text" class="form-control" name="es_name" value="{{$language_categroies['es_name'] or ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">@if ($categoryService->categoryType() == 1)意大利语名称:@else落地页名称: @endif</label>
                                        <div class="col-sm-9 release-input">
                                            <input type="text" class="form-control" name="it_name" value="{{$language_categroies['it_name'] or ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">@if ($categoryService->categoryType() == 1)德语名称:@else落地页名称: @endif</label>
                                        <div class="col-sm-9 release-input">
                                            <input type="text" class="form-control" name="de_name" value="{{$language_categroies['de_name'] or ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">@if ($categoryService->categoryType() == 1)法语名称:@else落地页名称: @endif</label>
                                        <div class="col-sm-9 release-input">
                                            <input type="text" class="form-control" name="fr_name" value="{{$language_categroies['fr_name'] or ''}}" required>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group clearfix">
                                    <label class="col-sm-2 control-label"><span class="required">* &nbsp;</span>排序值: </label>
                                    <div class="col-sm-9 release-input">
                                        <input type="text" class="form-control" name="sort" value="{{$category->sort or ''}}" required>
                                    </div>
                                </div>
                                @if ($categoryService->categoryType() == 1 && ($category->platform == 'APP' or $platform == 'APP'))
                                    @if (isset($pid) && $pid == 0 || isset($category) && $category->pid == 0)
                                        <div class="form-group clearfix">
                                            <label class="col-sm-2 control-label"><span class="required">* &nbsp;</span>大图标: </label>
                                            <div class="col-sm-9 release-input">
                                                <input type="hidden" class="upload-input upload_large_icon"  name="app_img_json[large_icon]" value="{{$category->app_img_json['large_icon'] or ''}}">
                                                <ul class="addimg-ul">
                                                    @if(isset($category->app_img_json['large_icon']) && !empty($category->app_img_json['large_icon']))
                                                        <li class="exist_img">
                                                            <div class="add-img product_icon">
                                                                <img src="{{$category->app_img_json['large_icon']}}" alt="">
                                                                <i class="fa fa-trash-o product-delete-property" onclick="delPicture(this)" data-name="upload_large_icon"></i>
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <div class="add-img product_icon">
                                                                <input type="file" class="upload_img add-img-file" name="upload_large_icon"><i class="fa fa-image"></i>添加图片
                                                            </div>
                                                        </li>
                                                    @endif
                                                </ul>
                                                <p class="help-block">(支持JPG,PNG格式)</p>

                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">@if ((isset($pid) && $pid == 0) || (isset($category) && $category->pid == 0))<span class="required">* &nbsp;</span>@endif icon: </label>
                                        <div class="col-sm-9 release-input">
                                            <input type="hidden" class="upload-input upload_icon"  name="app_img_json[icon]" value="{{$category->app_img_json['icon'] or ''}}">
                                            <ul class="addimg-ul">
                                                @if(isset($category->app_img_json['icon']) && !empty($category->app_img_json['icon']))
                                                    <li class="exist_img">
                                                        <div class="add-img product_icon">
                                                            <img src="{{$category->app_img_json['icon']}}" alt="">
                                                            <i class="fa fa-trash-o product-delete-property" onclick="delPicture(this)" data-name="upload_icon"></i>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li>
                                                        <div class="add-img product_icon">
                                                            <input type="file" class="upload_img add-img-file" name="upload_icon"><i class="fa fa-image"></i>添加图片
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                            <p class="help-block">(支持JPG,PNG格式， 100*100像素)</p>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">分类颜色</label>
                                        <div class="col-sm-9 release-input">
                                            <input type="text" class="form-control" name="color" value="{{$category->color or ''}}" placeholder="输入颜色rgb码">
                                        </div>
                                    </div>
                                @endif

                                @if ($categoryService->categoryType() == 1)
                                    @if ((isset($category) && $category->platform == 'PC' &&  $category->pid == 0)
                                     || (isset($category) && $category->platform == 'APP' && $category->pid == 0)
                                     || (isset($category) && $category->platform == 'H5' && $category->pid == 0)
                                     || (!isset($category) && request('platform') == 'PC' &&  $pid == 0)
                                     || (!isset($category) && request('platform') == 'H5' &&  $pid == 0)
                                     || (!isset($category) && request('platform') == 'APP' && $pid == 0)
                                     )
                                        <div class="form-group clearfix">
                                            <label class="col-sm-2 control-label">
                                                @if ((isset($category) && $category->platform == 'PC') || $platform == 'PC')
                                                    PC 橱窗图片:
                                                @elseif ((isset($category) && $category->platform == 'H5') || $platform == 'H5') <span class="required">* &nbsp;</span> H5 icon：
                                                @elseif ((isset($category) && $category->platform == 'APP') || $platform == 'APP') 广告位图片:
                                                @endif
                                            </label>
                                            @if ((isset($category) && $category->platform == 'PC') || $platform == 'PC' || (isset($category) && $category->platform == 'APP') || $platform == 'APP')

                                                <div class="col-sm-9 release-input">
                                                    <table class="table table-hover darkborder-table table-sort dataTable">
                                                        <thead class="content-header">
                                                        <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                            @if ((isset($category->platform) && $category->platform == 'PC') || (isset($platform) && $platform == 'PC'))<th class='col-xs-3 text-center'>标题</th>@endif
                                                            <th class='col-xs-3 text-center'>图片icon</th>
                                                            <th class='col-xs-3 text-center'>选择图片</th>
                                                            <th class='col-xs-3 text-center'>跳转链接</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="content-body">
                                                        @if ((isset($category->platform) && $category->platform == 'PC') || (isset($platform) && $platform == 'PC'))
                                                            <tr>
                                                                <td class="web_banner">
                                                                    <input name="img1[title]" type="text" class='col-md-12' value="@if (isset($category->img[0]['img'])){{head($category->img)['title']}}@endif">
                                                                </td>
                                                                <td class="web_banner_name">
                                                                    <input id="" name="img1[img]" type="text"  class='col-md-12' value="@if (isset($category->img[0]['img'])){{head($category->img)['img']}}@endif">
                                                                </td>

                                                                <td class="web_banner_name">
                                                                    <input name="img_url1" type="file" class="file_upload col-md-12" data-origin_value="1" value="" accept="image/jpg,image/png,image/jpeg">
                                                                    <span style="display: none">正在上传...</span>

                                                                </td>
                                                                <td class="web_banner_name">
                                                                    <input id="" name="img1[link]" type="text"  class='col-md-12' value="@if (isset($category->img[0]['img'])){{head($category->img)['link']}}@endif">
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td class="web_banner_name">
                                                                    <input id="" name="app_img_json[advert][img]" type="text"  class='col-md-12' value="@if (isset($category->app_img_json['advert']['img'])){{$category->app_img_json['advert']['img']}}@endif">
                                                                </td>

                                                                <td class="web_banner_name">
                                                                    <input name="img_url1" type="file" class="file_upload col-md-12" data-origin_value="1" value="" accept="image/jpg,image/png,image/jpeg">
                                                                    <span style="display: none">正在上传...</span>

                                                                </td>
                                                                <td class="web_banner_name">
                                                                    <input id="" name="app_img_json[advert][link]" type="text"  class='col-md-12' value="@if (isset($category->app_img_json['advert']['link'])){{$category->app_img_json['advert']['link']}}@endif">
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if ($category->platform == 'PC' || $platform == 'PC')
                                                            <tr>

                                                                <td class="web_banner">
                                                                    <input name="img2[title]"
                                                                           type="text"
                                                                           class='col-md-12' value="@if (isset($category->img[1]['title'])){{$category->img[1]['title']}}@endif">
                                                                </td>
                                                                <td class="web_banner_name">
                                                                    <input id="" name="img2[img]" type="text"  class='col-md-12' value="@if (isset($category->img[1]['img'])){{$category->img[1]['img']}}@endif">
                                                                </td>
                                                                <td class="web_banner_name">
                                                                    <input name="img_url2" type="file" class="file_upload col-md-12" data-origin_value="">
                                                                    <span style="display: none">正在上传...</span>
                                                                </td>
                                                                <td class="web_banner_name">
                                                                    <input id="" name="img2[link]" type="text"  class='col-md-12' value="@if (isset($category->img[1]['link'])){{$category->img[1]['link']}}@endif">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="web_banner">
                                                                    <input name="img3[title]"
                                                                           type="text"
                                                                           class='col-md-12' value="@if (isset($category->img[2]['title'])){{$category->img[2]['title']}}@endif">
                                                                </td>
                                                                <td class="web_banner_name">
                                                                    <input id="" name="img3[img]" type="text"  class='col-md-12' value="@if (isset($category->img[2]['img'])){{$category->img[2]['img']}}@endif">
                                                                </td>

                                                                <td class="web_banner_name">
                                                                    <input name="img_url3" type="file" class="file_upload col-md-12" data-origin_value="">
                                                                    <span style="display: none">正在上传...</span>
                                                                </td>
                                                                <td class="web_banner_name">
                                                                    <input id="" name="img3[link]" type="text"  class='col-md-12' value="@if (isset($category->img[2]['link'])){{$category->img[2]['link']}}@endif">
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                    @if ((isset($category) && $category->platform == 'PC') || $platform == 'PC')
                                                        <p class="help-block">(支持JPG,PNG格式， 200*300像素)</p>
                                                    @elseif ((isset($category) && $category->platform == 'H5') || $platform == 'H5')
                                                        <p class="help-block">(支持JPG,PNG格式， 120*120像素)</p>
                                                    @elseif ((isset($category) && $category->platform == 'APP') || $platform == 'APP')
                                                        <p class="help-block">(支持JPG,PNG格式， 100*100像素)</p>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="col-sm-9 release-input">
                                                    <input type="hidden" class="upload-input img_file1" id="img" name="img1[img]" value="{{$category->img[0]['img'] or ''}}">
                                                    <input type="hidden"  name="img1[title]" value="">
                                                    <input type="hidden"   name="img1[link]" value="">
                                                    <ul class="addimg-ul">

                                                        @if(isset($category->img[0]))
                                                            <li class="exist_img">
                                                                <div class="add-img product_icon">
                                                                    <img src="{{$category->img[0]['img']}}" alt="">
                                                                    <i class="fa fa-trash-o product-delete-property" onclick="delPicture(this)" data-name="img_file1"></i>
                                                                </div>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <div class="add-img product_icon">
                                                                    <input type="file" class="upload_img add-img-file" name="img_file1"><i class="fa fa-image"></i>添加图片
                                                                </div>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                    @if ((isset($category) && $category->platform == 'PC') || $platform == 'PC')
                                                        <p class="help-block">(支持JPG,PNG格式， 200*300像素)</p>
                                                    @elseif ((isset($category) && $category->platform == 'H5') || $platform == 'H5')
                                                        <p class="help-block">(支持JPG,PNG格式， 120*120像素)</p>
                                                    @elseif ((isset($category) && $category->platform == 'APP') || $platform == 'APP')
                                                        <p class="help-block">(支持JPG,PNG格式， 100*100像素)</p>
                                                    @endif


                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">字体效果: </label>
                                        <div class="col-sm-9 release-input">
                                            <label class="item_label">
                                                <input type="radio" class="table-radio minimal"  @if (!in_array(CategoryDisplayType::REDFONT, $category->display_type))checked @endif  name="red_font" value="0">&nbsp;&nbsp;空
                                            </label>
                                            <label class="item_label">
                                                <input type="radio" class="table-radio minimal"  @if (in_array(CategoryDisplayType::REDFONT, $category->display_type))checked @endif  name="red_font" value="1">&nbsp;&nbsp;红色字体
                                            </label>
                                        </div>
                                    </div>
                                    @if ((isset($category) && $category->platform == 'PC') || $platform == 'PC')
                                        <div class="form-group clearfix">
                                            <label class="col-sm-2 control-label">标签效果: </label>
                                            <div class="col-sm-9 release-input">
                                                <label class="item_label">
                                                    <input type="radio" class="table-radio minimal"   @if (!in_array(CategoryDisplayType::NEWTAG, $category->display_type) && !in_array(CategoryDisplayType::HOTTAG, $category->display_type)) checked @endif name="label_type" value="0">&nbsp;&nbsp;空
                                                </label>
                                                <label class="item_label">
                                                    <input type="radio" class="table-radio minimal"   @if (in_array(CategoryDisplayType::NEWTAG, $category->display_type)) checked @endif name="label_type" value="3">&nbsp;&nbsp;NEW标签
                                                </label>
                                                <label class="item_label">
                                                    <input type="radio" class="table-radio minimal"   @if (in_array(CategoryDisplayType::HOTTAG, $category->display_type)) checked @endif name="label_type" value="2">&nbsp;&nbsp;HOT标签
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                <div class="form-group clearfix">
                                    <label class="col-sm-2 control-label"><span class="required">* &nbsp;</span>默认排序方式: </label>
                                    <div class="col-sm-9 release-input">
                                        <select name="order_rule" id="" class="form-control">
                                            @if ($categoryService->categoryType() == 1)<option value="{{CategoryOrderRule::RECOMMEND}}" @if ($category->order_rule == CategoryOrderRule::RECOMMEND)selected @endif>推荐算法</option>@endif
                                            <option value="{{CategoryOrderRule::SALEHIGHTOLOW}}" @if ($category->order_rule == CategoryOrderRule::SALEHIGHTOLOW)selected @endif>按销量从高到低</option>
                                            <option value="{{CategoryOrderRule::ONSALETIME}}" @if ($category->order_rule == CategoryOrderRule::ONSALETIME)selected @endif>按上架时间</option>
                                            <option value="{{CategoryOrderRule::PRICEHIGHTOLOW}}" @if ($category->order_rule == CategoryOrderRule::PRICEHIGHTOLOW)selected @endif>按价格从高到低</option>
                                            <option value="{{CategoryOrderRule::PRICELOWTOHIGH}}" @if ($category->order_rule == CategoryOrderRule::PRICELOWTOHIGH)selected @endif>按价格从低到高</option>
                                        </select>
                                    </div>
                                </div>
                                @if (isset($category) && $category->pid==0)
                                    <div class="form-group clearfix">
                                        <label class="col-sm-2 control-label">已关联商品池:
                                        </label>
                                        <div class="col-sm-9 release-input">
                                            <input type="text" class="form-control" name="pool_id" disabled
                                                   value="{{$category->pool_id or ''}}">
                                        </div>
                                    </div>
                                @endif
                                <div class="pro-info" style="margin-bottom:100px;text-align: center">
                                    <div class="release-btn">
                                        <input type="hidden" name="platform" value="{{$category->platform or $platform}}">
                                        <input type="hidden" name="pid" value="{{$category->pid or $pid}}">
                                        <input type="hidden" name="id" value="{{$category->id}}">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-primary btn-lg" id="submit">@if(!isset($category)) 创建 @else
                                                更新 @endif</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @if (isset($category))
        {{--@if ($category->pid == 0)--}}
        {{--@include('categoryv2::root_category_products')--}}
        {{--@elseif ($category->pool->type == 1)--}}
        {{--@include('categoryv2::static_pool_products')--}}
        {{--@elseif ($category->pool->type== 2)--}}
        {{--@include('categoryv2::active_pool_products')--}}
        {{--@endif--}}


        <section class="content-header">
            <h1 class="category-title">
                商品列表
            </h1>
        </section>
        <section class="content">
            @if ($category->pool->type == 2 && $category->pid != 0)
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                @inject('PoolRuleManager','\App\Modules\Product\Repositories\Pool\PoolRuleManager')
                                <div class="col-xs-11">
                                    <div class="pull-left">
                                        <h5><b>筛选条件</b></h5>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-sm btn-primary" onclick="openAddRule('{{route('product.pool.pickProducts',['pid'=>$pool->pid,'id'=>$category->pool_id,'categoryId'=>$category->id])}}')">增加条件</button>
                                    </div>
                                    <div class="col-lg-offset-1">
                                        @foreach($rules as $k=>$rule)
                                            <?php
                                            if(count($rule)>0){
                                                $childRule = $rule[0]->child->get();
                                            }else{
                                                $childRule = [];
                                            }
                                            $childRuleG=$PoolRuleManager::toGroupArr($childRule);
                                            $r = [];
                                            foreach($childRuleG as $g){
                                                $r[] =array_pluck($g,'id');
                                            }
                                            ?>
                                            <div class="J_group" style="margin: 50px 0"
                                                 data-query = '{{$PoolRuleManager::rulesToInput($rule)}}&group_id={{current($rule)->group_id}}&pool_id={{current($rule)->pool_id}}&child_id={{json_encode($r)}}'>
                                                <div class="pull-right" style="margin-left:25px">
                                                    <button class="btn btn-sm btn-primary" onclick="openEditRule();">编辑</button>
                                                </div>
                                                <div class="pull-right">
                                                    <form style="display: inline;" action="{{route('product.pool.removeRule',['poolId'=>$pool->id,'groupId'=>current($rule)->group_id])}}"
                                                          method="post" onsubmit="return confirm('该条件搜索结果下的商品也会从商品池删除，确定删除此条件吗？')">
                                                        {!! method_field('delete') !!}
                                                        {!! csrf_field() !!}
                                                        <button class="btn btn-sm btn-default">删除</button>
                                                    </form>
                                                </div>
                                                条件{{$k+1}}:
                                                @foreach($rule as $item)
                                                    <span style="padding: 0 8px;">{{$PoolRuleManager::rule($item)->getViewText()}};</span>
                                                @endforeach
                                                <P></P>
                                                @if(count($childRule)>0)
                                                    <div style="text-indent: 3.5em">
                                                        <span>不包含：</span>
                                                        <P></P>
                                                        @foreach($PoolRuleManager::toGroupArr($childRule) as $k=>$items)
                                                            <p>条件{{$k+1}}:
                                                                @foreach($items as $item)
                                                                    <span style="padding: 0 8px;">{{$PoolRuleManager::rule($item)->getViewText()}};</span>
                                                        @endforeach
                                                        <p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div style="position: absolute;right:0;top:40%">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <form class="search-form">
                                <div class="row">
                                    <div class="col-md-2 margin">
                                        <input type="text" class="form-control" name="product_id" value="{{request()->input('product_id', '')}}" placeholder="商品id">
                                    </div>
                                    <div class="col-md-2 margin">
                                        <input type="text" class="form-control" name="product_code" value="{{request()->input('product_code', '')}}" placeholder="商品编码">
                                    </div>
                                    <div class="col-md-2 margin">
                                        <input type="text" class="form-control" name="name" value="{{request()->input('name', '')}}" placeholder="商品名称">
                                    </div>
                                    <div class="col-md-2 margin">
                                        <select name="supplier" id="" class="form-control">
                                            <option value="">供应商</option>
                                            @foreach ($suppliers as $supplier)
                                                <option @if($supplier->id == request('supplier',-1)) selected @endif value="{{$supplier->id}}">{{$supplier->username}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-1 margin" >
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search" id="search"></i> 查询 </button>
                                    </div>
                                    <div class="col-md-1 margin" v-if="is_show_reset_search">
                                        <button type="button" class="btn btn-danger btn-block" onclick="javascript:window.location.href='{{($categoryService->categoryType() == 1) ? URL::route("categoryv2.show", ['id' => $category->id]) : URL::route("sale_category.show", ['id' => $category->id])}}'"><i class="fa fa-refresh"></i> 重置 </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-sm-2 margin">
                                    <div style="margin-left:20px;"> 商品数量：(
                                        @if($category->pool)
                                            @if ($category->pool->type == 1)
                                                {{$category->pool->staticProducts()->count()}}
                                            @else
                                                {{$category->pool->dynamicProducts()->count()}}
                                            @endif
                                        @else
                                            0
                                        @endif
                                        件）</div>
                                </div>
                                @if ($category->pid!=0&&$category->pool->type == PoolType::STATIC_TYPE)
                                    <div class="col-sm-1 margin" style="float:right">
                                        <button class="btn btn-primary btn-block" id="pick_products">
                                            选品
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-13">
                                        <table class="table table-hover darkborder-table table-sort dataTable">
                                            <tbody>
                                            <tr role="row" style="background-color: #f9f9f9;border-bottom:2px solid #DDDDDD;">
                                                <th>商品id</th>
                                                <th>商品名称</th>
                                                <th>后端分类</th>
                                                <th>供应商</th>
                                                <th>操作</th>
                                            </tr>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <th>
                                                        {{$product->id}}
                                                    </th>
                                                    <th><div><img src="{{$product->icon}}/350x350" alt="" width="100"></div> <div>{{$product->product_name}}</div></th>
                                                    <th>
                                                        {{implode('/', collect(json_decode($product->categoryMap->category->category_tree, true))->pluck('name')->toArray())}}
                                                    </th>
                                                    <th>
                                                        {{$product->supplier->username}}
                                                    </th>
                                                    <th>
                                                        <a class="btn btn-primary" target="_blank" href="{{route('product.detail',$product->id)}}">商品详情</a>
                                                        @if ($category->pid != 0 && $category->pool->type == 1)<button class="btn btn-primary remove" data-product-id="{{$product->id}}">移除</button>@endif
                                                    </th>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        @if ($products){{$products->appends(Request::all())->links()}} @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <!-- Default box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">历史记录</h3>
                </div>
                <input type="hidden" name="page" value="{{(int)$page ?: 1}}" class="page"/>
                <div class="box-body">
                    <table  class="table table-hover darkborder-table">
                        <thead>
                        <tr role="row">
                            <td>操作人</td>
                            <td style="max-width: 200px;">消息</td>
                            <td>时间</td>
                            <td style="max-width: 200px">IP</td>
                        </tr>
                        </thead>
                        <tbody class="data-content">

                        </tbody>
                        <tfoot class="data-page">

                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </section>
    @endif
@endsection
@section('scripts')
    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset ("/assets/js/jquery.form.js") }}"></script>
    <script type="text/javascript">
        var open_ids  = '{{request('open_ids')}}';
        $("#submit").click(function () {
            console.log(3);
            var data = $('#category_form').serialize();
            $.ajax({
                'url': "save",
                'type': 'POST',
                'data': data,
                'dataType': 'json',
                success: function (data)
                {
                    if (data['status'] == 200) {
                        toastr.success('提交成功');

                        window.location.href="<?php echo ($categoryService->categoryType() == 1)? route('categoryv2.index', ['platform' => request('platform')]) : route('sale_category.index', ['platform' => request('platform')])?>" + '&open_ids=' + open_ids;
                    } else {
                        toastr.warning(data.msg);
                    }
                },
                error: function (xhr)
                {
                    toastr.warning(xhr.responseText);
                }
            });
            return false;

        })

        //上传图片
        $('.addimg-ul').delegate('.upload_img', 'change', function(){
            var _this = $(this);
            var name = _this.attr('name');
            var addimg = $(this).parent().parent().parent(".addimg-ul");
            var upload_input = $(this).parents('.addimg-ul').parent('.release-input').children(":first");
            var upload_input_id_name = upload_input.attr('id');
            //生成的图片div包裹节点
            var addimgHtml = '';
            var img_name = _this.attr("name");
            var url = '/event/upload';
            _this.wrap("<form id="+img_name+" action="+url+" method='post' enctype='multipart/form-data'></form>");
            $("#"+img_name).ajaxSubmit({
                dataType:  'json',
                data: {
                    "_token": "{{Session::token()}}",
                    "img_name": img_name
                },
                beforeSend: function() {
                    _this.parent().append('<i class="fa fa-image"></i>正在上传...')
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    console.log('进度'+percentComplete);
                },
                success: function(data) {console.log(data);
                    if (data.status == true) {
                        toastr.success('图片上传成功');
//                        addimg.find('li:last').remove();
                        //生成商品主图
                        addimgHtml += generateProductMainPicture(data.img_url,upload_input_id_name);
                        _this.parent().parent().parent().html(addimgHtml);
//                        addimg.append(addimgHtml);
                        upload_input.val(data.img_url);
                        //$("#event_banner").val(data.img_url);
//
                        addimgHtml = '';
                    } else {
                        toastr.warning(data.errMsg, "图片上传失败");
                    }
                },
                error:function(xhr){
                    toastr.warning(xhr.responseText, "图片上传失败");
                }
            });
        });
        //
        function delPicture(_this){
            var file_name = $(_this).attr('data-name');
            $('.' + file_name).val('');
            html = '<input type="file" class="upload_img add-img-file" name='+ file_name + '><i class="fa fa-image"></i>添加图片';


            $(_this).parent('.product_icon').html(html);
            //$('div[class="add-img product_icon"]').html(html);
        }
        //上传图片成功后显示图片
        var generateProductMainPicture = function(img_url,id_name){
            var content_html = '';
            switch (id_name){
                case 'event_banner1':
                case 'event_banner2':
                case 'event_poster_img':
                case 'event_wap_poster_img':
                    content_html = '<li class="exist_img">'
                        + '<div class="add-img product_icon">'
                        + '<img src="'+ img_url +'" alt=""><i class="fa fa-trash-o product-delete-property" onclick="delPicture(this)"></i>'
                        + '</div>'
                        + '</li>';

                    break;
                case 'event_banner_icon':
                case 'event_product_icon':
                    content_html = '<li class="exist_img">'
                        + '<div class="add-img-icon product_icon">'
                        + '<img src="'+ img_url +'" style="width: 120px;height: 28px;" alt=""><i class="fa fa-trash-o product-delete-property"  style="position: absolute;top: 1px;right: 2px;" onclick="delPicture(this)"></i>'
                        + '</div>'
                        + '</li>';

                default:
                    content_html = '<div class="add-img product_icon">'
                        + '<img src="'+ img_url +'" alt=""><i class="fa fa-trash-o product-delete-property" onclick="delPicture(this)"></i>'
                        + '</div>';
            }
            return content_html;
        }
        //
        //移除商品
        $(".remove").click(function () {
            var product_id = $(this).attr('data-product-id');
            var pool_id = "{{$pool->id}}";
            layer.confirm('确定从此类目中移除该商品吗？', {
                btn: ['删除','取消'] //按钮
            }, function(){
                $.ajax({
                    'url': "{{route('categoryv2.delete_product')}}",
                    'type': 'DELETE',
                    'data': {"product_id": product_id, "pool_id": pool_id, '_token' : "{{Session::token()}}"},
                    success: function (data)
                    {
                        if (data['status'] == 200) {
                            toastr.success('提交成功');
                            window.location.reload();
                        } else {
                            toastr.warning(data['msg']);
                        }
                    },
                    error: function (xhr)
                    {
                        toastr.warning(xhr.responseText);
                    }
                });
            }, function(){

            });
        })

        //选品
        $("#pick_products").click(function () {
            openAddRule("{{route('product.pool.pickProducts',['pid'=>$pool->pid,'id'=>$category->pool_id,'categoryId'=>$category->id])}}");
            return false;
        });

        var openAddRule = function (content, extP,title) {
            if(!title)title='增加条件';
            var p = {
                type: 2,
                area: ['90%', '90%'],
                fix: false, //不固定
                maxmin: false,
                shade: 0.4,
                title: title,
                content: content
            };
            p.content += '?inLayerOpen=1';
            if(extP)p.content += '&'+extP;
            layer.open(p);
            var reloadMessage = function(event)
            {
                if(event.data == 'reload'){
                    window.location.reload();
                }
            };
            window.addEventListener("message", reloadMessage, false);
        }





        function openEditRule() {
            var query = $(event.target).parents('div.J_group').attr('data-query');
            openAddRule("{{route('product.pool.pickProducts',['pid'=>$pool->pid,'id'=>$category->pool_id,'categoryId'=>$category->id])}}", query, '编辑条件');
        }


        //图片上传
        $('.file_upload').on('change', function (){
            let _this = $(this);
            let img_name = _this.attr("name");
            let url = '/event/upload';
            if(_this.parent('form').length<=0){
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
//                        _this.parent().parent().parent().children(":first").val(data.img_url);
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


        $(function() {
            var id = '{{$category->id}}';
            var pid = '{{$category->pool_id}}'
            // 页面ajax加载日志
            function ajaxGetLogs(id) {
                var page = $('.page').val();
                $.ajax({
                    url: '{{URL::route('categoryv2.logs',$category->id,$category->pool_id)}}',
                    type: 'post',
                    data: {id: id, 'pool_id':pid,page: page},
                    beforeSend: function () {
                    },
                    success: function (data) {
                        // 内容
                        var html = '';
                        $.each(data['logs'], function (i) {
                            html += '<tr><td>' + data['logs'][i].user_name + '</td><td style="text-align: left" class="span-rgt">' + data['logs'][i].message + '</td>' +
                                '<td>' + data['logs'][i].created_at + '</td><td>' + data['logs'][i].ip + '</td></tr>';
                        });
                        $('.data-content').html(html);
                        // 分页
                        var pagination = '<ul class="pagination">';
                        for (var k = 1; k < data['pages'] + 1; k++) {
                            if (page == k) {
                                pagination += '<li name="li_page_' + k + '" class="active"><a href="javascript:;">' + k + '</a></li>';
                            } else {
                                pagination += '<li name="li_page_' + k + '"><a href="javascript:;">' + k + '</a></li>';
                            }
                        }
                        pagination += '</li></ul>';
                        $('.data-page').html(pagination);
                    },
                    complete: function () {
                    }
                });
            }
            // 触发
            ajaxGetLogs(id);
            // 翻页触发
            $(document).on('click', '.pagination li', function () {
                var page = $(this).find('a').text();
                $('.page').val(page);
                ajaxGetLogs(id);
            });
        });
    </script>
@endsection