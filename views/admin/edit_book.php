<?php
/** @var array $book */
/** @var array $categories */
/** @var array $authors */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Sách - TiệmSách</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Import CSS giống trang thêm */
        :root {
            --primary: #22c55e;
            --primary-dark: #16a34a;
            --primary-bg: #f0fdf4;
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
        .form-control { width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border); border-radius: 8px; font-family: var(--font-body); font-size: 0.9rem; outline: none; }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-bg); }
        .btn { padding: 0.75rem 1.5rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: var(--font-body); }
        .btn-primary { background: var(--primary); color: var(--white); }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-secondary { background: var(--border); color: var(--dark); margin-right: 1rem; }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <h2 style="margin-bottom: 1.5rem; font-family: var(--font-heading);">Chỉnh Sửa Sách</h2>
        <div class="data-card">
            <form action="?area=admin&act=update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $book['id'] ?>">
                
                <div class="form-group">
                    <label>Tên sách</label>
                    <input type="text" name="title" class="form-control" required value="<?= htmlspecialchars($book['title']) ?>">
                </div>
                
                <div class="form-group">
                    <label>Giá (VNĐ)</label>
                    <input type="text" name="price" class="form-control" required value="<?= number_format($book['price'], 0, '', '.') ?>" placeholder="Ví dụ: 130.000">
                </div>

                <div class="form-group">
                    <label>Thể loại</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">-- Chọn thể loại --</option>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $book['category_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tác giả</label>
                    <select name="author_id" class="form-control" required>
                        <option value="">-- Chọn tác giả --</option>
                        <?php foreach($authors as $author): ?>
                            <option value="<?= $author['id'] ?>" <?= ($author['id'] == $book['author_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($author['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Hình ảnh bìa (Để trống nếu không muốn đổi)</label>
                    <?php if(!empty($book['image'])): ?>
                        <div style="margin-bottom: 0.5rem;">
                            <img src="<?= $book['image'] ?>" alt="Bìa sách" style="max-width: 100px; border-radius: 8px;">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <label>Mô tả nội dung</label>
                    <textarea name="description" class="form-control" rows="5"><?= htmlspecialchars($book['description']) ?></textarea>
                </div>

                <div style="margin-top: 2rem;">
                    <a href="?area=admin" class="btn btn-secondary">Hủy bỏ</a>
                    <button type="submit" class="btn btn-primary">Cập nhật sách</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceInput = document.querySelector('input[name="price"]');
            if (priceInput) {
                // Định dạng ngay khi tải trang
                formatInput(priceInput);

                priceInput.addEventListener('input', function() {
                    formatInput(this);
                });
            }

            function formatInput(input) {
                let value = input.value.replace(/\D/g, '');
                if (value) {
                    // Loại bỏ các chữ số 0 vô nghĩa ở đầu
                    value = parseInt(value, 10).toString();
                    input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                } else {
                    input.value = '';
                }
            }
        });
    </script>
</body>
</html>
