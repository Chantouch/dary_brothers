<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    protected $fillable = ['name', 'description', 'text_link'];

    protected $casts = [
        'description' => 'text',
        'name' => 'text',
        'text_link' => 'text'
    ];
}
