@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
@auth
    <!-- Logged In User Home -->
    <div class="user-home-wrapper">
        <!-- Hero Section for Logged In Users -->
        <section class="hero-section-logged">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="hero-content">
                            <div class="greeting-badge">
                                <i class="bi bi-emoji-smile"></i>
                                <span>{{ now()->format('H') < 12 ? 'Chào buổi sáng' : (now()->format('H') < 18 ? 'Chào buổi chiều' : 'Chào buổi tối') }}</span>
                            </div>
                            <h1 class="hero-title">Xin chào, {{ Auth::user()->name }}!</h1>
                            <p class="hero-subtitle">Sẵn sàng chinh phục những bài thi mới hôm nay chưa? Hãy cùng bắt đầu học tập và nâng cao kiến thức của bạn! 🚀</p>
                            <div class="hero-actions">
                                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Vào Dashboard
                                </a>
                                <a href="#available-exams" class="btn btn-outline-primary btn-lg">
                                    <i class="bi bi-file-earmark-text me-2"></i>
                                    Xem bài thi
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="hero-stats-card">
                            <h5>Thống kê của bạn</h5>
                            <div class="stat-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <strong>{{ rand(5, 25) }}</strong>
                                    <span>Bài thi đã hoàn thành</span>
                                </div>
                            </div>
                            <div class="stat-item">
                                <i class="bi bi-trophy text-warning"></i>
                                <div>
                                    <strong>{{ rand(70, 95) }}%</strong>
                                    <span>Điểm trung bình</span>
                                </div>
                            </div>
                            <div class="stat-item">
                                <i class="bi bi-clock-history text-info"></i>
                                <div>
                                    <strong>{{ rand(10, 50) }}h</strong>
                                    <span>Thời gian học tập</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Access Section -->
        <section class="quick-access-section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-3 col-sm-6">
                        <a href="{{ route('dashboard') }}" class="quick-access-card">
                            <div class="icon-wrapper bg-primary">
                                <i class="bi bi-speedometer2"></i>
                            </div>
                            <h5>Dashboard</h5>
                            <p>Xem tổng quan</p>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#" class="quick-access-card">
                            <div class="icon-wrapper bg-success">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <h5>Bài thi mới</h5>
                            <p>Làm bài thi</p>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#" class="quick-access-card">
                            <div class="icon-wrapper bg-info">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <h5>Lịch sử</h5>
                            <p>Xem kết quả</p>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#" class="quick-access-card">
                            <div class="icon-wrapper bg-warning">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <h5>Hồ sơ</h5>
                            <p>Cập nhật thông tin</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Available Exams Section -->
        <section class="available-exams-section" id="available-exams">
            <div class="container">
                <div class="section-header">
                    <h2>Bài thi có sẵn</h2>
                    <p>Chọn bài thi bạn muốn làm ngay bây giờ</p>
                </div>
                <div class="row g-4">
                    @for($i = 1; $i <= 6; $i++)
                    <div class="col-lg-4 col-md-6">
                        <div class="exam-card">
                            <div class="exam-badge">Mới</div>
                            <div class="exam-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <h4>Đề thi {{ $i }}: {{ ['Toán học', 'Vật lý', 'Hóa học', 'Sinh học', 'Lịch sử', 'Địa lý'][$i-1] }}</h4>
                            <div class="exam-meta">
                                <span><i class="bi bi-clock"></i> {{ rand(30, 90) }} phút</span>
                                <span><i class="bi bi-question-circle"></i> {{ rand(20, 50) }} câu</span>
                                <span><i class="bi bi-star"></i> {{ rand(3, 5) }}/5</span>
                            </div>
                            <p class="exam-description">Kiểm tra kiến thức {{ ['toán học cơ bản', 'vật lý lực', 'hóa học hữu cơ', 'sinh học tế bào', 'lịch sử Việt Nam', 'địa lý tự nhiên'][$i-1] }} với {{ rand(20, 50) }} câu hỏi</p>
                            <div class="exam-footer">
                                <button class="btn btn-primary w-100">
                                    <i class="bi bi-play-circle me-2"></i>Bắt đầu làm bài
                                </button>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>
@else
            <!-- Guest Home Page -->
    <div class="guest-home-wrapper">
        <!-- Hero Section -->
        <section class="hero-section-guest">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content">
                            <span class="hero-badge">
                                <i class="bi bi-stars me-2"></i>Nền tảng thi trắc nghiệm #1 Việt Nam
                            </span>
                            <h1 class="hero-title-guest">Nâng cao kiến thức với <span class="gradient-text">LOQ Quiz</span></h1>
                            <p class="hero-description">Hệ thống thi trắc nghiệm trực tuyến hiện đại, giúp bạn học tập hiệu quả và đạt kết quả cao nhất</p>
                            <div class="hero-actions">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Đăng nhập ngay
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-5">
                                    <i class="bi bi-person-plus me-2"></i>Đăng ký tài khoản
                                </a>
                            </div>
                            <div class="hero-stats">
                                <div class="stat-item-guest">
                                    <strong>5,000+</strong>
                                    <span>Học viên</span>
                                </div>
                                <div class="stat-item-guest">
                                    <strong>1,200+</strong>
                                    <span>Đề thi</span>
                                </div>
                                <div class="stat-item-guest">
                                    <strong>98%</strong>
                                    <span>Hài lòng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&h=600&fit=crop" alt="Students" class="img-fluid rounded-4 shadow-lg">
                            <div class="floating-card card-1">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span>Hoàn thành bài thi</span>
                            </div>
                            <div class="floating-card card-2">
                                <i class="bi bi-trophy-fill text-warning"></i>
                                <span>Điểm cao: 98/100</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <div class="container">
                <div class="section-header text-center">
                    <span class="section-badge">Tính năng</span>
                    <h2>Tại sao chọn LOQ Quiz?</h2>
                    <p>Những tính năng nổi bật giúp bạn học tập hiệu quả hơn</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card">
                            <div class="feature-icon bg-primary-soft">
                                <i class="bi bi-lightning-charge text-primary"></i>
                            </div>
                            <h4>Làm bài nhanh chóng</h4>
                            <p>Giao diện đơn giản, dễ sử dụng, giúp bạn tập trung vào việc học</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card">
                            <div class="feature-icon bg-success-soft">
                                <i class="bi bi-graph-up text-success"></i>
                            </div>
                            <h4>Theo dõi tiến độ</h4>
                            <p>Xem thống kê chi tiết về kết quả học tập của bạn</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card">
                            <div class="feature-icon bg-warning-soft">
                                <i class="bi bi-trophy text-warning"></i>
                            </div>
                            <h4>Bảng xếp hạng</h4>
                            <p>Cạnh tranh lành mạnh và tạo động lực học tập</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card">
                            <div class="feature-icon bg-info-soft">
                                <i class="bi bi-clock-history text-info"></i>
                            </div>
                            <h4>Lịch sử chi tiết</h4>
                            <p>Xem lại tất cả các bài thi đã làm và kết quả</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card">
                            <div class="feature-icon bg-danger-soft">
                                <i class="bi bi-shield-check text-danger"></i>
                            </div>
                            <h4>Bảo mật cao</h4>
                            <p>Dữ liệu của bạn được bảo vệ tuyệt đối</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card">
                            <div class="feature-icon bg-purple-soft">
                                <i class="bi bi-phone text-purple"></i>
                            </div>
                            <h4>Đa nền tảng</h4>
                            <p>Sử dụng trên mọi thiết bị: máy tính, tablet, điện thoại</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-card">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2>Sẵn sàng bắt đầu học tập?</h2>
                            <p>Tham gia cùng hàng ngàn học viên đang sử dụng LOQ Quiz để nâng cao kiến thức</p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5">
                                <i class="bi bi-rocket-takeoff me-2"></i>Bắt đầu ngay
                            </a>
                        </div>
                    </div>
                @else
                    <div class="d-flex gap-3 flex-wrap">
                        @if(Auth::user()->isStudent())
                            <a href="{{ route('student.dashboard') }}" class="btn btn-light btn-lg">
                                <i class="bi bi-speedometer2 me-2"></i>
                                Dashboard của tôi
                            </a>
                        @elseif(Auth::user()->isTeacher())
                            <a href="{{ route('teacher.dashboard') }}" class="btn btn-light btn-lg">
                                <i class="bi bi-speedometer2 me-2"></i>
                                Dashboard Giáo viên
                            </a>
                        @else
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-lg">
                                <i class="bi bi-speedometer2 me-2"></i>
                                Dashboard Admin
                            </a>
                        @endif
                    </div>
                @endguest
            </div>
            
            <div class="col-lg-4 d-none d-lg-block text-center">
                <i class="bi bi-file-earmark-text display-1"></i>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="container mb-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon text-primary">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <h3 class="fw-bold mb-1">{{ $stats['total_exams'] }}</h3>
                <p class="text-muted mb-0">Đề thi</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon text-success">
                    <i class="bi bi-folder-fill"></i>
                </div>
                <h3 class="fw-bold mb-1">{{ $stats['total_categories'] }}</h3>
                <p class="text-muted mb-0">Danh mục</p>
            </div>
        </section>
    </div>
@endauth
@endsection

@push('scripts')
<script>
function showLoginPrompt() {
    if (confirm('Bạn cần đăng nhập để tham gia thi. Đăng nhập ngay?')) {
        window.location.href = '{{ route('login.student') }}';
    }
}
</script>
@endpush
