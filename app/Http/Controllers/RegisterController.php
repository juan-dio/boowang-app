<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function customer()
    {
        return view('auth.register', [
            'page' => 'Registrasi',
            'for' => 'customer'
        ]);
    }
    
    public function admin()
    {
        return view('auth.register', [
            'page' => 'Registrasi',
            'for' => 'admin'
        ]);
    }

    public function createCustomer(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255|confirmed'
        ]);

        $validatedRequest['password'] = Hash::make($validatedRequest['password']);

        User::create($validatedRequest);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan Login');
    }

    public function createAdmin(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedRequest['password'] = Hash::make($validatedRequest['password']);
        $validatedRequest['is_admin'] = true;

        User::create($validatedRequest);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan Login');
    }
}
