<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https:/fonts/.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>

<body>
    <div class="container-start">


        <section class="main">

            <div class="back-date">
                <div class="station">
                    <h2>Nom de la station</h2>
                </div>
                <div class="test">
                    <h2>Date de l'épreuve</h2>
                </div>
            </div>
            <?php
            foreach ((array) $participant as $affichage) {

            ?>
                <div class="category">
                    <div>
                        <h3>Photo</h3>
                        <img src="<?= $affichage->getPhoto() ?>" alt="">
                    </div>
                    <span>|</span>
                    <h3>Nom</h3>
                    <span>|</span>
                    <h3>Prénom</h3>
                    <span>|</span>
                    <h3>Catégorie</h3>
                    <span>|</span>
                    <h3>Dossard</h3>
                    <span>|</span>
                    <h3>Temps</h3>
                    <span>|</span>
                    <h3>Classement</h3>


                    <div class="participants">
                        <img src="<?= $affichage->getPhoto() ?>" alt="">
                        <div class="participant">
                            <?= $affichage->getFirstname() ?>
                            <?= $affichage->getLastname() ?>
                            <?= $affichage->getDate_birth() ?>
                            <?= $affichage->getEmail() ?>

                            <?= $affichage->getNumber() ?>
                        </div>
                        <a href="<?= $router->generate('delete', array('id' => $affichage->getIdParticipants())); ?>">Supprimer</a>
                    </div>
                <?php
            }
                ?>
                </div>

        </section>

        <footer>
            <div class="end-page">

            </div>
        </footer>

    </div>
</body>

</html>