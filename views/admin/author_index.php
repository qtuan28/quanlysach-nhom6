<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tác Giả - Tiệm Sách</title>
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

        /* ===== SIDEBAR ===== */
        :root {
            --primary: #22c55e;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-border: rgba(255,255,255,0.06);
            --white: #ffffff;
            --font-heading: 'Inter', sans-serif;
            --font-body: 'Inter', sans-serif;
            --radius: 10px;
        }
        
        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            color: var(--white);
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 50;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid var(--sidebar-border);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .sidebar-brand-icon {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: var(--white);
            flex-shrink: 0;
        }
        .sidebar-brand-text {
            font-family: var(--font-heading);
            font-size: 1.1rem;
            font-weight: 700;
        }
        .sidebar-brand-text span { color: var(--primary); }
        .sidebar-brand-sub {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.4);
            font-family: var(--font-body);
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        .sidebar-section {
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--sidebar-border);
        }
        .sidebar-section-title {
            font-size: 0.65rem;
            font-family: var(--font-heading);
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
            padding: 0 1.5rem;
            margin-bottom: 0.5rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.8rem 1.5rem;
            color: rgba(255,255,255,0.6);
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
            position: relative;
            text-decoration: none;
        }
        .nav-item:hover {
            background: var(--sidebar-hover);
            color: var(--white);
        }
        .nav-item.active {
            background: rgba(34, 197, 94, 0.12);
            color: var(--primary);
            border-right: 3px solid var(--primary);
        }
        .nav-item.active .nav-icon { color: var(--primary); }
        .nav-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius);
            background: rgba(255,255,255,0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.4);
            flex-shrink: 0;
            transition: all 0.2s;
        }
        .nav-item:hover .nav-icon {
            background: rgba(255,255,255,0.1);
            color: var(--white);
        }
        .nav-item.active .nav-icon {
            background: rgba(34,197,94,0.15);
            color: var(--primary);
        }
        .nav-badge {
            margin-left: auto;
            background: var(--primary);
            color: var(--white);
            font-size: 0.65rem;
            padding: 0.15rem 0.5rem;
            border-radius: 20px;
            font-weight: 700;
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid var(--sidebar-border);
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

        /* --- DATA CARD --- */
        .data-card {
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

        .badge-author {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            border: 1px solid #bae6fd;
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

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon">
                <i class="fa-solid fa-book-open-reader"></i>
            </div>
            <div>
                <div class="sidebar-brand-text">Tiệm<span>Sách</span></div>
                <div class="sidebar-brand-sub">Admin Dashboard</div>
            </div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-title">Điều hướng chính</div>
            <a href="?area=admin" class="nav-item">
                <span class="nav-icon"><i class="fa-solid fa-book"></i></span>
                Quản lý Sách
                <span class="nav-badge">Hot</span>
            </a>
            <a href="?area=category" class="nav-item">
                <span class="nav-icon"><i class="fa-solid fa-tags"></i></span>
                Thể loại
            </a>
            <a href="?area=author" class="nav-item active">
                <span class="nav-icon"><i class="fa-solid fa-user-pen"></i></span>
                Tác giả
            </a>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-title">Khác</div>
            <a href="index.php" class="nav-item">
                <span class="nav-icon"><i class="fa-solid fa-store"></i></span>
                Về trang bán hàng
            </a>
        </div>

        <div class="sidebar-footer">
            <div class="nav-item" style="padding: 1.25rem 1.5rem;">
                <span class="nav-icon" style="background: rgba(34,197,94,0.1); color: var(--primary);">
                    <i class="fa-solid fa-circle-user"></i>
                </span>
                <div>
                    <div style="font-size: 0.85rem; font-weight: 600; color: var(--white);">Admin</div>
                    <div style="font-size: 0.7rem; color: rgba(255,255,255,0.4);">Quản trị viên</div>
                </div>
            </div>
        </div>
    </aside>

    <div class="main-content">
        
        <div class="topbar">
            <div class="page-title-box">
                <h1>Bảng Điều Khiển</h1>
                <div class="breadcrumb">
                    <a href="?area=admin"><i class="fa-solid fa-house"></i> Admin</a>
                    <i class="fa-solid fa-angle-right" style="font-size: 10px;"></i>
                    <span>Tác Giả</span>
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
            
            <div class="data-card">
                <div class="data-card-header">
                    <div class="card-main-title" style="margin-bottom: 0;">
                        <i class="fa-solid fa-user-pen" style="color: #0369a1;"></i>
                        Danh sách Tác giả hiện có
                    </div>
                    
                    <a href="?area=author&act=create" class="btn-filter" style="background-color: #0369a1; color: white; border-color: #0284c7; text-decoration: none;">
                        <i class="fa-solid fa-plus"></i> Thêm tác giả mới
                    </a>
                </div>

                <div class="table-wrap">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th style="width: 15%; padding-left: 20px;">ID</th>
                                <th style="width: 60%;">TÊN TÁC GIẢ</th>
                                <th style="width: 25%; text-align: center;">THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($authors as $item) { ?>
                                <tr>
                                    <td style="padding-left: 20px;">
                                        <span class="table-id">#<?= $item['id']; ?></span>
                                    </td>
                                    <td>
                                        <span class="badge-author">
                                            <i class="fa-solid fa-user" style="margin-right: 8px;"></i>
                                            <?= htmlspecialchars($item['name']); ?>
                                        </span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="action-buttons">
                                            <a href="?area=author&act=edit&id=<?= $item['id']; ?>" class="btn-action btn-edit" title="Sửa">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="?area=author&act=delete&id=<?= $item['id']; ?>"
                                               class="btn-action btn-delete"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa tác giả này?')" title="Xóa">
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
