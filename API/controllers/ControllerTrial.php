<?php

class ControllerTrial
{
    public function insertTrial()
    {
        $data = json_decode(file_get_contents('php://input'));

        $insert = new Trials(array('id_trial' => $data->id_trial, 'name_station' => $data->name_station, 'date'=>$data->date);
        $manager = new TrialsManager();
        $trials = $manager->addParticipants($insert);
    }
    
    public function allTrial()
    {
        $manager = new TrialsManager();
        $trial = $manager->getAllTrial();
        echo $trial;
    }
}