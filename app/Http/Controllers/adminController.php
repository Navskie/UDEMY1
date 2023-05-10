<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class adminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile() {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.profile',compact('adminData'));
    }//END METHOD

    public function editProfile() {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.edit-profile',compact('editData'));
    }//END METHOD

    public function storeProfile(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->file('image')) {

            $file = $request->file('image');

            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_img'),$fileName);

            $data['profile'] = $fileName;
        }

        $data->save();

        return redirect()->route('admin.profile');

    }//END METHOD
}
