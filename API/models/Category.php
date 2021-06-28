<?php

class Category
{
    private $_idCategory;
    private $_nameCategory;

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
    public function getIdCategory()
    {
        return $this->_idCategory;
    }

    public function getNameCategory()
    {
        return $this->_nameCategory;
    }

    /* --------------------------------- SETTER --------------------------------- */

    public function setId_category($idCategory)
    {
        $this->_idCategory = $idCategory;
    }

    public function setName_category($nameCategory)
    {
        $this->_nameCategory = $nameCategory;
    }
}
