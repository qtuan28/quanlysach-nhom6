<?php
/**
 * @var array $book
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($book['title']) ?> - TiệmSách</title>
    <meta name="description" content="<?= htmlspecialchars(substr($book['description'] ?? 'Chi tiết sách', 0, 160)) ?>">
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
            --black: #0a0a0a;
            --dark: #111827;
            --dark-2: #1f2937;
            --gray: #6b7280;
            --gray-light: #9ca3af;
            --border: #e5e7eb;
            --border-green: #bbf7d0;
            --white: #ffffff;
            --off-white: #f9fafb;
            --font-heading: 'Josefin Sans', sans-serif;
            --font-body: 'Poppins', sans-serif;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.10);
            --shadow-lg: 0 10px 40px rgba(0,0,0,0.12);
            --radius: 10px;
            --radius-lg: 16px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-body); background-color: var(--off-white); color: var(--dark); line-height: 1.6; }
        a { text-decoration: none; color: inherit; transition: color 0.2s; }

        /* TOP BAR */
        .top-bar { background: var(--primary); color: var(--white); padding: 0.5rem 0; font-size: 0.8rem; font-family: var(--font-heading); }
        .top-bar-inner { max-width: 1280px; margin: 0 auto; padding: 0 2rem; display: flex; justify-content: space-between; align-items: center; }
        .top-bar-right { display: flex; gap: 1rem; }
        .top-bar-right a { color: var(--white); opacity: 0.9; }
        .top-bar-right a:hover { opacity: 1; }

        /* HEADER */
        .main-header { background: var(--white); box-shadow: var(--shadow-sm); }
        .header-inner { max-width: 1280px; margin: 0 auto; padding: 1rem 2rem; display: flex; align-items: center; gap: 2rem; }
        .logo { font-family: var(--font-heading); font-size: 1.75rem; font-weight: 700; color: var(--dark); display: flex; align-items: center; gap: 0.6rem; }
        .logo span { color: var(--primary); }
        .logo i { color: var(--primary); }

        /* NAVBAR */
        .navbar { background: var(--dark); }
        .navbar-inner { max-width: 1280px; margin: 0 auto; padding: 0 2rem; display: flex; align-items: center; }
        .nav-links { display: flex; list-style: none; }
        .nav-links a { display: block; padding: 0.85rem 1.25rem; color: rgba(255,255,255,0.7); font-family: var(--font-heading); font-size: 0.8rem; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; transition: color 0.2s; }
        .nav-links a:hover { color: var(--primary); }

        /* BREADCRUMB */
        .breadcrumb-bar { background: var(--dark-2); padding: 0.85rem 0; }
        .breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 2rem; display: flex; align-items: center; gap: 0.5rem; font-size: 0.8rem; font-family: var(--font-heading); }
        .breadcrumb-inner a { color: rgba(255,255,255,0.5); transition: color 0.2s; }
        .breadcrumb-inner a:hover { color: var(--primary); }
        .breadcrumb-inner i { color: rgba(255,255,255,0.3); font-size: 0.65rem; }
        .breadcrumb-inner span { color: var(--primary); font-weight: 600; }

        /* MAIN CONTENT */
        .container { max-width: 1100px; margin: 3rem auto; padding: 0 2rem; }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.25rem;
            border: 2px solid var(--border);
            border-radius: 50px;
            color: var(--gray);
            font-size: 0.85rem;
            font-family: var(--font-heading);
            font-weight: 600;
            margin-bottom: 2rem;
            transition: all 0.2s;
        }
        .back-btn:hover { border-color: var(--primary); color: var(--primary); }

        /* BOOK DETAIL CARD */
        .book-detail-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            display: flex;
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }

        /* BOOK COVER PANEL */
        .book-cover-panel {
            width: 380px;
            flex-shrink: 0;
            background: linear-gradient(160deg, var(--dark) 0%, var(--dark-2) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
            position: relative;
            overflow: hidden;
        }
        .book-cover-panel::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(34,197,94,0.1) 0%, transparent 60%);
            pointer-events: none;
        }
        .cover-icon-wrap {
            width: 160px;
            height: 220px;
            background: rgba(255,255,255,0.04);
            border: 2px solid rgba(34,197,94,0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.05);
            position: relative;
        }
        .cover-icon-wrap i { font-size: 5rem; color: rgba(34,197,94,0.5); }
        .cover-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background: var(--primary);
            color: var(--white);
            font-size: 0.65rem;
            font-weight: 700;
            font-family: var(--font-heading);
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .cover-category {
            background: rgba(34,197,94,0.15);
            border: 1px solid rgba(34,197,94,0.3);
            color: var(--primary);
            font-size: 0.75rem;
            font-family: var(--font-heading);
            font-weight: 700;
            letter-spacing: 1px;
            padding: 0.35rem 1rem;
            border-radius: 50px;
            text-transform: uppercase;
        }

        /* BOOK INFO PANEL */
        .book-info-panel {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
        }
        .book-category-tag {
            display: inline-block;
            background: var(--primary-bg);
            color: var(--primary-dark);
            font-family: var(--font-heading);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            margin-bottom: 0.75rem;
        }
        .book-title {
            font-family: var(--font-heading);
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.2;
            margin-bottom: 0.75rem;
        }
        .book-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
        }
        .book-meta-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.9rem;
            color: var(--gray);
        }
        .book-meta-item i { color: var(--primary); font-size: 0.85rem; }
        .book-meta-item strong { color: var(--dark); font-weight: 600; }
        .book-rating { display: flex; align-items: center; gap: 0.3rem; }
        .book-rating i { color: #f59e0b; font-size: 0.85rem; }
        .book-rating span { font-size: 0.85rem; color: var(--gray); }

        .book-price-box {
            background: var(--primary-bg);
            border: 1px solid var(--border-green);
            border-radius: var(--radius);
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .price-current {
            font-family: var(--font-heading);
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--primary-dark);
        }
        .price-info { font-size: 0.8rem; color: var(--gray); margin-top: 0.25rem; }
        .in-stock {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--primary-dark);
            font-size: 0.85rem;
            font-weight: 600;
            font-family: var(--font-heading);
        }
        .in-stock i { font-size: 0.75rem; }
        .stock-dot { width: 8px; height: 8px; background: var(--primary); border-radius: 50%; animation: pulse 2s infinite; }
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        .book-description {
            margin-bottom: 2rem;
            flex: 1;
        }
        .book-description h3 {
            font-family: var(--font-heading);
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: var(--dark);
            margin-bottom: 0.75rem;
        }
        .book-description p {
            color: var(--gray);
            font-size: 0.9rem;
            line-height: 1.75;
        }

        .book-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }
        .btn-cart {
            background: var(--primary);
            color: var(--white);
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            font-family: var(--font-heading);
            letter-spacing: 0.5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s;
            flex: 1;
            justify-content: center;
        }
        .btn-cart:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(34,197,94,0.4);
        }
        .btn-wishlist {
            border: 2px solid var(--border);
            background: transparent;
            color: var(--gray);
            padding: 1rem 1.5rem;
            border-radius: 50px;
            font-size: 1rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: var(--font-heading);
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-wishlist:hover { border-color: #ef4444; color: #ef4444; }

        .book-extra {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
        }
        .extra-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.8rem;
            color: var(--gray);
        }
        .extra-item i {
            font-size: 1.25rem;
            color: var(--primary);
        }
        .extra-item strong { display: block; font-size: 0.75rem; color: var(--dark); font-weight: 600; }

        /* FOOTER */
        footer { background: var(--dark); padding: 2rem 0; margin-top: 4rem; }
        .footer-inner { max-width: 1280px; margin: 0 auto; padding: 0 2rem; display: flex; align-items: center; justify-content: space-between; }
        .footer-logo { font-family: var(--font-heading); font-size: 1.5rem; font-weight: 700; color: var(--white); }
        .footer-logo span { color: var(--primary); }
        .footer-copy { font-size: 0.8rem; color: rgba(255,255,255,0.4); }
        .footer-copy strong { color: var(--primary); }

        @media (max-width: 768px) {
            .book-detail-card { flex-direction: column; }
            .book-cover-panel { width: 100%; padding: 2rem; }
            .book-info-panel { padding: 1.5rem; }
            .book-title { font-size: 1.5rem; }
            .book-extra { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="top-bar-inner">
            <div><i class="fa-solid fa-truck-fast"></i> Miễn phí giao hàng cho đơn trên 300.000đ</div>
            <div class="top-bar-right">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <div class="main-header">
        <div class="header-inner">
            <a href="index.php" class="logo">
                <i class="fa-solid fa-book-open-reader"></i>
                Tiệm<span>Sách</span>
            </a>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-inner">
            <ul class="nav-links">
                <li><a href="index.php"><i class="fa-solid fa-house" style="font-size:0.7rem;"></i> Trang chủ</a></li>
                <li><a href="index.php">Tất cả sách</a></li>
            </ul>
        </div>
    </nav>

    <!-- BREADCRUMB -->
    <div class="breadcrumb-bar">
        <div class="breadcrumb-inner">
            <a href="index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="index.php">Tất cả sách</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span><?= htmlspecialchars($book['title']) ?></span>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="container">
        <a href="javascript:history.back()" class="back-btn">
            <i class="fa-solid fa-arrow-left"></i> Quay lại danh sách
        </a>

        <div class="book-detail-card">
            <!-- COVER PANEL -->
            <div class="book-cover-panel">
                <div class="cover-icon-wrap">
                    <i class="fa-solid fa-book"></i>
                    <span class="cover-badge">Bestseller</span>
                </div>
                <span class="cover-category"><?= htmlspecialchars($book['category_name'] ?? 'Chưa phân loại') ?></span>
            </div>

            <!-- INFO PANEL -->
            <div class="book-info-panel">
                <span class="book-category-tag">
                    <i class="fa-solid fa-bookmark"></i>
                    <?= htmlspecialchars($book['category_name'] ?? 'Chưa phân loại') ?>
                </span>
                <h1 class="book-title"><?= htmlspecialchars($book['title']) ?></h1>

                <div class="book-meta">
                    <div class="book-meta-item">
                        <i class="fa-solid fa-user-pen"></i>
                        Tác giả: <strong><?= htmlspecialchars($book['author_name'] ?? 'Chưa rõ') ?></strong>
                    </div>
                    <div class="book-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <span>(4.0 / 5)</span>
                    </div>
                </div>

                <div class="book-price-box">
                    <div>
                        <div class="price-current"><?= number_format($book['price'], 0, ',', '.') ?> đ</div>
                        <div class="price-info">Giá đã bao gồm VAT</div>
                    </div>
                    <div class="in-stock">
                        <div class="stock-dot"></div>
                        Còn hàng
                    </div>
                </div>

                <div class="book-description">
                    <h3><i class="fa-solid fa-align-left" style="color:var(--primary);margin-right:0.3rem;"></i> Mô tả sách</h3>
                    <p><?= nl2br(htmlspecialchars($book['description'] ?? 'Chưa có mô tả cho quyển sách này. Đây là một trong những cuốn sách được nhiều bạn đọc yêu thích và đánh giá cao về nội dung cũng như chất lượng in ấn.')) ?></p>
                </div>

                <div class="book-actions">
                    <button class="btn-cart" onclick="alert('Đã thêm vào giỏ hàng!')">
                        <i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ hàng
                    </button>
                    <button class="btn-wishlist">
                        <i class="fa-regular fa-heart"></i> Yêu thích
                    </button>
                </div>

                <div class="book-extra">
                    <div class="extra-item">
                        <i class="fa-solid fa-truck-fast"></i>
                        <div>
                            <strong>Miễn phí vận chuyển</strong>
                            Đơn từ 300.000đ
                        </div>
                    </div>
                    <div class="extra-item">
                        <i class="fa-solid fa-rotate-left"></i>
                        <div>
                            <strong>Đổi trả 7 ngày</strong>
                            Nếu sách bị lỗi
                        </div>
                    </div>
                    <div class="extra-item">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div>
                            <strong>Chính hãng 100%</strong>
                            Sách chất lượng cao
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-inner">
            <div class="footer-logo">Tiệm<span>Sách</span></div>
            <p class="footer-copy">&copy; 2025 <strong>TiệmSách</strong> &mdash; Mọi quyền được bảo lưu.</p>
        </div>
    </footer>

</body>
</html>
