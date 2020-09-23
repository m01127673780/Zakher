<?php

namespace App\Http\Controllers;

use App\Models\DesignDep;
use App\Models\DesignIdea;
use App\Models\DesignIdeaImage;
use App\Models\Setting;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function designs($slug)
    {
        $design_department = DesignDep::whereTranslationLike('slug', $slug)->firstOrFail();

        $all_departments = DesignDep::where('parent', null)->get();

        $sub_departments = DesignDep::where('parent', $design_department->id)->get();

        $settings = Setting::first();
        
        $designs_ideas = DesignIdea::where('department_id',  $design_department->id)->get();

        return view('website.Designs', compact(
            'settings',
            'design_department',
            'sub_departments',
            'designs_ideas',
            'all_departments'
        ));
    }

    public function singleDesign($slug, $id)
    {
        $design_idea = DesignIdea::findOrFail($id);

        $all_departments = DesignDep::where('parent', null)->get();

        $settings = Setting::first();
        
        $idea_images = DesignIdeaImage::where('design_idea_id',  $design_idea->id)->get();

        return view('website.singleDesign', compact(
            'settings',
            'design_idea',
            'idea_images',
            'all_departments'
        ));
    }
}
