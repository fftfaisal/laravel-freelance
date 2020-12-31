<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile',['user'=>auth()->user()]);
    }

    public function store(Request $request, User $user)
    {
        $user_id = Auth::user()->id;
        if ( $user_id ) {
            $data = $request->validate([
                'name' => 'required|string|max:20',
                'email' => 'required|string|email|unique:users,email,'. $user_id,
                'phone' => 'required|numeric|digits:11|unique:users,phone,'. $user_id .'|starts_with:013,014,015,016,017,018,019'
            ]);
            $user->where('id' ,$user_id)
                ->update($data);
            Session()->flash('message', 'User successfully updated');
        }

        return redirect()-> back();
    }

    public function password(Request $request, User $user)
    {
        $user_id = Auth::user()->id;
        if ( $user_id ) {
            $data = $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|different:current_password',
            ]);
            
            if( !Hash::check($data['current_password'], Auth::user()->password ) ) {
                return redirect()->back()->withErrors(['same_password' => 'Current password is invalid']);
            } else {
                $pass = Hash::make($data['new_password']);
                $user->where('id' ,$user_id)->update([ 'password' => $pass ]);
                Session()->flash('password_message', 'Password successfully updated');
            }

        }

        return redirect()-> back();
    }
}
