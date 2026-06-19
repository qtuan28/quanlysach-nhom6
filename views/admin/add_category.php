<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm thể loại</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header bg-success text-white">
            <h3>Thêm thể loại sách</h3>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Tên thể loại
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Nhập tên thể loại"
                        required>

                </div>

                <button type="submit" class="btn btn-success">
                    Thêm
                </button>

                <a href="?controller=category&action=index"
                    class="btn btn-secondary">

                    Quay lại

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>