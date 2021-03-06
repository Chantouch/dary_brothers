<?php


if (!function_exists("payment")) {
    /**
     * @param $input
     * @return string
     */
    function payment($input)
    {
        switch ($input) {
            case 1:
                return 'Awaiting payment';
            case 2:
                return 'Canceled';
            case 3:
                return 'Delivered';
            case 4:
                return 'Payment accepted';
            case 5:
                return 'Processing in progress';
            case 6:
                return 'Shipped';
            default:
                return 'Default';
                break;
        }
    }
}


if (!function_exists("payment_status")) {
    /**
     * @param $input
     * @return string
     */
    function payment_status($input)
    {
        switch ($input) {
            case 1:
                return '<span class="badge badge-success">Awaiting payment</span>';
            case 2:
                return '<span class="badge badge-danger">Canceled</span>';
            case 3:
                return '<span class="badge badge-danger">Delivered</span>';
            case 4:
                return '<span class="badge badge-danger">Payment accepted</span>';
            case 5:
                return '<span class="badge badge-danger">Processing in progress</span>';
            case 6:
                return '<span class="badge badge-danger">Shipped</span>';
            default:
                return '<span class="badge badge-danger">Default</span>';
                break;
        }
    }
}


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


if (!function_exists("set_active")) {
    function set_active($route)
    {
        if (is_array($route)) {
            return in_array(Request::path(), $route) ? 'active' : '';
        }
        return Request::path() == $route ? 'active' : '';
    }
}

if (!function_exists("set_lang_active")) {
    function set_lang_active($lang)
    {
        return $lang === app()->getLocale() ? 'active_lang' : '';
    }
}


if (!function_exists("set_color")) {
    function set_color($route)
    {
        if (is_array($route)) {
            return in_array(Request::path(), $route) ? 'sale-noti' : '';
        }
        return Request::path() == $route ? 'sale-noti' : '';
    }
}

/**
 * Get image extension from base64 string
 *
 * @param $bufferImg
 * @param bool $recursive
 * @return bool
 */
function is_png($bufferImg, $recursive = true)
{
    $f = finfo_open();
    $result = finfo_buffer($f, $bufferImg, FILEINFO_MIME_TYPE);
    if (!str_contains($result, 'image') && $recursive) {
        // Plain Text
        return str_contains($bufferImg, 'image/png');
    }
    return $result == 'image/png';
}


if (!function_exists('check_lang')) {
    function check_lang($lang)
    {
        switch ($lang) {
            case 'kh':
                return 'Khmer';
                break;
            case 'en':
                return 'English';
                break;
            default:
                break;
        }
    }
}
