<?php

namespace App\Services;

use App\Models\Mongo\NewHouseModel;
use Carbon\Carbon;
use App\Models\Mongo\SecondHandHouseModel;
use App\Models\Mongo\RentedHouseModel;
use App\Models\TagModel;
use App\Models\VisaTypeModel;

class NewHouseService
{
    public function save($params)
    {
        $id = array_get($params, 'id');
        //户型
        $houseTypes = array_get($params, 'house_types');
        $houseTypes = array_map(function ($type, $area, $total, $price, $averagePrice, $vrLink, $image) {
            if (!empty($type)) {
                return ['type' => $type, 'area' => $area, 'total' => $total, 'price' => $price, 'average_price' => $averagePrice, 'vr_link' => $vrLink, 'image' => $image];
            }
        }, $houseTypes['type'], $houseTypes['area'], $houseTypes['total'], $houseTypes['price'], $houseTypes['average_price'], $houseTypes['vr_link'], $houseTypes['image']);

        $houseTypes = array_filter($houseTypes);

        //map
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
        $images = array_get($params, 'images');
        $effectImages = array_get($params, 'effect_images');
        $demoImages = array_get($params, 'demo_images');
        $surroundingImages = array_get($params, 'surrounding_images');
        $effectImages = $this->handleBase64Images($effectImages);
        $demoImages = $this->handleBase64Images($demoImages);
        $surroundingImages = $this->handleBase64Images($surroundingImages);
        $images = $this->handleBase64Images($images);
        $data = $params;
        $data['house_types'] = $houseTypes;
        $data['effect_images'] = $effectImages;
        $data['demo_images'] = $demoImages;
        $data['surrounding_images'] = $surroundingImages;
        $data['images'] = $images;
        $data['map'] = $map;

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
        return NewHouseModel::orderBy('updated_at', 'desc')->paginate(20);
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

        // dd($house);exit;
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
        $house = NewHouseModel::find($id);
        $house->delete();
    }

    public function getApiList($params)
    {
        $page = array_get($params, 'page', 1);
        $size = (int) array_get($params, 'size', 10);
        $offset = ($page - 1) * $size;
        $model = NewHouseModel::select('title', 'title_tags','house_tags', 'images', 'price', 'traffic', 'house_types', 'location', 'facilities', 'addr', 'created_at');
        $sort = array_get($params, 'sort', 0);
        $regionIndex = array_get($params, 'region_index');
        if (!empty($regionIndex)) {
            $regionIndex = explode(',', $regionIndex);
            $model->whereIn('region_index', $regionIndex);
        }
        
        $priceIndex = array_get($params, 'price_index');
        if (!empty($priceIndex)) {
            $priceIndex = explode(',', $priceIndex);
            $model->whereIn('price_index', $priceIndex);
        }
        $areaIndex = array_get($params,'area_index');
        if (!empty($areaIndex)) {
            $areaIndex = explode(',', $areaIndex);
            $model->whereIn('area_index', $areaIndex);
        }
        $houseIndex = array_get($params, 'house_index');
        if (!empty($houseIndex)) {
            $houseIndex = explode(',', $houseIndex);
            $model->whereIn('house_index', $houseIndex);
        }
        if ($sort == 1) {
            $model->orderBy('price');
        } elseif ($sort == 2) {
            $model->orderBy('price', 'desc');
        } elseif ($sort == 3) {
            $model->orderBy('area');
        } elseif ($sort == 4) {
            $model->orderBy('area', 'desc');
        } else {
            $model->orderBy('updated_at', 'desc');
        }

        $total = $model->count();
        $data = $model->skip($offset)->take($size)->get();
        $data = $this->transform($data);

        return ['new_houses' => $data, 'total' => $total];
    }

    public function getApiNewHouseList()
    {
        
        $data = NewHouseModel::select('title', 'images', 'price',  'house_types', 'vr_link')->orderBy('updated_at', 'desc')->limit(8)->get();
        foreach ($data as $item) {
            $item->image = img_url($item->images[0]);
        }

        return $data;
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

        $recommendIds =  array_filter(explode(',', $house->recommmend_ids));
        $house->recommend = NewHouseModel::whereIn('id', $recommendIds)->limit(10)->get();
        $house->recommend = $this->transform($house->recommend); 
     
    

        $house = $this->transforms($house);

        return $house;
    }

    public function getApiRecommend($params)
    {
        $type = array_get($params, 'type');
        if ($type == 'second_hand_house') {
            $recommend = SecondHandHouseModel::select('title','images',  'price')->orderBy('updated_at', 'desc')->limit(8)->get();
        } elseif ($type == 'rented_house') {
            $recommend = RentedHouseModel::select('title','images',  'price')->orderBy('updated_at', 'desc')->limit(8)->get();
        } else {
            $recommend = NewHouseModel::select('title','images',  'price')->orderBy('updated_at', 'desc')->limit(8)->get();
        }

       
        foreach ($recommend as $item) {
            $item->image = img_url($item->images[0]);
        }

        return ['recommend' => $recommend];
    }

    public function test()
    {
        
    }

    public function search($type, $keyword)
    {
        $id = VisaTypeModel::where('name', 'like' , '%' . $keyword . '%')->value('id');
        $id = (string) $id;
        if ($type == 'new_house') {
            $data = NewHouseModel::where('title','like', '%' . $keyword . '%')->orWhere('addr', 'like', '%' . $keyword . '%')->orWhere('traffic.0', $id)->get(); 
        } elseif ($type == 'second_hand_house') {
            $data = SecondHandHouseModel::where('title','like', '%' . $keyword . '%')->orWhere('addr', 'like', '%' . $keyword . '%')->orWhere('addr', 'like', '%' . $keyword . '%')->orWhere('traffic.0', $id)->get(); 
        } elseif ($type == 'rented_house') {
            $data = RentedHouseModel::where('title','like', '%' . $keyword . '%')->orWhere('addr', 'like', '%' . $keyword . '%')->orWhere('addr', 'like', '%' . $keyword . '%')->orWhere('traffic.0', $id)->get(); 

        }

        $data = $this->transform($data);
        return $data;
    }

    public function transform($data)
    {
        foreach ($data as $item) {
            $this->transforms($item);
        }

        return $data;
    }

    public function transforms($item) 
    {
            $item->traffic = is_string($item->traffic) ? array_filter(explode(',', $item->traffic)) : $item->traffic;
            $item->traffic = VisaTypeModel::select('name', 'color')->whereIn('id', $item->traffic)->get();
            $item->facilities = is_string($item->facilities) ? array_filter(explode(',', $item->facilities)) : $item->facilities;
            $item->facilities = TagModel::whereIn('id', $item->facilities)->pluck('name');
            $item->title_tags = array_filter(explode(',', $item->title_tags));
            $item->image = img_url($item->images[0]);

            $images = [];
            if (!empty($item->images)) {
                foreach ($item->images as $k => $image) {
                    $images[] = img_url($image);
                }
            }
            
            $item->images = $images;
            $item->house_tags = array_filter(explode(',', $item->house_tags));
            $item->finish_at = Carbon::parse($item->finish_at)->toDateString();
            $item->start_at = Carbon::parse($item->start_at)->toDateString();
            $item->region_index && $item->region_ch = array_map(function ($v) {
                return NewHouseModel::REGION[$v] ?? '其他地区';
            }, $item->region_index);
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