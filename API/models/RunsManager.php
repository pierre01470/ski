<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class RunsManager extends Model
{
    public function getImportExcel()
    {
        $inputFileName = $_FILES['file']['tmp_name'];

        $reader = new Xlsx();
        $spreadsheet = $reader->load($inputFileName);

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        
        foreach ($sheetData as $value) {
            var_dump($sheetData);
            $db = $this->getDb();
            $req = $db->prepare('INSERT INTO `run`(`time_realized_one`,`time_realized_two`,`number`) VALUES (:row1, :row2,:row3)');
            $req->bindValue(':row1', $value['D']);
            $req->bindValue(':row2', $value['E']);
            $req->bindValue(':row3', $value['C']);
            $req->execute();
        }
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
}
