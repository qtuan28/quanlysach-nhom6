<?php ob_start(); ?>
<div class="data-card">
    <div class="data-card-header">
        <div class="data-card-title">
            <i class="fa-solid fa-tags"></i>
            Danh sách Thể loại
        </div>
        <div class="btn-group">
            <button class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> Thêm thể loại mới
            </button>
        </div>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên thể loại</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $cat): ?>
                <tr>
                    <td><span class="table-id">#<?= $cat['id'] ?></span></td>
                    <td>
                        <div class="table-name"><?= htmlspecialchars($cat['name']) ?></div>
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
