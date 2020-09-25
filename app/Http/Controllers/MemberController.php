<?php

namespace App\Http\Controllers;

use App\Models\DesignDep;
use App\Models\Member;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:member');
    }

    public function show($id)
    {

        $settings = Setting::first();

        $all_departments = DesignDep::where('parent', null)->get();

        if (Auth::guard('member')->user()->id == $id) {
            $member = Member::findOrFail($id);

            return view('website.userProfile', compact('member', 'settings', 'all_departments'));
        }
        else{
            return redirect()->back();
        }
    }

    public function edit($id)
    {

        $settings = Setting::first();

        $all_departments = DesignDep::where('parent', null)->get();

        if (Auth::guard('member')->user()->id == $id) {
            $member = Member::findOrFail($id);

            return view('website.editProfile', compact('member', 'settings', 'all_departments'));
        }
        else{
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {       

        if (Auth::guard('member')->user()->id == $id) {
            $member = Member::findOrFail($id);

            $request->validate([
                'name' => 'required',
                'email' => ['required', Rule::unique('members')->ignore($member->id), 'email'],
            ]);

            $member->name = $request->name;
            $member->email = $request->email;
            $member->about = $request->about;
            $member->style = $request->style;
            $member->save();


            return redirect()->back()->with('success',__('admin.updated_successfully'));
        }
        else{
            return redirect()->back();
        }
    }

    public function updateContactInfo(Request $request, $id)
    {       

        if (Auth::guard('member')->user()->id == $id) {
            $member = Member::findOrFail($id);

            $request->validate([
                'city' => 'required',
                'country' => 'required',
                'phone' => 'required',
            ]);

            $member->city = $request->city;
            $member->country = $request->country;
            $member->phone = $request->phone;
            $member->save();

            return redirect()->back()->with('success',__('admin.updated_successfully'));
        }
        else{
            return redirect()->back();
        }
    }
    
}
