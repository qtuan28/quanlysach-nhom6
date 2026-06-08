<?php /** @var array $sp */  ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiệmSách - Khám phá thế giới qua những trang sách</title>
    <meta name="description" content="Cửa hàng sách online lớn nhất với hơn 10,000 đầu sách đa thể loại">
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
            --danger: #ef4444;
            --success: #22c55e;
            --font-heading: 'Josefin Sans', sans-serif;
            --font-body: 'Poppins', sans-serif;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.10);
            --shadow-lg: 0 10px 40px rgba(0,0,0,0.15);
            --radius: 10px;
            --radius-lg: 16px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: var(--font-body); background-color: var(--off-white); color: var(--dark); line-height: 1.6; }
        a { text-decoration: none; color: inherit; transition: color 0.2s; }

        /* ===== TOP BAR ===== */
        .top-bar {
            background: var(--dark);
            color: rgba(255,255,255,0.8);
            padding: 0.55rem 0;
            font-size: 0.78rem;
            font-family: var(--font-heading);
            letter-spacing: 0.3px;
        }
        .top-bar-inner {
            max-width: 1280px; margin: 0 auto; padding: 0 2rem;
            display: flex; justify-content: space-between; align-items: center;
        }
        .top-bar-left { display: flex; align-items: center; gap: 0.5rem; }
        .top-bar-left i { color: var(--primary); }
        .top-bar-right { display: flex; align-items: center; gap: 1.25rem; }
        .top-bar-right a { color: rgba(255,255,255,0.7); transition: color 0.2s; }
        .top-bar-right a:hover { color: var(--primary); }
        .top-bar-divider { width: 1px; height: 14px; background: rgba(255,255,255,0.15); }

        /* ===== MAIN HEADER ===== */
        .main-header {
            background: var(--white);
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            position: sticky; top: 0; z-index: 100;
        }
        .header-inner {
            max-width: 1280px; margin: 0 auto;
            padding: 1rem 2rem;
            display: flex; align-items: center; gap: 2rem;
        }
        .logo {
            font-family: var(--font-heading);
            font-size: 1.8rem; font-weight: 700;
            color: var(--dark);
            display: flex; align-items: center; gap: 0.6rem;
            white-space: nowrap; flex-shrink: 0;
        }
        .logo-icon {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: var(--radius);
            display: flex; align-items: center; justify-content: center;
            color: var(--white); font-size: 1.1rem;
        }
        .logo span { color: var(--primary); }

        .search-wrap { flex: 1; max-width: 580px; }
        .search-form {
            display: flex;
            border: 2px solid var(--border);
            border-radius: 50px;
            overflow: hidden;
            transition: border-color 0.25s, box-shadow 0.25s;
        }
        .search-form:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(34,197,94,0.12);
        }
        .search-form input {
            flex: 1; padding: 0.8rem 1.4rem;
            border: none; outline: none;
            font-family: var(--font-body); font-size: 0.9rem;
            background: transparent; color: var(--dark);
        }
        .search-form input::placeholder { color: var(--gray); }
        .search-form button {
            background: var(--primary); color: var(--white);
            border: none; padding: 0.8rem 1.6rem;
            font-size: 0.95rem; cursor: pointer;
            transition: background 0.2s;
        }
        .search-form button:hover { background: var(--primary-dark); }

        .header-actions {
            display: flex; align-items: center; gap: 0.75rem; margin-left: auto;
        }
        .hdr-btn {
            display: flex; align-items: center; gap: 0.4rem;
            padding: 0.6rem 1.2rem; border-radius: 50px;
            font-family: var(--font-heading); font-size: 0.82rem;
            font-weight: 600; letter-spacing: 0.4px;
            white-space: nowrap; transition: all 0.2s;
        }
        .hdr-btn-outline { border: 2px solid var(--border); color: var(--gray); }
        .hdr-btn-outline:hover { border-color: var(--primary); color: var(--primary); }
        .hdr-btn-solid { background: var(--primary); color: var(--white); border: 2px solid var(--primary); }
        .hdr-btn-solid:hover { background: var(--primary-dark); border-color: var(--primary-dark); }
        .cart-icon-wrap {
            position: relative; display: flex; align-items: center;
            gap: 0.4rem; color: var(--dark);
            font-size: 0.85rem; padding: 0.6rem;
        }
        .cart-icon-wrap i { font-size: 1.2rem; }
        .cart-badge {
            position: absolute; top: 0; right: 0;
            background: var(--danger); color: var(--white);
            font-size: 0.6rem; font-weight: 700;
            min-width: 18px; height: 18px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
        }

        /* ===== NAVBAR ===== */
        .navbar { background: var(--dark); }
        .navbar-inner {
            max-width: 1280px; margin: 0 auto; padding: 0 2rem;
            display: flex; align-items: center; justify-content: space-between;
        }
        .nav-links { display: flex; list-style: none; }
        .nav-links a {
            display: block; padding: 0.8rem 1.1rem;
            color: rgba(255,255,255,0.7);
            font-family: var(--font-heading); font-size: 0.82rem;
            font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase;
            transition: color 0.2s, background 0.2s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--primary);
            background: rgba(34,197,94,0.08);
        }
        .nav-badge {
            background: var(--primary); color: var(--white);
            font-size: 0.62rem; padding: 0.12rem 0.4rem;
            border-radius: 20px; margin-left: 0.3rem; font-weight: 700;
        }
        .navbar-right { display: flex; align-items: center; gap: 1.25rem; }
        .navbar-right a {
            color: rgba(255,255,255,0.6); font-size: 0.8rem;
            display: flex; align-items: center; gap: 0.4rem;
            font-family: var(--font-heading); transition: color 0.2s;
        }
        .navbar-right a:hover { color: var(--primary); }

        /* ===== HERO ===== */
        .hero {
            background: linear-gradient(135deg, rgba(17,24,39,0.85) 0%, rgba(31,41,55,0.7) 60%, rgba(15,61,31,0.8) 100%), url('assets/img/hero_bg.png') center/cover no-repeat;
            padding: 4.5rem 2rem 3.5rem;
            position: relative; overflow: hidden;
        }
        .hero::after {
            content: '';
            position: absolute; top: 0; right: 0; bottom: 0;
            width: 50%;
            background: radial-gradient(ellipse at right center, rgba(34,197,94,0.12) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero::before {
            content: '';
            position: absolute; bottom: -80px; left: -80px;
            width: 400px; height: 400px; border-radius: 50%;
            background: radial-gradient(circle, rgba(34,197,94,0.07) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-inner {
            max-width: 1280px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between;
            gap: 3rem; position: relative; z-index: 1;
        }
        .hero-content { max-width: 580px; }
        .hero-pill {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: rgba(34,197,94,0.15);
            border: 1px solid rgba(34,197,94,0.25);
            color: var(--primary);
            padding: 0.4rem 1rem; border-radius: 50px;
            font-family: var(--font-heading); font-size: 0.75rem;
            font-weight: 700; letter-spacing: 1px; text-transform: uppercase;
            margin-bottom: 1.25rem;
        }
        .hero-pill i { font-size: 0.8rem; }
        .hero h1 {
            font-family: var(--font-heading); font-size: 3.2rem; font-weight: 700;
            color: var(--white); line-height: 1.1; margin-bottom: 1.1rem;
        }
        .hero h1 .highlight {
            color: var(--primary);
            position: relative;
        }
        .hero p {
            color: rgba(255,255,255,0.55); font-size: 1rem; line-height: 1.75;
            margin-bottom: 2rem; max-width: 480px;
        }
        .hero-actions { display: flex; gap: 0.9rem; flex-wrap: wrap; }
        .btn-hero-primary {
            background: var(--primary); color: var(--white);
            padding: 0.9rem 2rem; border-radius: 50px;
            font-weight: 600; font-family: var(--font-heading);
            font-size: 0.9rem; letter-spacing: 0.5px;
            display: inline-flex; align-items: center; gap: 0.6rem;
            transition: all 0.25s; border: 2px solid var(--primary);
        }
        .btn-hero-primary:hover {
            background: var(--primary-dark); border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(34,197,94,0.4);
        }
        .btn-hero-outline {
            background: transparent; color: rgba(255,255,255,0.85);
            padding: 0.9rem 2rem; border-radius: 50px;
            font-weight: 600; font-family: var(--font-heading);
            font-size: 0.9rem; letter-spacing: 0.5px;
            display: inline-flex; align-items: center; gap: 0.6rem;
            border: 2px solid rgba(255,255,255,0.25);
            transition: all 0.25s;
        }
        .btn-hero-outline:hover { border-color: rgba(255,255,255,0.6); color: var(--white); }

        .hero-stats {
            display: flex; gap: 2.5rem; margin-top: 2.5rem;
            padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.08);
        }
        .stat-item { text-align: left; }
        .stat-num {
            font-family: var(--font-heading); font-size: 1.6rem; font-weight: 700;
            color: var(--primary); line-height: 1;
        }
        .stat-lbl {
            font-size: 0.72rem; color: rgba(255,255,255,0.4);
            text-transform: uppercase; letter-spacing: 0.6px; margin-top: 0.2rem;
        }

        /* Right floating cards */
        .hero-float-grid {
            display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;
            flex-shrink: 0;
        }
        .float-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: var(--radius-lg);
            padding: 1.5rem 1.25rem;
            text-align: center; backdrop-filter: blur(6px);
            transition: all 0.25s;
        }
        .float-card:hover {
            background: rgba(34,197,94,0.08);
            border-color: rgba(34,197,94,0.2);
            transform: translateY(-3px);
        }
        .float-card i { font-size: 1.75rem; color: var(--primary); margin-bottom: 0.6rem; display: block; }
        .float-card span {
            font-size: 0.75rem; color: rgba(255,255,255,0.55);
            font-family: var(--font-heading); letter-spacing: 0.3px;
        }

        /* ===== FEATURE STRIP ===== */
        .feature-strip { background: var(--white); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
        .feature-strip-inner {
            max-width: 1280px; margin: 0 auto; padding: 0 2rem;
            display: grid; grid-template-columns: repeat(4, 1fr);
        }
        .feature-item {
            display: flex; align-items: center; gap: 0.9rem;
            padding: 1.25rem 1.5rem;
            border-right: 1px solid var(--border);
        }
        .feature-item:last-child { border-right: none; }
        .feature-icon {
            width: 46px; height: 46px; border-radius: var(--radius);
            background: var(--primary-bg);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; color: var(--primary); flex-shrink: 0;
        }
        .feature-label {
            font-family: var(--font-heading); font-size: 0.82rem; font-weight: 700;
            color: var(--dark); letter-spacing: 0.3px;
        }
        .feature-sub { font-size: 0.72rem; color: var(--gray); margin-top: 0.1rem; }

        /* ===== PAGE WRAPPER ===== */
        .page-wrapper { max-width: 1280px; margin: 0 auto; padding: 2.5rem 2rem; }

        /* ===== SECTION TITLES ===== */
        .sec-hdr {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 1.75rem;
        }
        .sec-title {
            font-family: var(--font-heading); font-size: 1.5rem; font-weight: 700;
            color: var(--dark); display: flex; align-items: center; gap: 0.75rem;
        }
        .sec-title .title-bar {
            width: 4px; height: 26px; background: var(--primary); border-radius: 2px;
        }
        .sec-sort { display: flex; align-items: center; gap: 0.75rem; }
        .sort-label { font-size: 0.8rem; color: var(--gray); }
        .sort-select {
            padding: 0.5rem 1rem; border: 1px solid var(--border); border-radius: 50px;
            outline: none; font-family: var(--font-body); font-size: 0.82rem;
            color: var(--dark); background: var(--white); cursor: pointer;
            transition: border-color 0.2s;
        }
        .sort-select:focus { border-color: var(--primary); }

        /* ===== PRODUCT GRID ===== */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(218px, 1fr));
            gap: 1.5rem;
        }

        /* ===== PRODUCT CARD ===== */
        .product-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex; flex-direction: column;
            position: relative;
        }
        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: var(--border-green);
        }
        .prod-badge {
            position: absolute; top: 0.75rem; left: 0.75rem; z-index: 3;
            background: var(--danger); color: var(--white);
            font-size: 0.64rem; font-weight: 700; font-family: var(--font-heading);
            letter-spacing: 0.5px; padding: 0.22rem 0.55rem;
            border-radius: 4px; text-transform: uppercase;
        }
        .prod-badge.new { background: var(--primary); }
        .wish-btn {
            position: absolute; top: 0.7rem; right: 0.7rem; z-index: 3;
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--white); border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 0.75rem; color: var(--gray);
            transition: all 0.2s; opacity: 0;
        }
        .product-card:hover .wish-btn { opacity: 1; }
        .wish-btn:hover { background: #fee2e2; color: var(--danger); border-color: #fecaca; }

        .prod-cover {
            height: 235px;
            background: linear-gradient(145deg, var(--off-white) 0%, #e9ecef 100%);
            display: flex; align-items: center; justify-content: center;
            position: relative; overflow: hidden; cursor: pointer;
        }
        .prod-cover-icon {
            font-size: 5rem; color: #d1d5db;
            transition: transform 0.35s, color 0.35s;
        }
        .product-card:hover .prod-cover-icon {
            color: var(--primary-light);
            transform: scale(1.05) rotate(-2deg);
        }
        .prod-overlay {
            position: absolute; bottom: 0; left: 0; right: 0;
            background: linear-gradient(to top, rgba(22,163,74,0.88) 0%, transparent 100%);
            padding: 1.25rem 1rem 0.85rem;
            transform: translateY(105%); transition: transform 0.3s ease;
        }
        .product-card:hover .prod-overlay { transform: translateY(0); }
        .overlay-view {
            display: block; background: var(--white);
            color: var(--primary-dark); text-align: center;
            padding: 0.45rem; border-radius: 6px;
            font-size: 0.78rem; font-weight: 700; font-family: var(--font-heading);
            letter-spacing: 0.4px;
        }

        .prod-info { padding: 1.2rem; flex: 1; display: flex; flex-direction: column; }
        .prod-stars { display: flex; gap: 2px; margin-bottom: 0.45rem; }
        .prod-stars i { color: #f59e0b; font-size: 0.68rem; }
        .prod-stars .empty { color: #d1d5db; }
        .prod-author {
            font-size: 0.72rem; color: var(--gray);
            font-family: var(--font-heading); letter-spacing: 0.3px; margin-bottom: 0.4rem;
            display: flex; align-items: center; gap: 0.3rem;
        }
        .prod-author i { color: var(--primary); font-size: 0.6rem; }
        .prod-name {
            font-size: 0.92rem; font-weight: 600; color: var(--dark);
            font-family: var(--font-heading); margin-bottom: 0.8rem;
            display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
            line-height: 1.45; transition: color 0.2s;
        }
        .product-card:hover .prod-name { color: var(--primary-dark); }

        .prod-bottom { display: flex; align-items: center; justify-content: space-between; margin-top: auto; }
        .prod-price {
            font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700;
            color: var(--primary-dark);
        }
        .prod-old-price {
            font-size: 0.75rem; color: var(--gray);
            text-decoration: line-through; margin-top: 0.1rem;
        }
        .btn-cart-add {
            background: var(--primary); color: var(--white); border: none;
            width: 34px; height: 34px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 0.78rem;
            transition: all 0.2s;
        }
        .btn-cart-add:hover { background: var(--primary-dark); transform: scale(1.1); }

        .stock-status {
            font-size: 0.72rem; margin-top: 0.65rem;
            display: flex; align-items: center; gap: 0.3rem; font-weight: 500;
        }
        .in-stock { color: var(--success); }
        .low-stock { color: var(--danger); }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            grid-column: 1 / -1;
            background: var(--white); border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 5rem 2rem; text-align: center;
        }
        .empty-state i { font-size: 4rem; color: var(--border); margin-bottom: 1rem; display: block; }
        .empty-state h3 { font-family: var(--font-heading); font-size: 1.25rem; color: var(--dark); margin-bottom: 0.5rem; }
        .empty-state p { color: var(--gray); font-size: 0.9rem; }

        /* ===== FOOTER ===== */
        footer { background: var(--dark); margin-top: 5rem; }

        .footer-newsletter { background: var(--primary); padding: 2rem 0; }
        .footer-nl-inner {
            max-width: 1280px; margin: 0 auto; padding: 0 2rem;
            display: flex; align-items: center; justify-content: space-between; gap: 2rem; flex-wrap: wrap;
        }
        .footer-nl-title {
            font-family: var(--font-heading); font-size: 1.1rem; font-weight: 700;
            color: var(--white); display: flex; align-items: center; gap: 0.6rem;
        }
        .footer-nl-title i { font-size: 1rem; }
        .footer-nl-sub { font-size: 0.8rem; color: rgba(255,255,255,0.75); margin-top: 0.25rem; }
        .nl-form {
            display: flex; border-radius: 50px; overflow: hidden;
            border: 2px solid rgba(255,255,255,0.25);
            min-width: 320px;
        }
        .nl-form input {
            flex: 1; background: transparent; border: none;
            padding: 0.75rem 1.25rem; color: var(--white); outline: none;
            font-family: var(--font-body); font-size: 0.85rem;
        }
        .nl-form input::placeholder { color: rgba(255,255,255,0.55); }
        .nl-form button {
            background: var(--dark); color: var(--white); border: none;
            padding: 0.75rem 1.5rem; font-family: var(--font-heading);
            font-size: 0.82rem; font-weight: 700; letter-spacing: 0.4px;
            cursor: pointer; transition: background 0.2s;
        }
        .nl-form button:hover { background: var(--black); }

        .footer-main {
            max-width: 1280px; margin: 0 auto; padding: 3rem 2rem;
            display: grid; grid-template-columns: 2fr 1fr 1fr 1.2fr; gap: 2.5rem;
        }
        .footer-brand-logo {
            font-family: var(--font-heading); font-size: 1.4rem; font-weight: 700;
            color: var(--white); margin-bottom: 0.75rem;
        }
        .footer-brand-logo span { color: var(--primary); }
        .footer-brand-desc { font-size: 0.83rem; color: rgba(255,255,255,0.45); line-height: 1.7; margin-bottom: 1.25rem; }
        .footer-social-row { display: flex; gap: 0.6rem; }
        .soc-btn {
            width: 36px; height: 36px; border-radius: 50%;
            background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.1);
            display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.6); font-size: 0.82rem; transition: all 0.2s;
        }
        .soc-btn:hover { background: var(--primary); color: var(--white); border-color: var(--primary); }

        .footer-col-title {
            font-family: var(--font-heading); font-size: 0.82rem; font-weight: 700;
            letter-spacing: 1px; text-transform: uppercase; color: var(--white);
            margin-bottom: 1.25rem; padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--primary); display: inline-block;
        }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 0.6rem; }
        .footer-links a {
            font-size: 0.82rem; color: rgba(255,255,255,0.5);
            display: flex; align-items: center; gap: 0.5rem; transition: all 0.2s;
        }
        .footer-links a i { font-size: 0.65rem; color: var(--primary); }
        .footer-links a:hover { color: var(--primary); padding-left: 0.25rem; }
        .footer-contact-item {
            display: flex; align-items: flex-start; gap: 0.6rem;
            font-size: 0.82rem; color: rgba(255,255,255,0.5); margin-bottom: 0.75rem;
        }
        .footer-contact-item i { color: var(--primary); margin-top: 0.2rem; width: 14px; flex-shrink: 0; }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.06);
            background: rgba(0,0,0,0.25); padding: 1.25rem 0;
        }
        .footer-bottom-inner {
            max-width: 1280px; margin: 0 auto; padding: 0 2rem;
            display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;
        }
        .footer-copy { font-size: 0.77rem; color: rgba(255,255,255,0.35); }
        .footer-copy strong { color: var(--primary); }
        .footer-payments { display: flex; align-items: center; gap: 0.75rem; color: rgba(255,255,255,0.3); }
        .footer-payments i { font-size: 1.5rem; }

        /* ===== BACK TO TOP ===== */
        .back-top {
            position: fixed; bottom: 2rem; right: 2rem; z-index: 999;
            width: 44px; height: 44px; border-radius: 50%;
            background: var(--primary); color: var(--white); border: none;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; cursor: pointer;
            box-shadow: 0 4px 16px rgba(34,197,94,0.4);
            transition: all 0.2s; opacity: 0; pointer-events: none;
        }
        .back-top.show { opacity: 1; pointer-events: auto; }
        .back-top:hover { transform: translateY(-3px); background: var(--primary-dark); }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .hero h1 { font-size: 2.5rem; }
            .hero-float-grid { display: none; }
            .feature-strip-inner { grid-template-columns: repeat(2, 1fr); }
            .footer-main { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            .hero-stats { gap: 1.5rem; }
            .header-inner { flex-wrap: wrap; gap: 1rem; }
            .search-wrap { order: 3; max-width: 100%; flex: none; width: 100%; }
            .product-grid { grid-template-columns: repeat(2, 1fr); }
            .footer-main { grid-template-columns: 1fr; }
            .footer-nl-inner { flex-direction: column; align-items: flex-start; }
            .nl-form { min-width: 100%; width: 100%; }
        }
        @media (max-width: 480px) {
            .product-grid { grid-template-columns: 1fr; }
            .feature-strip-inner { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="top-bar-inner">
            <div class="top-bar-left">
                <i class="fa-solid fa-truck-fast"></i>
                Giao hàng nhanh toàn quốc &mdash; Miễn phí đơn từ 300.000đ
            </div>
            <div class="top-bar-right">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <div class="top-bar-divider"></div>
                <a href="#"><i class="fa-solid fa-globe"></i> Tiếng Việt</a>
            </div>
        </div>
    </div>

    <!-- MAIN HEADER -->
    <div class="main-header">
        <div class="header-inner">
            <a href="index.php" class="logo">
                <div class="logo-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                Tiệm<span>Sách</span>
            </a>

            <div class="search-wrap">
                <form action="index.php" method="GET" class="search-form">
                    <?php if(isset($sort) && $sort): ?><input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>"><?php endif; ?>
                    <input type="text" name="keyword" placeholder="Tìm kiếm tên sách, tác giả..."
                           value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <div class="header-actions">
                <a href="#" class="hdr-btn hdr-btn-outline">
                    <i class="fa-regular fa-user"></i> Tài khoản
                </a>
                <a href="#" class="cart-icon-wrap">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span class="cart-badge"><?= isset($cartCount) ? $cartCount : 0 ?></span>
                    Giỏ
                </a>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-inner">
            <ul class="nav-links">
                <li><a href="index.php" class="active"><i class="fa-solid fa-house" style="font-size:0.7rem;"></i> Trang chủ</a></li>
                <li><a href="index.php">Tất cả sách <span class="nav-badge">Hot</span></a></li>
                <li><a href="#">Văn học</a></li>
                <li><a href="#">Kinh doanh</a></li>
                <li><a href="#">Khoa học</a></li>
                <li><a href="#">Thiếu nhi</a></li>
            </ul>
            <div class="navbar-right">
                <a href="#"><i class="fa-regular fa-heart"></i> Yêu thích</a>
                <a href="#"><i class="fa-solid fa-headset"></i> Hỗ trợ</a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-pill">
                    <i class="fa-solid fa-star"></i> Bộ sưu tập mới nhất 2026
                </div>
                <h1>Khám Phá <span class="highlight">Thế Giới</span><br>Qua Những Trang Sách</h1>
                <p>Hơn 10,000 đầu sách đa thể loại — từ văn học kinh điển đến khoa học hiện đại.
                   Tìm cuốn sách hoàn hảo cho bạn với giá tốt nhất hôm nay.</p>
                <div class="hero-actions">
                    <a href="index.php" class="btn-hero-primary">
                        <i class="fa-solid fa-magnifying-glass"></i> Khám phá ngay
                    </a>
                    <a href="#" class="btn-hero-outline">
                        <i class="fa-regular fa-circle-play"></i> Xem thêm
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-num">10K+</div>
                        <div class="stat-lbl">Đầu sách</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">500+</div>
                        <div class="stat-lbl">Tác giả</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">50K+</div>
                        <div class="stat-lbl">Khách hàng</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">4.9★</div>
                        <div class="stat-lbl">Đánh giá</div>
                    </div>
                </div>
            </div>
            <div class="hero-float-grid">
                <div class="float-card"><i class="fa-solid fa-book-open"></i><span>Văn học</span></div>
                <div class="float-card"><i class="fa-solid fa-flask"></i><span>Khoa học</span></div>
                <div class="float-card"><i class="fa-solid fa-graduation-cap"></i><span>Giáo dục</span></div>
                <div class="float-card"><i class="fa-solid fa-chart-line"></i><span>Kinh doanh</span></div>
            </div>
        </div>
    </section>

    <!-- FEATURE STRIP -->
    <div class="feature-strip">
        <div class="feature-strip-inner">
            <div class="feature-item">
                <div class="feature-icon"><i class="fa-solid fa-truck-fast"></i></div>
                <div>
                    <div class="feature-label">Miễn phí vận chuyển</div>
                    <div class="feature-sub">Đơn hàng từ 300.000đ</div>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon"><i class="fa-solid fa-rotate-left"></i></div>
                <div>
                    <div class="feature-label">Đổi trả 7 ngày</div>
                    <div class="feature-sub">Nếu sách bị lỗi in</div>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
                <div>
                    <div class="feature-label">Chính hãng 100%</div>
                    <div class="feature-sub">Sách chất lượng cao</div>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon"><i class="fa-solid fa-headset"></i></div>
                <div>
                    <div class="feature-label">Hỗ trợ 24/7</div>
                    <div class="feature-sub">Tư vấn tận tâm</div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="page-wrapper">
        <div class="sec-hdr">
            <h2 class="sec-title">
                <span class="title-bar"></span>
                <?php if(isset($keyword) && $keyword != ''): ?>
                    Kết quả: "<?= htmlspecialchars($keyword) ?>"
                <?php else: ?>
                    Sản Phẩm Nổi Bật
                <?php endif; ?>
            </h2>
            <div class="sec-sort">
                <span class="sort-label">Sắp xếp:</span>
                <form action="index.php" method="GET">
                    <?php if(isset($keyword) && $keyword != ''): ?><input type="hidden" name="keyword" value="<?= htmlspecialchars($keyword) ?>"><?php endif; ?>
                    <select name="sort" class="sort-select" onchange="this.form.submit()">
                        <option value="newest" <?= (isset($sort) && $sort == 'newest') ? 'selected' : '' ?>>Mới nhất</option>
                        <option value="price_asc" <?= (isset($sort) && $sort == 'price_asc') ? 'selected' : '' ?>>Giá thấp → cao</option>
                        <option value="price_desc" <?= (isset($sort) && $sort == 'price_desc') ? 'selected' : '' ?>>Giá cao → thấp</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="product-grid">
            <?php
            if (isset($sp) && !empty($sp)) {
                foreach ($sp as $index => $SP):
                    $isLowStock = isset($SP['sl']) && (int)$SP['sl'] < 5;
                    $isNew = $index % 3 == 0;
                    $stars = rand(3, 5);
                    $reviews = rand(12, 180);
                    $oldPrice = ($SP['gia'] ?? 0) * 1.18;
            ?>
            <div class="product-card">
                <?php if ($isNew): ?>
                <span class="prod-badge new">Mới</span>
                <?php else: ?>
                <span class="prod-badge">Hot</span>
                <?php endif; ?>

                <button class="wish-btn" title="Yêu thích" type="button">
                    <i class="fa-regular fa-heart"></i>
                </button>

                <div class="prod-cover" style="background: url('<?= htmlspecialchars($SP['img'] ?? 'assets/img/cover_business.png') ?>') center/cover no-repeat;">
                    <div class="prod-overlay">
                        <a href="#" class="overlay-view">
                            <i class="fa-solid fa-eye"></i> Xem chi tiết
                        </a>
                    </div>
                </div>

                <div class="prod-info">

                    <div class="prod-author">
                        <i class="fa-solid fa-user"></i>
                        <?= htmlspecialchars($SP['tacgia'] ?? 'Chưa rõ tác giả') ?>
                    </div>
                    <div class="prod-name" title="<?= htmlspecialchars($SP['tenSP'] ?? '') ?>">
                        <?= htmlspecialchars($SP['tenSP'] ?? 'Sản phẩm chưa cập nhật') ?>
                    </div>
                    <div class="prod-bottom">
                        <div>
                            <div class="prod-price"><?= number_format($SP['gia'] ?? 0, 0, ',', '.') ?>đ</div>
                            <div class="prod-old-price"><?= number_format($oldPrice, 0, ',', '.') ?>đ</div>
                        </div>
                        <form action="?action=add_cart<?= isset($keyword) && $keyword != '' ? '&keyword='.urlencode($keyword) : '' ?><?= isset($sort) ? '&sort='.urlencode($sort) : '' ?>" method="POST" style="margin:0;">
                            <input type="hidden" name="id" value="<?= isset($SP['id']) ? $SP['id'] : 0 ?>">
                            <button type="submit" class="btn-cart-add" title="Thêm vào giỏ">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            <?php
                endforeach;
            } else {
                echo '<div class="empty-state">
                    <i class="fa-solid fa-box-open"></i>
                    <h3>Chưa có sản phẩm nào</h3>
                    <p>Cửa hàng đang cập nhật thêm sách. Vui lòng quay lại sau.</p>
                </div>';
            }
            ?>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <!-- Newsletter -->
        <div class="footer-newsletter">
            <div class="footer-nl-inner">
                <div>
                    <div class="footer-nl-title">
                        <i class="fa-regular fa-envelope"></i>
                        Đăng ký nhận thông báo sách mới
                    </div>
                    <div class="footer-nl-sub">Nhận email khi có sách mới và ưu đãi đặc biệt</div>
                </div>
                <form class="nl-form" onsubmit="return false;">
                    <input type="email" placeholder="Nhập địa chỉ email của bạn...">
                    <button type="submit">Đăng ký</button>
                </form>
            </div>
        </div>

        <!-- Main Footer -->
        <div class="footer-main">
            <div>
                <div class="footer-brand-logo">Tiệm<span>Sách</span></div>
                <p class="footer-brand-desc">
                    Cửa hàng sách trực tuyến uy tín hàng đầu Việt Nam. Cung cấp hàng ngàn đầu sách chất lượng cao với giá tốt nhất thị trường.
                </p>
                <div class="footer-social-row">
                    <a href="#" class="soc-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="soc-btn"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="soc-btn"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="soc-btn"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
            <div>
                <span class="footer-col-title">Về chúng tôi</span>
                <ul class="footer-links">
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Giới thiệu</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Tuyển dụng</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Tin tức sách</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Đối tác NXB</a></li>
                </ul>
            </div>
            <div>
                <span class="footer-col-title">Hỗ trợ</span>
                <ul class="footer-links">
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Hướng dẫn mua hàng</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Chính sách đổi trả</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Chính sách giao hàng</a></li>
                    <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Liên hệ hỗ trợ</a></li>
                </ul>
            </div>
            <div>
                <span class="footer-col-title">Liên hệ</span>
                <div class="footer-contact-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>FPT POLYTECHNIC, Thái Nguyên</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <span>0800 123 456 (Miễn phí)</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    <span>hello@tiemsach.vn</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fa-regular fa-clock"></i>
                    <span>T2 – CN: 8:00 – 22:00</span>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-inner">
                <p class="footer-copy">&copy; 2025 <strong>TiệmSách</strong>. Mọi quyền được bảo lưu.</p>
                <div class="footer-payments">
                    <i class="fa-brands fa-cc-visa"></i>
                    <i class="fa-brands fa-cc-mastercard"></i>
                    <i class="fa-brands fa-paypal"></i>
                    <i class="fa-brands fa-apple-pay"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- BACK TO TOP -->
    <button class="back-top" id="backTop" aria-label="Về đầu trang">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <script>
        // Back to top
        const btn = document.getElementById('backTop');
        window.addEventListener('scroll', () => {
            btn.classList.toggle('show', window.scrollY > 400);
        });
        btn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

</body>
</html>
