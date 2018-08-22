<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Slider extends Model implements HasMedia
{
    use  Translatable, HasMediaTrait;

    protected $fillable = ['link', 'status'];

    public $translatedAttributes = ['name', 'description', 'text_link'];

    public $registerMediaConversionsUsingModelInstance = true;

    protected $casts = [
        'status' => 'boolean',
        'link' => 'text'
    ];

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('sliders')
            ->width(1920)
            ->height(570)
            ->sharpen(100);
    }
}
