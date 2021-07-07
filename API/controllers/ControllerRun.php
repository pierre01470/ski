<!DOCTYPE html>
<html lang="en">

<?php
class ControllerRun 
{
    public function viewtest2(){
        require './views/test2.php';
    }

    public function importExcel(){
        var_dump($_FILES);
        $manager = new RunsManager();
        $runs = $manager->getImportExcel();
    }

    public function AllRuns()
    {
        $manager = new RunsManager();
        $runs = $manager->getAllRuns();
        echo $runs;
    }
}