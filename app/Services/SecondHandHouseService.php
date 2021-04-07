<?php

namespace App\Services;

use App\Models\Mongo\SecondHandHouseModel;
use Carbon\Carbon;
use App\Models\VisaTypeModel;
use App\Models\TagModel;
use App\Models\Mongo\NewHouseModel;

class SecondHandHouseService
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
        $data['map'] = $map;
        unset($data['token']);
        if ($id) {
            $house = SecondHandHouseModel::find($id);
            $house->fill($data);
            $house->save();
        } else {
            SecondHandHouseModel::create($data); 
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
        return SecondHandHouseModel::orderBy('updated_at', 'desc')->paginate(20);
    }

    public function getItem($id)
    {
        $house = SecondHandHouseModel::find($id);
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
        $house = SecondHandHouseModel::find($id);
        $house->delete();
    }

    public function getApiList($params)
    {
        $page = array_get($params, 'page');
        $size = (int) array_get($params, 'size', 10);
        $offset = ($page - 1) * $size;
        $sort = array_get($params, 'sort', 0);
        $model = SecondHandHouseModel::select('title', 'title_tags', 'house_tags', 'image', 'price', 'traffic', 'house_types', 'location', 'facilities', 'addr')->orderBy('updated_at', 'desc');

        $regionIndex = array_get($params, 'region_index');
        if (isset($regionIndex)) {
            $regionIndex = explode(',', $regionIndex);
            $model->whereIn('region_index', $regionIndex);
        }
        
        $priceIndex = array_get($params, 'price_index');
        if (isset($priceIndex)) {
            $priceIndex = explode(',', $priceIndex);
            $model->whereIn('price_index', $priceIndex);
        }
        $areaIndex = array_get($params,'area_index');
        if (isset($areaIndex)) {
            $areaIndex = explode(',', $areaIndex);
            $model->whereIn('area_index', $areaIndex);
        }
        $houseIndex = array_get($params, 'house_index');
        if (isset($houseIndex)) {
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
        $data =  $this->transform($data);

        return ['second_hand_houses' => $data, 'total' => $total];

    }

    public function getApiSecondHandedHouseList()
    {
       
        $data = SecondHandHouseModel::select('title',  'images', 'price', 'house_types')->orderBy('updated_at', 'desc')->limit(8)->get();
        foreach ($data as $item) {
            $item->image = img_url($item->images[0]);
        }

        return $data;
    }

    public function getApiDetail($id)
    {
        $house = SecondHandHouseModel::find($id);
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
        $house->recommend = SecondHandHouseModel::whereIn('id', $recommendIds)->limit(10)->get();
        $house->recommend = $this->transform($house->recommend); 

        $house = $this->transforms($house);

        return $house;

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
            $item->traffic = VisaTypeModel::whereIn('id', $item->traffic)->get();
            $item->facilities = is_string($item->facilities) ? array_filter(explode(',', $item->facilities)) : $item->facilities;
            $item->facilities = TagModel::whereIn('id', $item->facilities)->pluck('name');
            $item->title_tags = array_filter(explode(',', $item->title_tags));
            $item->image = img_url($item->images[0]);
            $item->house_tags = array_filter(explode(',', $item->house_tags));
            $item->finish_at = Carbon::parse($item->finish_at)->toDateString();
            $item->start_at = Carbon::parse($item->start_at)->toDateString();
            $item->region_index && $item->region_ch = array_map(function ($v) {
                return NewHouseModel::REGION[$v];
            }, $item->region_index);
            if (!empty($item->map)) {
                $map = [];
                foreach ($item->map as $k => $v) {
                    $map[NewHouseModel::MAP[$k]] = $v;
                }
                $item->map = $map;
            }
            

            return $item;
    }
}