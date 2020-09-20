<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DesignDep;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        return view('dashboard.design_departments.create');
    } // End of Create

    // Store
    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('design_dep_translations', 'name')]];
        } //end of for each

        $request->validate($rules);

        DesignDep::create($request->all());

        return redirect()->route('dashboard.design_departments.index')->with('success', __('admin.added_successfully'));
    } // End of Store


    // Edit
    public function edit($id)
    {
        $department = DesignDep::findOrFail($id);

        return view('dashboard.design_departments.edit', compact('department'));
    } // End of Edit


    // Update
    public function update(Request $request, $id)
    {
        $department = DesignDep::findOrFail($id);

        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('design_dep_translations', 'name')]];
        } //end of for each


        $department->update($request->all());

        return redirect()->route('dashboard.design_departments.index')->with('success', __('admin.updated_successfully'));
    } // End of Update


    // Delete 
    public function destroy($id)
    {
        $department = DesignDep::findOrFail($id);

        $department->delete();
        return redirect()->route('dashboard.design_departments.index')->with('success', __('admin.deleted_successfully'));

    } // End of Delete
}
