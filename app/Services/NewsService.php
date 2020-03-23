<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/16
 * Time: 1:19
 */


namespace App\Services;

use Illuminate\Http\Request;
use App\Models\NewsModel;

class NewsService
{

    public function save(Request $request)
    {
        NewsModel::updateOrCreate(['id' => $request->id], [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'is_recommend' => $request->is_recommend,
            'img' => $request->img,
            'content' => $request->content,
        ]);
    }

    public function getList(Request $request)
    {
        return NewsModel::orderBy('id', 'desc')->paginate(20);
    }

    public function getNewsById($id)
    {
        return NewsModel::find($id);
    }

    public function delete($id)
    {
        NewsModel::where('id', $id)->delete();
    }
}
