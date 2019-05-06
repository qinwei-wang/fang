<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 1:32
 */


namespace App\Controllers\Common;

use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * 上传到本地
     */
    public function uploadToLocalStore($file_name, $save_path)
    {
        try {
            if (request()->file($file_name)->isValid()) {
                request()->file($file_name)->move($save_path);
            } else {
                throw new \Exception('文件上传失败');
            }
            return ['status' => 'success'];
        } catch(\Exception $e) {
           \Log::error($e->getMessage());
           \Log::error($e->getTrace());
           return ['status'=> 'fail', 'message' => $e->getMessage()];
        }


    }
}