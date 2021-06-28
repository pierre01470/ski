<?php

class ControllerRun 
{
    public function AllRuns()
    {
        $manager = new RunsManager();
        $runs = $manager->getListAll();
    }
}