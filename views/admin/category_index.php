<?php ob_start(); ?>
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h2 class="page-title" style="margin-bottom: 0;">Danh sách Thể loại</h2>
        <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm thể loại mới</button>
    </div>
    
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
                <td><?= $cat['id'] ?></td>
                <td><strong><?= htmlspecialchars($cat['name']) ?></strong></td>
                <td>
                    <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php 
$content = ob_get_clean(); 
require 'layout.php'; 
?>
