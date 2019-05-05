<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/3
 * Time: 13:52
 */


namespace App\ViewComposers;
use Illuminate\Contracts\View\View;
use Config;
use Request;

class SidebarComposer
{
    public function compose(View $view)
    {
        $menus = Config::get('template')['menus'];
        $url_path = Request::path();
        $is_open = false;
        $new_menus = [];
        foreach ($menus as $menu) {
            if ($menu['roles']) $menu['is_open'] = false;
            $new_sub_menus = [];
            foreach ($menu['menus'] as $sub_menu) {
                $sub_menu['is_active'] = false;
                $path_info = parse_url($sub_menu['link']);
                if ((parse_url('/' . $url_path)['path'] == $path_info['path']) && !$is_open) {
                    $is_open = true;
                    $menu['is_open'] = true;
                    $sub_menu['is_active'] = true;
                }
                $new_sub_menus[] = $sub_menu;
            }
            $menu['menus'] = $new_sub_menus;
            $new_menus[] = $menu;
        }
        $view->with(['menus' => $new_menus]);
    }


}