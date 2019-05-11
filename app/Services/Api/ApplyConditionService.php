<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/11
 * Time: 12:00
 */


namespace App\Services\Api;
use App\Repositories\ApplyConditionRepository;

class ApplyConditionService
{
    protected $applyConditionRepository;

    public function __construct(ApplyConditionRepository $applyConditionRepository)
    {
        $this->applyConditionRepository = $applyConditionRepository;
    }

    public function getApplyConditions($ids)
    {
        return $this->applyConditionRepository->makeModel()->whereIn('id', $ids)->get();
    }
}