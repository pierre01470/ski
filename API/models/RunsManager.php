<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class RunsManager extends Model
{
    public function getImportExcel()
    {
        $data = json_decode(file_get_contents('php://input'));
        $explode = explode(',', $data->photo);
        $b64 = base64_decode($explode[1]);
        file_put_contents('file.xls', $b64);
        file_get_contents('file.xls');
        $inputFileName = 'file.xls';

        $reader = new Xlsx();
        $spreadsheet = $reader->load($inputFileName);

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        
        foreach ($sheetData as $value) {
            $db = $this->getDb();
            var_dump($value['F']);
            $req = $db->prepare('INSERT INTO `run`(`time_realized_one`,`time_realized_two`, `number`, `result`) VALUES (:row1, :row2,:row3,:row4)');
            $req->bindValue(':row1', $value['D']);
            $req->bindValue(':row2', $value['E']);
            $req->bindValue(':row3', $value['C']);
            $req->bindValue(':row4', $value['F']);
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
