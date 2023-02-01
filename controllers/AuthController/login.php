<?php
//session_start();
//namespace controllers\AuthController;

use core\Database;
//use model\UserModel as UserModel;
use model\UserModel;

//$heading ="Login in";
var_dump(session_id());
//dd($_SERVER);
$config = require base_path('config.php');
$db = new Database($config['database']);
$data = new UserModel($config['database']);
//$data = new \model\UserModel($config['database']);


$error = [];

if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $password = $_POST['password'];

    if ($data->loginUser($uid, $password)) {
        $_SESSION['permissions'] = $data->permissions($uid); //判斷是否為最高權限
        //登入成功
        //跳轉到首頁
       //dd($_SESSION['permissions']);
        header("Location: /");
    } else {
     $error['fail'] = "帳號或密碼錯誤，請重新輸入。";
    }
    }
//require base_path("views/index.view.php"); //PHP -S 

view("AuthView/login.view.php",[
    'heading' => '您已經登入',
    'error' => $error
]);