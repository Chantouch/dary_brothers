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