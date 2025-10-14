@extends('layouts.app')

@section('title', 'Hồ sơ cá nhân')

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
                        <h2 class="mb-1"><i class="bi bi-person-circle me-2"></i>Hồ sơ cá nhân</h2>
                        <p class="text-muted mb-0">Quản lý thông tin tài khoản của bạn</p>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                        <i class="bi bi-pencil me-2"></i>Chỉnh sửa
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-4 mb-4">
                <!-- Avatar Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center p-4">
                        <div class="avatar-wrapper mb-3">
                            @if($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" class="avatar-img">
                            @else
                                <div class="avatar-placeholder">
                                    {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <h4 class="mb-1">{{ $user->name }}</h4>
                        <p class="text-muted mb-3">
                            @if(isset($user->role))
                                @if($user->role === 'admin')
                                    <span class="badge bg-danger">Quản trị viên</span>
                                @elseif($user->role === 'teacher')
                                    <span class="badge bg-info">Giảng viên</span>
                                @else
                                    <span class="badge bg-primary">Học viên</span>
                                @endif
                            @else
                                <span class="badge bg-primary">Học viên</span>
                            @endif
                        </p>
                        
                        <!-- Stats -->
                        <div class="row text-center border-top pt-3 mt-3">
                            <div class="col-4">
                                <div class="fw-bold text-primary fs-5">{{ rand(10, 50) }}</div>
                                <small class="text-muted">Bài thi</small>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold text-success fs-5">{{ rand(60, 95) }}%</div>
                                <small class="text-muted">Điểm TB</small>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold text-warning fs-5">#{{ rand(1, 100) }}</div>
                                <small class="text-muted">Hạng</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-speedometer2 me-2 text-primary"></i>Dashboard
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="bi bi-clock-history me-2 text-success"></i>Lịch sử làm bài
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="bi bi-trophy me-2 text-warning"></i>Thành tích
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="bi bi-gear me-2 text-secondary"></i>Cài đặt
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-lg-8">
                <!-- Personal Information -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Thông tin cá nhân</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">
                                <i class="bi bi-person me-2"></i>Họ và tên
                            </div>
                            <div class="col-md-8 fw-semibold">
                                {{ $user->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">
                                <i class="bi bi-envelope me-2"></i>Email
                            </div>
                            <div class="col-md-8 fw-semibold">
                                {{ $user->email }}
                                @if($user->email_verified_at)
                                    <span class="badge bg-success ms-2">
                                        <i class="bi bi-check-circle"></i> Đã xác thực
                                    </span>
                                @else
                                    <span class="badge bg-warning ms-2">
                                        <i class="bi bi-exclamation-circle"></i> Chưa xác thực
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">
                                <i class="bi bi-telephone me-2"></i>Số điện thoại
                            </div>
                            <div class="col-md-8 fw-semibold">
                                {{ $user->phone ?? 'Chưa cập nhật' }}
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">
                                <i class="bi bi-geo-alt me-2"></i>Địa chỉ
                            </div>
                            <div class="col-md-8 fw-semibold">
                                {{ $user->address ?? 'Chưa cập nhật' }}
                            </div>
                        </div>
                        @if($user->bio)
                        <hr>
                        <div class="row">
                            <div class="col-md-4 text-muted">
                                <i class="bi bi-chat-left-quote me-2"></i>Giới thiệu
                            </div>
                            <div class="col-md-8">
                                {{ $user->bio }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Account Information -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="bi bi-shield-lock me-2"></i>Thông tin tài khoản</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">
                                <i class="bi bi-key me-2"></i>Phương thức đăng nhập
                            </div>
                            <div class="col-md-8 fw-semibold">
                                @if($user->provider === 'google')
                                    <span class="badge bg-danger">
                                        <i class="bi bi-google"></i> Google
                                    </span>
                                @else
                                    <span class="badge bg-primary">
                                        <i class="bi bi-envelope"></i> Email & Password
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">
                                <i class="bi bi-calendar-check me-2"></i>Ngày tham gia
                            </div>
                            <div class="col-md-8 fw-semibold">
                                {{ $user->created_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 text-muted">
                                <i class="bi bi-clock-history me-2"></i>Cập nhật lần cuối
                            </div>
                            <div class="col-md-8 fw-semibold">
                                {{ $user->updated_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="bi bi-activity me-2"></i>Hoạt động gần đây</h5>
                    </div>
                    <div class="card-body">
                        <div class="activity-timeline">
                            @for($i = 1; $i <= 5; $i++)
                            <div class="activity-item">
                                <div class="activity-icon bg-primary bg-opacity-10">
                                    <i class="bi bi-check-circle text-primary"></i>
                                </div>
                                <div class="activity-content">
                                    <div class="fw-semibold">Hoàn thành bài thi {{ $i }}</div>
                                    <small class="text-muted">Điểm: {{ rand(70, 100) }}/100</small>
                                    <div><small class="text-muted">{{ rand(1, 30) }} ngày trước</small></div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
