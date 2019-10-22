<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Help Center</title>
    <style type="text/css">
        body {background-color: white;font-family:Helvetica}
        .block {
            margin:20px;
        }
    </style>
</head>
<body>
<div class="block">
    <label class="col-sm-2 control-label"><b>email:</b></label>
    {{$params['email']}}
</div>
<div class="block">
    <label class="col-sm-2 control-label"><b>name:</b></label>
    {{$params['name']}}
</div>
<div class="block">
    <label class="col-sm-2 control-label"><b>phone:</b></label>
    {{$params['phone']}}
</div>
</body>
</html>









