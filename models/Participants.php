<?php

class Participants
{
    private $_idParticipants;
    private $_lastName;
    private $_firstName;
    private $_date_birth;
    private $_email;
    private $_photo;
    private $_idTrial;
    private $_idCategory;
    private $_number;

    /*---------------construct----------------------------*/
    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /* --------------------------------- GETTER --------------------------------- */
    public function getIdParticipants()
    {
        return $this->_idParticipants;
    }

    public function getLastName()
    {
        return $this->_lastName;
    }

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function getDate_birth()
    {
        return $this->_date_birth;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function getPhoto()
    {
        return $this->_photo;
    }

    public function getIdTrial()
    {
        return $this->_idTrial;
    }

    public function getIdCategory()
    {
        return $this->_idCategory;
    }

    public function getNumber()
    {
        return $this->_number;
    }
    
    /* --------------------------------- SETTER --------------------------------- */
    public function setId_Participant($idParticipants)
    {
        $idParticipants = (int) $idParticipants;
        if ($idParticipants > 0) {
            $this->_idParticipant = $idParticipants;
        }
    }

    public function setLastName($lastName)
    {
        if (is_string($lastName)) {
            $this->_lastName = $lastName;
        }
    }

    public function setFirstName($firstName)
    {
        if (is_string($firstName)) {
            $this->_firstName = $firstName;
        }
    }

    public function setDate_birth($date_birth)
    {
            $this->_date_birth = $date_birth;
    }

    public function setEmail($email)
    {
        if (is_string($email)) {
            $this->_email = $email;
        }
    }

    public function setPhoto($photo)
    {
        if (is_string($photo)) {
            $this->_photo = $photo;
        }
    }

    public function setId_Trial($idTrial)
    {
            $this->_idTrial = $idTrial;
    }

    public function setId_category($idCategory)
    {
        if (is_string($idCategory)) {
            $this->_idCategory = $idCategory;
        }
    }

    public function setNumber($number)
    {
        if (is_string($number)) {
            $this->_number = $number;
        }
    }
}
