<?php

namespace App\Http\Controllers\News;


use App\Http\Controllers\Controller;
use App\Services\NewsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    use ApiResponse;
    //
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index(Request $request)
    {
        $list = $this->newsService->getList($request);
        return view('news.index', ['list' => $list]);
    }

    public function store(Request $request)
    {
        $this->newsService->save($request);
        return $this->success();
    }

    public function create()
    {
        $categories = NewsCategory::all();
        return view('news.create_or_edit', ['categories' => $categories]);
    }

    public function edit(Request $request)
    {
        $categories = NewsCategory::all();
        $news = $this->newsService->getNewsById($request->id);
        return view('news.create_or_edit', ['news' => $news, 'categories' => $categories]);
    }

    public function delete(Request $request)
    {
        $this->newsService->delete($request->id);
        return $this->success();
    }

}
