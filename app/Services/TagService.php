<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/16
 * Time: 1:19
 */


namespace App\Services;

use App\Repositories\TagRepository;

class TagService
{

    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }


    public function getList($params)
    {
        return $this->tagRepository->makeModel()->paginate(20);
    }


    public function save($params)
    {
        return $this->tagRepository->makeModel()->updateOrCreate(['id' => array_get($params, 'id', -1)], [
            'name' => $params['name'],
            'image' => $this->handleBase64Images($params['image'])[0]
        ]);
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


    public function getTagById($id)
    {
        return $this->tagRepository->makeModel()->where('id', $id)->first();
    }


    public function delete($id)
    {
        return $this->tagRepository->makeModel()->where('id', $id)->delete();
    }


    public function getAll()
    {
        return $this->tagRepository->makeModel()->get();
    }


}
