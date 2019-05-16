<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/16
 * Time: 1:19
 */


namespace App\Services;

use App\Repositories\TagRepository;

class TagService
{

    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }


    public function getList($params)
    {
        return $this->tagRepository->makeModel()->paginate(20);
    }


    public function save($params)
    {
        return $this->tagRepository->makeModel()->updateOrCreate(['id' => array_get($params, 'id', -1)], [
            'name' => $params['name'],
        ]);
    }


    public function getTagById($id)
    {
        return $this->tagRepository->makeModel()->where('id', $id)->first();
    }


    public function delete($id)
    {
        return $this->tagRepository->makeModel()->where('id', $id)->delete();
    }


    public function getAll()
    {
        return $this->tagRepository->makeModel()->get();
    }


}
