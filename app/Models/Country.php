<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Country extends Model implements TranslatableContract
{
    use Translatable;
    protected $guarded = [];

    public $translatedAttributes = ['name'];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/countries_images/' . $this->flag);
    } //end of get image path
}
