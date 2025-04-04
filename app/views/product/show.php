<?php include 'app/views/shares/header.php'; ?> <?php if ($product): ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Chi tiết sản phẩm</h1>
        <div class="card shadow p-4 rounded bg-white">
            <div class="card-body text-center">
                <h2 class="card-title"> <?php echo htmlspecialchars($product->name ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                <?php if (!empty($product->image)): ?> <img
                        src="/web_ban_hang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                        alt="Product Image" class="img-fluid rounded mt-3" style="min-width: 200px; border-radius: 20%; width:50%;"> <?php endif; ?>
                <p class="mt-3"><strong>Mô tả:</strong>
                    <?php echo htmlspecialchars($product->description ?? 'Không có mô tả', ENT_QUOTES, 'UTF-8'); ?></p>
                <p><strong>Giá:</strong> <?php echo htmlspecialchars($product->price ?? '0', ENT_QUOTES, 'UTF-8'); ?> USD
                </p>
                <p><strong>Danh mục:</strong>
                    <?php echo !empty($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Không xác định'; ?>
                </p>
                <div class="mt-4"> <a href="/web_ban_hang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">
                        Sửa</a> <a href="/web_ban_hang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a> <a
                        href="/web_ban_hang/Product" class="btn btn-secondary"> [<<] Quay lại danh sách</a> </div>
            </div>
        </div>
    </div> <?php else: ?>
    <p class="text-center text-danger mt-5">Sản phẩm không tồn tại.</p> <?php endif; ?>
<?php include 'app/views/shares/footer.php'; ?>