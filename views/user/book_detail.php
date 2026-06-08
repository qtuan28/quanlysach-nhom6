<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($book['title']) ?> - Tiệm Sách</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary: #f3f4f6;
            --text-dark: #111827;
            --text-light: #6b7280;
            --white: #ffffff;
            --border: #e5e7eb;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; color: var(--text-dark); line-height: 1.5; }
        a { text-decoration: none; color: inherit; }

        header { background-color: var(--white); box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1); padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center;}
        .logo { font-size: 1.5rem; font-weight: 700; color: var(--primary); display: flex; align-items: center; gap: 0.5rem; }

        .container { max-width: 1000px; margin: 3rem auto; padding: 0 2rem; }
        .back-btn { display: inline-flex; align-items: center; gap: 0.5rem; color: var(--text-light); margin-bottom: 2rem; transition: color 0.2s; }
        .back-btn:hover { color: var(--primary); }

        .book-detail { background: var(--white); border-radius: 12px; border: 1px solid var(--border); display: flex; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .book-image { width: 400px; background: var(--secondary); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .book-image i { font-size: 8rem; color: var(--text-light); opacity: 0.3; }
        
        .book-info { padding: 3rem; flex: 1; }
        .book-category { text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px; color: var(--primary); font-weight: 600; margin-bottom: 0.5rem; }
        .book-title { font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; line-height: 1.2; }
        .book-author { font-size: 1.1rem; color: var(--text-light); margin-bottom: 1.5rem; }
        .book-price { font-size: 2rem; font-weight: 700; color: var(--primary); margin-bottom: 2rem; }
        .book-desc { color: var(--text-dark); line-height: 1.7; margin-bottom: 2rem; }
        
        .buy-btn { background: var(--primary); color: var(--white); border: none; padding: 1rem 3rem; border-radius: 8px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: background 0.2s; display: inline-flex; align-items: center; gap: 0.5rem; }
        .buy-btn:hover { background: var(--primary-hover); }
    </style>
</head>
<body>
    <header>
        <a href="index.php" class="logo">
            <i class="fa-solid fa-book-open"></i> Tiệm Sách
        </a>
    </header>

    <div class="container">
        <a href="javascript:history.back()" class="back-btn">
            <i class="fa-solid fa-arrow-left"></i> Quay lại
        </a>

        <div class="book-detail">
            <div class="book-image">
                <i class="fa-solid fa-book"></i>
            </div>
            <div class="book-info">
                <div class="book-category"><?= htmlspecialchars($book['category_name'] ?? 'Chưa phân loại') ?></div>
                <h1 class="book-title"><?= htmlspecialchars($book['title']) ?></h1>
                <div class="book-author">Tác giả: <strong><?= htmlspecialchars($book['author_name'] ?? 'Chưa rõ') ?></strong></div>
                <div class="book-price"><?= number_format($book['price'], 0, ',', '.') ?> đ</div>
                <div class="book-desc">
                    <?= nl2br(htmlspecialchars($book['description'] ?? 'Chưa có mô tả cho quyển sách này.')) ?>
                </div>
                
                <button class="buy-btn" onclick="alert('Tính năng mua đang bảo trì!')">
                    <i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ
                </button>
            </div>
        </div>
    </div>
</body>
</html>
