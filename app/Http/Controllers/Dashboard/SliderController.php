<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_sliders'])->only('index');
        $this->middleware(['permission:create_sliders'])->only('create');
        $this->middleware(['permission:update_sliders'])->only('edit');
        $this->middleware(['permission:delete_sliders'])->only('destroy');
    } //end of constructor


    // Index
    public function index(Request $request)
    {
        $sliders = Slider::all();
        return view('dashboard.sliders.index', compact('sliders'));
    } // End of Index

    // Create
    public function create()
    {
        $sliders = Slider::all();
        return view('dashboard.sliders.create', compact('sliders'));
    } // End of Create

    // Store
    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.title' => ['required', Rule::unique('slider_translations', 'title')]];
            $rules += [$locale . '.description' => ['required']];
        } //end of for each

        $rules += [
            'rank' => 'required|numeric',
            'url' => 'nullable|url',
            'image' => 'image|required',
        ];

        $request->validate($rules);

        $request_data = $request->except(['image']);

        if ($request->image) {
            Image::make($request->image)                
                ->save('uploads/slider_images/' . $request->image->hashName(), 60);
            $request_data['image'] = $request->image->hashName();
        } //end of external if


        Slider::create($request_data);

        return redirect()->route('dashboard.sliders.index')->with('success', __('admin.added_successfully'));
    } // End of Store


    // Edit
    public function edit($id)
    {
        $slide = Slider::findOrFail($id);
        $sliders = Slider::all();

        return view('dashboard.sliders.edit', compact('slide', 'sliders'));
    } // End of Edit


    // Update
    public function update(Request $request, $id)
    {
        $slide = Slider::findOrFail($id);

        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.title' => ['required', Rule::unique('slider_translations', 'title')->ignore($slide->id, 'slider_id'),]];
            $rules += [$locale . '.description' => ['required']];
        } //end of for each

        $rules += [
            'rank' => 'required|numeric',
            'url' => 'nullable|url',
            'image' => 'image',
        ];

        $request->validate($rules);

        $request_data = $request->except(['image']);

        if ($request->image) {
            if ($slide->image != 'not-found.jpg') {
                File::delete('uploads/slider_images/' . $slide->image);
            } //end of inner if
            Image::make($request->image)               
                ->save('uploads/slider_images/' . $request->image->hashName(), 60);
            $request_data['image'] = $request->image->hashName();
        } //end of external if

        $slide->update($request_data);

        return redirect()->route('dashboard.sliders.index')->with('success', __('admin.updated_successfully'));
    } // End of Update


    // Delete 
    public function destroy($id)
    {
        $slide = Slider::findOrFail($id);

        if ($slide->image != 'not-found.jpg') {
            File::delete('uploads/slider_images/' . $slide->image);
        } //end of if

        $slide->delete();

        return redirect()->route('dashboard.sliders.index')->with('success', __('admin.deleted_successfully'));
    } // End of Delete
}
