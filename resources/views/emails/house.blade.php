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

@foreach ($params as $k => $item)
<div class="block">
    <label class="col-sm-2 control-label"><b>{{$k}}:</b></label>
    {{$item}}
</div>
@endforeach


<div class="block">
    <label class="col-sm-2 control-label"><b>时间:</b></label>
    {{ date("Y-m-d") }}
</div>
</body>
</html>









