<?php

namespace model;

use core\Database;


class CRUDModel
{

   public  $db;

   public function __construct($config)
   {

      $this->db = new Database($config); //使用namespace use 來在建構式實例化
   }

   public function getOneMsg($id)
   { //取得一筆使用者的留言
      $note = $this->db->query('select * from notes where id = :id', ['id' => $id])->findOrFail();

      return $note;
   }

   public function getUserMsg()
   { //取得使用者所有留言
      $notes = $this->db->query("select * from notes where user_id = :user_id;", ['user_id' => $_SESSION['user_id']])
         ->get(); //取得所有user_id 資料
      return $notes;
   }


   public function getAllMsg()
   { //取得所有留言/read admin
      $note = $this->db->query('select * from notes;')->get();
      return $note;
   }
   public function addMsg()
   { //新增留言/create
      $result = $this->db->query('INSERT INTO notes(body, user_id,time) VALUES(:body, :user_id, :time)', [
         'body' => $_POST['body'], //$_POST['body']name值 ... body->資料庫欄位
         'user_id' => $_SESSION['user_id'], //
         'time' => date('Y-m-d H:i:s')
      ]);
      return $result;
      // return $tihs;
   }
   public function deleteMsg($id)
   { //刪除留言
      $result = $this->db->query('delete from notes where id = :id', ['id' => $id]);

      return $result;
   }
   public function updateMsg($id)
   { //更新留言
      $result = $this->db->query('UPDATE notes SET body=:body WHERE id=:id', [
         'body' => $_POST['edit'],
         'id' => $id
      ])->find();

      return $result;
   }
}
