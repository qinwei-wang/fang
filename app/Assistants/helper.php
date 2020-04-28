<?php

    if (!function_exists('img_url')) {
        function img_url($path) {
            if (!empty($path)) {
                $parse_url = parse_url($path);
                return  url($parse_url['path']);
            }
            return '';
        }
    }

    /**
 * get user remote ip
 * @return string
 */
function getIP() {
    // 前端服务端请求数据时会显式的传 IP
    if (request()->header('customers-ip', '')) {
        $ip = request()->header('customers-ip', '');
        return $ip;
    }

    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    }
    elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    }
    elseif (getenv('HTTP_X_FORWARDED')) {
        $ip = getenv('HTTP_X_FORWARDED');
    }
    elseif (getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');

    }
    elseif (getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');
    }
    else if(isset($_SERVER['REMOTE_ADDR'])){
        $ip = $_SERVER['REMOTE_ADDR'];
    }else{
        $ip = '0.0.0.0';
    }
    if($ip){
        $ip_arr = explode(",",$ip);
        if(count($ip_arr)>0){
            //IP不要做IPV6和本地IP区分，直接取第一个
            $ip = $ip_arr[0];
//            foreach($ip_arr as $ip_t){
//                if(!checkIPLocalOrIPV6($ip_t)){
//                    $ip = $ip_t;
//                    $ip = str_replace(' ','',$ip);
//                    return $ip;
//                }
//            }
        }
    }
    $ip = str_replace(' ','',$ip);

    return $ip;
}