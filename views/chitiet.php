<?php

/**
 * @var array $sp
 * @var int $cartCount
 */
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($sp['tenSP'] ?? 'Chi tiết sản phẩm') ?> - Tiệm Sách</title>
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
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 30px;
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

        .breadcrumb {
            margin-bottom: 20px;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .product-detail {
            display: flex;
            gap: 40px;
            background: var(--card-bg);
            padding: 30px;
            border-radius: 8px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 768px) {
            .product-detail {
                flex-direction: column;
            }
        }

        .product-image {
            flex: 1;
            max-width: 400px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid var(--border);
        }

        .product-info {
            flex: 1;
        }

        .product-title {
            font-size: 2rem;
            margin: 0 0 10px 0;
        }

        .product-author {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .product-price {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .product-meta {
            margin-bottom: 20px;
            padding: 15px;
            background: var(--bg);
            border-radius: 6px;
        }

        .product-meta p {
            margin: 5px 0;
        }

        .product-desc {
            margin-bottom: 30px;
        }

        .product-desc h3 {
            margin-top: 0;
        }

        button {
            padding: 12px 24px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: bold;
            transition: background 0.2s;
            width: 100%;
        }

        button:hover {
            background-color: var(--primary-hover);
        }

        .error-msg {
            text-align: center;
            padding: 50px;
            background: var(--card-bg);
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <div class="container">
        <header>
            <a href="index.php" style="text-decoration: none;">
                <h1>Tiệm Sách</h1>
            </a>
            <div class="header-links">
                <a href="index.php">Trang chủ</a>
                <a href="#">Giỏ hàng (<?= isset($cartCount) ? $cartCount : 0 ?>)</a>
            </div>
        </header>

        <?php if (isset($sp) && !empty($sp)): ?>
            <div class="breadcrumb">
                <a href="index.php">Trang chủ</a> &raquo; <?= htmlspecialchars($sp['tenSP'] ?? '') ?>
            </div>

            <div class="product-detail">
                <?php if (isset($sp['img']) && !empty($sp['img'])): ?>
                    <img src="<?= htmlspecialchars($sp['img']) ?>" alt="<?= htmlspecialchars($sp['tenSP'] ?? '') ?>" class="product-image">
                <?php else: ?>
                    <div class="product-image" style="display:flex;align-items:center;justify-content:center;background:#f3f4f6;height:400px;color:#9ca3af;">Không có ảnh</div>
                <?php endif; ?>

                <div class="product-info">
                    <h1 class="product-title"><?= htmlspecialchars($sp['tenSP'] ?? 'Chưa rõ tên sản phẩm') ?></h1>
                    <div class="product-author">Tác giả: <?= htmlspecialchars($sp['tacgia'] ?? 'Nhiều tác giả') ?></div>

                    <div class="product-price"><?= number_format($sp['gia'] ?? 0, 0, ',', '.') ?>đ</div>

                    <div class="product-meta">
                        <p><strong>Số lượng còn:</strong> <?= htmlspecialchars($sp['sl'] ?? 0) ?> cuốn</p>
                        <p><strong>Trạng thái:</strong> <?= ($sp['sl'] ?? 0) > 0 ? '<span style="color:var(--primary);">Còn hàng</span>' : '<span style="color:red;">Hết hàng</span>' ?></p>
                    </div>

                    <div class="product-desc">
                        <h3>Giới thiệu nội dung</h3>
                        <p><?= nl2br(htmlspecialchars($sp['mo_ta'] ?? 'Chưa có thông tin mô tả chi tiết cho sản phẩm này.')) ?></p>
                    </div>

                    <form action="index.php?act=add_cart" method="POST">
                        <input type="hidden" name="id" value="<?= $sp['id'] ?>">
                        <button type="submit">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="error-msg">
                <h2>Không tìm thấy sản phẩm.</h2>
                <a href="index.php">Quay lại trang chủ</a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>