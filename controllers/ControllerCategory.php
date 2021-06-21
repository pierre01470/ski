<?php
class ControllerCategory
{
    public function allCategories()
    {
        $manager = new CategoryManager();
        $categories = $manager->getAllCategories();

        require('./views/template.php');
    }
}