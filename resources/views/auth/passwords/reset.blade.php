@extends('layouts.auth')

@section('auth-title', 'Đặt lại mật khẩu')
@section('auth-subtitle', 'Nhập mật khẩu mới cho tài khoản của bạn.')

@section('form-title', 'Tạo mật khẩu mới')
@section('form-subtitle', 'Mật khẩu phải có ít nhất 8 ký tự')

@section('auth-content')
<form method="POST" action="{{ route('password.update') }}" class="auth-form">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="mb-3">
        <label for="email" class="form-label">Địa chỉ Email</label>
        <div class="input-group">
            <span class="input-group-text bg-white">
                <i class="bi bi-envelope"></i>
            </span>
            <input id="email" 
                   type="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   name="email" 
                   value="{{ $email ?? old('email') }}" 
                   required 
                   autofocus
                   placeholder="Nhập địa chỉ email của bạn">
        </div>
        @error('email')
            <div class="form-error mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu mới</label>
        <div class="input-group position-relative">
            <span class="input-group-text bg-white">
                <i class="bi bi-lock"></i>
            </span>
            <input id="password" 
                   type="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   name="password" 
                   required
                   placeholder="Nhập mật khẩu mới">
            <button type="button" 
                    class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3" 
                    id="togglePassword"
                    style="border: none; background: none; color: #6b7280; z-index: 10;">
                <i class="bi bi-eye" id="toggleIcon"></i>
            </button>
        </div>
        @error('password')
            <div class="form-error mt-2">{{ $message }}</div>
        @enderror
        <small class="form-text text-muted d-block mt-2">
            <i class="bi bi-info-circle me-1"></i>
            Tối thiểu 8 ký tự, bao gồm chữ hoa, chữ thường và số
        </small>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
        <div class="input-group position-relative">
            <span class="input-group-text bg-white">
                <i class="bi bi-lock-fill"></i>
            </span>
            <input id="password_confirmation" 
                   type="password" 
                   class="form-control" 
                   name="password_confirmation" 
                   required
                   placeholder="Nhập lại mật khẩu mới">
            <button type="button" 
                    class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3" 
                    id="togglePasswordConfirm"
                    style="border: none; background: none; color: #6b7280; z-index: 10;">
                <i class="bi bi-eye" id="toggleIconConfirm"></i>
            </button>
        </div>
    </div>

    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-shield-check me-2"></i>
            Đặt lại mật khẩu
        </button>
    </div>

    <div class="text-center">
        <a href="{{ route('login') }}" class="text-decoration-none d-inline-flex align-items-center">
            <i class="bi bi-arrow-left me-2"></i>
            Quay lại đăng nhập
        </a>
    </div>
</form>
@endsection

@section('auth-footer')
<div class="alert alert-info border-0 mb-0">
    <small>
        <i class="bi bi-shield-check me-2"></i>
        Link đặt lại mật khẩu sẽ hết hạn sau 60 phút
    </small>
</div>
@endsection

@push('styles')
<style>
.input-group-text {
    border-right: none;
}
.input-group .form-control {
    border-left: none;
}
.input-group .form-control:focus {
    border-left: none;
}
.input-group-text i {
    color: #667eea;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            toggleIcon.className = type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
        });
    }

    // Toggle password confirmation visibility
    const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
    const passwordConfirmation = document.getElementById('password_confirmation');
    const toggleIconConfirm = document.getElementById('toggleIconConfirm');
    
    if (togglePasswordConfirm) {
        togglePasswordConfirm.addEventListener('click', function() {
            const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirmation.setAttribute('type', type);
            toggleIconConfirm.className = type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
        });
    }
});
</script>
@endpush
