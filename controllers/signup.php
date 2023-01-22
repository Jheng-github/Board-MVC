<?php

use core\Database;
use controllers\SignupController;

$config = require base_path('config.php');
$db = new Database($config['database']); //在這邊產生根資料庫連地__connection , 
//dd($_SERVER['REQUEST_METHOD']);


//$checkUser
// $db->query("SELECT * FROM users WHERE name_uid = :name_uid", [
//     'name_uid' => $uid
// ])->get();
//$_SERVER['REQUEST_METHOD'] == 'POST'

$error = [];
if (isset($_POST['submit'])) {

    $uid = $_POST['uid'];
    $pwd = $_POST['password'];
    $pwdrepeat = $_POST['passwordrepeat'];
    $email = $_POST['email'];
    if($pwd !== $pwdrepeat){
        $error['password'] = "兩次密碼輸入不相同,請重新輸入";
    }
    if($db->checkUser($uid)) {
        $error['uid'] = "帳號已存在請重新輸入";
    } else {
        $db->addUser($uid, $pwd);
    }
    
}


    //$signup = new SignupController($uid, $password, $passwordrepeat, $email);
    // if ($db->query("SELECT * FROM users WHERE name_uid = :name_uid", [
    //     'name_uid' => $uid
    // ])->get()) { //尋找所有資料庫的uid如果一樣,那就錯誤
    //     $error['uid'] = "帳號已存在請重新輸入";
    // } else {
    //     $db->query("INSERT INTO users(`name_uid`, `password`) VALUES(:name_uid, :password)", [
    //         // 'username' => $_POST['uid'], 
    //         // 'password' => $_POST['password']
    //         'name_uid' => $uid,
    //         'password' => $pwd
    //     ]);
    // }


//require base_path("views/index.view.php"); //PHP -S 

view("signup.view.php", 
[
    'heading' => '註冊',
    'error' => $error 
]);