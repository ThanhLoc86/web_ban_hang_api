<?php include 'app/views/shares/header.php'; ?>
<div style="justify-items: center; 
           align-items: center;
           box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); 
           padding: 10px; 
           width: 40%;
           border-radius: 20px;
           min-width: 300px;
           margin-left: 30%;">
    <h1>Thanh toán</h1>
    <form method="POST" action="/web_ban_hang/Product/processCheckout">
        <div class="form-group">
            <label for="name">Họ tên:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Thanh toán</button>
    </form>
    <a href="/web_ban_hang/Product/cart" class="btn btn-secondary mt-2">Quay lại giỏ hàng</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>