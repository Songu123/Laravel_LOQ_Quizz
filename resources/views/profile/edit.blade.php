@extends('layouts.app')

@section('title', 'Chỉnh sửa hồ sơ')

@push('styles')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="profile-page">
    <div class="container py-5">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1"><i class="bi bi-pencil-square me-2"></i>Chỉnh sửa hồ sơ</h2>
                        <p class="text-muted mb-0">Cập nhật thông tin cá nhân của bạn</p>
                    </div>
                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Quay lại
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-4 mb-4">
                <!-- Avatar Upload Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center p-4">
                        <h5 class="mb-3">Ảnh đại diện</h5>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="avatarForm">
                            @csrf
                            @method('PUT')
                            
                            <div class="avatar-wrapper mb-3">
                                @if($user->avatar)
                                    <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" class="avatar-img" id="avatarPreview">
                                @else
                                    <div class="avatar-placeholder" id="avatarPlaceholder">
                                        {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <img src="" alt="Avatar" class="avatar-img d-none" id="avatarPreview">
                                @endif
                            </div>

                            <input type="file" name="avatar" id="avatarInput" class="d-none" accept="image/*">
                            <input type="hidden" name="name" value="{{ $user->name }}">
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            
                            <button type="button" class="btn btn-primary btn-sm w-100 mb-2" onclick="document.getElementById('avatarInput').click()">
                                <i class="bi bi-cloud-upload me-2"></i>Tải ảnh lên
                            </button>
                            
                            @if($user->avatar)
                            <form action="{{ route('profile.avatar.delete') }}" method="POST" class="d-inline w-100">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Bạn có chắc muốn xóa ảnh đại diện?')">
                                    <i class="bi bi-trash me-2"></i>Xóa ảnh
                                </button>
                            </form>
                            @endif
                        </form>
                        <small class="text-muted d-block mt-2">JPG, PNG hoặc GIF. Tối đa 2MB</small>
                    </div>
                </div>

                <!-- Security Info -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="mb-3"><i class="bi bi-shield-check me-2"></i>Bảo mật</h6>
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Sử dụng mật khẩu mạnh
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Xác thực email của bạn
                            </li>
                            <li>
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                Không chia sẻ thông tin cá nhân
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-lg-8">
                <!-- Personal Information Form -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="bi bi-person me-2"></i>Thông tin cá nhân</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label fw-semibold">Họ và tên <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($user->provider === 'google')
                                        <small class="text-muted">Email từ Google, không thể thay đổi</small>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label fw-semibold">Số điện thoại</label>
                                <div class="col-md-9">
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                           value="{{ old('phone', $user->phone) }}" placeholder="0123456789">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label fw-semibold">Địa chỉ</label>
                                <div class="col-md-9">
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" 
                                           value="{{ old('address', $user->address) }}" placeholder="123 Đường ABC, Quận XYZ">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label fw-semibold">Giới thiệu</label>
                                <div class="col-md-9">
                                    <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" 
                                              rows="4" placeholder="Viết vài dòng về bản thân...">{{ old('bio', $user->bio) }}</textarea>
                                    @error('bio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Tối đa 500 ký tự</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Lưu thay đổi
                                    </button>
                                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary ms-2">
                                        Hủy
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Change Password Form -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="bi bi-key me-2"></i>
                            @if($user->provider === 'google' && !$user->password)
                                Đặt mật khẩu
                            @else
                                Đổi mật khẩu
                            @endif
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($user->provider === 'google' && !$user->password)
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i>
                                Bạn đang đăng nhập bằng Google. Đặt mật khẩu để có thể đăng nhập bằng email.
                            </div>
                        @endif

                        <form action="{{ route('profile.password.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            @if($user->provider !== 'google' || $user->password)
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label fw-semibold">Mật khẩu hiện tại <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endif

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label fw-semibold">Mật khẩu mới <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                                    @error('new_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Tối thiểu 8 ký tự</small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label fw-semibold">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="password" name="new_password_confirmation" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-shield-check me-2"></i>
                                        @if($user->provider === 'google' && !$user->password)
                                            Đặt mật khẩu
                                        @else
                                            Đổi mật khẩu
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Preview avatar before upload
document.getElementById('avatarInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('avatarPreview');
            const placeholder = document.getElementById('avatarPlaceholder');
            
            preview.src = e.target.result;
            preview.classList.remove('d-none');
            if (placeholder) {
                placeholder.classList.add('d-none');
            }
        }
        reader.readAsDataURL(file);
        
        // Auto submit form to upload avatar
        setTimeout(() => {
            document.getElementById('avatarForm').submit();
        }, 500);
    }
});
</script>
@endsection
