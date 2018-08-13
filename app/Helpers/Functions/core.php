<?php

if (!function_exists("status")) {
    /**
     * @param $input
     * @return string
     */
    function status($input)
    {
        switch ($input) {
            case 1:
                return '<span class="badge badge-success">Active</span>';
            case 0:
                return '<span class="badge badge-danger">Inactive</span>';
            default:
                break;
        }
    }
}


if (!function_exists("active_class")) {
    function active_class($url)
    {
        return Request::url() == $url ? 'active' : '';
    }
}

if (!function_exists("html_class")) {
    function html_class(array $array)
    {
        $classes = [];

        foreach ($array as $key => $value) {
            if (is_int($key) and $value) {
                $classes[] = $value;
            } else if ($value) {
                $classes[] = $key;
            }
        }

        if ($classes) {
            return 'class="' . implode(' ', $classes) . '"';
        }
    }
}
