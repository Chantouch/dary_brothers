<?php

namespace App\Searches\Product\Filters;


use Illuminate\Database\Eloquent\Builder;

class Qty implements ProductInterface
{

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('qty', 'LIKE', '%' . $value . '%');
    }
}
