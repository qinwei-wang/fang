<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/11
 * Time: 11:58
 */


namespace App\Services\Api;
use App\Repositories\AdvantageRepository;

class AdvantageService
{
    protected $advantageRepository;

    public function __construct(AdvantageRepository $advantageRepository)
    {
        $this->advantageRepository = $advantageRepository;
    }

    public function getAdvantages($ids)
    {
        return $this->advantageRepository->makeModel()->whereIn('id', $ids)->get();
    }
}