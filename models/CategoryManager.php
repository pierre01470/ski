<?php

class CategoryManager extends Model
{
   public function getAllCategories()
   {
      $db = $this->getDb();
      $categories = [];
      $req = $db->query('SELECT * FROM `category`');

      while ($category = $req->fetch(PDO::FETCH_ASSOC)) {
         $categories[] = new Category($category);
      }

      $req->closeCursor();
      return $categories;
   }
}
