<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use App\Models\User;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function step1()
    {
        return view('auth.register.step1');
    }

    public function step1Store(RegisterStep1Request $request)
    {
        session([
            'register.name' => $request->name,
            'register.email' => $request->email,
            'register.password' => $request->password,
        ]);
        return redirect()->route('register.step2');
    }
    
    public function step2()
    {
        return view('auth.register.step2');
    }

    public function store(RegisterStep2Request $request)
    {
        $user = User::create([
            'name' => session('register.name'),
            'email' => session('register.email'),
            'password' => Hash::make(session('register.password')),
        ]);
        
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);
        
        session()->forget([
            'register.name',
            'register.email',
            'register.password',
        ]);

        return redirect()->route('login');
    }
}    
