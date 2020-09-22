<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class DesignDep extends Model implements TranslatableContract
{
    use Translatable;
    protected $guarded = [];

    public $translatedAttributes = ['name', 'slug'];

    public function parents()
    {
        return $this->hasMany(DesignDep::class);
    }

    public function ideas()
    {
        return $this->hasMany(DesignIdea::class);
    } //end of ideas

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/design_deps_images/' . $this->image);
    } //end of get image path

}
