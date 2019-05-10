<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/10
 * Time: 13:53
 */


namespace App\Services;

use App\Repositories\AdvantageRepository;

class AdvantageService
{

    protected $advantageRepository;

    public function __construct(AdvantageRepository $advantageRepository)
    {
        $this->advantageRepository = $advantageRepository;
    }


    public function getList($params)
    {
        return $this->advantageRepository->makeModel()->paginate(20);
    }


    public function save($params)
    {
        return $this->advantageRepository->makeModel()->updateOrCreate(['id' => array_get($params, 'id', -1)], [
            'title' => $params['title'],
            'img' => $params['img'],
            'description' => $params['description']
        ]);
    }


    public function getAdvantageById($id)
    {
        return $this->advantageRepository->makeModel()->where('id', $id)->first();
    }


    public function delete($id)
    {
        return $this->advantageRepository->makeModel()->where('id', $id)->delete();
    }



}