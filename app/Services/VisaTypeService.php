<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/16
 * Time: 1:19
 */


namespace App\Services;

use App\Repositories\VisaTypeRepository;

class VisaTypeService
{

    protected $visaTypeRepository;

    public function __construct(VisaTypeRepository $visaTypeRepository)
    {
        $this->visaTypeRepository = $visaTypeRepository;
    }


    public function getList($params)
    {
        return $this->visaTypeRepository->makeModel()->paginate(20);
    }


    public function save($params)
    {
        return $this->visaTypeRepository->makeModel()->updateOrCreate(['id' => array_get($params, 'id', -1)], [
            'name' => $params['name'],
        ]);
    }


    public function getTagById($id)
    {
        return $this->visaTypeRepository->makeModel()->where('id', $id)->first();
    }


    public function delete($id)
    {
        return $this->visaTypeRepository->makeModel()->where('id', $id)->delete();
    }


    public function getAll()
    {
        return $this->visaTypeRepository->makeModel()->get();
    }


}
