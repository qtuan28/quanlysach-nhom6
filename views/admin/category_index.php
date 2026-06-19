<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thể Loại - Tiệm Sách</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- Cấu Trúc Hệ Thống & Reset CSS --- */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f8f9fa;
            color: #334155;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        /* --- SIDEBAR (Thanh điều hướng bên trái) --- */
        .sidebar {
            width: 260px;
            background-color: #0f172a; /* Màu tối chuẩn admin dashboard */
            color: #94a3b8;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #1e293b;
        }

        .sidebar-brand .logo-icon {
            background-color: #00B960;
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .sidebar-brand .logo-text {
            color: #ffffff;
            font-size: 18px;
            font-weight: 700;
        }

        .sidebar-brand .logo-sub {
            font-size: 11px;
            color: #64748b;
            display: block;
            font-weight: 400;
        }

        .sidebar-menu {
            padding: 24px 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu-heading {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            color: #475569;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            padding-left: 12px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px;
            border-radius: 8px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu-item .item-link {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .menu-item:hover {
            background-color: #1e293b;
            color: #ffffff;
        }

        /* Trạng thái đang hoạt động (Active) cho menu Thể Loại */
        .menu-item.active {
            background-color: rgba(0, 185, 96, 0.1);
            color: #00B960;
            font-weight: 600;
        }

        .badge-hot {
            background-color: #00B960;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .sidebar-footer {
            padding: 16px 24px;
            border-top: 1px solid #1e293b;
            display: flex;
            align-items: center;
            gap: 12px;
            background-color: #0b0f19;
        }

        .sidebar-footer img, .avatar-placeholder {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #00B960;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .user-info .user-name {
            color: white;
            font-size: 14px;
            font-weight: 600;
        }

        .user-info .user-role {
            font-size: 11px;
            color: #64748b;
        }

        /* --- MAIN CONTENT WINDOW (Vùng nội dung chính) --- */
        .main-content {
            margin-left: 260px; /* Nhường chỗ cho Sidebar cố định */
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* --- TOPBAR (Thanh header phía trên) --- */
        .topbar {
            height: 70px;
            background-color: #ffffff;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }

        .page-title-box h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #64748b;
            margin-top: 4px;
        }

        .breadcrumb a {
            color: #64748b;
            text-decoration: none;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .icon-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            cursor: pointer;
            background: none;
            transition: all 0.2s;
        }

        .icon-btn:hover {
            background-color: #f1f5f9;
            color: #0f172a;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 14px;
            border: 1px solid #e2e8f0;
            border-radius: 30px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            background-color: #ffffff;
        }

        .user-dropdown .admin-avatar {
            width: 24px;
            height: 24px;
            background-color: #00B960;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        /* --- CONTENT BODY (Khu vực chứa form và table) --- */
        .content-body {
            padding: 32px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* --- GIỮ NGUYÊN FORM CARD & DATA CARD TỪ CODE CŨ --- */
        .form-card, .data-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.015);
            border: 1px solid #edf2f7;
            padding: 26px;
        }

        .card-main-title {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .form-inline-box {
            display: flex;
            align-items: flex-end;
            gap: 16px;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            min-width: 280px;
        }

        .form-label-custom {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
        }

        .form-control-custom {
            width: 100%;
            padding: 11px 16px;
            font-size: 14px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            color: #0f172a;
            outline: none;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            border-color: #00B960;
            box-shadow: 0 0 0 3px rgba(0, 185, 96, 0.1);
        }

        .btn-custom {
            padding: 11px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            height: 44px;
            box-sizing: border-box;
        }

        .btn-submit-green {
            background-color: #00B960;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 185, 96, 0.15);
        }
        .btn-submit-green:hover {
            background-color: #009e52;
            transform: translateY(-1px);
        }

        .btn-back-gray {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
        }
        .btn-back-gray:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }

        .data-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-filter {
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            color: #334155;
            padding: 0 16px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            height: 40px;
        }
        .btn-filter:hover { background-color: #f8fafc; }

        .table-wrap {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid #f1f5f9;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .custom-table th {
            background-color: #f8fafc;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 14px 16px;
            border-bottom: 2px solid #e2e8f0;
            letter-spacing: 0.5px;
        }

        .custom-table td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            color: #334155;
            vertical-align: middle;
        }

        .custom-table tbody tr:hover { background-color: #f8fafc; }
        .table-id { color: #94a3b8; font-weight: 600; }

        .badge-category {
            background-color: #f0fdf4;
            color: #166534;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            border: 1px solid #dcfce7;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .btn-edit { background-color: #fffbeb; color: #d97706; }
        .btn-edit:hover { background-color: #fef3c7; }
        .btn-delete { background-color: #fee2e2; color: #dc2626; }
        .btn-delete:hover { background-color: #fecaca; }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="logo-icon">
                <i class="fa-solid fa-book"></i>
            </div>
            <div>
                <span class="logo-text">TiệmSách</span>
                <span class="logo-sub">Admin Dashboard</span>
            </div>
        </div>

        <div class="sidebar-menu">
            <div class="menu-heading">Điều hướng chính</div>
            
            <a href="?area=book" class="menu-item">
                <div class="item-link">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Quản Lý Sách</span>
                </div>
                <span class="badge-hot">Hot</span>
            </a>

            <a href="?area=category" class="menu-item active">
                <div class="item-link">
                    <i class="fa-solid fa-tags"></i>
                    <span>Thể Loại</span>
                </div>
            </a>

            <a href="?area=author" class="menu-item">
                <div class="item-link">
                    <i class="fa-solid fa-user-feather"></i>
                    <span>Tác Giả</span>
                </div>
            </a>

            <div class="menu-heading" style="margin-top: 16px;">Khác</div>
            <a href="index.php" class="menu-item">
                <div class="item-link">
                    <i class="fa-solid fa-shop"></i>
                    <span>Về trang bán hàng</span>
                </div>
            </a>
        </div>

        <div class="sidebar-footer">
            <div class="avatar-placeholder">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <div class="user-info">
                <div class="user-name">Admin</div>
                <div class="user-role">Quản trị viên</div>
            </div>
        </div>
    </div>

    <div class="main-content">
        
        <div class="topbar">
            <div class="page-title-box">
                <h1>Bảng Điều Khiển</h1>
                <div class="breadcrumb">
                    <a href="?area=admin"><i class="fa-solid fa-house"></i> Admin</a>
                    <i class="fa-solid fa-angle-right" style="font-size: 10px;"></i>
                    <span>Thể Loại</span>
                </div>
            </div>

            <div class="topbar-actions">
                <button class="icon-btn"><i class="fa-solid fa-bell"></i></button>
                <button class="icon-btn"><i class="fa-solid fa-circle-question"></i></button>
                <div class="user-dropdown">
                    <div class="admin-avatar">A</div>
                    <span>Admin</span>
                    <i class="fa-solid fa-angle-down" style="font-size: 12px; color: #94a3b8;"></i>
                </div>
            </div>
        </div>

        <div class="content-body">
            
            <div class="form-card">
                <div class="card-main-title">
                    <i class="fa-solid fa-square-plus" style="color: #00B960;"></i>
                    Thêm thể loại sách mới
                </div>

                <form method="POST">
                    <div class="form-inline-box">
                        <div class="form-group">
                            <label class="form-label-custom">Tên thể loại sách</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control-custom"
                                placeholder="Nhập tên thể loại (Ví dụ: Lịch sử, Kỹ năng sống...)"
                                required>
                        </div>

                        <button type="submit" class="btn-custom btn-submit-green">
                            <i class="fa-solid fa-plus"></i> Thêm mới
                        </button>

                        <a href="?area=admin" class="btn-custom btn-back-gray">
                            <i class="fa-solid fa-arrow-left"></i> Quay lại Admin
                        </a>
                    </div>
                </form>
            </div>

            <div class="data-card">
                <div class="data-card-header">
                    <div class="card-main-title" style="margin-bottom: 0;">
                        <i class="fa-solid fa-tags" style="color: #00B960;"></i>
                        Danh sách Thể loại hiện có
                    </div>
                    
                    <button class="btn-filter">
                        <i class="fa-solid fa-filter"></i> Lọc
                    </button>
                </div>

                <div class="table-wrap">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th style="width: 15%; padding-left: 20px;">ID</th>
                                <th style="width: 60%;">TÊN THỂ LOẠI</th>
                                <th style="width: 25%; text-align: center;">THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $item) { 
                                $catName = mb_strtolower($item['name'], 'UTF-8');
                                $icon = 'fa-bookmark'; 
                                if (strpos($catName, 'khoa học') !== false || strpos($catName, 'kỹ thuật') !== false) {
                                    $icon = 'fa-atom';
                                } elseif (strpos($catName, 'lịch sử') !== false) {
                                    $icon = 'fa-book-open';
                                } elseif (strpos($catName, 'viễn tưởng') !== false) {
                                    $icon = 'fa-rocket';
                                } elseif (strpos($catName, 'tiểu thuyết') !== false || strpos($catName, 'văn học') !== false) {
                                    $icon = 'fa-feather';
                                } elseif (strpos($catName, 'kỹ năng') !== false) {
                                    $icon = 'fa-heart';
                                } elseif (strpos($catName, 'kinh doanh') !== false) {
                                    $icon = 'fa-chart-line';
                                }
                            ?>
                                <tr>
                                    <td style="padding-left: 20px;">
                                        <span class="table-id">#<?= $item['id']; ?></span>
                                    </td>
                                    <td>
                                        <span class="badge-category">
                                            <i class="fa-solid <?= $icon; ?>" style="margin-right: 8px;"></i>
                                            <?= htmlspecialchars($item['name']); ?>
                                        </span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="action-buttons">
                                            <a href="?area=category&act=edit&id=<?= $item['id']; ?>" class="btn-action btn-edit" title="Sửa">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="?area=category&act=delete&id=<?= $item['id']; ?>"
                                               class="btn-action btn-delete"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa thể loại này?')" title="Xóa">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>