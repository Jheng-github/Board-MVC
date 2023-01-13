<?php
$config = require base_path('config.php');
$db = new Database($config['database']); //在這邊產生根資料庫連地__connection , 
//dd($db); //確認有東西

// $heading = "My Notes";



$notes = $db->query('select * from notes where user_id = 1;') -> get(); //取得所有user_id 資料

//dd($notes); //確認有取得資料user_id = 1 的資料


//require "../views/about.view.php"; //用本地端要這樣
//require 'views/notes/index.view.php'; //php -S localhost


view("notes/index.view.php",[
    'heading' => 'My Notes',
    'notes' => $notes
]);
