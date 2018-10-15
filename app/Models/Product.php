<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model implements HasMedia
{
    use  Translatable, HasMediaTrait, HasSlug, Sortable;

    public $translatedAttributes = ['name', 'description'];

    public $registerMediaConversionsUsingModelInstance = true;

    protected $fillable = ['status', 'cost', 'price', 'discount', 'qty', 'type_id', 'slug'];

    public $sortable = ['id', 'status', 'cost', 'price', 'discount', 'qty'];

    protected $casts = ['status' => 'boolean'];


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
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id')->withTimestamps();
    }

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('feature-product')
            ->width(720)
            ->height(960)
            ->sharpen(10)
            ->nonQueued();

        $this->addMediaConversion('thumb')
            ->width(1200)
            ->height(630)
            ->sharpen(10)
            ->performOnCollections('product-images')
            ->nonQueued();

        $this->addMediaConversion('old-picture')
            ->sepia()
            ->border(10, 'black', Manipulations::BORDER_OVERLAY)
            ->nonQueued();
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
