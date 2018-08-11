<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use  Translatable;

    public $translatedAttributes = ['name', 'description', 'slug'];

    protected $fillable = ['status'];

    protected $casts = ['status' => 'boolean'];

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
