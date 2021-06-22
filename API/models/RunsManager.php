<?php

class RunsManager extends Model
{
    public function getInsertRun($insert){
    $db = $this->getDb();
    $req = $db->prepare('INSERT INTO `run`(`id_run`, `time_realized_one`, `time_realized_two`, `number`) VALUE (:id_run, :time_realized_one, :time_realized_two, :number');
    $req->bindValue(':id_run', $insert->getIdRun());
    $req->bindValue(':time_realized_one', $insert->getTime_realized_one());
    $req->bindValue(':time_realized_two', $insert->getTime_realized_two());
    $req->bindValue(':number', $insert->getNumber());
    $req->execute();
    
    }
    
}

