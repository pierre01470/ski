<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class RunsManager extends Model
{
    public function getImportExcel($insertTrial)
    {
        $db = $this->getDb();

        $req = $db->prepare('INSERT INTO `run`(`time_realized_one`, `time_realized_two`, `result`, `number`) VALUES (:time_realized_one, :time_realized_two, :result, :number)');
        $req->bindValue(':time_realized_one', $insertTrial->getTimeRealizedOne());
        $req->bindValue(':time_realized_two', $insertTrial->getTimeRealizedTwo());
        $req->bindValue(':result', $insertTrial->getResult());
        $req->bindValue(':number', $insertTrial->getNumber());
        $req->execute();

        $req->closeCursor();
    }

    public function getAllRuns()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT * FROM `run`')->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($req);
    }

    public function deleteRun($id)
    {
        $db = $this->getDb();
        $req = $db->prepare('DELETE * FROM `run`  WHERE `id_run` = :id_run');
        $req->bindValue(':id_run', $id['id']);
        $req->execute();
    }

    public function getTruncateRun()
    {
        $db = $this->getDb();
        $db->query('TRUNCATE `ski_api`.`run`');
    }
}
