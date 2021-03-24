<?php

namespace App\Services;

use App\Models\Mongo\BusinessHouseModel;
use Carbon\Carbon;

class BusinessHouseService
{
    public function save($params)
    {
        $id = array_get($params, 'id');
       
        $data = $params;

        //图片
        $image = array_get($params, 'image');
        $image = $this->handleBase64Images($image)[0];
        $images = array_get($params, 'images');
        $images = $this->handleBase64Images($images);
        $data['image'] = $image;
        $data['images'] = $images;
        unset($data['token']);

        if ($id) {
            $house = BusinessHouseModel::find($id);
            $house->fill($data);
            $house->save();
        } else {
            BusinessHouseModel::create($data); 
        }
    }

    protected function handleBase64Images($base64Images)
    {
        if (empty($base64Images)) {
            return null;
        }

        $result = [];

        foreach ($base64Images as $k => $item) {
            if (strlen($item) > 100) {
                $imgType = array_last(explode('/', array_first(explode(';', array_first(explode(',', $item))))));
                $img = base64_decode(array_last(explode(',', $item)));
                $imgName = time() . mt_rand(100000, 999999) . $k;
                $imgPath = 'images/default/'.$imgName . '.' . $imgType;
                file_put_contents($imgPath, $img);
                $result[] = $imgPath;
            } else {
                $result[] = $item;
            }
           
        }

        return $result;
    }

    public function getList($params)
    {
        return BusinessHouseModel::orderBy('created_at', 'desc')->where('type', $params['type'])->paginate(20);
    }

    public function getItem($id)
    {
        $house = BusinessHouseModel::find($id);
        $house->images && $house->images = array_map(function ($v) {
            return img_url($v);
        }, $house->images);  

        return $house;
    }

    public function deleteItem($id)
    {
        $house = BusinessHouseModel::find($id);
        $house->delete();
    }

    public function getApiList($params)
    {
        $page = array_get($params, 'page');
        $size = (int) array_get($params, 'size', 10);
        $offset = ($page - 1) * $size;
        $data = BusinessHouseModel::select('title',  'image', 'description')->where('type', '4')->OrderBy('created_at', 'desc')->skip($offset)->take($size)->get();
        foreach ($data as $item) {
          
            $item->image = img_url($item->image);
        }

        $total = BusinessHouseModel::where('type', '4')->count();

        return ['business_houses' => $data, 'total' => $total];
    }

    public function getApiOfficeList($params)
    {
        $page = array_get($params, 'page');
        $size = (int) array_get($params, 'size', 10);
        $offset = ($page - 1) * $size;
        $data = BusinessHouseModel::select('title',  'image', 'addr')->where('type', '5')->OrderBy('created_at', 'desc')->skip($offset)->take($size)->get();
        foreach ($data as $item) {
            $item->image = img_url($item->image);
        }

        $total = BusinessHouseModel::where('type', '5')->count();

        return ['office_houses' => $data, 'total' => $total];
    }

    public function getApiRetentionList($params)
    {
        $page = array_get($params, 'page');
        $size = (int) array_get($params, 'size', 10);
        $offset = ($page - 1) * $size;
        $data = BusinessHouseModel::select('title',  'image')->where('type', '6')->OrderBy('created_at', 'desc')->skip($offset)->take($size)->get();
        foreach ($data as $item) {
            $item->image = img_url($item->image);
        }

        $total = BusinessHouseModel::where('type', '6')->count();

        return ['retention_houses' => $data, 'total' => $total];
    }



    // public function getBusinessList($params) 
    // {

    // }

    public function getApiBusinessHouseList()
    {
        $data = BusinessHouseModel::select('title',  'image', 'price', 'addr')->where('type', '5')->orderBy('created_at', 'desc')->limit(8)->get();
        foreach ($data as $item) {
            $item->image = img_url($item->image);
        }


        return $data;
    }

    public function getApiDetail($id)
    {
        $house = BusinessHouseModel::find($id);

        if (!empty($house->images)) {
            $house->images && $house->images = array_filter(array_map(function ($v) {
                return img_url($v);
            }, $house->images));    
        }
       

        $house->image = img_url($house->image);
        $house->traffic = array_filter(explode(',', $house->traffic));
        $house->facilities = array_filter(explode(',', $house->facilities));
        

        return $house;
    }

    public function getApiRecommend()
    {
        $recommend = BusinessHouseModel::select('title','image',  'price')->OrderBy('created_at', 'desc')->limit(2)->get();
        foreach ($recommend as $item) {
            $item->image = img_url($item->image);
        }

        return ['recommend' => $recommend];
    }

    public function test()
    {
        
    }

}