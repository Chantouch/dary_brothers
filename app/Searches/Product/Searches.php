<?php

namespace App\Searches\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Searches
{
    /**
     * @param Request $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function apply(Request $filters)
    {
        $query = static::applyDecoratorsFromRequest($filters, (new Product())->newQuery());
        return static::getResults($query, $filters);
    }

    /**
     * @param Request $request
     * @param Builder $query
     * @return Builder
     */
    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach ($request->all() as $filterName => $value) {
            $decorator = static::createFilterDecorator($filterName);
            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }
        }
        return $query;
    }

    /**
     * @param $name
     * @return string
     */
    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\Filters\\' . studly_case($name);
    }

    /**
     * @param $decorator
     * @return bool
     */
    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    /**
     * @param Builder $query
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private static function getResults(Builder $query, Request $request)
    {
        return $query->select('products.*')
            ->latest()
            ->sortable()
            ->when($request->input('sort') === 'name', function ($query) use ($request) {
                $query->join('product_translations', 'products.id', '=', 'product_translations.product_id')
                    ->orderBy('product_translations.name', $request->input('direction'));
            })
            ->when($request->input('sort') === 'description', function ($query) use ($request) {
                $query->join('product_translations', 'products.id', '=', 'product_translations.product_id')
                    ->orderBy('product_translations.description', $request->input('direction'));
            })->paginate($request->input('limit', 20));
    }
}
