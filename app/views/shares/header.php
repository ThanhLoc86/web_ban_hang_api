<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: rgb(85, 92, 99);">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/web_ban_hang">
                <img src="/web_ban_hang/public/LogoDT.jpg" alt="Logo" class="custom-logo">
                <span style="color: white; font-weight: bold; font-size: 20px;">Trang Chủ</span>
            </a>
            

            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <?php if ( SessionHelper :: isLoggedIn()) : ?>    
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a style="color: white; font-weight: bold; font-size: 16px;" class="nav-link" 
                            href="/web_ban_hang/Product/Cart">
                            <i class="fas fa-shopping-cart"></i> Giỏ Hàng
                        </a>
                    </li>
        <?php endif; ?>            
                    
                    
                    <?php if (SessionHelper::isAdmin()): ?>
                        <li class="nav-item dropdown">
                            <a style="color: white; font-weight: bold; font-size: 16px;" class="nav-link dropdown-toggle" 
                                href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" 
                                aria-expanded="false">
                                Quản lý sản phẩm
                            </a>
                            <div class="dropdown-menu" aria-labelledby="productDropdown">
                                <a class="dropdown-item" href="/web_ban_hang/Product">📋 Danh sách sản phẩm</a>
                                <a class="dropdown-item" href="/web_ban_hang/Product/add">➕ Thêm sản phẩm</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    
                    
                    <?php if (SessionHelper::isLoggedIn()): ?>
                        <li class="nav-item user-info">
                            <span class="nav-link user-name">
                                <?php echo $_SESSION['username']; ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout-btn" href="/web_ban_hang/account/logout">Đăng xuất</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link login-btn" href="/web_ban_hang/account/login">Đăng nhập</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</body>

</html>

<style>
    .custom-logo {
        border-radius: 50%;
        height: 40px;
        width: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-right: 10px;
        object-fit: cover;
    }

    .navbar {
        padding: 10px 0;
    }

    .nav-link {
        padding: 8px 15px !important;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    .user-name {
        background-color: #17a2b8;
        color: white !important;
        border-radius: 20px;
        padding: 5px 15px !important;
        margin-right: 10px;
    }

    .login-btn, .logout-btn {
        background-color: #28a745;
        color: white !important;
        border-radius: 20px;
        padding: 5px 15px !important;
        font-weight: bold;
    }

    .logout-btn {
        background-color: #dc3545;
    }

    .dropdown-menu {
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: none;
        padding: 10px 0;
    }

    .dropdown-item {
        padding: 8px 20px;
        transition: all 0.2s;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    @media (max-width: 991px) {
        .navbar-nav {
            padding-top: 15px;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .user-name, .login-btn, .logout-btn {
            text-align: center;
            display: block;
            margin: 5px 0;
        }
    }
</style>