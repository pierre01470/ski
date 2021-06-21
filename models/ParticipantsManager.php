<?php

class ParticipantsManager extends Model
{
    public function addParticipants($insert)
    {
        // Insert Photo
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
            $dossier = './ressources/profile\\';
            $allowed = array('JPG', 'JPEG', 'PNG', 'GIF', 'JFIF');
            $filename = basename($_FILES['photo']['name']);
            $filesize = $_FILES['photo']['size'];
            $ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
            $file_tmp = $_FILES['photo']['tmp_name'];
            $rename = $filename . uniqid(date("Ymd")) . '.' . $ext;
            $file = $dossier . $filename;
            $file_rename = $dossier . $rename;

            // check size 
            if ($filesize > 2000000) {
                echo "Erreur: La taille du fichier est supérieure à la limite autorisée.";
            } else {
                // check the extension
                if (!in_array($ext, $allowed)) {
                    echo "Erreur : Veuillez sélectionner un format de fichier valide.";
                } else {
                    // check if the file already exist
                    if (file_exists("./ressources/profile/" . $_FILES["photo"]["name"])) {
                        move_uploaded_file($file_tmp, $file_rename);
                        $return_name = $file_rename;
                    } else {
                        move_uploaded_file($file_tmp, $file);
                        $return_name = $dossier . $filename;
                    }
                }
            }
        } else {
            // if no photo selected send default photo
            $return_name = './ressources/camera.png';
        }

        if (isset($_POST)) {
            if (
                isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['date_birth']) && !empty($_POST['date_birth']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_FILES['photo']) && !empty($_FILES['photo']) && isset($_POST['number']) && !empty($_POST['number'])
            ) {
                $db = $this->getDb();
                $req = $db->prepare('INSERT INTO `participant`(`lastname`, `firstname`, `date_birth`, `email`, `photo`, `number`, `id_trial`, `id_category`) VALUES (:lastname, :firstname, :date_birth, :email, :photo, :number, :id_trial, :id_category)');
                $req->bindValue(':lastname', $insert->getLastname());
                $req->bindValue(':firstname', $insert->getFirstname());
                $req->bindValue(':date_birth', $insert->getDate_birth());
                $req->bindValue(':email', $insert->getEmail());
                $req->bindValue(':photo', $return_name);
                $req->bindValue(':number', $insert->getNumber());
                $req->bindValue(':id_trial', '1');
                $req->bindValue(':id_category', $_POST['category']);
                $req->execute();
            }
        }
    }
}
