<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    // Redirect người dùng tới Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Xử lý callback từ Google
    public function handleGoogleCallback()
    {
        try {
            // Try normal flow first
            $googleUser = Socialite::driver('google')->user();
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            // In local/dev environments, session/cookie or port mismatches can cause state errors.
            // Retry with stateless to allow login without relying on session state.
            try {
                /** @var \Laravel\Socialite\Two\GoogleProvider $provider */
                $provider = Socialite::driver('google');
                $googleUser = $provider->stateless()->user();
            } catch (\Exception $inner) {
                Log::warning('Google OAuth stateless fallback failed', [
                    'error' => $inner->getMessage(),
                ]);
                return redirect()->route('login')->withErrors(['oauth' => 'Không thể đăng nhập bằng Google (state mismatch).']);
            }
        } catch (\Exception $e) {
            Log::error('Google OAuth failed', [
                'error' => $e->getMessage(),
            ]);
            return redirect()->route('login')->withErrors(['oauth' => 'Không thể đăng nhập bằng Google.']);
        }

        // $googleUser có: id, name, email, avatar, token, etc.
        $user = User::where('provider', 'google')
                    ->where('provider_id', $googleUser->getId())
                    ->first();

        if (!$user) {
            // Nếu chưa có user theo provider_id, thử tìm theo email
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Nếu có user cùng email, gắn provider info
                $user->update([
                    'provider' => 'google',
                    'provider_id' => $googleUser->getId(),
                ]);
            } else {
                // Tạo user mới
                $user = User::create([
                    'name' => $googleUser->getName() ?? $googleUser->getNickname() ?? 'User',
                    'email' => $googleUser->getEmail(),
                    // Mật khẩu random (người dùng có thể reset sau)
                    'password' => Hash::make(Str::random(16)),
                    'provider' => 'google',
                    'provider_id' => $googleUser->getId(),
                    // nếu dùng email verification, bạn có thể đánh dấu verified
                    'email_verified_at' => now(),
                ]);
            }
        }

        // Đăng nhập
        Auth::login($user, true);

        // TODO: Uncomment khi đã thêm cột role vào bảng users
        // if ($user->role !== 'admin' && $user->role !== 'teacher') {
        //     Auth::logout();
        //     return redirect()->route('login')->withErrors([
        //         'email' => 'Tài khoản không có quyền quản trị.',
        //     ]);
        // }

        // Redirect dựa trên role (nếu có)
        if (isset($user->role) && ($user->role === 'admin' || $user->role === 'teacher')) {
            return redirect()->intended('/admin/dashboard');
        }

        // Mặc định redirect đến student dashboard
        return redirect()->intended('/dashboard');
    }
}
