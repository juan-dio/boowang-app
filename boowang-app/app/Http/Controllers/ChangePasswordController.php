<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.password', [
            'page' => 'Change Password'
        ]);
    }
    
    public function change(Request $request)
    {
        $validatedRequest = $request->validate([
            'old_password' => 'required|min:8|max:255',
            'password' => 'required|min:8|max:255|confirmed'
        ]);

        if(!Hash::check($validatedRequest['old_password'], auth()->user()->password)){
            return back()->with("error", "Password lama tidak sesuai!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($validatedRequest['password'])
        ]);

        return redirect('/profil')->with("success", "Password berhasil diubah!");
    }
}
