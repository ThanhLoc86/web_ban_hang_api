<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');

class AccountController
{
    private $accountModel;
    private $db;
    
    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }
    
    function register()
    {
        include_once 'app/views/account/register.php';
    }
    
    public function login()
    {
        include_once 'app/views/account/login.php';
    }
    
    function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullname = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            
            $errors = [];
            
            if (empty($username)) {
                $errors['username'] = "Vui lòng nhập userName!";
            }
            if (empty($fullname)) {
                $errors['fullname'] = "Vui lòng nhập fullName!";
            }
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập password!";
            }
            if ($password != $confirmPassword) {
                $errors['confirmPass'] = "Mật khẩu và xác nhận chưa đúng";
            }
            
            //kiểm tra username đã được đăng ký chưa?
            $account = $this->accountModel->getAccountByUsername($username);
            if ($account) {
                $errors['account'] = "Tài khoản này đã có người đăng ký!";
            }
            
            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $result = $this->accountModel->save($username, $fullname, $password);
                if ($result) {
                    header('Location: /web_ban_hang/account/login');
                }
            }
        }
    }
    
    function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        header('Location: /web_ban_hang/product');
    }
    
    public function checkLogin()
    {
        // Kiểm tra xem liệu form đã được submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $account = $this->accountModel->getAccountByUsername($username);
            if ($account) {
                $pwd_hashed = $account->password;
                //check mật khẩu
                if (password_verify($password, $pwd_hashed)) {
                    session_start();
                    $_SESSION['user_id'] = $account->id;
                    $_SESSION['role'] = $account->role;
                    $_SESSION['username'] = $account->username;
                    header('Location: /web_ban_hang/product');
                    exit;
                } else {
                    echo "Mật khẩu không chính xác.";
                }
            } else {
                echo "Báo lỗi không tìm thấy tài khoản";
            }
        }
    }
}
?>