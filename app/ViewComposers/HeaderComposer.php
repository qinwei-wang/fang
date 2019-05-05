<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/4
 * Time: 15:23
 */


namespace App\ViewComposers;
use Illuminate\Contracts\View\View;
use Config;
use Request;
use Auth;

class HeaderComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $view->with(['user' => $user]);
    }
}

