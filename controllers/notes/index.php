<?php

use controllers\notes\NoteController;

$config = require base_path('config.php'); //引入連線檔

$data = new NoteController($config['database']);

$data->showUserMsg();



//包裝下方成showUserMsg()
// -------------------------------------
// $heading = "My Notes";
//echo '1232132132dd';
//dd($_SESSION['user_id']);
// if (!isset($_SESSION['user_id'])) { //登入的時候有把資料庫的值灌到session,如果沒有就請他先登入
//     echo "<script>alert('請先登入'); location.href='login';</script>";
//     exit;
//   }


// //$_SESSION['user_id'] = $user['id'];

// $notes = $db->query("select * from notes where user_id = :user_id;", ['user_id' => $_SESSION['user_id']]) 
// -> get(); //取得所有user_id 資料
// //dd($notes);
// // $notes = $db->query("select * from notes where user_id = :user_id;", ['user_id' => $user['id']]) 
// // -> get(); //取得所有user_id 資料


// //dd($notes); //確認有取得資料user_id 的資料


// //require "../views/about.view.php"; //用本地端要這樣
// //require 'views/notes/index.view.php'; //php -S localhost


// view("notes/index.view.php",[
//     'heading' => 'Notdes',
//     'notes' => $notes
// ]);
