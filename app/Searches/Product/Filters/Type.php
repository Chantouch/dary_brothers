<?php

namespace App\Searches\Product\Filters;


use Illuminate\Database\Eloquent\Builder;

class Type implements ProductInterface
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
        return $builder->whereHas('type', function ($query) use ($value) {
            $query->join('type_translations', 'types.id', '=', 'type_translations.type_id')
                ->where('name', 'LIKE', '%' . $value . '%');
        });
    }
}
