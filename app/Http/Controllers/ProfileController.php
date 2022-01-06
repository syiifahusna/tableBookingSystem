<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function updateName(Request $request, $id){
        $request->validate([
            'name'=> ['required','string','max:255'],
        ]);

        
        $profile = User::find($id);

        if($profile){
            $profile->name = $request->name;
            $profile->save();
            
            return redirect(route('home'))->with('success', 'Name Updated Successfuly');

        }else{
            return redirect(route('home'))->with('fail', 'Name Updated Failed');
        }
    }

    public function updateEmail(Request $request, $id){
        $request->validate([
            'email'=> ['required','string','max:255','email'],
        ]);

        
        $profile = User::find($id);

        if($profile){
            $profile->email = $request->email;
            $profile->email_verified_at = null;
            $profile->save();

            $profile->sendEmailVerificationNotification();

            return redirect(route('home'));

        }else{
            return redirect(route('home'))->with('fail', 'Email Updated Failed');
        }
    }

    public function updatePassword(Request $request, $id){
        $request->validate([
            'password'=> ['required','string','max:255'],
            'newPassword'=> ['required','string','max:255'],
        ]);

        
        $profile = User::find($id);

        if($profile){
            //if old password match
            $checkPassword = Hash::check($request->password, $profile->password);
            if($checkPassword){
                //make new password
                $newPassword = Hash::make($request->newPassword);
                $profile->password = $newPassword;
                $profile->save();

                return redirect(route('home'))->with('success', 'Password Updated Successfuly');

            }else{
                return redirect(route('home'))->with('fail', 'Password Updated Failed');
            }
        }else{
            return redirect(route('home'))->with('fail', 'Password Updated Failed');
        }
    }
}
