<?php
/**
 * @var array $sp
 * @var string $keyword
 * @var string $sort
 * @var int $cartCount
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        :root {
            --primary: #22c55e;
            --primary-hover: #16a34a;
            --bg: #f9fafb;
            --text: #1f2937;
            --text-light: #6b7280;
            --card-bg: #ffffff;
            --border: #e5e7eb;
        }
        body {
            font-family: system-ui, -apple-system, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 20px;
        }
        header h1 {
            margin: 0;
            color: var(--primary);
        }
        .header-links a {
            text-decoration: none;
            color: var(--text);
            font-weight: bold;
            margin-left: 15px;
        }
        .toolbar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 10px;
        }
        .search-form {
            display: flex;
            gap: 10px;
        }
        input[type="text"], select {
            padding: 10px;
            border: 1px solid var(--border);
            border-radius: 6px;
            outline: none;
        }
        button {
            padding: 10px 16px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.2s;
        }
        button:hover {
            background-color: var(--primary-hover);
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }
        .product-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 15px;
            background-color: #f3f4f6;
        }
        .product-title {
            font-size: 1.1rem;
            margin: 0 0 10px 0;
            color: var(--text);
            text-decoration: none;
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .product-title:hover {
            color: var(--primary);
        }
        .product-author {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 15px;
        }
        .empty-msg {
            text-align: center;
            color: var(--text-light);
            padding: 50px 0;
            grid-column: 1 / -1;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <a href="index.php" style="text-decoration: none;"><h1>Tiệm Sách</h1></a>
        <div class="header-links">
            <a href="index.php">Trang chủ</a>
            <a href="#">Giỏ hàng (<?= isset($cartCount) ? $cartCount : 0 ?>)</a>
        </div>
    </header>

    <div class="toolbar">
        <form action="index.php" method="GET" class="search-form">
            <input type="text" name="keyword" placeholder="Tìm tên sách, tác giả..." value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>">
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>

    <div class="product-grid">
        <?php if (isset($sp) && !empty($sp)): ?>
            <?php foreach ($sp as $SP): ?>
                <div class="product-card">
                    <a href="index.php?act=chitiet&id=<?= $SP['id'] ?>">
                        <?php if(isset($SP['img']) && !empty($SP['img'])): ?>
                            <img src="<?= htmlspecialchars($SP['img']) ?>" alt="<?= htmlspecialchars($SP['tenSP'] ?? '') ?>" class="product-image">
                        <?php else: ?>
                            <div class="product-image" style="display:flex;align-items:center;justify-content:center;color:#9ca3af;">Không có ảnh</div>
                        <?php endif; ?>
                    </a>
                    <a href="index.php?act=chitiet&id=<?= $SP['id'] ?>" class="product-title" title="<?= htmlspecialchars($SP['tenSP'] ?? '') ?>">
                        <?= htmlspecialchars($SP['tenSP'] ?? 'Chưa cập nhật') ?>
                    </a>
                    <div class="product-author"><?= htmlspecialchars($SP['tacgia'] ?? 'Đang cập nhật') ?></div>
                    <div class="product-price"><?= number_format($SP['gia'] ?? 0, 0, ',', '.') ?>đ</div>
                    
                    <form action="index.php?act=add_cart" method="POST">
                        <input type="hidden" name="id" value="<?= $SP['id'] ?>">
                        <input type="hidden" name="keyword" value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>">
                        <button type="submit" style="width: 100%;">Thêm vào giỏ</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-msg">Không tìm thấy sản phẩm nào.</div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
