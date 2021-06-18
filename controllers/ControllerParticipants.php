<?php

class ControllerParticipants
{

    public function insertParticipants()
    {
        $insert = new Participants(array('lastname' => $_POST['lastname'], 'firstname' => $_POST['firstname'], 'date_birth' => $_POST['date_birth'], 'email' => $_POST['email'], 'photo' => $_FILES['photo'], 'number' => $_POST['number'], 'id_category' => $_POST['category']));
        $manager = new ParticipantsManager();
        $participants = $manager->addParticipants($insert);

        header('Location: ./');
    }
}