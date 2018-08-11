<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use  Translatable;

    public $translatedAttributes = ['name', 'description', 'slug'];

    protected $fillable = ['status'];

    protected $casts = ['status' => 'boolean'];

    /**
     * @return BelongsToMany
     */
    public function productions(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id')->withTimestamps();
    }
}
