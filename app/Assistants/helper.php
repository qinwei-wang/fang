<?php

    if (!function_exists('img_url')) {
        function img_url($path) {
            if (!empty($path)) {
                $parse_url = parse_url($path);
                return  env('APP_URL') . $parse_url['path'];
            }
            return '';
        }
    }