<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DesignDep;
use App\Models\DesignIdea;
use App\Models\DesignIdeaImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class DesignIdeaController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_design_ideas'])->only('index');
        $this->middleware(['permission:create_design_ideas'])->only('create');
        $this->middleware(['permission:update_design_ideas'])->only('edit');
        $this->middleware(['permission:delete_design_ideas'])->only('destroy');
    } //end of constructor


    // Index
    public function index(Request $request)
    {
        $departments = DesignDep::all();
        $ideas = DesignIdea::all();
        return view('dashboard.design_ideas.index', compact('departments', 'ideas'));
    } // End of Index

    // Create
    public function create()
    {
        $departments = DesignDep::all();
        return view('dashboard.design_ideas.create', compact('departments'));
    } // End of Create


    // Store
    public function store(Request $request)
    {
        $rules = [
            'department_id' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('design_dep_translations', 'name')]];
            $rules += [$locale . '.slug' => ['required', Rule::unique('design_dep_translations', 'slug')]];
            $rules += [$locale . '.description' => ['required']];
        } //end of for each

        $rules += [
            'status' => ['required', Rule::in(['0', '1'])],
            'image' => 'required',
            'image.*' => 'image',

        ];


        $request->validate($rules);

        $request_data = $request->except(['image']);

        $ideas = DesignIdea::create($request_data);

        if ($request->image) {

            foreach ($request->image as $image) {

                Image::make($image->getRealPath())
                    ->save('uploads/design_idea_images/' . $image->hashName(), 60);
                $newImage = $image->hashName();

                $idea_images = new DesignIdeaImage();
                $idea_images->design_idea_id = $ideas->id;
                $idea_images->image = $newImage;
                $idea_images->save();
            }
        } //end of if

        return redirect()->route('dashboard.design_ideas.index')->with('success', __('admin.added_successfully'));
    } // End of Store


    // Edit
    public function edit($id)
    {
        $idea = DesignIdea::findOrFail($id);
        $idea_images = DesignIdeaImage::where('design_idea_id', $idea->id)->get();
        $departments = DesignDep::all();

        return view('dashboard.design_ideas.edit', compact('idea', 'departments', 'idea_images'));
    } // End of Edit


    // Update
    public function update(Request $request, $id)
    {
        $idea = DesignIdea::findOrFail($id);
        $rules = [
            'department_id' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('design_dep_translations', 'name')]];
            $rules += [$locale . '.slug' => ['required', Rule::unique('design_dep_translations', 'slug')]];
            $rules += [$locale . '.description' => ['required']];
        } //end of for each

        $rules += [
            'status' => ['required', Rule::in(['0', '1'])],
        ];

        $request->validate($rules);

        $request_data = $request->except(['image']);

        $idea->update($request_data);

        return redirect()->route('dashboard.design_ideas.index')->with('success', __('admin.updated_successfully'));
    }


    // Delete
    public function destroy($id)
    {
        $idea = DesignIdea::findOrFail($id);
        $idea_images = DesignIdeaImage::where('design_idea_id', $idea->id)->get();
        foreach ($idea_images as $image) {
            File::delete('uploads/design_idea_images/' . $image->image);
        }
        $idea->delete();
        return redirect()->route('dashboard.design_ideas.index')->with('success', __('admin.deleted_successfully'));
    } // End of Delete


    // Update Image
    public function updateImage(Request $request, $id)
    {
        $rules = [
            'image' => 'image',
        ];

        $request->validate($rules);

        $idea_image = DesignIdeaImage::findOrFail($id);

        if ($request->image) {

            if ($request->image != 'avatar.png') {
                File::delete('uploads/design_idea_images/' . $idea_image->image);
            } //end of if

            Image::make($request->image->getRealPath())
                ->save('uploads/design_idea_images/' . $request->image->hashName(), 60);
            $newImage = $request->image->hashName();

            $idea_image->image = $newImage;
            $idea_image->save();
        } //end of if  

        return redirect()->route('dashboard.design_ideas.index')->with('success', __('admin.updated_successfully'));
    }
    // End of Update Image


    // Delete Image
    public function deleteImage($id)
    {
        $idea_image = DesignIdeaImage::findOrFail($id);

        if ($idea_image->image != 'avatar.png') {
            File::delete('uploads/design_idea_images/' . $idea_image->image);
        } //end of if

        $idea_image->delete();

        return redirect()->back()->with('success', __('admin.deleted_successfully'));
    } 
    // End of Delete Image

}
