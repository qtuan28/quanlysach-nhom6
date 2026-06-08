<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tiệm Sách</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --sidebar-bg: #1e293b;
            --sidebar-text: #f8fafc;
            --bg: #f1f5f9;
            --white: #ffffff;
            --border: #e2e8f0;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg); display: flex; min-height: 100vh; }
        a { text-decoration: none; color: inherit; }

        .sidebar { width: 250px; background: var(--sidebar-bg); color: var(--sidebar-text); flex-shrink: 0; display: flex; flex-direction: column; }
        .sidebar-header { padding: 1.5rem; font-size: 1.5rem; font-weight: 700; border-bottom: 1px solid rgba(255,255,255,0.1); text-align: center; }
        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .nav-item { display: flex; align-items: center; padding: 1rem 1.5rem; gap: 1rem; color: #cbd5e1; transition: all 0.2s; }
        .nav-item:hover { background: rgba(255,255,255,0.1); color: var(--white); border-left: 4px solid var(--primary); }
        .nav-item i { width: 20px; text-align: center; }

        .main-content { flex: 1; display: flex; flex-direction: column; }
        .header { background: var(--white); padding: 1rem 2rem; border-bottom: 1px solid var(--border); display: flex; justify-content: flex-end; align-items: center; }
        .header-user { display: flex; align-items: center; gap: 0.5rem; font-weight: 500; }
        
        .content { padding: 2rem; flex: 1; }
        .page-title { font-size: 1.5rem; font-weight: 600; margin-bottom: 1.5rem; color: #0f172a; }
        
        .card { background: var(--white); border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 1.5rem; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { padding: 1rem; text-align: left; border-bottom: 1px solid var(--border); }
        th { font-weight: 600; color: #475569; background: #f8fafc; }
        tr:hover { background: #f8fafc; }

        .btn { padding: 0.5rem 1rem; border-radius: 6px; font-size: 0.875rem; font-weight: 500; cursor: pointer; border: none; display: inline-flex; align-items: center; gap: 0.5rem; }
        .btn-primary { background: var(--primary); color: var(--white); }
        .btn-danger { background: #ef4444; color: var(--white); }
        .btn-warning { background: #f59e0b; color: var(--white); }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header">Admin Panel</div>
        <nav class="sidebar-nav">
            <a href="?area=admin&controller=book&action=index" class="nav-item">
                <i class="fa-solid fa-book"></i> Quản lý Sách
            </a>
            <a href="?area=admin&controller=category&action=index" class="nav-item">
                <i class="fa-solid fa-list"></i> Quản lý Thể loại
            </a>
            <a href="?area=admin&controller=author&action=index" class="nav-item">
                <i class="fa-solid fa-users"></i> Quản lý Tác giả
            </a>
            <a href="index.php" class="nav-item" style="margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1);">
                <i class="fa-solid fa-house"></i> Về Trang Khách
            </a>
        </nav>
    </aside>

    <main class="main-content">
        <header class="header">
            <div class="header-user">
                <i class="fa-solid fa-circle-user" style="font-size: 1.5rem; color: var(--primary);"></i> Admin
            </div>
        </header>
        <div class="content">
            <?php echo $content; ?>
        </div>
    </main>
</body>
</html>
