<?php
class RunsManager extends Model
{
    public function getImportExcel()
    {
        $db = $this->getDb();
        // Insert CSV
        if (!empty($_FILES['file'])) {

            //UPLOAD DU FICHIER CSV, vérification et insertion en BASE
            if (isset($_FILES["file"]["type"]) != "application/vnd.ms-excel") {
                die("Ce n'est pas un fichier de type .csv");
            } elseif (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $req = $db->prepare('INSERT INTO `run` ( time_realized_one,time_realized_two,number) VALUES(?, ?, ?)');
                $file = new SplFileObject($_FILES['file']['tmp_name']);
                $file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY);
                foreach ($file as $row) {
                    $req->execute([$row[0], $row[1], $row[2]]);
                }
                $req->closeCursor();
            } else {
                echo 'epic fail<br />';
            }
        }
    }

    public function getAllRuns()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT * FROM `run`')->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($req);
    }

    public function getInsertRun($insert)
    {
        $db = $this->getDb();
        $req = $db->prepare('INSERT INTO `run`(`id_run`, `time_realized_one`, `time_realized_two`, `number`) VALUE (:id_run, :time_realized_one, :time_realized_two, :number');
        $req->bindValue(':id_run', $insert->getIdRun());
        $req->bindValue(':time_realized_one', $insert->getTime_realized_one());
        $req->bindValue(':time_realized_two', $insert->getTime_realized_two());
        $req->bindValue(':number', $insert->getNumber());
        $req->execute();
    }

    public function deleteRun($id)
    {
        $db = $this->getDb();
        $req = $db->prepare('DELETE * FROM `run`  WHERE `id_run` = :id_run');
        $req->bindValue(':id_run', $id['id']);
        $req->execute();
    }
}
