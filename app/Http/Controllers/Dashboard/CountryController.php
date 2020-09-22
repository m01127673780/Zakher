<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_countries'])->only('index');
        $this->middleware(['permission:create_countries'])->only('create');
        $this->middleware(['permission:update_countries'])->only('edit');
        $this->middleware(['permission:delete_countries'])->only('destroy');
    } //end of constructor

    // Index
    public function index(Request $request)
    {
        $countries = Country::all();
        return view('dashboard.countries.index', compact('countries'));
    } // End of Index

    // Create
    public function create()
    {
        $countries = Country::all();
        return view('dashboard.countries.create', compact('countries'));
    } // End of Create

    // Store
    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('country_translations', 'name')]];
        } //end of for each

        $rules += [
            'status' => ['required', Rule::in(['0', '1'])],
            'flag' => 'image|required',
            'code' => 'numeric|required',
        ];

        $request->validate($rules);

        $request_data = $request->except(['flag']);

        if ($request->flag) {
            Image::make($request->flag)
                ->save('uploads/countries_images/' . $request->flag->hashName(), 60);
            $request_data['flag'] = $request->flag->hashName();
        } //end of external if


        Country::create($request_data);

        return redirect()->route('dashboard.countries.index')->with('success', __('admin.added_successfully'));
    } // End of Store


    // Edit
    public function edit($id)
    {
        $country = Country::findOrFail($id);

        return view('dashboard.countries.edit', compact('country'));
    } // End of Edit


    // Update
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);

        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('country_translations', 'name')->ignore($country->id, 'country_id'),]];
        } //end of for each

        $rules += [
            'status' => ['required', Rule::in(['0', '1'])],
            'flag' => 'image',
            'code' => 'numeric|required',
        ];

        $request->validate($rules);

        $request_data = $request->except(['flag']);

        if ($request->flag) {
            if ($country->flag != 'not-found.jpg') {
                File::delete('uploads/countries_images/' . $country->flag);
            } //end of inner if
            Image::make($request->flag)
                ->save('uploads/countries_images/' . $request->flag->hashName(), 60);
            $request_data['flag'] = $request->flag->hashName();
        } //end of external if

        $country->update($request_data);

        return redirect()->route('dashboard.countries.index')->with('success', __('admin.updated_successfully'));
    } // End of Update


    // Delete 
    public function destroy($id)
    {
        $country = Country::findOrFail($id);

        if ($country->flag != 'not-found.jpg') {
            File::delete('uploads/countries_images/' . $country->flag);
        } //end of if

        $country->delete();

        return redirect()->route('dashboard.countries.index')->with('success', __('admin.deleted_successfully'));
    } // End of Delete
}
