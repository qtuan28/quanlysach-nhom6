<?php ob_start(); ?>
<div class="data-card">
    <div class="data-card-header">
        <div class="data-card-title">
            <i class="fa-solid fa-user-pen"></i>
            Danh sách Tác giả
        </div>
        <div class="btn-group">
            <button class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> Thêm tác giả mới
            </button>
        </div>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên tác giả</th>
                    <th>Tiểu sử</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($authors as $author): ?>
                <tr>
                    <td><span class="table-id">#<?= $author['id'] ?></span></td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 36px; height: 36px; border-radius: 50%; background: var(--primary-bg); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 0.9rem; flex-shrink: 0;">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="table-name"><?= htmlspecialchars($author['name']) ?></div>
                        </div>
                    </td>
                    <td style="max-width: 320px;">
                        <span class="table-secondary" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            <?= htmlspecialchars($author['bio'] ?? 'Chưa có tiểu sử') ?>
                        </span>
                    </td>
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
