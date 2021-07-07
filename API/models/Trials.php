<?php
class Trials
{
    private $_idTrial;
    private $_name_station;
    private $_date;

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
    public function getIdTrial()
    {
        return $this->_idTrial;
    }

    public function getName_station()
    {
        return $this->_name_station;
    }

    public function getDate()
    {
        return $this->_date;
    }

    /* --------------------------------- SETTER --------------------------------- */
    public function setIdTrial($idTrial)
    {
        $idTrial = (int) $idTrial;
        if ($idTrial > 0) {
            $this->_idTrial = $idTrial;
        }
    }

    public function setName_station($name_station)
    {
        if (is_string($name_station)) {
            $this->_name_station = $name_station;
        }
    }

    public function setDate($date)
    {
        $this->_date = $date;
    }
}
