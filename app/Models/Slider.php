<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends Model implements TranslatableContract
{
    use Translatable;
    protected $guarded = [];

    public $translatedAttributes = ['title', 'description'];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/slider_images/' . $this->image);
    } //end of get image path
}
