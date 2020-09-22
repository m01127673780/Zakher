<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignIdeaImage extends Model
{

    protected $fillable = [
        'image',
    ];

    protected $casts = [
        'image' => 'array'
    ];
   
    
    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/design_idea_images/' . $this->image);
    }//end of get image path

    public function design_idea()
    {
        return $this->belongsTo(DesignIdea::class);

    }//end fo design_idea

    
}
