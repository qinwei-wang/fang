<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 1:32
 */


namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class UploadController extends Controller
{
    use ApiResponse;
    /**
     * 上传到本地
     */
    public function uploadToLocalStore(Request $request)
    {
        try {
            if ($request->file('file')->isValid()) {
                $file = $request->file('file');
                $file_name = uniqid() . '.' . $file->extension();
                $path = 'images/default/';
                request()->file('file')->move($path, $file_name);
                return $this->success(asset($path . $file_name));

            } else {
                throw new \Exception('文件上传失败');
            }
        } catch(\Exception $e) {
           \Log::error($e->getMessage());
           \Log::error($e->getTrace());
           $this->failed($e->getMessage());
        }

    }

      /**
     * kindeditor上传图片
     * @return mixed
     */
    public function postUpload(Request $request)
    {
        try {

            if ($request->file('imgFile')->isValid()) {

                $file = $request->file('imgFile');
                $file_name = uniqid() . '.' . $file->extension();
                $path = 'images/default/';
                request()->file('imgFile')->move($path, $file_name);
                return response()->json(array('error' => 0, 'url' => asset($path . $file_name)));

            } else {
                throw new \Exception('文件上传失败');
            }
        } catch(\Exception $e) {
           \Log::error($e->getMessage());
           \Log::error($e->getTrace());
           return response()->json(array('error' => 1, 'message' => "failed to upload!"));
        }
    }

    public function upload(Request $request)
    {
        var_dump($request->all());exit;
    }
}
