<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa Hàng Sách</title>
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

        /* HEADER */
        header { background-color: var(--white); box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 50; }
        .header-main { max-width: 1280px; margin: 0 auto; padding: 1rem 2rem; display: flex; align-items: center; justify-content: space-between; }
        .logo { font-size: 1.5rem; font-weight: 700; color: var(--primary); display: flex; align-items: center; gap: 0.5rem; }
        
        .search-bar { flex: 1; max-width: 500px; display: flex; margin: 0 2rem; }
        .search-bar input { width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border); border-right: none; border-radius: 8px 0 0 8px; outline: none; }
        .search-bar button { background-color: var(--primary); color: var(--white); border: none; padding: 0 1.5rem; border-radius: 0 8px 8px 0; cursor: pointer; }
        
        /* MAIN LAYOUT */
        .container { max-width: 1280px; margin: 2rem auto; padding: 0 2rem; display: flex; gap: 2rem; }
        
        /* SIDEBAR (Lọc) */
        .sidebar { width: 250px; flex-shrink: 0; }
        .filter-group { background: var(--white); padding: 1.5rem; border-radius: 12px; border: 1px solid var(--border); margin-bottom: 1.5rem; }
        .filter-title { font-weight: 600; margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid var(--border); }
        .filter-list { list-style: none; }
        .filter-list li { margin-bottom: 0.5rem; }
        .filter-list a { color: var(--text-light); transition: color 0.2s; }
        .filter-list a:hover, .filter-list a.active { color: var(--primary); font-weight: 500; }

        /* CONTENT */
        .content { flex: 1; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; background: var(--white); padding: 1rem 1.5rem; border-radius: 12px; border: 1px solid var(--border); }
        
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.5rem; }
        
        /* PRODUCT CARD */
        .product-card { background-color: var(--white); border-radius: 12px; border: 1px solid var(--border); overflow: hidden; transition: all 0.3s; display: flex; flex-direction: column; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); border-color: transparent; }
        .product-image { height: 260px; background-color: var(--secondary); display: flex; align-items: center; justify-content: center; position: relative; }
        .product-image i { font-size: 4rem; color: var(--text-light); opacity: 0.3; }
        
        .product-info { padding: 1.5rem; display: flex; flex-direction: column; flex: 1; }
        .product-author { font-size: 0.8rem; color: var(--text-light); margin-bottom: 0.5rem; }
        .product-name { font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .product-price { font-size: 1.25rem; font-weight: 700; color: var(--primary); margin-top: auto; }
        
        /* PAGINATION */
        .pagination { display: flex; justify-content: center; gap: 0.5rem; margin-top: 3rem; }
        .pagination a { padding: 0.5rem 1rem; border: 1px solid var(--border); border-radius: 6px; background: var(--white); transition: all 0.2s; }
        .pagination a:hover, .pagination a.active { background: var(--primary); color: var(--white); border-color: var(--primary); }
    </style>
</head>
<body>
    <header>
        <div class="header-main">
            <a href="index.php" class="logo">
                <i class="fa-solid fa-book-open"></i> Tiệm Sách
            </a>
            <div class="search-bar">
                <form action="index.php" method="GET" style="display: flex; width: 100%;">
                    <?php if(isset($_GET['category'])): ?><input type="hidden" name="category" value="<?= htmlspecialchars($_GET['category']) ?>"><?php endif; ?>
                    <?php if(isset($_GET['author'])): ?><input type="hidden" name="author" value="<?= htmlspecialchars($_GET['author']) ?>"><?php endif; ?>
                    <input type="text" name="keyword" placeholder="Tìm kiếm tựa sách..." value="<?= htmlspecialchars($keyword) ?>">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div>
                <a href="?area=admin" style="font-weight: 600; color: var(--text-light);"><i class="fa-solid fa-user-shield"></i> Quản trị</a>
            </div>
        </div>
    </header>

    <div class="container">
        <aside class="sidebar">
            <div class="filter-group">
                <div class="filter-title">Thể Loại</div>
                <ul class="filter-list">
                    <li><a href="index.php" class="<?= empty($category_id) ? 'active' : '' ?>">Tất cả thể loại</a></li>
                    <?php foreach($categories as $cat): ?>
                        <li><a href="?category=<?= $cat['id'] ?><?= !empty($keyword) ? '&keyword='.urlencode($keyword) : '' ?>" class="<?= $category_id == $cat['id'] ? 'active' : '' ?>"><?= htmlspecialchars($cat['name']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="filter-group">
                <div class="filter-title">Tác Giả</div>
                <ul class="filter-list">
                    <li><a href="index.php" class="<?= empty($author_id) ? 'active' : '' ?>">Tất cả tác giả</a></li>
                    <?php foreach($authors as $auth): ?>
                        <li><a href="?author=<?= $auth['id'] ?><?= !empty($keyword) ? '&keyword='.urlencode($keyword) : '' ?>" class="<?= $author_id == $auth['id'] ? 'active' : '' ?>"><?= htmlspecialchars($auth['name']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>

        <main class="content">
            <div class="top-bar">
                <div>
                    Hiển thị <strong><?= count($books) ?></strong> kết quả.
                </div>
                <div>
                    <form action="index.php" method="GET">
                        <?php if(!empty($keyword)): ?><input type="hidden" name="keyword" value="<?= htmlspecialchars($keyword) ?>"><?php endif; ?>
                        <?php if(!empty($category_id)): ?><input type="hidden" name="category" value="<?= htmlspecialchars($category_id) ?>"><?php endif; ?>
                        <?php if(!empty($author_id)): ?><input type="hidden" name="author" value="<?= htmlspecialchars($author_id) ?>"><?php endif; ?>
                        
                        <select name="sort" onchange="this.form.submit()" style="padding: 0.5rem; border-radius: 6px; border: 1px solid var(--border); outline: none;">
                            <option value="newest" <?= $sort == 'newest' ? 'selected' : '' ?>>Sắp xếp: Mới nhất</option>
                            <option value="price_asc" <?= $sort == 'price_asc' ? 'selected' : '' ?>>Giá: Thấp đến cao</option>
                            <option value="price_desc" <?= $sort == 'price_desc' ? 'selected' : '' ?>>Giá: Cao đến thấp</option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="product-grid">
                <?php if (count($books) > 0): ?>
                    <?php foreach($books as $book): ?>
                    <div class="product-card">
                        <a href="?action=detail&id=<?= $book['id'] ?>" class="product-image">
                            <i class="fa-solid fa-book"></i> <!-- Placeholder -->
                        </a>
                        <div class="product-info">
                            <div class="product-author"><?= htmlspecialchars($book['author_name'] ?? 'Chưa rõ') ?></div>
                            <a href="?action=detail&id=<?= $book['id'] ?>" class="product-name" title="<?= htmlspecialchars($book['title']) ?>">
                                <?= htmlspecialchars($book['title']) ?>
                            </a>
                            <div class="product-price"><?= number_format($book['price'], 0, ',', '.') ?> đ</div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không tìm thấy quyển sách nào phù hợp.</p>
                <?php endif; ?>
            </div>

            <!-- Phân trang -->
            <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                    <?php 
                        $query = $_GET;
                        $query['page'] = $i;
                        $qs = http_build_query($query);
                    ?>
                    <a href="?<?= $qs ?>" class="<?= $page == $i ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
