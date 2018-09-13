<?php

namespace App\Searches\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Searches
{
    /**
     * @param Request $filters
     * @param null $status
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function apply(Request $filters, $status = null)
    {
        $query = $this->applyDecoratorsFromRequest($filters, (new Product())->newQuery()->when($status === 1, function ($query) {
            $query->where('status', '=', 1);
        }));
        return $this->getResults($query, $filters);
    }

    /**
     * @param Builder $query
     * @param Request $request
     * @return Searches
     */
    public function where(Builder $query, Request $request)
    {
        $query->where('status', '=', 1);
        return $this;
    }

    /**
     * @param Request $request
     * @param Builder $query
     * @return Builder
     */
    private function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach ($request->all() as $filterName => $value) {
            $decorator = $this->createFilterDecorator($filterName);
            if ($this->isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }
        }
        return $query;
    }

    /**
     * @param $name
     * @return string
     */
    private function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\Filters\\' . studly_case($name);
    }

    /**
     * @param $decorator
     * @return bool
     */
    private function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    /**
     * @param Builder $query
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function getResults(Builder $query, Request $request)
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
