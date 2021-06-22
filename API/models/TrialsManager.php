<?php

class TrialsManager extends Model
{
    public function getInsertTrial($insert){
    $db = $this->getDb();
    $req = $db->prepare('INSERT INTO `trial`(`id_trial`, `name_station`, `trial_date`) VALUE (:id_trial, :name_station, :trial_date');
    $req->bindValue(':id_trial', $insert->getIdRun());
    $req->bindValue(':time_realized_one', $insert->getTime_realized_one());
    $req->bindValue(':time_realized_two', $insert->getTime_realized_two());
    $req->bindValue(':number', $insert->getNumber());
    $req->execute();
    }
}