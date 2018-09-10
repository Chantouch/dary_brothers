<?php

namespace App\Searches\Product\Filters;


use Illuminate\Database\Eloquent\Builder;

interface ProductInterface
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value);
}
