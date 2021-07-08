<?php
class TrialsManager extends Model
{
    public function addTrial($insert)
    {
        $db = $this->getDb();
        $req = $db->prepare('INSERT INTO `trial`(`name_station`, `date`) VALUES (:name_station, :date)');
        $req->bindValue(':name_station', $insert->getName_station());
        $req->bindValue(':date', $insert->getDate());
        $req->execute();
    }

    public function getAllTrial()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT * FROM `trial`')->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($req);
    }

    public function deleteTrial($id)
    {
        $db = $this->getDb();
        $req = $db->prepare('DELETE FROM `trial`  WHERE `id_trial` = :id_trial');
        $req->bindValue(':id_trial', $id['id']);
        $req->execute();
    }
}
