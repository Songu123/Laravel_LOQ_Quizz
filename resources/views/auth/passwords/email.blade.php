@extends('layouts.auth')

@section('auth-title', 'Quên mật khẩu?')
@section('auth-subtitle', 'Nhập địa chỉ email của bạn và chúng tôi sẽ gửi link đặt lại mật khẩu.')

@section('form-title', 'Đặt lại mật khẩu')
@section('form-subtitle', 'Nhập email để nhận link đặt lại mật khẩu')

@section('auth-content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}" class="auth-form">
    @csrf

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
                   value="{{ old('email') }}" 
                   required 
                   autofocus
                   placeholder="Nhập địa chỉ email của bạn">
        </div>
        @error('email')
            <div class="form-error mt-2">{{ $message }}</div>
        @enderror
        <small class="form-text text-muted d-block mt-2">
            <i class="bi bi-info-circle me-1"></i>
            Chúng tôi sẽ gửi link đặt lại mật khẩu đến email này
        </small>
    </div>

    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-send me-2"></i>
            Gửi link đặt lại mật khẩu
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
<div class="text-center">
    <p class="mb-2">Cần trợ giúp?</p>
    <div class="d-flex gap-3 justify-content-center">
        <a href="#" class="text-decoration-none small">
            <i class="bi bi-question-circle me-1"></i>Trợ giúp
        </a>
        <a href="#" class="text-decoration-none small">
            <i class="bi bi-envelope me-1"></i>Liên hệ
        </a>
    </div>
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
