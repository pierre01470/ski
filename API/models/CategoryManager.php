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
   public function getInsertCatagories($insert){
      $db = $this->getDb();
      $req = $db->prepare('INSERT INTO `category`(`id_category`, `name_category`) VALUE (:id_category, :name_category');
      $req->bindValue(':id_*category', $insert->getIdCategory());
      
      $req->bindValue(':nane_category', $insert->getNameCategory());
      $req->execute();
  
      }
      public function deleteCategory($id)
    {
        var_dump($id['id']);
        $db = $this->getDb();
        $req = $db->prepare('DELETE FROM `category`  WHERE `id_category` = :id_category');
        $req->bindValue(':id_category', $id['id']);
        $req->execute();
    }
}
