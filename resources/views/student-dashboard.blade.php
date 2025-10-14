@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/student-dashboard.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="student-dashboard-wrapper">
    <!-- Dashboard Header -->
    <section class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="dashboard-title">
                        <i class="bi bi-speedometer2 me-2"></i>Dashboard
                    </h1>
                    <p class="dashboard-subtitle">
                        Chào mừng trở lại, <strong>{{ Auth::user()->name }}</strong>! 
                        <span class="text-muted">{{ now()->format('l, d/m/Y') }}</span>
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">
                        <i class="bi bi-house me-2"></i>Về trang chủ
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Overview -->
    <section class="stats-overview">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card stat-primary">
                        <div class="stat-icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <div class="stat-content">
                            <h3>{{ rand(5, 25) }}</h3>
                            <p>Bài thi đã hoàn thành</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card stat-success">
                        <div class="stat-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="stat-content">
                            <h3>{{ rand(70, 95) }}%</h3>
                            <p>Điểm trung bình</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card stat-warning">
                        <div class="stat-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="stat-content">
                            <h3>{{ rand(10, 50) }}h</h3>
                            <p>Thời gian học tập</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card stat-info">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="stat-content">
                            <h3>#{{ rand(1, 100) }}</h3>
                            <p>Xếp hạng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="dashboard-content">
        <div class="container">
            <div class="row g-4">
                <!-- Left Column - Exams -->
                <div class="col-lg-8">
                    <!-- Available Exams -->
                    <div class="content-card">
                        <div class="card-header-custom">
                            <h3>
                                <i class="bi bi-file-earmark-text me-2"></i>
                                Bài thi có sẵn
                            </h3>
                            <div class="header-actions">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-funnel me-1"></i>Lọc
                                </button>
                            </div>
                        </div>
                        <div class="exam-list">
                            @php
                                $subjects = ['Toán học', 'Vật lý', 'Hóa học', 'Sinh học', 'Lịch sử', 'Địa lý'];
                                $difficulties = ['Dễ', 'Trung bình', 'Khó'];
                                $difficultyColors = ['success', 'warning', 'danger'];
                            @endphp
                            @for($i = 1; $i <= 6; $i++)
                                @php
                                    $difficulty = rand(0, 2);
                                    $subject = $subjects[($i - 1) % 6];
                                @endphp
                                <div class="exam-item">
                                    <div class="exam-item-header">
                                        <div class="exam-subject-badge">{{ $subject }}</div>
                                        <span class="exam-difficulty badge bg-{{ $difficultyColors[$difficulty] }}">
                                            {{ $difficulties[$difficulty] }}
                                        </span>
                                    </div>
                                    <h4 class="exam-item-title">Đề thi {{ $subject }} - Đề {{ $i }}</h4>
                                    <div class="exam-item-meta">
                                        <span>
                                            <i class="bi bi-clock"></i>
                                            {{ rand(30, 90) }} phút
                                        </span>
                                        <span>
                                            <i class="bi bi-question-circle"></i>
                                            {{ rand(20, 50) }} câu hỏi
                                        </span>
                                        <span>
                                            <i class="bi bi-people"></i>
                                            {{ rand(50, 500) }} người đã làm
                                        </span>
                                    </div>
                                    <div class="exam-item-footer">
                                        <button class="btn btn-primary btn-take-exam">
                                            <i class="bi bi-play-circle me-2"></i>Bắt đầu làm bài
                                        </button>
                                        <button class="btn btn-outline-secondary" title="Xem chi tiết">
                                            <i class="bi bi-info-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="content-card mt-4">
                        <div class="card-header-custom">
                            <h3>
                                <i class="bi bi-clock-history me-2"></i>
                                Lịch sử làm bài
                            </h3>
                        </div>
                        <div class="activity-list">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h5>{{ $subjects[($i - 1) % 6] }} - Đề {{ $i }}</h5>
                                        <p>Điểm: <strong>{{ rand(70, 100) }}/100</strong> • {{ rand(1, 7) }} ngày trước</p>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Right Column - Sidebar -->
                <div class="col-lg-4">
                    <!-- Quick Actions -->
                    <div class="content-card">
                        <div class="card-header-custom">
                            <h3>
                                <i class="bi bi-lightning-charge me-2"></i>
                                Thao tác nhanh
                            </h3>
                        </div>
                        <div class="quick-actions-list">
                            <a href="#" class="quick-action-item">
                                <div class="quick-action-icon bg-primary">
                                    <i class="bi bi-play-circle"></i>
                                </div>
                                <div class="quick-action-content">
                                    <h5>Làm bài ngẫu nhiên</h5>
                                    <p>Thử thách kiến thức</p>
                                </div>
                            </a>
                            <a href="#" class="quick-action-item">
                                <div class="quick-action-icon bg-success">
                                    <i class="bi bi-journal-bookmark"></i>
                                </div>
                                <div class="quick-action-content">
                                    <h5>Xem lịch sử</h5>
                                    <p>Bài thi đã làm</p>
                                </div>
                            </a>
                            <a href="#" class="quick-action-item">
                                <div class="quick-action-icon bg-warning">
                                    <i class="bi bi-trophy"></i>
                                </div>
                                <div class="quick-action-content">
                                    <h5>Bảng xếp hạng</h5>
                                    <p>Vị trí của bạn</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Progress Chart -->
                    <div class="content-card mt-4">
                        <div class="card-header-custom">
                            <h3>
                                <i class="bi bi-graph-up me-2"></i>
                                Tiến độ học tập
                            </h3>
                        </div>
                        <div class="progress-chart">
                            @foreach($subjects as $index => $subject)
                            <div class="progress-item">
                                <div class="progress-header">
                                    <span>{{ $subject }}</span>
                                    <strong>{{ rand(70, 95) }}%</strong>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-{{ ['primary', 'success', 'info', 'warning', 'danger', 'secondary'][$index] }}" style="width: {{ rand(70, 95) }}%"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Leaderboard -->
                    <div class="content-card mt-4">
                        <div class="card-header-custom">
                            <h3>
                                <i class="bi bi-trophy me-2"></i>
                                Top 5 tuần này
                            </h3>
                        </div>
                        <div class="leaderboard-list">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="leaderboard-item">
                                    <div class="leaderboard-rank rank-{{ $i }}">
                                        @if($i <= 3)
                                            <i class="bi bi-trophy-fill"></i>
                                        @else
                                            {{ $i }}
                                        @endif
                                    </div>
                                    <div class="leaderboard-avatar">
                                        <img src="https://ui-avatars.com/api/?name=User+{{ $i }}&background=random" alt="User">
                                    </div>
                                    <div class="leaderboard-info">
                                        <h5>Người dùng {{ $i }}</h5>
                                        <p>{{ rand(850, 1000) }} điểm</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Take exam button handler
    document.querySelectorAll('.btn-take-exam').forEach(button => {
        button.addEventListener('click', function() {
            alert('Chức năng đang được phát triển');
        });
    });
});
</script>
@endpush
