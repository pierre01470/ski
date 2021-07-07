<?php

class ControllerParticipants
{

    public function insertParticipants()
    {
        $data = json_decode(file_get_contents('php://input'));
        var_dump($data);
        if (!empty($data->photo)) {
            $b64 = explode(',', $data->photo);
            $bin = base64_decode($b64[1]);
            $im = imageCreateFromString($bin);
            if (!$im) {
                die('Base64 value is not a valid image');
            }
            // rename Photo
            if (isset($im)) {
                // check if the file already exist
                $filename = uniqid(date("Ymd"));
                $file_rename = "../src/assets/ressources/profile/" . $filename . ".png";
                $database_name = "profile/" . $filename . ".png";
            }
        } else {
            // if no photo selected send default photo
            $file_rename = '../src/assets/ressources/profile/camera.png"';
            $database_name = "profile/camera.png";
        }
        imagepng($im, $file_rename, 0);
        $insert = new Participants(array('lastname' => $data->lastname, 'firstname' => $data->firstname, 'date_birth' => $data->date_birth, 'email' => $data->email, 'photo' => $database_name, 'number' => $data->number, 'id_category' => $data->category));
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

    public function exportExcel()
    {
        $manager = new ParticipantsManager();
        $manager->getExportExcel();
    }
}
