<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/11
 * Time: 11:58
 */


namespace App\Services\Api;
use App\Repositories\TagRepository;

class TagService
{
    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getTags($ids)
    {
        return $this->tagRepository->makeModel()->whereIn('id', $ids)->pluck('name');
    }
}