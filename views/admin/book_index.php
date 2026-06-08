<?php ob_start(); ?>
<div class="data-card">
    <div class="data-card-header">
        <div class="data-card-title">
            <i class="fa-solid fa-book"></i>
            Danh sách Sách
        </div>
        <div class="btn-group">
            <button class="btn btn-secondary btn-icon">
                <i class="fa-solid fa-filter"></i>
            </button>
            <button class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> Thêm sách mới
            </button>
        </div>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sách</th>
                    <th>Thể loại</th>
                    <th>Tác giả</th>
                    <th>Giá</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($books as $book): ?>
                <tr>
                    <td><span class="table-id">#<?= $book['id'] ?></span></td>
                    <td>
                        <div class="table-name"><?= htmlspecialchars($book['title']) ?></div>
                    </td>
                    <td>
                        <?php if(!empty($book['category_name'])): ?>
                        <span class="category-chip"><?= htmlspecialchars($book['category_name']) ?></span>
                        <?php else: ?><span class="table-secondary">—</span><?php endif; ?>
                    </td>
                    <td><span class="table-secondary"><?= htmlspecialchars($book['author_name'] ?? '—') ?></span></td>
                    <td><span class="price-tag"><?= number_format($book['price'], 0, ',', '.') ?> đ</span></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-warning btn-icon" title="Chỉnh sửa">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-icon" title="Xóa">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php 
$content = ob_get_clean(); 
require 'layout.php'; 
?>
