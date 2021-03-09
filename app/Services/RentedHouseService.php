<?php

namespace App\Services;

use App\Models\Mongo\RentedHouseModel;

class RentedHouseService
{
    public function save($params)
    {
        $id = array_get($params, 'id');
        //户型
        $houseTypes = array_get($params, 'house_types');
        $houseTypes = array_map(function ($type, $area, $total, $price) {
            if (!empty($type)) {
                return ['type' => $type, 'area' => $area, 'total' => $total, 'price' => $price];
            }
        }, $houseTypes['type'], $houseTypes['area'], $houseTypes['total'], $houseTypes['price']);

        $houseTypes = array_filter($houseTypes);

        //图片
        $image = array_get($params, 'image');
        $effectImages = array_get($params, 'effect_images');
        $demoImages = array_get($params, 'demo_images');
        $surroundingImages = array_get($params, 'surrounding_images');

        $image = $this->handleBase64Images($image)[0];
        $effectImages = $this->handleBase64Images($effectImages);
        $demoImages = $this->handleBase64Images($demoImages);
        $surroundingImages = $this->handleBase64Images($surroundingImages);
        $data = $params;
        $data['house_types'] = $houseTypes;
        $data['effect_images'] = $effectImages;
        $data['demo_images'] = $demoImages;
        $data['surrounding_images'] = $surroundingImages;
        $data['image'] = $image;
        RentedHouseModel::create($data); 
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
        return RentedHouseModel::OrderBy('created_at', 'desc')->paginate(20);
    }

    public function getItem($id)
    {
        $house = RentedHouseModel::find($id);
        $house->effect_images && $house->effect_images = array_map(function ($v) {
            return img_url($v);
        }, $house->effect_images);

        $house->demo_images && $house->demo_images = array_map(function ($v) {
            return img_url($v);
        }, $house->demo_images);

        $house->surrounding_images && $house->surrounding_images = array_map(function ($v) {
            return img_url($v);
        }, $house->surrounding_images);        

        return $house;

    }

    public function deleteItem($id)
    {
        $house = RentedHouseModel::find($id);
        $house->delete();
    }
}