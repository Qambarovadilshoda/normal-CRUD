<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateProfileRequest;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }
    public function handleRegister(StoreRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        $image = $request->file('image');
        $imagePath = time() . '.' . $image->getClientOriginalExtension();
        $uploadedImage = $image->storeAs('images', $imagePath, 'public');
        $user->image()->create([
            'url' => $uploadedImage,
        ]);
        Auth::login($user);
        return redirect()->route('posts.index');
    }
    public function loginForm()
    {
        return view('auth.login');
    }

    public function handleLogin(StoreLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect()->route('posts.index');
        }
        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginForm');
    }
    public function editProfile()  {
        
        return view('auth.edit');
    }
    public function updateProfile(UpdateProfileRequest $request, $id) {
        $user = User::findOrFail($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        if ($request->hasFile('image')) {
            if ($user->image && $user->image->url) {
                @unlink(storage_path('app/public/' . $user->image->url));
            }
    
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $uploadedImage = $image->storeAs('images', $fileName, 'public');
            $user->image()->update([
                'url' => $uploadedImage
            ]);
        }
    
        return redirect()->route('dashboard');
    }
    
    public function dashboard(){
        return view('auth.dashboard');
    }
}
