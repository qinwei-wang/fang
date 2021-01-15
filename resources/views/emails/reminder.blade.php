<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>来自侨水资本的客户反馈</title>
    <style type="text/css">
        body {background-color: white;font-family:Helvetica}
        .block {
            margin:20px;
        }
    </style>
</head>
<body>

@if (!empty($params['email']))
<div class="block">
    <label class="col-sm-2 control-label"><b>邮箱:</b></label>
    {{$params['email']}}
</div>
@endif
@if (!empty($params['name']))
<div class="block">
    <label class="col-sm-2 control-label"><b>称呼:</b></label>
    {{$params['name']}}
</div>
@endif
@if (!empty($params['phone']))
<div class="block">
    <label class="col-sm-2 control-label"><b>电话:</b></label>
    {{$params['phone']}}
</div>
@endif
@if (!empty($params['age']))
<div class="block">
    <label class="col-sm-2 control-label"><b>年龄:</b></label>
    {{$params['age']}}
</div>
@endif

@if (!empty($params['english_level']))
<div class="block">
    <label class="col-sm-2 control-label"><b>英语等级:</b></label>
    {{$params['english_level']}}
</div>
@endif

@if (!empty($params['education']))
<div class="block">
    <label class="col-sm-2 control-label"><b>最高学历:</b></label>
    {{$params['education']}}
</div>
@endif

@if (!empty($params['we_chat']))
<div class="block">
    <label class="col-sm-2 control-label"><b>微信:</b></label>
    {{$params['we_chat']}}
</div>
@endif

@if (!empty($params['text']))
<div class="block">
    <label class="col-sm-2 control-label"><b>留言内容:</b></label>
    {{$params['text']}}
</div>
@endif

<div class="block">
    <label class="col-sm-2 control-label"><b>时间:</b></label>
    {{ date("Y-m-d") }}
</div>
</body>
</html>









