<?php ob_start(); ?>
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h2 class="page-title" style="margin-bottom: 0;">Danh sách Tác giả</h2>
        <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm tác giả mới</button>
    </div>
    
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
                <td><?= $author['id'] ?></td>
                <td><strong><?= htmlspecialchars($author['name']) ?></strong></td>
                <td style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= htmlspecialchars($author['bio'] ?? '') ?></td>
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
