<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view("auth.signup");
    }

    public function store(Request $request)
    {
        
        
        $validated = $request->validate([
            "first_name" => ["required", "max:255"],
            "last_name" => ["required", "max: 255"],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => ["required", Password::min(6)->numbers()->letters()->symbols(), "confirmed"]
        ]);
        
        $user = User::create([
            "name" => $validated["first_name"] . " " . $validated["last_name"],
            "email" => $validated["email"],
            "password" => $validated["password"],
        ]);
        Auth::login($user);
        return redirect("/");
    }
}
