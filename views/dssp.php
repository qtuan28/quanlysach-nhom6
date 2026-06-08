<?php /** @var array $sp */  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa Hàng - ASM2 Nhóm 6</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome cho icon -->
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
            --danger: #ef4444;
            --success: #10b981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: var(--text-dark);
            line-height: 1.5;
        }

        /* HEADER */
        header {
            background-color: var(--white);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .header-top {
            background-color: var(--text-dark);
            color: var(--white);
            font-size: 0.875rem;
            padding: 0.5rem 0;
            text-align: center;
        }

        .header-main {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-bar {
            flex: 1;
            max-width: 500px;
            display: flex;
            margin: 0 2rem;
        }

        .search-bar input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            border-right: none;
            border-radius: 8px 0 0 8px;
            outline: none;
            font-family: inherit;
        }

        .search-bar input:focus {
            border-color: var(--primary);
        }

        .search-bar button {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            padding: 0 1.5rem;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .search-bar button:hover {
            background-color: var(--primary-hover);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 0.875rem;
            gap: 0.25rem;
            transition: color 0.2s;
            position: relative;
        }

        .action-item:hover {
            color: var(--primary);
        }

        .action-item i {
            font-size: 1.25rem;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: var(--danger);
            color: var(--white);
            font-size: 0.7rem;
            font-weight: 700;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* BANNER */
        .banner {
            max-width: 1280px;
            margin: 2rem auto;
            border-radius: 16px;
            overflow: hidden;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: var(--white);
            display: flex;
            align-items: center;
            padding: 3rem 4rem;
            position: relative;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .banner-content {
            max-width: 50%;
            z-index: 2;
        }

        .banner-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .banner-content p {
            font-size: 1.125rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-shop {
            background-color: var(--white);
            color: var(--primary);
            padding: 0.75rem 2rem;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
            display: inline-block;
        }

        .btn-shop:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* MAIN LAYOUT */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            position: relative;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            border-radius: 2px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 2rem;
        }

        /* PRODUCT CARD */
        .product-card {
            background-color: var(--white);
            border-radius: 12px;
            border: 1px solid var(--border);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-color: transparent;
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background-color: var(--danger);
            color: var(--white);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            z-index: 10;
        }

        .product-image {
            height: 220px;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .product-image i {
            font-size: 4rem;
            color: var(--text-light);
            opacity: 0.5;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image i {
            transform: scale(1.1);
        }

        .product-action {
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            transition: bottom 0.3s ease;
            padding: 1rem;
            background: linear-gradient(to top, rgba(255,255,255,0.9), transparent);
        }

        .product-card:hover .product-action {
            bottom: 0;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--white);
            color: var(--text-dark);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-icon:hover {
            background-color: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        .product-info {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .product-category {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-name {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .rating {
            color: #fbbf24;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .rating span {
            color: var(--text-light);
            margin-left: 0.25rem;
        }

        .product-bottom {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .price-box {
            display: flex;
            flex-direction: column;
        }

        .price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
        }

        .old-price {
            font-size: 0.875rem;
            color: var(--text-light);
            text-decoration: line-through;
        }

        .btn-add-cart {
            background-color: var(--text-dark);
            color: var(--white);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-add-cart:hover {
            background-color: var(--primary);
        }

        .stock-status {
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            margin-top: 0.75rem;
        }

        .stock-status.in-stock {
            color: var(--success);
        }

        .stock-status.low-stock {
            color: var(--danger);
        }

        /* FOOTER */
        footer {
            background-color: var(--text-dark);
            color: var(--white);
            padding: 3rem 0;
            margin-top: auto;
        }

        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-col h3 {
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
            color: var(--white);
        }

        .footer-col p, .footer-col a {
            color: #9ca3af;
            text-decoration: none;
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
            display: block;
        }

        .footer-col a:hover {
            color: var(--white);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s;
            color: var(--white);
        }

        .social-links a:hover {
            background-color: var(--primary);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="header-top">
            Miễn phí vận chuyển cho đơn hàng trên 500.000 VNĐ!
        </div>
        <div class="header-main">
            <a href="#" class="logo">
                <i class="fa-solid fa-store"></i>
                ASM2 Nhóm 6
            </a>
            
            <div class="search-bar">
                <form action="" method="GET" style="display: flex; width: 100%;">
                    <?php if(isset($sort)): ?><input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>"><?php endif; ?>
                    <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <div class="header-actions">
                <a href="#" class="action-item">
                    <i class="fa-regular fa-user"></i>
                    <span>Tài khoản</span>
                </a>
                <a href="#" class="action-item">
                    <i class="fa-regular fa-heart"></i>
                    <span>Yêu thích</span>
                    <span class="badge">0</span>
                </a>
                <a href="#" class="action-item">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Giỏ hàng</span>
                    <span class="badge"><?= isset($cartCount) ? $cartCount : 0 ?></span>
                </a>
            </div>
        </div>
    </header>

    <!-- Banner -->
    <div class="banner">
        <div class="banner-content">
            <h2>Bộ Sưu Tập<br>Công Nghệ Mới</h2>
            <p>Khám phá những sản phẩm mới nhất với mức giá ưu đãi chưa từng có. Giảm ngay 20% cho đơn hàng đầu tiên.</p>
            <a href="#" class="btn-shop">Mua Sắm Ngay</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Sản Phẩm Nổi Bật</h2>
            <div class="sort-by">
                <form action="" method="GET">
                    <?php if(isset($keyword) && $keyword != ''): ?><input type="hidden" name="keyword" value="<?= htmlspecialchars($keyword) ?>"><?php endif; ?>
                    <select name="sort" onchange="this.form.submit()" style="padding: 0.5rem; border-radius: 6px; border: 1px solid var(--border); outline: none;">
                        <option value="newest" <?= (isset($sort) && $sort == 'newest') ? 'selected' : '' ?>>Sắp xếp: Mới nhất</option>
                        <option value="price_asc" <?= (isset($sort) && $sort == 'price_asc') ? 'selected' : '' ?>>Giá: Thấp đến cao</option>
                        <option value="price_desc" <?= (isset($sort) && $sort == 'price_desc') ? 'selected' : '' ?>>Giá: Cao đến thấp</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="product-grid">
            <?php 
            if (isset($sp) && !empty($sp)) {
                foreach ($sp as $SP): 
                    $isLowStock = isset($SP['sl']) && (int)$SP['sl'] < 5;
                    $isNew = rand(0, 1) == 1; // Logic giả lập cho nhãn "MỚI"
                    $rating = rand(4, 5); // Đánh giá giả lập
                    $reviews = rand(10, 150);
            ?>
            <div class="product-card">
                <?php if ($isNew): ?>
                    <div class="product-badge">MỚI</div>
                <?php endif; ?>
                
                <div class="product-image">
                    <i class="fa-solid fa-image"></i> <!-- Placeholder Icon -->
                    <div class="product-action">
                        <button class="btn-icon" title="Thêm vào yêu thích"><i class="fa-regular fa-heart"></i></button>
                        <button class="btn-icon" title="Xem nhanh"><i class="fa-regular fa-eye"></i></button>
                    </div>
                </div>

                <div class="product-info">
                    <div class="product-category">Điện tử</div>
                    <div class="product-name" title="<?= htmlspecialchars($SP['tenSP'] ?? '') ?>">
                        <?= htmlspecialchars($SP['tenSP'] ?? 'Chưa cập nhật') ?>
                    </div>
                    
                    <div class="rating">
                        <?php for($i=1; $i<=5; $i++): ?>
                            <i class="fa-<?= $i <= $rating ? 'solid' : 'regular' ?> fa-star"></i>
                        <?php endfor; ?>
                        <span>(<?= $reviews ?>)</span>
                    </div>

                    <div class="product-bottom">
                        <div class="price-box">
                            <span class="price"><?= number_format($SP['gia'] ?? 0, 0, ',', '.') ?>đ</span>
                            <!-- Giả lập giá cũ để trông có vẻ khuyến mãi -->
                            <span class="old-price"><?= number_format(($SP['gia'] ?? 0) * 1.2, 0, ',', '.') ?>đ</span>
                        </div>
                        <form action="?action=add_cart<?= isset($keyword) && $keyword != '' ? '&keyword='.urlencode($keyword) : '' ?><?= isset($sort) ? '&sort='.urlencode($sort) : '' ?>" method="POST" style="margin:0;">
                            <input type="hidden" name="id" value="<?= isset($SP['id']) ? $SP['id'] : 0 ?>">
                            <button type="submit" class="btn-add-cart">
                                <i class="fa-solid fa-cart-plus"></i> Mua
                            </button>
                        </form>
                    </div>

                    <div class="stock-status <?= $isLowStock ? 'low-stock' : 'in-stock' ?>">
                        <i class="fa-solid fa-<?= $isLowStock ? 'circle-exclamation' : 'check-circle' ?>"></i>
                        <?= $isLowStock ? "Chỉ còn " . htmlspecialchars($SP['sl']) . " sản phẩm" : "Còn hàng" ?>
                    </div>
                </div>
            </div>
            <?php 
                endforeach; 
            } else {
                echo "<div style='grid-column: 1/-1; text-align: center; padding: 3rem; background: var(--white); border-radius: 12px; border: 1px solid var(--border);'>
                        <i class='fa-solid fa-box-open' style='font-size: 3rem; color: var(--text-light); margin-bottom: 1rem;'></i>
                        <p style='font-size: 1.2rem; color: var(--text-dark);'>Chưa có sản phẩm nào trong cửa hàng.</p>
                      </div>";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-col">
                <h3>ASM2 Nhóm 6</h3>
                <p>Cửa hàng cung cấp các sản phẩm công nghệ uy tín, chất lượng hàng đầu với mức giá tốt nhất thị trường.</p>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Về Chúng Tôi</h3>
                <a href="#">Giới thiệu</a>
                <a href="#">Tuyển dụng</a>
                <a href="#">Chính sách bảo mật</a>
                <a href="#">Điều khoản sử dụng</a>
            </div>
            <div class="footer-col">
                <h3>Hỗ Trợ Khách Hàng</h3>
                <a href="#">Trung tâm trợ giúp</a>
                <a href="#">Hướng dẫn mua hàng</a>
                <a href="#">Chính sách đổi trả</a>
                <a href="#">Liên hệ</a>
            </div>
            <div class="footer-col">
                <h3>Liên Hệ</h3>
                <p><i class="fa-solid fa-location-dot" style="margin-right: 8px;"></i> FPT Polytechnic, Thái Nguyên</p>
                <p><i class="fa-solid fa-phone" style="margin-right: 8px;"></i> 1900 xxxx</p>
                <p><i class="fa-solid fa-envelope" style="margin-right: 8px;"></i> contact@nhom6.com</p>
            </div>
        </div>
    </footer>

</body>
</html>
