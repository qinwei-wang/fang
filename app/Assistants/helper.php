<?php

    if (!function_exists('img_url')) {
        function img_url($path) {
            return asset($path);
        }
    }