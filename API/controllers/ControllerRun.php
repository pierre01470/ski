<!DOCTYPE html>
<html lang="en">

<?php
class ControllerRun
{
    public function viewtest2()
    {
        require './views/test2.php';
    }

    public function importExcel()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);

        // Define the Base64 value you need to save as an image
        $b64 = explode(',', $data->excel);
        // Obtain the original content (usually binary data)
        $bin = base64_decode($b64[1]);
        $filecontent = file_put_contents('evenement.xlsx', $bin);


        $allowed_ext = ['xls', 'csv', 'xlsx'];
        $filename = 'evenement.xlsx';
        $check_ext = explode(".", $filename);
        $file_ext = end($check_ext);


        if (in_array($file_ext, $allowed_ext)) {
            $targetPath = './evenement.xlsx';
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
            $data = $spreadsheet->getActiveSheet();

            $highestRow = $data->getHighestRow();

            for ($row = 2; $row <= $highestRow; $row++) {

                $time_realized_one = $data->getCellByColumnAndRow(4, $row)->getValue();
                $min = $time_realized_one * 24 * 60;
                $seconds = $min * 60;
                $milliseconds = $seconds * 1000;
                $timefirst = ($min % 60) . ':' . ($seconds % 60) . (($milliseconds === 0) ? '' : '.' . rtrim($milliseconds % 1000, '0'));


                $time_realized_two = $data->getCellByColumnAndRow(5, $row)->getValue();
                $min = $time_realized_two * 24 * 60;
                $seconds = $min * 60;
                $milliseconds = $seconds * 1000;
                $timesecond = ($min % 60) . ':' . ($seconds % 60) . (($milliseconds === 0) ? '' : '.' . rtrim($milliseconds % 1000, '0'));

                $result = $data->getCellByColumnAndRow(6, $row)->getCalculatedValue();
                $min = $result * 24 * 60;
                $seconds = $min * 60;
                $milliseconds = $seconds * 1000;
                $average = ($min % 60) . ':' . ($seconds % 60) . (($milliseconds === 0) ? '' : '.' . rtrim($milliseconds % 1000, '0'));

                $number = $data->getCellByColumnAndRow(3, $row)->getValue();

                $insertTrial = new Runs(array('time_realized_one' => $timefirst, 'time_realized_two' => $timesecond, 'result' => $average, 'number' => $number));
                $manager = new RunsManager();
                $trials = $manager->getImportExcel($insertTrial);
            }
        }
        unlink('./evenement.xlsx');
    }

    public function AllRuns()
    {
        $manager = new RunsManager();
        $runs = $manager->getAllRuns();
        echo $runs;
    }
    public function truncateRun()
    {
        $manager = new RunsManager();
        $runs = $manager->getTruncateRun();
    }
}
