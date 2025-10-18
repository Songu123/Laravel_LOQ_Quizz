<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">
            <i class="bi bi-mortarboard-fill me-2"></i>
            LOQ Quiz
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Left Navigation -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                       href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i>
                        Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                       href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-file-earmark-text me-1"></i>
                        Bài thi của tôi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-clock-history me-1"></i>
                        Lịch sử
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-trophy me-1"></i>
                        Bảng xếp hạng
                    </a>
                </li>
            </ul>

            <!-- Right Navigation -->
            <ul class="navbar-nav">
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            {{ rand(0, 5) }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 320px;">
                        <li>
                            <h6 class="dropdown-header d-flex justify-content-between align-items-center">
                                <span>Thông báo</span>
                                <span class="badge bg-primary rounded-pill">{{ rand(0, 5) }}</span>
                            </h6>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        @for($i = 1; $i <= 3; $i++)
                        <li>
                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-check-circle text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-semibold">Bài thi mới có sẵn</div>
                                        <small class="text-muted">Đề thi Toán học - {{ $i }} đã được thêm</small>
                                        <div><small class="text-muted">{{ rand(1, 60) }} phút trước</small></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endfor
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center text-primary fw-semibold py-2" href="#">Xem tất cả thông báo</a></li>
                    </ul>
                </li>

                <!-- User Menu -->
                <li class="nav-item dropdown ms-2">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white me-2" 
                             style="width: 36px; height: 36px; font-size: 15px; font-weight: 600;">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </div>
                        <span class="d-none d-md-inline fw-semibold">{{ Auth::user()->name ?? 'User' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 250px;">
                        <li class="px-3 py-2">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white" 
                                     style="width: 48px; height: 48px; font-size: 18px; font-weight: 600;">
                                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                                </div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{ Auth::user()->name ?? 'User' }}</div>
                                    <small class="text-muted">{{ Auth::user()->email ?? 'user@example.com' }}</small>
                                </div>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('profile.show') }}">
                                <i class="bi bi-person me-2 text-primary"></i>
                                Hồ sơ cá nhân
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-clock-history me-2 text-success"></i>
                                Lịch sử làm bài
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-trophy me-2 text-warning"></i>
                                Thành tích
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-gear me-2 text-secondary"></i>
                                Cài đặt
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-question-circle me-2 text-info"></i>
                                Trợ giúp & Hỗ trợ
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger py-2 w-100">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Đăng xuất
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
/* Student Navbar Styles */
.navbar-light .nav-link {
    color: #495057;
    font-weight: 500;
    transition: all 0.3s ease;
}

.navbar-light .nav-link:hover {
    color: #667eea;
}

.navbar-light .nav-link.active {
    color: #667eea;
    font-weight: 600;
}

.dropdown-menu {
    border: none;
    border-radius: 12px;
}

.dropdown-item {
    transition: all 0.2s ease;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
    padding-left: 1.5rem;
}
</style>
