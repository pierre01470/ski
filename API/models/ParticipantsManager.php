<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
            $req->bindValue(':id_category', $insert->getIdCategory());
            $req->execute();
        }
    }

    public function getAllParticipant()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT * FROM `participant` INNER JOIN `category` ON participant.id_category = category.id_category')->fetchAll(PDO::FETCH_ASSOC);
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

    public function getParticipantByCategory()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT * FROM `participant` INNER JOIN `category` ON participant.id_category = category.id_category ORDER BY `name_category` ASC');
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
        $part = [];
        $db = $this->getDb();
        $req = $db->query('SELECT * FROM `participant`');
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $count = 0;
            $part[] = new Participants($donnees);
            $count++;
        }

        if ($count > 0) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'firsname');
            $sheet->setCellValue('B1', 'lastname');
            $sheet->setCellValue('C1', 'number');
            $sheet->setCellValue('D1', 'time_realized_one');
            $sheet->setCellValue('E1', 'time_realized_two');
            $sheet->setCellValue('F1', 'result');

            $rowCount = 2;
            foreach ($part as $data) {
                $sheet->setCellValue('A' . $rowCount, $data->getFirstName());
                $sheet->setCellValue('B' . $rowCount, $data->getLastName());
                $sheet->setCellValue('C' . $rowCount, $data->getNumber());
                $sheet->setCellValue('D' . $rowCount, 'mm:ss,00');
                $sheet->setCellValue('E' . $rowCount, 'mm:ss,00');
                $sheet->setCellValue('F' . $rowCount, '=MOYENNE(D' . $rowCount . ', E' . $rowCount . ')');
                $rowCount++;
            }

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="ListeCourse.xlsx"');

            $writer = new Xlsx($spreadsheet);
            $writer->save('ListeCourse.xlsx');
        }
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
