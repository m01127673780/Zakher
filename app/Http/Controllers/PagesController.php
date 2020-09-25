<?php

namespace App\Http\Controllers;

use App\Models\DesignDep;
use App\Models\DesignIdea;
use App\Models\DesignIdeaImage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function designs($slug)
    {
        $design_department = DesignDep::findOrFail($slug);

        $all_departments = DesignDep::where('parent', null)->get();

        $sub_departments = DesignDep::where('parent', $design_department->id)->get();

        $settings = Setting::first();

        $designs_ideas = DesignIdea::where('department_id',  $design_department->id)->latest()->paginate(18);

        return view('website.Designs', compact(
            'settings',
            'design_department',
            'sub_departments',
            'designs_ideas',
            'all_departments'
        ));
    }

    public function singleDesign($id)
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

    function load_data(Request $request, $id)
    {
        $design_idea = DesignIdea::findOrFail($id);

        if ($request->ajax()) {

            if ($request->id > 0) {
                $data = DesignIdeaImage::
                    where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->limit(4)
                    ->get();
            } else {
                $data = DesignIdeaImage::
                     orderBy('design_idea_id', 'DESC')
                    ->limit(4)
                    ->get();
            }
            $output = '';
            $last_id = '';

            if (!$data->isEmpty()) {
                foreach ($data as $row) {
                    $output .= '

                    <div class="col-md-3 col-sm-3 col-6 col-lg-6">
                        <a  class="no-expand-thumbnails mz-thumb" data-zoom-id="Zoom-1" href="' . $row->image_path . '">
                            <img src="' . $row->image_path . '"/>
                        </a>
                    </div>

                    ';
                    $last_id = $row->id;
                }
                $output .= '
                <div id="load_more">
                    <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="' . $last_id . '" id="load_more_button">Load More</button>
                </div>
                ';
            } else {
                $output .= '
                <div id="load_more">
                    <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
                </div>
                ';
            }
            echo $output;
        }
    }
}
