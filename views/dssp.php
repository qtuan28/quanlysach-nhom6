<?php
/**
 * @var array $sp
 * @var string $keyword
 * @var string $sort
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
            grid-template-columns: repeat(4, 1fr);
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
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
            gap: 10px;
        }
        .pagination a, .pagination span {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-family: var(--font-body);
        }
        .pagination a {
            background: var(--white);
            color: var(--text);
            border: 1px solid var(--border);
            transition: all 0.2s;
        }
        .pagination a:hover {
            border-color: var(--primary);
            color: var(--primary);
        }
        .pagination .active {
            background: var(--primary);
            color: var(--white);
            border: 1px solid var(--primary);
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <a href="index.php" style="text-decoration: none;"><h1>Tiệm Sách</h1></a>
        <div class="header-links">
            <a href="index.php">Trang chủ</a>
        </div>
    </header>

    <style>
        /* CSS updates for the filter layout */
        .toolbar {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 30px;
        }
        .search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: flex-end;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 150px;
        }
        .form-group label {
            font-size: 0.9rem;
            margin-bottom: 5px;
            font-weight: 500;
            color: var(--text-light);
        }
        .search-input-group {
            flex: 2;
            min-width: 250px;
        }
        .price-group {
            display: flex;
            gap: 10px;
            flex: 2;
            min-width: 200px;
        }
        .price-group .form-group {
            min-width: 0;
        }
        .form-actions {
            display: flex;
            gap: 10px;
            align-items: flex-end;
            margin-top: auto;
        }
        .btn-reset {
            background-color: #f3f4f6;
            color: var(--text);
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: bold;
            border: 1px solid var(--border);
            text-align: center;
        }
        .btn-reset:hover {
            background-color: #e5e7eb;
        }
    </style>
    <div class="toolbar">
        <form action="index.php" method="GET" class="search-form">
            <div class="form-group search-input-group">
                <label for="keyword">Từ khóa</label>
                <input type="text" id="keyword" name="keyword" placeholder="Tìm tên sách, tác giả..." value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>">
            </div>
            
            <div class="form-group">
                <label for="category_id">Thể loại</label>
                <select name="category_id" id="category_id">
                    <option value="0">-- Tất cả thể loại --</option>
                    <?php if(isset($categories)): ?>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= (isset($category_id) && $category_id == $cat['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="author_id">Tác giả</label>
                <select name="author_id" id="author_id">
                    <option value="0">-- Tất cả tác giả --</option>
                    <?php if(isset($authors)): ?>
                        <?php foreach($authors as $author): ?>
                            <option value="<?= $author['id'] ?>" <?= (isset($author_id) && $author_id == $author['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($author['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="price-group">
                <div class="form-group">
                    <label for="min_price">Giá từ</label>
                    <input type="number" id="min_price" name="min_price" placeholder="0" min="0" value="<?= isset($min_price) && $min_price > 0 ? $min_price : '' ?>">
                </div>
                <div class="form-group">
                    <label for="max_price">Đến giá</label>
                    <input type="number" id="max_price" name="max_price" placeholder="Max" min="0" value="<?= isset($max_price) && $max_price > 0 ? $max_price : '' ?>">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit">Lọc</button>
                <a href="index.php" class="btn-reset">Xóa bộ lọc</a>
            </div>
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
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-msg">Không tìm thấy sản phẩm nào.</div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if (isset($total_pages) && $total_pages > 1): ?>
        <div class="pagination">
            <?php 
                $queryParams = $_GET; 
                if($page > 1): 
                    $queryParams['page'] = $page - 1;
            ?>
                <a href="?<?= http_build_query($queryParams) ?>">&laquo;</a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php 
                    $queryParams['page'] = $i;
                    if ($i == $page): 
                ?>
                    <span class="active"><?= $i ?></span>
                <?php else: ?>
                    <a href="?<?= http_build_query($queryParams) ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            
            <?php 
                if($page < $total_pages): 
                    $queryParams['page'] = $page + 1;
            ?>
                <a href="?<?= http_build_query($queryParams) ?>">&raquo;</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
