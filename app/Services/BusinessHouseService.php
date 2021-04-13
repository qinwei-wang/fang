<?php

namespace App\Services;

use App\Models\Mongo\BusinessHouseModel;
use Carbon\Carbon;
use App\Models\VisaTypeModel;
use App\Models\TagModel;
use App\Models\UserTypeModel;
use App\Models\Mongo\NewHouseModel;

class BusinessHouseService
{
    public function save($params)
    {
        $id = array_get($params, 'id');
       
        $data = $params;

        $map = array_get($params, 'map');
        
        $map = collect($map)->map(function ($item) {
            $value = array_map(function ($name, $desc) {
                if ($name) {
                    return [
                        'name' => $name,
                        'desc' => $desc,
                    ];
                }
               
            }, $item['name'], $item['desc']);

            return array_filter($value);
        })->toArray();

        //图片
        $image = array_get($params, 'image');
        $image = $this->handleBase64Images($image)[0];
        $images = array_get($params, 'images');
        $images = $this->handleBase64Images($images);
        $data['image'] = $image;
        $data['images'] = $images;
        $data['map'] = $map;
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
        return BusinessHouseModel::orderBy('updated_at', 'desc')->where('type', $params['type'])->paginate(20);
    }

    public function getItem($id)
    {
        $house = BusinessHouseModel::find($id);
        $house->images && $house->images = array_map(function ($v) {
            return img_url($v);
        }, $house->images);  
        if (is_string($house->facilities)) {
            $house->facilities = explode(',', $house->facilities);
        }

        if (is_string($house->traffic)) {
            $house->traffic = explode(',', $house->traffic);
        }


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
        $data = BusinessHouseModel::select('title',  'image', 'description')->where('type', '4')->orderBy('updated_at', 'desc')->skip($offset)->take($size)->get();
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
        $data = BusinessHouseModel::select('title',  'images', 'addr')->where('type', '5')->orderBy('updated_at', 'desc')->skip($offset)->take($size)->get();
        foreach ($data as $item) {
            $item->image = img_url($item->images[0]);
        }

        $total = BusinessHouseModel::where('type', '5')->count();

        return ['office_houses' => $data, 'total' => $total];
    }

    public function getApiRetentionList($params)
    {
        $page = array_get($params, 'page');
        $size = (int) array_get($params, 'size', 10);
        $offset = ($page - 1) * $size;
        $data = BusinessHouseModel::select('title',  'images')->where('type', '6')->orderBy('updated_at', 'desc')->skip($offset)->take($size)->get();
        foreach ($data as $item) {
            $item->image = img_url($item->images[0]);
        }

        $total = BusinessHouseModel::where('type', '6')->count();

        return ['retention_houses' => $data, 'total' => $total];
    }



    // public function getBusinessList($params) 
    // {

    // }

    public function getApiBusinessHouseList()
    {
        $data = BusinessHouseModel::select('title',  'images', 'price', 'addr')->where('type', '5')->orderBy('updated_at', 'desc')->limit(8)->get();
        foreach ($data as $item) {
            $item->image = img_url($item->images[0]);
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
       

        $house = $this->transforms($house);
        

        return $house;
    }

    public function getApiRecommend()
    {
        $recommend = BusinessHouseModel::select('title','image',  'price')->orderBy('updated_at', 'desc')->limit(2)->get();
        foreach ($recommend as $item) {
            $item->image = img_url($item->image);
        }

        return ['recommend' => $recommend];
    }

    public function test()
    {
        
    }

    public function transforms($item) 
    {
            $item->traffic = is_string($item->traffic) ? array_filter(explode(',', $item->traffic)) : $item->traffic;
            $item->traffic = VisaTypeModel::select('name', 'color')->whereIn('id', $item->traffic)->get();
            $item->facilities = is_string($item->facilities) ? array_filter(explode(',', $item->facilities)) : $item->facilities;
            $item->facilities = UserTypeModel::whereIn('id', $item->facilities)->pluck('title');
            $item->image = img_url($item->images[0]);
            if ($item->map) {
                $map = [];
                foreach ($item->map as $k => $v) {
                    $map[NewHouseModel::MAP[$k]] = $v;
                }
                $item->map = $map;
            }

            return $item;
    }

}