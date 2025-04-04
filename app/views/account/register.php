<?php include 'app/views/shares/header.php'; ?>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white register-card">
                    <div class="card-body p-5">
                        <?php
                        if (isset($errors)) {
                            echo '<div class="alert alert-danger bg-danger bg-opacity-25 text-white border-danger mb-4">';
                            echo "<ul class='mb-0'>";
                            foreach ($errors as $err) {
                                echo "<li>$err</li>";
                            }
                            echo "</ul>";
                            echo '</div>';
                        }
                        ?>
                        
                        <form action="/web_ban_hang/account/save" method="post">
                            <div class="mb-md-4 mt-md-3 pb-4">
                                <h2 class="fw-bold mb-3 text-uppercase text-center">Đăng ký</h2>
                                <p class="text-white-50 mb-4 text-center">Vui lòng nhập thông tin đăng ký tài khoản</p>
                                
                                <div class="form-group mb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white border-right-0">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="username" id="username" class="form-control form-control-lg bg-dark text-white border-left-0" 
                                            placeholder="Tên đăng nhập" required />
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white border-right-0">
                                                <i class="fas fa-user-tag"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="fullname" id="fullname" class="form-control form-control-lg bg-dark text-white border-left-0" 
                                            placeholder="Họ và tên" required />
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white border-right-0">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="password" 
                                            class="form-control form-control-lg bg-dark text-white border-left-0 border-right-0" 
                                            placeholder="Mật khẩu" required />
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-white border-left-0 toggle-password" 
                                                onclick="togglePassword('password', 'toggleIconPassword')">
                                                <i class="far fa-eye" id="toggleIconPassword"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white border-right-0">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="confirmpassword" id="confirmpassword" 
                                            class="form-control form-control-lg bg-dark text-white border-left-0 border-right-0" 
                                            placeholder="Xác nhận mật khẩu" required />
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-white border-left-0 toggle-password" 
                                                onclick="togglePassword('confirmpassword', 'toggleIconConfirm')">
                                                <i class="far fa-eye" id="toggleIconConfirm"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agreement" name="agreement" required>
                                        <label class="form-check-label text-white-50" for="agreement">
                                            Tôi đồng ý với <a href="#" class="text-white-50 fw-bold">điều khoản sử dụng</a>
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-outline-light btn-lg w-100 register-btn" type="submit">Đăng ký</button>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">Đã có tài khoản? <a href="/web_ban_hang/account/login" class="text-white-50 fw-bold login-link">Đăng nhập</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    .gradient-custom {
        /* background: linear-gradient(to right, #3a1c71, #d76d77, #ffaf7b); */
        background-color: #ffffff;
    }
    
    .register-card {
        border-radius: 1rem;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }
    
    .form-control:focus {
        background-color: #212529;
        border-color: #6c757d;
        color: white;
        box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.1);
    }
    
    .input-group-text {
        border-color: #6c757d;
    }
    
    .toggle-password {
        cursor: pointer;
    }
    
    .register-btn {
        transition: all 0.3s;
        border-radius: 2rem;
        padding: 10px 20px;
        font-weight: 600;
    }
    
    .register-btn:hover {
        background-color: #ffffff;
        color: #212529;
        transform: translateY(-2px);
    }
    
    .login-link {
        transition: color 0.3s;
    }
    
    .login-link:hover {
        color: white !important;
        text-decoration: underline;
    }
</style>

<script>
    function togglePassword(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const toggleIcon = document.getElementById(iconId);
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>