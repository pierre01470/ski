<?php

class Runs
{
    private $_idRun;
    private $_timeRealizedOne;
    private $_timeRealizedTwo;
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
    public function getIdRun()
    {
        return $this->_idRun;
    }

    public function getTimeRealizedOne()
    {
        return $this->_timeRealizedOne;
    }

    public function getTimeRealizedTwo()
    {
        return $this->_timeRealizedTwo;
    }

    public function getNumber()
    {
        return $this->_number;
    }
    
    /* --------------------------------- SETTER --------------------------------- */
    public function setId_Run($idRun)
    {
        $idRun = (int) $idRun;
        if ($idRun > 0) {
            $this->_idRun = $idRun;
        }
    }

    public function setTime_Realized_One($timeRealizedOne)
    {
        if (is_string($timeRealizedOne)) {
            $this->_timeRealizedOne = $timeRealizedOne;
        }
    }

    public function setTime_Realized_Two($timeRealizedTwo)
    {
        if (is_string($timeRealizedTwo)) {
            $this->_timeRealizedTwo = $timeRealizedTwo;
        }
    }

    public function setNumber($idNumber)
    {
        $idNumber = (int) $idNumber;
        if ($idNumber > 0) {
            $this->_idNumber = $idNumber;
        }
    }
}
