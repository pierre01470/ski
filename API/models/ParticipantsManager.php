<?php

class ParticipantsManager extends Model
{
    public function addParticipants($insert)
    {
        if (isset($insert)) {
            $db = $this->getDb();
            $req = $db->prepare('INSERT INTO `participant`(`lastname`, `firstname`, `date_birth`, `email`, `photo`, `number`, `id_trial`, `id_category`) VALUES (:lastname, :firstname, :date_birth, :email, :photo, :number, :id_trial, :id_category)');
            $req->bindValue(':lastname', $insert->getLastname());
            $req->bindValue(':firstname', $insert->getFirstname());
            $req->bindValue(':date_birth', $insert->getDate_birth());
            $req->bindValue(':email', $insert->getEmail());
            $req->bindValue(':photo', $insert->getPhoto());
            $req->bindValue(':number', $insert->getNumber());
            $req->bindValue(':id_trial', '1');
            $req->bindValue(':id_category', '1');
            $req->execute();
        }
    }

    public function getAllParticipant()
    {

        $db = $this->getDb();
        $req = $db->query('SELECT * FROM `participant`')->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($req);
    }

    public function getOneParticipant($id)
    {
        $db = $this->getDb();
        $req = $db->prepare('SELECT * FROM `participant` WHERE `id_participant` = :id_participant');
        $req->bindValue(':id_participant', $id['id']);
        $req->execute();
        return json_encode($req->fetchAll(PDO::FETCH_ASSOC));
    }

    public function deleteParticipant($id)
    {
        $db = $this->getDb();
        $req = $db->prepare('DELETE FROM `participant`  WHERE `id_participant` = :id_participant');
        $req->bindValue(':id_participant', $id['id']);
        $req->execute();
    }

    public function getExportExcel()
    {
        $db = $this->getDb();
        $select = $db->prepare('SELECT * FROM `participant`');

        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();

        $newReservations = $select->fetchAll();

        $excel = "";
        $excel .=  "Id\tNom\tPrénom\tN° dossard\n";

        foreach ($newReservations as $row) {
            $excel .= "$row[id_participant]\t$row[firstname]\t$row[lastname]\t$row[number]\n";
        }

        header("Content-type: application/vnd.ms-excel");
        header("Content-disposition: attachment; filename=liste-participants.xls");
        print $excel;
        exit;
    }

    // Truncate Table
    public function getTruncateTable()
    {
        $db = $this->getDb();
        $db->query('TRUNCATE `ski_api`.`participant`');
        $db->query('TRUNCATE `ski_api`.`run`');
        $db->query('TRUNCATE `ski_api`.`trial`');
        $dossier = "../src/assets/ressources/profile/";
        $ouverture = opendir($dossier);
        $fichier = readdir($ouverture);
        while ($fichier = readdir($ouverture)) {
            unlink("$dossier/$fichier");
        }
    }
}
