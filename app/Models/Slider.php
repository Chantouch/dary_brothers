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

    protected $fillable = ['link', 'status', 'type'];

    public $translatedAttributes = ['name', 'description', 'text_link'];

    public $registerMediaConversionsUsingModelInstance = true;

    protected $casts = [
        'type' => 'string',
        'status' => 'boolean',
        'link' => 'text'
    ];
}
