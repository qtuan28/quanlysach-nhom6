<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - TiệmSách</title>
    <meta name="description" content="Trang quản trị hệ thống TiệmSách">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #22c55e;
            --primary-dark: #16a34a;
            --primary-light: #86efac;
            --primary-bg: #f0fdf4;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-border: rgba(255,255,255,0.06);
            --dark: #111827;
            --dark-2: #1f2937;
            --gray: #6b7280;
            --border: #e5e7eb;
            --white: #ffffff;
            --off-white: #f8fafc;
            --font-heading: 'Josefin Sans', sans-serif;
            --font-body: 'Poppins', sans-serif;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.10);
            --radius: 10px;
            --radius-lg: 16px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-body); background-color: var(--off-white); display: flex; min-height: 100vh; }
        a { text-decoration: none; color: inherit; transition: all 0.2s; }

        /* ===== SIDEBAR ===== */
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

        /* ===== MAIN CONTENT ===== */
        .main-wrapper {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ===== TOP HEADER ===== */
        .top-header {
            background: var(--white);
            padding: 1rem 2rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 40;
            box-shadow: var(--shadow-sm);
        }
        .page-title-bar {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .page-title-bar h1 {
            font-family: var(--font-heading);
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
        }
        .breadcrumb-trail {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
            color: var(--gray);
            margin-top: 0.1rem;
        }
        .breadcrumb-trail span { color: var(--primary); }
        .breadcrumb-trail i { font-size: 0.6rem; }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .header-icon-btn {
            width: 38px;
            height: 38px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--gray);
            font-size: 0.9rem;
            position: relative;
            transition: all 0.2s;
        }
        .header-icon-btn:hover { border-color: var(--primary); color: var(--primary); }
        .header-icon-btn .dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 6px;
            height: 6px;
            background: var(--primary);
            border-radius: 50%;
        }
        .admin-profile {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.4rem 1rem 0.4rem 0.4rem;
            border: 1px solid var(--border);
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .admin-profile:hover { border-color: var(--primary); }
        .admin-avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 0.8rem;
        }
        .admin-name { font-size: 0.85rem; font-weight: 600; color: var(--dark); }

        /* ===== CONTENT AREA ===== */
        .content-area {
            flex: 1;
            padding: 2rem;
        }

        /* ===== DATA TABLE CARD ===== */
        .data-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }
        .data-card-header {
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
        }
        .data-card-title {
            font-family: var(--font-heading);
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .data-card-title i { color: var(--primary); }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 1.1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: var(--font-heading);
            letter-spacing: 0.3px;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }
        .btn-primary { background: var(--primary); color: var(--white); }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(34,197,94,0.3); }
        .btn-icon { padding: 0.5rem 0.75rem; border-radius: var(--radius); }
        .btn-warning { background: #fef3c7; color: #92400e; }
        .btn-warning:hover { background: #fde68a; }
        .btn-danger { background: #fee2e2; color: #991b1b; }
        .btn-danger:hover { background: #fecaca; }
        .btn-secondary { background: var(--off-white); color: var(--gray); border: 1px solid var(--border); }
        .btn-secondary:hover { border-color: var(--primary); color: var(--primary); }

        .btn-group { display: flex; gap: 0.5rem; }

        /* TABLE */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        thead tr { background: var(--off-white); }
        th {
            padding: 0.9rem 1.25rem;
            text-align: left;
            font-family: var(--font-heading);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: var(--gray);
            white-space: nowrap;
            border-bottom: 1px solid var(--border);
        }
        td {
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
            color: var(--dark);
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }
        tr:last-child td { border-bottom: none; }
        tbody tr { transition: background 0.15s; }
        tbody tr:hover { background: var(--off-white); }

        .table-id {
            font-family: var(--font-heading);
            font-size: 0.75rem;
            color: var(--gray);
            background: var(--off-white);
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
        }
        .table-name { font-weight: 600; color: var(--dark); }
        .table-secondary { font-size: 0.8rem; color: var(--gray); }
        .price-tag {
            font-family: var(--font-heading);
            font-weight: 700;
            color: var(--primary-dark);
        }
        .category-chip {
            display: inline-block;
            background: var(--primary-bg);
            color: var(--primary-dark);
            font-size: 0.7rem;
            font-weight: 600;
            font-family: var(--font-heading);
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
        }
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
            <a href="?area=admin" class="nav-item active">
                <span class="nav-icon"><i class="fa-solid fa-book"></i></span>
                Quản lý Sách
                <span class="nav-badge">Hot</span>
            </a>
            <a href="#" class="nav-item">
                <span class="nav-icon"><i class="fa-solid fa-tags"></i></span>
                Thể loại
            </a>
            <a href="#" class="nav-item">
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

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        <!-- TOP HEADER -->
        <header class="top-header">
            <div>
                <div class="page-title-bar">
                    <h1>Bảng Điều Khiển</h1>
                </div>
                <div class="breadcrumb-trail">
                    <i class="fa-solid fa-house"></i> Admin
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Dashboard</span>
                </div>
            </div>
            <div class="header-right">
                <button class="header-icon-btn">
                    <i class="fa-regular fa-bell"></i>
                    <span class="dot"></span>
                </button>
                <button class="header-icon-btn">
                    <i class="fa-regular fa-circle-question"></i>
                </button>
                <div class="admin-profile">
                    <div class="admin-avatar"><i class="fa-solid fa-user"></i></div>
                    <span class="admin-name">Admin</span>
                    <i class="fa-solid fa-chevron-down" style="font-size:0.65rem; color: var(--gray);"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <div class="content-area">
            
            <div class="data-card">
                <div class="data-card-header">
                    <div class="data-card-title">
                        <i class="fa-solid fa-book"></i>
                        Danh sách Sách
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-icon">
                            <i class="fa-solid fa-filter"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Thêm sách mới
                        </button>
                    </div>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sách</th>
                                <th>Thể loại</th>
                                <th>Tác giả</th>
                                <th>Giá</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($books as $book): ?>
                            <tr>
                                <td><span class="table-id">#<?= $book['id'] ?></span></td>
                                <td>
                                    <div class="table-name"><?= htmlspecialchars($book['title']) ?></div>
                                </td>
                                <td>
                                    <?php if(!empty($book['category_name'])): ?>
                                    <span class="category-chip"><?= htmlspecialchars($book['category_name']) ?></span>
                                    <?php else: ?><span class="table-secondary">—</span><?php endif; ?>
                                </td>
                                <td><span class="table-secondary"><?= htmlspecialchars($book['author_name'] ?? '—') ?></span></td>
                                <td><span class="price-tag"><?= number_format($book['price'], 0, ',', '.') ?> đ</span></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-icon" title="Chỉnh sửa">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon" title="Xóa">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
