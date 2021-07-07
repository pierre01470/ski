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


        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $Excel_writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        
 
$spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();
        $activeSheet->setCellValue('A1', 'Nom');
        $activeSheet->setCellValue('B1', 'prénom');
        $activeSheet->setCellValue('C1', 'N° dossard');
        $activeSheet->setCellValue('D1', '1er run');
        $activeSheet->setCellValue('E1', '2nd run');
        $activeSheet->setCellValue('F1', 'résultat');

        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('ListeCourse.xlsx');
        $req = $db->query("SELECT * FROM `participant`ORDER BY id_participant DESC");
        if ($req->num_rows > 0) {

            $i = 2;
            while ($row = $req->fetch_assoc()) {
                $activeSheet->setCellValue('A' . $i, $row['product_name']);
                $activeSheet->setCellValue('B' . $i, $row['product_sku']);
                $activeSheet->setCellValue('C' . $i, $row['product_price']);
                $i++;
            }
        }
        $filename = 'ListeCourse.xlsx';
 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='. $filename);

$Excel_writer->save('php://output');
    }
}
