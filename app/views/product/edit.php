<?php include 'app/views/shares/header.php'; ?>

<h1>Sửa sản phẩm</h1>

<form id="edit-product-form">
    <input type="hidden" id="id" name="id">

    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <!-- Các danh mục sẽ được tải từ API -->
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>

<a href="/webbanhang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>

<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const productId = <?= $editId ?>;
    const categorySelect = document.getElementById('category_id');

    // Lấy danh sách danh mục từ API
    fetch('/web_ban_hang/api/category')
        .then(response => response.json())
        .then(categories => {
            categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });

            // Khi danh mục đã được load xong, tiếp tục lấy thông tin sản phẩm
            return fetch(`/web_ban_hang/api/product/${productId}`);
        })
        .then(response => response.json())
        .then(product => {
            document.getElementById('id').value = product.id;
            document.getElementById('name').value = product.name;
            document.getElementById('description').value = product.description;
            document.getElementById('price').value = product.price;
            document.getElementById('category_id').value = product.category_id;
        });

    // Xử lý sự kiện khi submit form
    document.getElementById('edit-product-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const jsonData = {};

        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        fetch(`/web_ban_hang/api/product/${jsonData.id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product updated successfully') {
                location.href = '/web_ban_hang/Product';
            } else {
                alert('Cập nhật sản phẩm thất bại');
            }
        });
    });
});
</script>
