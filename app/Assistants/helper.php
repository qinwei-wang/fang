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