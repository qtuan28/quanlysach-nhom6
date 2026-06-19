<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tác Giả Mới - TiệmSách</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #0369a1;
            --primary-dark: #0284c7;
            --primary-bg: #e0f2fe;
            --sidebar-bg: #0f172a;
            --dark: #111827;
            --gray: #6b7280;
            --border: #e5e7eb;
            --white: #ffffff;
            --off-white: #f8fafc;
            --font-heading: 'Josefin Sans', sans-serif;
            --font-body: 'Poppins', sans-serif;
            --radius-lg: 16px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-body); background-color: var(--off-white); display: flex; min-height: 100vh; }
        a { text-decoration: none; color: inherit; }
        
        .main-wrapper { flex: 1; padding: 2rem; max-width: 800px; margin: 0 auto; }
        .data-card { background: var(--white); border-radius: var(--radius-lg); border: 1px solid var(--border); padding: 2rem; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--dark); font-size: 0.9rem; }
        .form-control { width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border); border-radius: 8px; font-family: var(--font-body); font-size: 0.9rem; outline: none; transition: all 0.2s; }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-bg); }
        textarea.form-control { resize: vertical; min-height: 120px; }
        .btn { padding: 0.75rem 1.5rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: var(--font-body); }
        .btn-primary { background: var(--primary); color: var(--white); }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-secondary { background: var(--border); color: var(--dark); margin-right: 1rem; }
        .btn-secondary:hover { background: #d1d5db; }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <h2 style="margin-bottom: 1.5rem; font-family: var(--font-heading); display: flex; align-items: center; gap: 0.5rem; color: var(--dark);">
            <i class="fa-solid fa-user-pen" style="color: var(--primary);"></i>
            Thêm Tác Giả Mới
        </h2>
        <div class="data-card">
            <form action="?area=author&act=create" method="POST">
                <div class="form-group">
                    <label>Tên tác giả <span style="color: red;">*</span></label>
                    <input type="text" name="name" class="form-control" required placeholder="Nhập tên tác giả (Ví dụ: Nam Cao, Dale Carnegie...)">
                </div>

                <div class="form-group">
                    <label>Tiểu sử tác giả</label>
                    <textarea name="bio" class="form-control" placeholder="Nhập tóm tắt tiểu sử hoặc thông tin giới thiệu về tác giả..."></textarea>
                </div>

                <div style="margin-top: 2rem;">
                    <a href="?area=author" class="btn btn-secondary">Hủy bỏ</a>
                    <button type="submit" class="btn btn-primary">Lưu tác giả</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
