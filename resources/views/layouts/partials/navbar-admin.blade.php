<nav class="navbar navbar-expand-lg navbar-dark bg-gradient shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container-fluid px-4">
        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-shield-check me-2"></i>
            LOQ Admin
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
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                       href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-file-earmark-text me-1"></i>
                        Quản lý đề thi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-plus-circle me-2"></i>Tạo đề thi mới</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-list-ul me-2"></i>Danh sách đề thi</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-question-circle me-2"></i>Ngân hàng câu hỏi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-folder me-2"></i>Danh mục</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-people me-1"></i>
                        Người dùng
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-plus me-2"></i>Thêm người dùng</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i>Danh sách học viên</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-badge me-2"></i>Giảng viên</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-key me-2"></i>Phân quyền</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-graph-up me-1"></i>
                        Báo cáo & Thống kê
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-bar-chart me-2"></i>Thống kê tổng quan</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-graph-up-arrow me-2"></i>Kết quả học viên</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-clipboard-data me-2"></i>Phân tích chi tiết</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-download me-2"></i>Xuất báo cáo</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-gear me-1"></i>
                        Cài đặt hệ thống
                    </a>
                </li>
            </ul>

            <!-- Right Navigation -->
            <ul class="navbar-nav">
                <!-- Quick Actions -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" title="Thao tác nhanh">
                        <i class="bi bi-plus-circle fs-5"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 250px;">
                        <li><h6 class="dropdown-header">Thao tác nhanh</h6></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-file-earmark-plus me-2 text-primary"></i>
                                Tạo đề thi mới
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-question-circle me-2 text-success"></i>
                                Thêm câu hỏi
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-person-plus me-2 text-info"></i>
                                Thêm học viên
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            {{ rand(0, 9) }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 350px;">
                        <li>
                            <h6 class="dropdown-header d-flex justify-content-between align-items-center">
                                <span>Thông báo mới</span>
                                <span class="badge bg-danger rounded-pill">{{ rand(0, 9) }}</span>
                            </h6>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-file-earmark-check text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-semibold">Bài thi mới cần duyệt</div>
                                        <small class="text-muted">Có {{ rand(3, 10) }} bài thi đang chờ phê duyệt</small>
                                        <div><small class="text-muted">{{ rand(5, 30) }} phút trước</small></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-people text-success"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-semibold">Học viên mới đăng ký</div>
                                        <small class="text-muted">{{ rand(5, 20) }} học viên mới trong tuần này</small>
                                        <div><small class="text-muted">{{ rand(1, 3) }} giờ trước</small></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-exclamation-triangle text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-semibold">Cảnh báo hệ thống</div>
                                        <small class="text-muted">Cần cập nhật dữ liệu sao lưu</small>
                                        <div><small class="text-muted">1 ngày trước</small></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center text-primary fw-semibold py-2" href="#">Xem tất cả thông báo</a></li>
                    </ul>
                </li>

                <!-- User Menu -->
                <li class="nav-item dropdown ms-2">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <div class="rounded-circle bg-white d-flex align-items-center justify-content-center text-primary me-2" 
                             style="width: 36px; height: 36px; font-size: 15px; font-weight: 700;">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="d-none d-lg-block">
                            <div class="fw-semibold" style="line-height: 1.2;">{{ Auth::user()->name ?? 'Admin' }}</div>
                            <small class="opacity-75">Quản trị viên</small>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 280px;">
                        <li class="px-3 py-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white" 
                                     style="width: 50px; height: 50px; font-size: 20px; font-weight: 700;">
                                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                                </div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{ Auth::user()->name ?? 'Admin' }}</div>
                                    <small class="text-muted">{{ Auth::user()->email ?? 'admin@example.com' }}</small>
                                    <div><span class="badge bg-primary mt-1">Quản trị viên</span></div>
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
                                <i class="bi bi-shield-check me-2 text-success"></i>
                                Bảo mật & Quyền riêng tư
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-palette me-2 text-info"></i>
                                Tùy chỉnh giao diện
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-gear me-2 text-secondary"></i>
                                Cài đặt tài khoản
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('home') }}">
                                <i class="bi bi-box-arrow-up-right me-2 text-primary"></i>
                                Xem trang học viên
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-question-circle me-2 text-info"></i>
                                Trợ giúp & Tài liệu
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
/* Admin Navbar Styles */
.navbar-dark .nav-link {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
    transition: all 0.3s ease;
}

.navbar-dark .nav-link:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 6px;
}

.navbar-dark .nav-link.active {
    color: #fff;
    font-weight: 600;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 6px;
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
