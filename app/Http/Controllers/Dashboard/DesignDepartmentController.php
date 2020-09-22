<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DesignDep;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class DesignDepartmentController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_design_departments'])->only('index');
        $this->middleware(['permission:create_design_departments'])->only('create');
        $this->middleware(['permission:update_design_departments'])->only('edit');
        $this->middleware(['permission:delete_design_departments'])->only('destroy');
    } //end of constructor


    // Index
    public function index(Request $request)
    {
        $departments = DesignDep::all();
        return view('dashboard.design_departments.index', compact('departments'));
    } // End of Index

    // Create
    public function create()
    {
        $departments = DesignDep::all();
        return view('dashboard.design_departments.create', compact('departments'));
    } // End of Create

    // Store
    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('design_dep_translations', 'name')]];
            $rules += [$locale . '.slug' => ['required', Rule::unique('design_dep_translations', 'slug')]];
        } //end of for each

        $rules += [
            'status' => ['required', Rule::in(['0', '1'])],
            'image' => 'image|required',
        ];

        $request->validate($rules);

        $request_data = $request->except(['image']);

        if ($request->image) {
            Image::make($request->image)                
                ->save('uploads/design_deps_images/' . $request->image->hashName(), 60);
            $request_data['image'] = $request->image->hashName();
        } //end of external if


        DesignDep::create($request_data);

        return redirect()->route('dashboard.design_departments.index')->with('success', __('admin.added_successfully'));
    } // End of Store


    // Edit
    public function edit($id)
    {
        $department = DesignDep::findOrFail($id);
        $departments = DesignDep::all();

        return view('dashboard.design_departments.edit', compact('department', 'departments'));
    } // End of Edit


    // Update
    public function update(Request $request, $id)
    {
        $department = DesignDep::findOrFail($id);

        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('design_dep_translations', 'name')->ignore($department->id, 'design_dep_id'),]];
            $rules += [$locale . '.slug' => ['required', Rule::unique('design_dep_translations', 'slug')->ignore($department->id, 'design_dep_id')]];
        } //end of for each

        $rules += [
            'status' => ['required', Rule::in(['0', '1'])],
            'image' => 'image',
        ];

        $request->validate($rules);

        $request_data = $request->except(['image']);

        if ($request->image) {
            if ($department->image != 'not-found.jpg') {
                File::delete('uploads/design_deps_images/' . $department->image);
            } //end of inner if
            Image::make($request->image)               
                ->save('uploads/design_deps_images/' . $request->image->hashName(), 60);
            $request_data['image'] = $request->image->hashName();
        } //end of external if

        $department->update($request_data);

        return redirect()->route('dashboard.design_departments.index')->with('success', __('admin.updated_successfully'));
    } // End of Update


    // Delete 
    public function destroy($id)
    {
        $department = DesignDep::findOrFail($id);

        if ($department->image != 'not-found.jpg') {
            File::delete('uploads/design_deps_images/' . $department->image);
        } //end of if

        $department->delete();

        return redirect()->route('dashboard.design_departments.index')->with('success', __('admin.deleted_successfully'));
    } // End of Delete
}
