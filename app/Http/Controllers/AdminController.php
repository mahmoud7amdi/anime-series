<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Episodes;
use App\Models\Show;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $category = category::select()->count();
        $show = Show::select()->count();
        $episode = Episodes::select()->count();

        return view('admin.index',compact('category','show','episode'));
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id ;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }


    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('photo')){
            $file = $request->file('photo') ;
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename ;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Updated Successfully',
            'alert_type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password,auth::user()->password)){
            return back()->with("error","Old Password Doesn't Match");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status","Password Changed Successfully");
    }

}


