<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;

class DesignIdea extends Model implements TranslatableContract
{



    use Translatable;
    protected $guarded = [];
    public $translatedAttributes = ['name', 'slug', 'description'];


    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/design_idea_images/' . $this->image);
    }//end of get image path

    
    public function idea_images(){
        return $this->hasMany('\App\Models\DesignIdeaImage', 'design_idea_id');
    }

    public function first_image(){
        return $this->hasOne('\App\Models\DesignIdeaImage', 'design_idea_id');       
    }

    public function department()
    {
        return $this->belongsTo(DesignDep::class);

    }//end fo department

    
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = make_slug($model->slug);
        });

    }
}
