# Giao diện mới cho LOQ Quiz System

## Tổng quan

Hệ thống đã được thiết kế lại với giao diện hiện đại, thân thiện và dễ sử dụng cho cả học sinh và giảng viên.

## Các trang đã được thiết kế lại

### 1. Trang Home (`/home`)

#### Cho người dùng đã đăng nhập:
- **Hero Section** với thông tin chào mừng cá nhân hóa
- **Quick Access Cards** để truy cập nhanh vào các chức năng chính
  - Dashboard
  - Bài thi mới
  - Lịch sử
  - Hồ sơ
- **Available Exams** hiển thị các bài thi có sẵn với:
  - Tên môn học
  - Thời gian làm bài
  - Số câu hỏi
  - Đánh giá
  - Nút bắt đầu làm bài

#### Cho khách (chưa đăng nhập):
- **Hero Section** với giới thiệu hệ thống
- **Features Section** với 6 tính năng nổi bật:
  - Làm bài nhanh chóng
  - Theo dõi tiến độ
  - Bảng xếp hạng
  - Lịch sử chi tiết
  - Bảo mật cao
  - Đa nền tảng
- **CTA Section** khuyến khích đăng ký/đăng nhập

### 2. Dashboard cho Học sinh (`/dashboard`)

Dashboard mới với layout 2 cột:

#### Cột trái (8/12):
- **Bài thi có sẵn**:
  - Card hiển thị thông tin đầy đủ
  - Badge môn học và độ khó
  - Metadata (thời gian, số câu, người làm)
  - Nút bắt đầu làm bài nổi bật
  - Nút xem chi tiết
- **Lịch sử làm bài**:
  - 5 bài thi gần nhất
  - Điểm số và thời gian
  - Nút xem chi tiết kết quả

#### Cột phải (4/12):
- **Thao tác nhanh**:
  - Làm bài ngẫu nhiên
  - Xem lịch sử
  - Bảng xếp hạng
- **Tiến độ học tập**:
  - Progress bars cho từng môn học
  - Phần trăm hoàn thành
- **Top 5 tuần này**:
  - Bảng xếp hạng mini
  - Avatar và điểm số
  - Badge vàng/bạc/đồng cho top 3

#### Stats Overview (4 cards):
- Bài thi đã hoàn thành
- Điểm trung bình
- Thời gian học tập
- Xếp hạng hiện tại

## File CSS

### 1. `public/css/home.css`
CSS cho trang home với:
- Logged in user styles
- Guest user styles
- Hero sections
- Feature cards
- Exam cards
- Quick access cards
- CTA section
- Responsive breakpoints

### 2. `public/css/student-dashboard.css`
CSS cho dashboard học sinh với:
- Dashboard header
- Stats cards
- Exam list và exam items
- Activity history
- Quick actions
- Progress charts
- Leaderboard
- Responsive design

## Responsive Design

Tất cả các trang đều được tối ưu cho:
- **Desktop**: > 991px
- **Tablet**: 768px - 991px
- **Mobile**: < 768px

## Routes

```php
// Trang chủ
GET /home -> home.blade.php

// Dashboard học sinh
GET /dashboard -> student-dashboard.blade.php (auth required)

// Dashboard admin (giữ nguyên dashboard cũ)
GET /admin/dashboard -> dashboard.blade.php (auth required)
```

## Cách sử dụng

### 1. Khởi động server
```bash
php artisan serve
```

### 2. Truy cập các trang

#### Trang chủ (guest):
```
http://127.0.0.1:8000/home
```

#### Đăng nhập:
```
http://127.0.0.1:8000/login
```

#### Dashboard (sau khi đăng nhập):
```
http://127.0.0.1:8000/dashboard
```

## Tính năng nổi bật

### 1. Giao diện hiện đại
- Gradient backgrounds
- Smooth animations
- Card-based layout
- Icon-rich interface

### 2. Trải nghiệm người dùng tốt
- Clear navigation
- Intuitive buttons
- Visual feedback on hover
- Consistent design language

### 3. Responsive
- Mobile-first approach
- Touch-friendly buttons
- Collapsible menus
- Adaptive layouts

### 4. Performance
- Optimized CSS
- Minimal JavaScript
- Fast loading times
- Smooth transitions

## Tùy chỉnh

### Thay đổi màu chủ đạo
Trong file CSS, tìm và thay đổi:
```css
/* Primary color */
#667eea -> YOUR_COLOR
```

### Thay đổi gradient
```css
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
```

### Thêm môn học mới
Trong controller hoặc view, thêm vào mảng:
```php
$subjects = ['Toán học', 'Vật lý', 'Hóa học', 'YOUR_SUBJECT'];
```

## Các bước tiếp theo

1. **Kết nối database**: Lấy dữ liệu thật từ database thay vì dữ liệu giả
2. **Tạo trang làm bài**: Trang hiển thị câu hỏi và nhận câu trả lời
3. **Trang kết quả**: Hiển thị kết quả sau khi hoàn thành bài thi
4. **Bảng xếp hạng**: Trang bảng xếp hạng đầy đủ
5. **Lịch sử**: Trang lịch sử chi tiết với filter
6. **Profile**: Trang hồ sơ cá nhân để cập nhật thông tin

## Hỗ trợ

Nếu có vấn đề hoặc câu hỏi, vui lòng liên hệ qua:
- Email: support@loq.edu.vn
- GitHub Issues: [Link to repo]

## License

© 2025 LOQ Quiz System. All rights reserved.
