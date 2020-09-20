<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_admins'])->only('index');
        $this->middleware(['permission:create_admins'])->only('create');
        $this->middleware(['permission:update_admins'])->only('edit');
        $this->middleware(['permission:delete_admins'])->only('destroy');
    } //end of constructor


    // Index
    public function index(Request $request)
    {
        $users = User::whereRoleIs('admin')->latest()->get();
        return view('dashboard.admins.index', compact('users'));
    } // End of Index


    // Create User
    public function create()
    {
        return view('dashboard.admins.create');
    } // End of Create User


    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'image' => 'image',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1',
        ]);

        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);

        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('uploads/admins_images/' . $request->image->hashName(), 60,);
            $request_data['image'] = $request->image->hashName();
        } //end of if

        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        return redirect()->route('dashboard.admins.index')->with('success',__('admin.added_successfully'));
    } // End of Store


    // Edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.admins.edit', compact('user'));
    } // End of Edit


    // Update
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'image' => 'image',
            'email' => ['required', Rule::unique('users')->ignore($user->id), 'email'],
            'permissions' => 'required|min:1',
        ]);

        $request_data = $request->except(['permissions', 'image']);

        if ($request->image) {
            if ($user->image != 'avatar.png') {
                File::delete('uploads/admins_images/' . $user->image);
            } //end of inner if
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('uploads/admins_images/' . $request->image->hashName(), 60);
            $request_data['image'] = $request->image->hashName();
        } //end of external if

        $user->update($request_data);
        $user->syncPermissions($request->permissions);

        return redirect()->route('dashboard.admins.index')->with('success',__('admin.updated_successfully'));

    } // End of Update


    // Delete
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image != 'avatar.png') {
            File::delete('uploads/admins_images/' . $user->image);
        } //end of if

        $user->delete();
        return redirect()->route('dashboard.admins.index')->with('success',__('admin.deleted_successfully'));
    } // End of Delete


}
