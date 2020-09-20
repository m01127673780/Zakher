<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_settings'])->only('index');
        $this->middleware(['permission:create_settings'])->only('create');
        $this->middleware(['permission:update_settings'])->only('edit');
        $this->middleware(['permission:delete_settings'])->only('destroy');
    } //end of constructor

    // Edit
    public function edit($id)
    {
        $settings = Setting::find($id);
        return view('dashboard.settings.edit', compact('settings'));
    } // End of Edit


    // Update
    public function update(Request $request,  $id)
    {
        $settings = Setting::find($id);

        
        $request->validate([
            'site_title_ar' => 'required|string|min:4',
            'site_title_en' => 'required|string|min:4',
            'email' => 'required|email',
            'phone' => 'required',
            'whatsapp' => 'required',
            'address_ar' => 'required|string|min:4',
            'address_en' => 'required|string|min:4',
            'job_times_ar' => 'required|string|min:4',
            'job_times_en' => 'required|string|min:4',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'map' => 'required',
            'description' => 'required|string|min:4',
            'keywords' => 'required|string|min:4',
            'logo' => 'image',
        ]);

        $request_data = $request->except(['image']);

        if ($request->logo) {
            if ($settings->logo != 'logo.png') {
                File::delete('uploads/logo/' . $settings->logo);
            } //end of inner if
            Image::make($request->logo)
                ->resize(230, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('uploads/logo/' . $request->logo->hashName(), 60);
            $request_data['logo'] = $request->logo->hashName();
        } //end of external if

        $settings->update($request_data);

        //session()->flash('success', __('admin.updated_successfully'));

        return redirect()->route('dashboard.welcome')->with('success',__('admin.updated_successfully'));
    } // End of Update

}
