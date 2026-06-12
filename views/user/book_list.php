<?php
/**
 * @var string|int $category_id
 * @var string|int $author_id
 * @var array $books
 * @var array $categories
 * @var array $authors
 * @var string $keyword
 * @var int $totalPages
 * @var int $page
 * @var string $sort
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiệm Sách - Cửa Hàng Sách Online</title>
    <meta name="description" content="Khám phá hàng ngàn đầu sách hay với giá tốt nhất tại Tiệm Sách">
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
        html { scroll-behavior: smooth; }
        body { font-family: var(--font-body); background-color: var(--off-white); color: var(--dark); line-height: 1.6; }
        a { text-decoration: none; color: inherit; transition: color 0.2s; }

        /* ====== TOP BAR ====== */
        .top-bar {
            background: var(--primary);
            color: var(--white);
            padding: 0.5rem 0;
            font-size: 0.8rem;
            font-family: var(--font-heading);
        }
        .top-bar-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .top-bar-left { display: flex; align-items: center; gap: 0.5rem; }
        .top-bar-left i { font-size: 0.9rem; }
        .top-bar-right { display: flex; align-items: center; gap: 1rem; }
        .top-bar-right a { color: var(--white); opacity: 0.9; }
        .top-bar-right a:hover { opacity: 1; }

        /* ====== MAIN HEADER ====== */
        .main-header {
            background: var(--white);
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .header-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        .logo {
            font-family: var(--font-heading);
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.6rem;
            white-space: nowrap;
        }
        .logo span { color: var(--primary); }
        .logo i { color: var(--primary); font-size: 1.5rem; }

        .search-form {
            flex: 1;
            max-width: 560px;
            display: flex;
            border: 2px solid var(--border);
            border-radius: 50px;
            overflow: hidden;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .search-form:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(34,197,94,0.15);
        }
        .search-form input {
            flex: 1;
            padding: 0.75rem 1.25rem;
            border: none;
            outline: none;
            font-family: var(--font-body);
            font-size: 0.9rem;
            background: transparent;
        }
        .search-form button {
            background: var(--primary);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.2s;
        }
        .search-form button:hover { background: var(--primary-dark); }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: auto;
        }
        .header-action-btn {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.6rem 1.25rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            font-family: var(--font-heading);
            letter-spacing: 0.5px;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .btn-outline {
            border: 2px solid var(--border);
            color: var(--gray);
        }
        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }
        .btn-solid {
            background: var(--primary);
            color: var(--white);
            border: 2px solid var(--primary);
        }
        .btn-solid:hover { background: var(--primary-dark); border-color: var(--primary-dark); }

        /* ====== NAVBAR ====== */
        .navbar {
            background: var(--dark);
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        .navbar-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nav-links {
            display: flex;
            list-style: none;
        }
        .nav-links a {
            display: block;
            padding: 0.85rem 1.25rem;
            color: rgba(255,255,255,0.8);
            font-family: var(--font-heading);
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: color 0.2s, background 0.2s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--primary);
            background: rgba(34,197,94,0.08);
        }
        .nav-badge {
            background: var(--primary);
            color: var(--white);
            font-size: 0.65rem;
            padding: 0.15rem 0.4rem;
            border-radius: 20px;
            margin-left: 0.3rem;
            font-weight: 700;
        }

        /* ====== HERO BANNER ====== */
        .hero {
            background: linear-gradient(135deg, var(--dark) 0%, var(--dark-2) 100%);
            padding: 4rem 2rem;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(34,197,94,0.15) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-inner {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }
        .hero-content { max-width: 600px; }
        .hero-label {
            display: inline-block;
            background: rgba(34,197,94,0.2);
            color: var(--primary);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: var(--font-heading);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            border: 1px solid rgba(34,197,94,0.3);
        }
        .hero h1 {
            font-family: var(--font-heading);
            font-size: 3rem;
            font-weight: 700;
            color: var(--white);
            line-height: 1.1;
            margin-bottom: 1rem;
        }
        .hero h1 span { color: var(--primary); }
        .hero p {
            color: rgba(255,255,255,0.6);
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.7;
        }
        .hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; }
        .hero-btn-primary {
            background: var(--primary);
            color: var(--white);
            padding: 0.9rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-family: var(--font-heading);
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }
        .hero-btn-primary:hover { background: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 8px 25px rgba(34,197,94,0.4); }
        .hero-btn-secondary {
            background: transparent;
            color: var(--white);
            padding: 0.9rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-family: var(--font-heading);
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 2px solid rgba(255,255,255,0.3);
            transition: all 0.2s;
        }
        .hero-btn-secondary:hover { border-color: var(--white); }
        .hero-stats {
            display: flex;
            gap: 2.5rem;
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .hero-stat { text-align: center; }
        .hero-stat-num {
            font-family: var(--font-heading);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        .hero-stat-label {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.5);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .hero-icon-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            flex-shrink: 0;
        }
        .hero-icon-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: var(--radius);
            padding: 1.5rem;
            text-align: center;
            backdrop-filter: blur(4px);
        }
        .hero-icon-card i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
            display: block;
        }
        .hero-icon-card span {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.6);
            font-family: var(--font-heading);
        }

        /* ====== MAIN CONTENT ====== */
        .page-wrapper {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2.5rem 2rem;
            display: flex;
            gap: 2rem;
        }

        /* ====== SIDEBAR ====== */
        .sidebar {
            width: 260px;
            flex-shrink: 0;
        }
        .filter-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            overflow: hidden;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-sm);
        }
        .filter-card-header {
            padding: 1.1rem 1.5rem;
            background: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .filter-card-header i { color: var(--primary); font-size: 0.9rem; }
        .filter-card-title {
            font-family: var(--font-heading);
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--white);
        }
        .filter-list { list-style: none; padding: 0.75rem 0; }
        .filter-list li a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.6rem 1.5rem;
            font-size: 0.875rem;
            color: var(--gray);
            transition: all 0.2s;
        }
        .filter-list li a:hover, .filter-list li a.active {
            color: var(--primary);
            background: var(--primary-bg);
            padding-left: 2rem;
        }
        .filter-list li a.active { font-weight: 600; }
        .filter-count {
            background: var(--off-white);
            color: var(--gray);
            font-size: 0.7rem;
            padding: 0.1rem 0.5rem;
            border-radius: 20px;
        }
        .filter-list li a.active .filter-count {
            background: var(--primary-bg);
            color: var(--primary);
        }

        /* ====== CONTENT AREA ====== */
        .content-area { flex: 1; min-width: 0; }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .section-title {
            font-family: var(--font-heading);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .section-title::after {
            content: '';
            display: block;
            width: 4px;
            height: 24px;
            background: var(--primary);
            border-radius: 2px;
            margin-right: 0.25rem;
            order: -1;
        }

        .topbar {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 0.85rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-sm);
        }
        .topbar-info { font-size: 0.875rem; color: var(--gray); }
        .topbar-info strong { color: var(--dark); font-weight: 600; }
        .sort-select {
            padding: 0.5rem 1rem;
            border: 1px solid var(--border);
            border-radius: 50px;
            outline: none;
            font-family: var(--font-body);
            font-size: 0.85rem;
            color: var(--dark);
            background: var(--white);
            cursor: pointer;
            transition: border-color 0.2s;
        }
        .sort-select:focus { border-color: var(--primary); }

        /* ====== BOOK GRID ====== */
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        /* ====== BOOK CARD ====== */
        .book-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .book-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: var(--border-green);
        }
        .book-badge {
            position: absolute;
            top: 0.75rem;
            left: 0.75rem;
            z-index: 2;
            background: var(--primary);
            color: var(--white);
            font-size: 0.65rem;
            font-weight: 700;
            font-family: var(--font-heading);
            letter-spacing: 0.5px;
            padding: 0.25rem 0.6rem;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .wishlist-btn {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            z-index: 2;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.75rem;
            color: var(--gray);
            transition: all 0.2s;
            opacity: 0;
        }
        .book-card:hover .wishlist-btn {
            opacity: 1;
        }
        .wishlist-btn:hover { background: var(--primary); color: var(--white); border-color: var(--primary); }

        .book-cover {
            height: 240px;
            background: linear-gradient(135deg, var(--off-white) 0%, #e5e7eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .book-cover-icon {
            font-size: 5rem;
            color: var(--border);
            transition: transform 0.3s, color 0.3s;
        }
        .book-card:hover .book-cover-icon {
            color: var(--primary-light);
            transform: scale(1.05) rotate(-3deg);
        }
        .book-cover-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(34,197,94,0.9) 0%, transparent 100%);
            padding: 1.5rem 1rem 1rem;
            transform: translateY(100%);
            transition: transform 0.3s;
        }
        .book-card:hover .book-cover-overlay { transform: translateY(0); }
        .quick-view-btn {
            display: block;
            background: var(--white);
            color: var(--primary-dark);
            text-align: center;
            padding: 0.5rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 700;
            font-family: var(--font-heading);
            letter-spacing: 0.5px;
        }

        .book-info { padding: 1.25rem; flex: 1; display: flex; flex-direction: column; }
        .book-stars {
            display: flex;
            gap: 2px;
            margin-bottom: 0.5rem;
        }
        .book-stars i { color: #f59e0b; font-size: 0.7rem; }
        .book-author-name {
            font-size: 0.75rem;
            color: var(--gray);
            margin-bottom: 0.4rem;
            font-family: var(--font-heading);
            letter-spacing: 0.3px;
        }
        .book-title-link {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.4;
            font-family: var(--font-heading);
        }
        .book-title-link:hover { color: var(--primary); }
        .book-price-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
        }
        .book-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-dark);
            font-family: var(--font-heading);
        }
        .add-to-cart-btn {
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.75rem;
            transition: all 0.2s;
        }
        .add-to-cart-btn:hover { background: var(--primary-dark); transform: scale(1.1); }

        /* ====== EMPTY STATE ====== */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            color: var(--gray);
        }
        .empty-state i {
            font-size: 4rem;
            color: var(--border);
            margin-bottom: 1rem;
        }
        .empty-state h3 {
            font-family: var(--font-heading);
            font-size: 1.25rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        .empty-state p { font-size: 0.9rem; }

        /* ====== PAGINATION ====== */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
            flex-wrap: wrap;
        }
        .pagination a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray);
            background: var(--white);
            transition: all 0.2s;
        }
        .pagination a:hover, .pagination a.active {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(34,197,94,0.3);
        }

        /* ====== FOOTER ====== */
        footer {
            background: var(--dark);
            color: rgba(255,255,255,0.7);
            margin-top: 4rem;
        }
        .footer-top {
            background: rgba(0,0,0,0.3);
            padding: 2rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }
        .footer-top-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }
        .footer-logo {
            font-family: var(--font-heading);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--white);
        }
        .footer-logo span { color: var(--primary); }
        .newsletter-form { display: flex; gap: 0; border-radius: 50px; overflow: hidden; border: 2px solid rgba(255,255,255,0.1); }
        .newsletter-form input {
            background: transparent;
            border: none;
            padding: 0.75rem 1.25rem;
            color: var(--white);
            outline: none;
            min-width: 280px;
            font-family: var(--font-body);
            font-size: 0.875rem;
        }
        .newsletter-form input::placeholder { color: rgba(255,255,255,0.4); }
        .newsletter-form button {
            background: var(--primary);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            font-family: var(--font-heading);
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .newsletter-form button:hover { background: var(--primary-dark); }
        .footer-main {
            max-width: 1280px;
            margin: 0 auto;
            padding: 3rem 2rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }
        .footer-col-title {
            font-family: var(--font-heading);
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--white);
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--primary);
            display: inline-block;
        }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 0.6rem; }
        .footer-links a {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.6);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }
        .footer-links a:hover { color: var(--primary); padding-left: 0.25rem; }
        .footer-links a i { font-size: 0.7rem; color: var(--primary); }
        .footer-bottom {
            background: rgba(0,0,0,0.3);
            padding: 1.25rem 0;
            border-top: 1px solid rgba(255,255,255,0.07);
        }
        .footer-bottom-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .footer-social { display: flex; gap: 0.75rem; }
        .footer-social a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.7);
            font-size: 0.85rem;
            transition: all 0.2s;
        }
        .footer-social a:hover { background: var(--primary); color: var(--white); }
        .footer-copy { font-size: 0.8rem; color: rgba(255,255,255,0.4); }
        .footer-copy strong { color: var(--primary); }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            .hero-icon-grid { display: none; }
            .page-wrapper { flex-direction: column; }
            .sidebar { width: 100%; }
            .book-grid { grid-template-columns: repeat(2, 1fr); }
            .footer-main { grid-template-columns: repeat(2, 1fr); }
            .header-inner { flex-wrap: wrap; }
        }
    </style>
</head>
<body>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="top-bar-inner">
            <div class="top-bar-left">
                <i class="fa-solid fa-truck-fast"></i>
                Giao hàng nhanh toàn quốc &mdash; Miễn phí ship đơn trên 300k
            </div>
            <div class="top-bar-right">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#" style="border-left: 1px solid rgba(255,255,255,0.3); padding-left: 1rem;">
                    <i class="fa-solid fa-globe"></i> Tiếng Việt
                </a>
            </div>
        </div>
    </div>

    <!-- MAIN HEADER -->
    <div class="main-header">
        <div class="header-inner">
            <a href="index.php" class="logo">
                <i class="fa-solid fa-book-open-reader"></i>
                Tiệm<span>Sách</span>
            </a>
            <form action="index.php" method="GET" class="search-form">
                <?php if(isset($_GET['category'])): ?><input type="hidden" name="category" value="<?= htmlspecialchars($_GET['category']) ?>"><?php endif; ?>
                <?php if(isset($_GET['author'])): ?><input type="hidden" name="author" value="<?= htmlspecialchars($_GET['author']) ?>"><?php endif; ?>
                <input type="text" name="keyword" placeholder="Tìm kiếm tên sách, tác giả..." value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="header-actions">
                <a href="?area=admin" class="header-action-btn btn-outline">
                    <i class="fa-solid fa-user-shield"></i> Quản trị
                </a>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-inner">
            <ul class="nav-links">
                <li><a href="index.php" class="active"><i class="fa-solid fa-house" style="font-size:0.75rem;"></i> Trang chủ</a></li>
                <li><a href="index.php">Tất cả sách <span class="nav-badge">New</span></a></li>
                <?php foreach(array_slice($categories, 0, 5) as $cat): ?>
                <li><a href="?category=<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div style="display: flex; align-items: center; gap: 1.5rem;">
                <a href="#" style="color: rgba(255,255,255,0.7); font-size: 0.85rem; display: flex; align-items: center; gap: 0.4rem;">
                    <i class="fa-regular fa-heart"></i>
                </a>
                <a href="#" style="color: rgba(255,255,255,0.7); font-size: 0.85rem; display: flex; align-items: center; gap: 0.4rem; position: relative;">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span style="position:absolute;top:-6px;right:-8px;background:var(--primary);color:var(--white);font-size:0.6rem;width:16px;height:16px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;">0</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- HERO BANNER -->
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-content">
                <span class="hero-label"><i class="fa-solid fa-star"></i> Bộ sưu tập mới nhất</span>
                <h1>Khám Phá <span>Thế Giới</span><br>Qua Những Trang Sách</h1>
                <p>Hơn 10,000 đầu sách đa thể loại với giá tốt nhất.<br>Tìm cuốn sách hoàn hảo cho bạn ngay hôm nay.</p>
                <div class="hero-btns">
                    <a href="index.php" class="hero-btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i> Khám phá ngay
                    </a>
                    <a href="#" class="hero-btn-secondary">
                        <i class="fa-regular fa-circle-play"></i> Xem video giới thiệu
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-num">10K+</div>
                        <div class="hero-stat-label">Đầu sách</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-num">500+</div>
                        <div class="hero-stat-label">Tác giả</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-num">50K+</div>
                        <div class="hero-stat-label">Khách hàng</div>
                    </div>
                </div>
            </div>
            <div class="hero-icon-grid">
                <div class="hero-icon-card"><i class="fa-solid fa-book-open"></i><span>Văn học</span></div>
                <div class="hero-icon-card"><i class="fa-solid fa-flask"></i><span>Khoa học</span></div>
                <div class="hero-icon-card"><i class="fa-solid fa-graduation-cap"></i><span>Giáo dục</span></div>
                <div class="hero-icon-card"><i class="fa-solid fa-lightbulb"></i><span>Kinh doanh</span></div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="page-wrapper">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="filter-card">
                <div class="filter-card-header">
                    <i class="fa-solid fa-list"></i>
                    <span class="filter-card-title">Thể loại</span>
                </div>
                <ul class="filter-list">
                    <li>
                        <a href="index.php" class="<?= empty($category_id) && empty($author_id) ? 'active' : '' ?>">
                            <span>Tất cả thể loại</span>
                            <span class="filter-count"><?= count($books) ?></span>
                        </a>
                    </li>
                    <?php foreach($categories as $cat): ?>
                    <li>
                        <a href="?category=<?= $cat['id'] ?><?= !empty($keyword) ? '&keyword='.urlencode($keyword) : '' ?>"
                           class="<?= $category_id == $cat['id'] ? 'active' : '' ?>">
                            <span><?= htmlspecialchars($cat['name']) ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="filter-card">
                <div class="filter-card-header">
                    <i class="fa-solid fa-user-pen"></i>
                    <span class="filter-card-title">Tác giả</span>
                </div>
                <ul class="filter-list">
                    <li>
                        <a href="index.php" class="<?= empty($author_id) && empty($category_id) ? 'active' : '' ?>">
                            <span>Tất cả tác giả</span>
                        </a>
                    </li>
                    <?php foreach($authors as $auth): ?>
                    <li>
                        <a href="?author=<?= $auth['id'] ?><?= !empty($keyword) ? '&keyword='.urlencode($keyword) : '' ?>"
                           class="<?= $author_id == $auth['id'] ? 'active' : '' ?>">
                            <span><?= htmlspecialchars($auth['name']) ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>

        <!-- CONTENT AREA -->
        <main class="content-area">
            <div class="section-header">
                <h2 class="section-title">
                    <?php if(!empty($keyword)): ?>
                        Kết quả tìm kiếm: "<?= htmlspecialchars($keyword) ?>"
                    <?php elseif(!empty($category_id)): ?>
                        Thể loại: <?= htmlspecialchars($categories[array_search($category_id, array_column($categories, 'id'))]['name'] ?? '') ?>
                    <?php else: ?>
                        Tất cả sách
                    <?php endif; ?>
                </h2>
            </div>

            <div class="topbar">
                <div class="topbar-info">
                    Hiển thị <strong><?= count($books) ?></strong> kết quả<?= $totalPages > 1 ? ' &mdash; Trang <strong>'.$page.'</strong> / '.$totalPages : '' ?>
                </div>
                <form action="index.php" method="GET">
                    <?php if(!empty($keyword)): ?><input type="hidden" name="keyword" value="<?= htmlspecialchars($keyword) ?>"><?php endif; ?>
                    <?php if(!empty($category_id)): ?><input type="hidden" name="category" value="<?= htmlspecialchars($category_id) ?>"><?php endif; ?>
                    <?php if(!empty($author_id)): ?><input type="hidden" name="author" value="<?= htmlspecialchars($author_id) ?>"><?php endif; ?>
                    <select name="sort" class="sort-select" onchange="this.form.submit()">
                        <option value="newest" <?= $sort == 'newest' ? 'selected' : '' ?>>Mới nhất</option>
                        <option value="price_asc" <?= $sort == 'price_asc' ? 'selected' : '' ?>>Giá: Thấp → Cao</option>
                        <option value="price_desc" <?= $sort == 'price_desc' ? 'selected' : '' ?>>Giá: Cao → Thấp</option>
                    </select>
                </form>
            </div>

            <div class="book-grid">
                <?php if (count($books) > 0): ?>
                    <?php foreach($books as $index => $book): ?>
                    <div class="book-card">
                        <?php if($index < 3): ?>
                        <span class="book-badge">Hot</span>
                        <?php endif; ?>
                        <button class="wishlist-btn" title="Yêu thích">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                        <a href="?action=detail&id=<?= $book['id'] ?>" class="book-cover" style="background: url('<?= htmlspecialchars($book['img'] ?? 'assets/img/cover_business.png') ?>') center/cover no-repeat;">
                            <div class="book-cover-overlay">
                                <span class="quick-view-btn">
                                    <i class="fa-solid fa-eye"></i> Xem chi tiết
                                </span>
                            </div>
                        </a>
                        <div class="book-info">

                            <div class="book-author-name">
                                <i class="fa-solid fa-user" style="font-size:0.65rem;color:var(--primary);"></i>
                                <?= htmlspecialchars($book['author_name'] ?? 'Chưa rõ tác giả') ?>
                            </div>
                            <a href="?action=detail&id=<?= $book['id'] ?>" class="book-title-link" title="<?= htmlspecialchars($book['title']) ?>">
                                <?= htmlspecialchars($book['title']) ?>
                            </a>
                            <div class="book-price-row">
                                <span class="book-price"><?= number_format($book['price'], 0, ',', '.') ?> đ</span>
                                <button class="add-to-cart-btn" title="Thêm vào giỏ" onclick="alert('Đã thêm vào giỏ hàng!')">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state" style="grid-column: 1/-1;">
                        <i class="fa-solid fa-book-open"></i>
                        <h3>Không tìm thấy sách</h3>
                        <p>Thử tìm kiếm với từ khóa khác hoặc xem tất cả sách.</p>
                        <br>
                        <a href="index.php" class="hero-btn-primary" style="display:inline-flex;margin-top:1rem;">
                            <i class="fa-solid fa-arrow-left"></i> Xem tất cả sách
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- PAGINATION -->
            <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php if ($page > 1): ?>
                <a href="?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])) ?>">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <?php endif; ?>
                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"
                       class="<?= $page == $i ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
                <?php if ($page < $totalPages): ?>
                <a href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])) ?>">
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </main>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-top">
            <div class="footer-top-inner">
                <div class="footer-logo">Tiệm<span>Sách</span></div>
                <form class="newsletter-form">
                    <input type="email" placeholder="Nhập email để nhận thông báo sách mới...">
                    <button type="submit">Đăng ký</button>
                </form>
            </div>
        </div>
        <div class="footer-main">
            <div>
                <span class="footer-col-title">Về chúng tôi</span>
                <ul class="footer-links">
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Giới thiệu</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Liên hệ</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Tuyển dụng</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Tin tức</a></li>
                </ul>
            </div>
            <div>
                <span class="footer-col-title">Dịch vụ</span>
                <ul class="footer-links">
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Giao hàng</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Đổi trả</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Thanh toán</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Hỗ trợ</a></li>
                </ul>
            </div>
            <div>
                <span class="footer-col-title">Thể loại</span>
                <ul class="footer-links">
                    <?php foreach(array_slice($categories, 0, 5) as $cat): ?>
                    <li><a href="?category=<?= $cat['id'] ?>"><i class="fa-solid fa-chevron-right"></i> <?= htmlspecialchars($cat['name']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <span class="footer-col-title">Liên hệ</span>
                <ul class="footer-links">
                    <li><a href="#"><i class="fa-solid fa-location-dot"></i> FPT POLYTECHNIC, Thái Nguyên</a></li>
                    <li><a href="#"><i class="fa-solid fa-phone"></i> 0800 123 456</a></li>
                    <li><a href="#"><i class="fa-solid fa-envelope"></i> hello@tiemsach.vn</a></li>
                    <li><a href="#"><i class="fa-regular fa-clock"></i> T2 – T7: 8:00 – 22:00</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-inner">
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
                <p class="footer-copy">&copy; 2025 <strong>TiệmSách</strong> &mdash; Mọi quyền được bảo lưu.</p>
                <div style="font-size: 0.75rem; color: rgba(255,255,255,0.3);">
                    <i class="fa-brands fa-cc-visa" style="font-size:1.2rem;"></i>
                    <i class="fa-brands fa-cc-mastercard" style="font-size:1.2rem;"></i>
                    <i class="fa-brands fa-paypal" style="font-size:1.2rem;"></i>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
