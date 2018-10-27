<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Kyslik\ColumnSortable\Sortable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Setting extends Model implements HasMedia
{
    use Sortable, HasMediaTrait;

    protected $fillable = [
        'key',
        'name',
        'value',
        'description',
        'field',
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'active'
    ];

    public $sortable = [
        'id',
        'key',
        'name',
        'value',
        'description',
        'field',
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'active'
    ];

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($builder)
    {
        return $builder->where('active', 1);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getValueAttribute($value)
    {
        if (Request::segment(2) === 'admin' && !in_array(Request::segment(3), ['password', 'login'])) {
            $hiddenValues = [
                'recaptcha_public_key',
                'recaptcha_private_key',
                'mail_password',
                'mailgun_secret',
                'mandrill_secret',
                'ses_key',
                'ses_secret',
                'sparkpost_secret',
                'stripe_secret',
                'paypal_username',
                'paypal_password',
                'paypal_signature',
                'facebook_client_id',
                'facebook_client_secret',
                'google_client_id',
                'google_client_secret',
                'google_maps_key',
                'twitter_client_id',
                'twitter_client_secret',
            ];
            if (in_array($this->attributes['key'], $hiddenValues)) {
                $value = '************************';
            }
        }
        if ($this->key == 'app_logo') {
            $value = str_replace('uploads/', '', $value);
        }
        return $value;
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    // Set Value
    public function setValueAttribute($value)
    {
        // Set logo
        switch ($this->attributes['key']) {
            case 'app_logo';
                return $this->setLogo($value);
            case 'app_favicon':
                return $this->setFavicon($value);
            case 'about_background':
                return $this->setBackground($value);
            case 'category_list_background':
                return $this->setBackground($value);
            case 'contact_page_background':
                return $this->setBackground($value);
            case 'product_list_background':
                return $this->setBackground($value);
            default:
                $this->attributes['value'] = $value;
                break;
        }
    }

    // Set Logo
    public function setLogo($value)
    {
        $attribute_name = 'value';
        $destination_path = 'logo';
        // if the image was erased
        if ($value == null) {
            // delete the image from disk
            $old_path = [
                'public/ico/' . str_replace('storage/logo/', '', $this->value),
            ];
            if (!str_contains($this->value, config('settings.app_logo'))) {
                Storage::delete($old_path);
            }
            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }
        // if a base64 was sent, store it in the db
//        if (starts_with($value, 'data:image')) {
        try {
            // Get file extention
            $extension = (is_png($value)) ? 'jpg' : 'png';
            // Make the image (Size: 454x80)
            $image = Image::make($value)
                ->resize(454, 454, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode($extension, 100);
        } catch (\Exception $e) {
            $this->attributes[$attribute_name] = null;
            return false;
        }
        if (!empty($this->value)) {
            //Delete file if exist on serve
            $old_path = [
                'public/logo/' . str_replace('storage/logo/', '', $this->value),
            ];
            if (File::exists(storage_path('app/public/logo'))) {
                Storage::delete($old_path);
            }
        }
        // Generate a filename.
        $filename = uniqid('logo-') . '.' . $extension;
        // Store the image on disk.
        Storage::put('public/' . $destination_path . '/' . $filename, $image->stream());
        // Save the path to the database
        $this->attributes[$attribute_name] = 'storage/' . $destination_path . '/' . $filename;
//        }
    }

    // Set Logo
    public function setBackground($value)
    {
        $attribute_name = 'value';
        $destination_path = 'background';
        // if the image was erased
        if ($value == null) {
            // delete the image from disk
            $old_path = [
                'public/background/' . str_replace('storage/background/', '', $this->value),
            ];
            if (!str_contains($this->value, config('settings.product_list_background')) || !str_contains($this->value, config('settings.contact_page_background')) || !str_contains($this->value, config('settings.category_list_background')) || !str_contains($this->value, config('settings.about_background'))) {
                Storage::delete($old_path);
            }
            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        try {
            // Get file extention
            $extension = (is_png($value)) ? 'jpg' : 'png';
            // Make the image (Size: 454x80)
            $image = Image::make($value)
                ->resize(1920, 240, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode($extension, 100);
        } catch (\Exception $e) {
            $this->attributes[$attribute_name] = null;
            return false;
        }
        if (!empty($this->value)) {
            //Delete file if exist on serve
            $old_path = [
                'public/background/' . str_replace('storage/background/', '', $this->value),
            ];
            if (File::exists(storage_path('app/public/background'))) {
                Storage::delete($old_path);
            }
        }
        // Generate a filename.
        $filename = uniqid('background-') . '.' . $extension;
        // Store the image on disk.
        Storage::put('public/' . $destination_path . '/' . $filename, $image->stream());
        // Save the path to the database
        $this->attributes[$attribute_name] = 'storage/' . $destination_path . '/' . $filename;
    }

    // Set Favicon
    private function setFavicon($value)
    {
        $attribute_name = 'value';
        $destination_path = 'ico';
        // if the image was erased
        if ($value == null) {
            // delete the image from disk
            $old_path = [
                'public/ico/' . str_replace('storage/ico/', '', $this->value),
            ];
            if (!str_contains($this->value, config('settings.app_favicon'))) {
                Storage::delete($old_path);
            }
            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }
        // if a base64 was sent, store it in the db
        //if (starts_with($value, 'data:image')) {
        try {
            // Get file extention
            $extension = (is_png($value)) ? 'jpg' : 'png';
            // Make the image (Size: 32x32)
            $image = Image::make($value)->resize(32, 32, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($extension, 100);
        } catch (\Exception $e) {
            $this->attributes[$attribute_name] = null;
            return false;
        }
        if (!empty($this->value)) {
            //Delete file if exist on serve
            $old_path = [
                'public/ico/' . str_replace('storage/ico/', '', $this->value),
            ];
            if (File::exists(storage_path('app/public/ico'))) {
                Storage::delete($old_path);
            }
        }
        // Save the file on server
        $filename = uniqid('ico-') . '.' . $extension;
        Storage::put('public/' . $destination_path . '/' . $filename, $image->stream());
        // Save the path to the database
        $this->attributes[$attribute_name] = 'storage/' . $destination_path . '/' . $filename;
        //}
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Setting::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child()
    {
        return $this->hasMany(Setting::class, 'parent_id', 'id')
            ->whereNotNull('parent_id');
    }
}
