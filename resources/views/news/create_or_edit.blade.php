@extends('templates.dashboard')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_filter {
            text-align: right;
        }
    </style>

    <section class="content-header">
        <h1>
            新闻
            <small></small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{route('news')}}"><i class="fa fa-dashboard"></i>新闻</a></li>
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
                    <div class="box-content">
                        <form role="form">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">分类</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" @if (!empty($news) && $news->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">标题</label>
                                    <input type="text" name="title" value="{{$news->title or ''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">是否推荐</label>
                                    <label class="item_label">
                                        <input type="radio" class="table-radio minimal"  @if (empty($news->is_recommend)) checked @endif  name="is_recommend" value="0">&nbsp;&nbsp;否
                                    </label>
                                    <label class="item_label">
                                        <input type="radio" class="table-radio minimal"  @if (!empty($news->is_recommend))checked @endif  name="is_recommend" value="1">&nbsp;&nbsp;是
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片</label>
                                    <div>
                                        <img src="{{!empty($news->img) ? img_url($news->img) : ''}}" height="200" alt="">
                                    </div>
                                    <input type="file" id="upload_file">

                                    <input class="file_path" type="hidden" name="img" value="{{$news->img or ''}}">

                                </div>

                                <div class="form-group clearfix convention">
                                    <label>编辑新闻</label><br/>

                                    <div data-name="content" class="cont">
                                        <textarea name="content" class="form-control" style="min-height:500px;">
                                            {{!empty($news->content) ? htmlspecialchars($news->content) : ''}}
                                        </textarea>
                                    </div>
                                </div>



                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{$news->id or 0}}">
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
    <script charset="utf-8" src="{{asset('/bower_components/kindediter/kindeditor.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            //初始化editor
            initEditor('textarea[name=content]');

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

        $('#submit').click(function () {
            $.ajax({
                'type':'POST',
                'url': '{{route('news.store')}}',
                'data': $('form').serialize(),
                success: function (msg)
                {
                    if (msg.status == 'success') {
                        toastr.success('保存成功!');
                        setTimeout(function () {
                            window.location.href = '{{route('news')}}';
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
            formData.append("file", document.getElementById("upload_file").files[0]);
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
