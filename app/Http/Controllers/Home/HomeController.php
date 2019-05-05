<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/4
 * Time: 16:14
 */



namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.index');
    }
}
