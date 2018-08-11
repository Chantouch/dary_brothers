<?php

use Illuminate\Support\Carbon;

/**
 * Return a Carbon instance.
 * @param string $parseString
 * @param string|null $tz
 * @return Carbon
 */
function carbon(string $parseString = '', string $tz = null): Carbon
{
    return new Carbon($parseString, $tz);
}

/**
 * Return a formatted Carbon date.
 * @param Carbon $date
 * @param string $format
 * @return string
 */
function humanize_date(Carbon $date, string $format = 'd F Y, H:i'): string
{
    return $date->format($format);
}