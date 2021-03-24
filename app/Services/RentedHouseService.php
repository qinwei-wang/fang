<?php

namespace App\Services;

use App\Models\Mongo\RentedHouseModel;

class RentedHouseService
{
    public function save($params)
    {
        $id = array_get($params, 'id');

        //图片
        $image = array_get($params, 'image');
        $image = $this->handleBase64Images($image)[0];
        $images = array_get($params, 'images');
        $images = $this->handleBase64Images($images);
        $data = $params;
        $data['image'] = $image;
        $data['images'] = $images;
        unset($data['token']);

        if ($id) {
            $house = RentedHouseModel::find($id);
            $house->fill($data);
            $house->save();
        } else {
            RentedHouseModel::create($data); 
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
        return RentedHouseModel::orderBy('created_at', 'desc')->paginate(20);
    }

    public function getItem($id)
    {
        $house = RentedHouseModel::find($id);

        $house->images && $house->images = array_map(function ($v) {
            return img_url($v);
        }, $house->images);

        return $house;
    }

    public function deleteItem($id)
    {
        $house = RentedHouseModel::find($id);
        $house->delete();
    }

    public function getApiRentedHouseList()
    {
        $data = RentedHouseModel::select('title',  'image', 'price', 'house_types')->orderBy('created_at', 'desc')->limit(8)->get();
        foreach ($data as $item) {
            $item->image = img_url($item->image);
        }
       
        return $data;
    }
}