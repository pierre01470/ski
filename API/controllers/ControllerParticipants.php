<?php

class ControllerParticipants
{

    public function insertParticipants()
    {
        $data = json_decode(file_get_contents('php://input'));
        var_dump($data);
        $insert = new Participants(array('lastname' => $data->lastname, 'firstname' => $data->firstname, 'date_birth' => $data->date_birth, 'email' => $data->email, 'photo' => $_FILES['photo'], 'number' => $data->number, 'id_category' => $data->category));
        $manager = new ParticipantsManager();
        $participants = $manager->addParticipants($insert);
    }

    public function allParticipant()
    {
        global $router;
        $manager = new ParticipantsManager();
        $participant = $manager->getAllParticipant();
        echo $participant;
    }

    public function oneParticipant($id)
    {
        $manager = new ParticipantsManager();
        $participant = $manager->getOneParticipant($id);
        echo $participant;
    }

    public function deleteOneParticipant($id)
    {
        $manager = new ParticipantsManager();
        $manager->deleteParticipant($id);
    }

    public function exportExcel(){
        $manager = new ParticipantsManager();
        $manager->getExportExcel();
    }
}