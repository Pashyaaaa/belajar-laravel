<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            "title" => "Register",
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>['required', 'max:255'],
            'username'=>['required', 'min:3', 'unique:users'],
            'email'=>['required', 'unique:users', 'email:rfc,dns'],
            'password'=>['required', 'min:5', 'max:255'],
        ]);

        User::create($validated);

        // $request->session()->flash('status', 'Registration succesfull! Now, please login');
        return redirect('/login')->with('status', 'Registration succesfull! Now, please login');
    }
}
