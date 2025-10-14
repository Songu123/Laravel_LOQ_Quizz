<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    // show register form
    public function showRegister()
    {
        return view('auth.register');
    }

    // handle register
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','email','max:255', Rule::unique('users','email')],
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user); // tự động đăng nhập sau khi đăng ký

        return redirect()->route('home')->with('success', 'Đăng ký thành công!');
    }

    // show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->onlyInput('email');
    }

    // login for admin/teacher
    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            
            // TODO: Check if user is admin/teacher (role check)
            // For now, allow any user to login as admin
            // if ($user->role !== 'admin' && $user->role !== 'teacher') {
            //     Auth::logout();
            //     return back()->withErrors([
            //         'email' => 'Tài khoản không có quyền quản trị.',
            //     ])->onlyInput('email');
            // }
            
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->onlyInput('email');
    }

    // login for student
    public function loginStudent(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            
            // TODO: Check if user is student (role check)
            // For now, allow any user to login as student
            // if ($user->role !== 'student') {
            //     Auth::logout();
            //     return back()->withErrors([
            //         'email' => 'Tài khoản không phải học sinh/sinh viên.',
            //     ])->onlyInput('email');
            // }
            
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->onlyInput('email');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất.');
    }
}
