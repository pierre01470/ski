<?php
include ('../inc/inc_connexion.php');
        
$select = $pdo->prepare('
SELECT *
FROM participant
');

$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();

$newReservations = $select->fetchAll();

$excel = "";
$excel .=  "Id\tNom\tPrénom\tN° dossard\n";

foreach($newReservations as $row) {
    $excel .= "$row[id_participant]\t$row[firstname]\t$row[lastname]\t$row[number]\n";
}

header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=liste-clients.xls");

print $excel;
exit;

?>