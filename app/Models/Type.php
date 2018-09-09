<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Type extends Model
{
    use  Translatable, HasSlug;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = ['status', 'slug'];

    protected $casts = ['status' => 'boolean'];

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingLanguage('en')
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }
        return 'slug';
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKey(): string
    {
        if (!empty($this->slug)) {
            return $this->slug;
        }
        return $this->id;
    }
}
