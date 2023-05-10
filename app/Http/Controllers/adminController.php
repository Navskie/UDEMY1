<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class adminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // alert
        $notification = array(
            'message' => 'You have been logout successfully',
            'alert-type' => 'success',
        );

        return redirect('/')->with($notification);
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

        // alert
        $notification = array(
            'message' => 'Information has been updated successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('admin.profile')->with($notification);

    }//END METHOD

    public function changePassword() {
        return view('admin.admin_change_password');
    }//END METHOD

    public function updatePassword(Request $request) {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');

            return redirect()->back();
        } else {
            session()->flash('message','Old Password Error');

            return redirect()->back();
        }
    } // END METHOD
}
