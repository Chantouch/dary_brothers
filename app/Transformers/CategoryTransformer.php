<?php

namespace App\Transformers;

class CategoryTransformer extends BaseTransformer
{

    /**
     * Method used to transform an item.
     *
     * @param $item mixed The item to be transformed.
     *
     * @return array The transformed item.
     */
    public function transform($item): array
    {
        return [
            'id' => (int)$item->id,
            'en_name' => (string)$item->translate('en')->name,
            'kh_name' => (string)$item->translate('kh')->name,
            'en_description' => (string)$item->translate('en')->description,
            'kh_description' => (string)$item->translate('kh')->description,
            'status' => (boolean)$item->status
        ];
    }
}