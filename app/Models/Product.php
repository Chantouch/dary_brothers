<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Product extends Model implements HasMedia
{
    use  Translatable, HasMediaTrait;

    public $translatedAttributes = ['name', 'description', 'slug'];

    public $registerMediaConversionsUsingModelInstance = true;

    protected $fillable = ['status', 'cost', 'price', 'discount', 'qty', 'type_id'];

    protected $casts = ['status' => 'boolean'];

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

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('feature-product')
            ->width(720)
            ->height(960)
            ->sharpen(10);

        $this->addMediaConversion('thumb')
            ->width(1200)
            ->height(630)
            ->sharpen(10)
            ->performOnCollections('product-images');

        $this->addMediaConversion('old-picture')
            ->sepia()
            ->border(10, 'black', Manipulations::BORDER_OVERLAY);
    }
}
