<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/11
 * Time: 1:38
 */


namespace App\Services;

use App\Repositories\ApplyConditionRepository;

class ApplyConditionService
{

    protected $applyConditionRepository;

    public function __construct(ApplyConditionRepository $applyConditionRepository)
    {
        $this->applyConditionRepository = $applyConditionRepository;
    }


    public function getList($params)
    {
        return $this->applyConditionRepository->makeModel()->paginate(20);
    }


    public function save($params)
    {
        return $this->applyConditionRepository->makeModel()->updateOrCreate(['id' => array_get($params, 'id', -1)], [
            'condition' => $params['condition'],
            'icon' => $params['icon'],
        ]);
    }


    public function getAdvantageById($id)
    {
        return $this->applyConditionRepository->makeModel()->where('id', $id)->first();
    }


    public function delete($id)
    {
        return $this->applyConditionRepository->makeModel()->where('id', $id)->delete();
    }


    public function getAll()
    {
        return $this->applyConditionRepository->makeModel()->get();

    }



}