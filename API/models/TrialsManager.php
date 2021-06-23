<?php

class TrialsManager extends Model
{
    public function getAllTrial()
   {
      $db = $this->getDb();
      $trials = [];
      $req = json_encode($db->query('SELECT * FROM `trial`')->fetchAll(PDO::FETCH_KEY_PAIR));
      return $req;
   }
    public function getInsertTrial($insert){
    $db = $this->getDb();
    $req = $db->prepare('INSERT INTO `trial`(`id_trial`, `name_station`, `trial_date`) VALUE (:id_trial, :name_station, :trial_date');
    $req->bindValue(':id_trial', $insert->getIdRun());
    $req->bindValue(':time_realized_one', $insert->getTime_realized_one());
    $req->bindValue(':time_realized_two', $insert->getTime_realized_two());
    $req->bindValue(':number', $insert->getNumber());
    $req->execute();
    }
    public function deleteTrial($id)
    {
        var_dump($id['id']);
        $db = $this->getDb();
        $req = $db->prepare('DELETE FROM `trial`  WHERE `id_trial` = :id_trial');
        $req->bindValue(':id_trial', $id['id']);
        $req->execute();
    }
}