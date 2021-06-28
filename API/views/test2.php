<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
<?php



?>
    <section>
    <table>
    <thead>
        
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Email</th>
        <th>Photo</th>
        <th>Numéro de dossard</th>
    
    </thead>
    <tbody>
       <td> <?php
        foreach((array)$participant as $affichage){
           
            ?>
            <div class="participants">
            <img  src="<?= $affichage->getPhoto()?>" alt=""> 
                <div class="participant">
                <?=  $affichage->getFirstname()?>
                <?= $affichage->getLastname() ?> 
                <?= $affichage->getDate_birth() ?>
                <?= $affichage->getEmail() ?>
                
                <?= $affichage->getNumber() ?>
            </div>
            <a href="<?= $router->generate('delete', array('id' => $affichage->getIdParticipants())); ?>">Supprimer</a>
                </div>
            <?php
        }
        ?></td>
    </tbody>
</table>
       
    </section>
</main>
</body>
</html>