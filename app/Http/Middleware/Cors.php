<?php
/**
 * Created by patpat.
 * User: Bruce.He
 * Date: 16/10/12
 * Time: 下午11:32
 * Description: API中间键,对API请求做完整性校验,安全性检查,所有对外API都必须经过次Filter
 */

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * 不需要验证token的
     *
     * @var array
     */
    protected $except = [

    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // var_dump($request->header()['x-forwarded-for'][0]);exit;
        // $host = $request->header()['x-forwarded-for'][0];
        header("Access-Control-Allow-Origin: *"); // 允许任意域名发起的跨域请求
        header('Access-Control-Allow-Headers:x-requested-with');
        header('Access-Control-Max-Age:86400');
        header('Access-Control-Allow-Credentials:true');
        header('Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
        header('Access-Control-Allow-Headers:Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With');

        return $next($request);
    }
}
