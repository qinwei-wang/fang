<?php

namespace App\Services;

use App\Models\Mongo\NewHouseModel;
use Carbon\Carbon;

class NewHouseService
{
    public function save($params)
    {
        $id = array_get($params, 'id');
        //户型
        $houseTypes = array_get($params, 'house_types');
        $houseTypes = array_map(function ($type, $area, $total, $price, $averagePrice) {
            if (!empty($type)) {
                return ['type' => $type, 'area' => $area, 'total' => $total, 'price' => $price, 'average_price' => $averagePrice];
            }
        }, $houseTypes['type'], $houseTypes['area'], $houseTypes['total'], $houseTypes['price'], $houseTypes['average_price']);

        $houseTypes = array_filter($houseTypes);

        //图片
        $image = array_get($params, 'image');
        $images = array_get($params, 'images');
        $effectImages = array_get($params, 'effect_images');
        $demoImages = array_get($params, 'demo_images');
        $surroundingImages = array_get($params, 'surrounding_images');

        $image = $this->handleBase64Images($image)[0];
        $effectImages = $this->handleBase64Images($effectImages);
        $demoImages = $this->handleBase64Images($demoImages);
        $surroundingImages = $this->handleBase64Images($surroundingImages);
        $images = $this->handleBase64Images($images);
        $data = $params;
        $data['house_types'] = $houseTypes;
        $data['effect_images'] = $effectImages;
        $data['demo_images'] = $demoImages;
        $data['surrounding_images'] = $surroundingImages;
        $data['image'] = $image;
        $data['images'] = $images;
        unset($data['token']);

        if ($id) {
            $house = NewHouseModel::find($id);
            $house->fill($data);
            $house->save();
        } else {
            NewHouseModel::create($data); 
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
        return NewHouseModel::OrderBy('created_at', 'desc')->paginate(20);
    }

    public function getItem($id)
    {
        $house = NewHouseModel::find($id);
        $house->effect_images && $house->effect_images = array_map(function ($v) {
            return img_url($v);
        }, $house->effect_images);

        $house->demo_images && $house->demo_images = array_map(function ($v) {
            return img_url($v);
        }, $house->demo_images);

        $house->surrounding_images && $house->surrounding_images = array_map(function ($v) {
            return img_url($v);
        }, $house->surrounding_images);        

        $house->images && $house->images = array_map(function ($v) {
            return img_url($v);
        }, $house->images);   


        return $house;
    }

    public function deleteItem($id)
    {
        $house = NewHouseModel::find($id);
        $house->delete();
    }

    public function getApiList($params)
    {
        $page = array_get($params, 'page');
        $size = (int) array_get($params, 'size', 10);
        $offset = ($page - 1) * $size;
        $data = NewHouseModel::select('title', 'title_tags', 'image', 'price', 'traffic', 'house_types', 'location', 'facilities', 'addr')->OrderBy('created_at', 'desc')->skip($offset)->take($size)->get();
        foreach ($data as $item) {
            $item->traffic = array_filter(explode(',', $item->traffic));
            $item->facilities = array_filter(explode(',', $item->facilities));
            $item->title_tags = array_filter(explode(',', $item->title_tags));
            $item->image = img_url($item->image);
            $item->house_tags = array_filter(explode(',', $item->house_tags));
        }

        $total = NewHouseModel::count();

        return ['new_houses' => $data, 'total' => $total];
    }

    public function getApiDetail($id)
    {
        $house = NewHouseModel::find($id);
        $house->effect_images && $house->effect_images = array_filter(array_map(function ($v) {
            return img_url($v);
        }, $house->effect_images));

        $house->demo_images && $house->demo_images = array_filter(array_map(function ($v) {
            return img_url($v);
        }, $house->demo_images));

        $house->surrounding_images && $house->surrounding_images = array_filter(array_map(function ($v) {
            return img_url($v);
        }, $house->surrounding_images));       

        $house->images && $house->images = array_filter(array_map(function ($v) {
            return img_url($v);
        }, $house->images));    

        $house->image = img_url($house->image);
        $house->traffic = array_filter(explode(',', $house->traffic));
        $house->facilities = array_filter(explode(',', $house->facilities));
        $house->finish_at = Carbon::parse($house->finish_at)->toDateString();
        $house->start_at = Carbon::parse($house->start_at)->toDateString();
        $house->title_tags = array_filter(explode(',', $house->title_tags));
        $house->house_tags = array_filter(explode(',', $house->house_tags));

        return $house;
    }

    public function getApiRecommend()
    {
        $recommend = NewHouseModel::select('title','image',  'price')->OrderBy('created_at', 'desc')->limit(2)->get();

        return ['recommend' => $recommend];
    }

    public function test()
    {
        
    }

}