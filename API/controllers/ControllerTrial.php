<?php

class ControllerTrial
{
    public function insertTrial(){
        $data = json_decode(file_get_contents('php://input'));
        
        $insert = new Trials(array('name_station' => $data->station_name, 'date' => $data->registration_date));
        $manager = new TrialsManager();
        $trials = $manager->addTrial($insert);
    }
    public function allTrial()
    {
        $manager = new TrialsManager();
        $trial = $manager->getAllTrial();
        echo $trial;
    }
}