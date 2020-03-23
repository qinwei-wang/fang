<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/11
 * Time: 11:58
 */


namespace App\Services\Api;
use App\Models\NewsModel;
use App\Models\NewsCategory;

class NewsService
{


    public function getNewsList($request)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('size', 10);
        $offset = ($page - 1) * $pageSize;
        $news = NewsCategory::with(['news' =>  function ($query) use ($offset, $pageSize) {
            $query->skip($offset)->take($pageSize)->orderBy('id', 'desc');
        }]);
        if ($request->category_id) {
            $news = $news->where('id', $request->category_id)->first();
            return $news->news;
        } else {
            $news = $news->get();
            return  $news;
        }
    }

    public function getNewsListByCategoryId($categoryId, $page = 0, $pageSize = 10)
    {

    }

    public function getNewsById($id)
    {
        $news = NewsModel::find($id);
        if ($news) {
            $news->read_count += 1;
            $news->save();
            $prevNews = NewsModel::select('id','title')->where('id','>', $news->id)->orderBy('id', 'desc')->first();
            $nextNews = NewsModel::select('id', 'title')->where('id','<', $news->id)->orderBy('id', 'desc')->first();
            return ['news' => $news, 'prev_news' => $prevNews, 'next_news' => $nextNews];
        }

        return [];
    }

    public function getRecommendNews($request)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('size', 10);
        $offset = ($page - 1) * $pageSize;
        $newList = NewsModel::select('id', 'title')->where('is_recommend', 1)->skip($offset)->take($pageSize)->orderBy('id', 'desc')->get();
        return $newList;
    }


}
