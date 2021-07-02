<?php

class ControllerTrial
{
    public  function insertTrial()
    {
        $manager = new TrialsManager();
        $trial = $manager->getAllTrial();
        echo $trial;
    }
}