<?php

class Trials
{
    private $_idTrial;
    private $_nameStation;
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

public function getNameStation()
{
    return $this->_nameStation;
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

public function setNameStation($nameStation)
{
    if (is_string($nameStation)) {
        $this->_nameStation = $nameStation;
    }
}

public function setDate($date)
{
    $date = new Date;
    $date->setTimestamp($ts);
}
}