<?php

use Illuminate\Support\Str;

if(!function_exists('pathFile')) {
    function pathFile($file, bool $thumbnail = false)
    {
        $file = ($thumbnail === true) ? 'uploads/thumbnail' . substr($file, strpos($file, '/', 6)) : $file;
        return asset($file);
    }
}

if(!function_exists('iconsList')) {
    function iconsList()
    {
        // Get Data From File
        $file = file(asset('flaticons/include-flaticons.css'));
        // Remove Empty Items
        $filter = array_filter($file, function ($var) {
            return ($var != "\n");
        });

        // Sort Ascending Array
        sort($filter);
        return $filter;
    }
}

if(!function_exists('isEnglish')) {
    function isEnglish($str)
    {
        return preg_match('/[a-zA-Z0-9]/', substr($str, 0, 1)) ? true : false;
    }
}

if(!function_exists('slug')) {
    function slug($string, $separator = '-')
    {
        $string = trim($string);
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace("/[^a-z0-9_\-\sءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهيیةى]/u", '', $string);
        $string = preg_replace("/[\s\-_]+/", ' ', $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }
}

if(!function_exists('str_limit')) {
    function str_limit($string, $length = 100, $end = '...')
    {
        return Str::limit($string, $length, $end);
    }
}

if(!function_exists('data_lang')) {
    function data_lang($en_data, $ar_data)
    {
        return app()->getLocale() == 'en' ? $en_data : $ar_data;
    }
}

if(!function_exists('daysLeft')) {
    function daysLeft($days)
    {
        if($days >= 10)
            $notify = 'success';
        elseif ($days > 0)
            $notify = 'warning';
        else
            $notify = 'danger';
        return $notify;
    }
}
