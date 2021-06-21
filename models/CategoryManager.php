<?php

class CategoryManager extends Model
{
   public function getAllCategories()
   {
      $db = $this->getDb();
      $categories = [];
      $req = json_encode($db->query('SELECT * FROM `category`')->fetchAll(PDO::FETCH_KEY_PAIR));
      return $req;
   }
}
