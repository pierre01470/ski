<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Accueil</title>
</head>

<body class="template">
    <div class="container-header">
        <header>
            <div class="titre">
                <h1>SkiPro</h1>
    </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="#"></a>Inscription</li>
                        <li><a href="#"></a>Résultats</li>
                    </ul>
                </nav>
            </div>
        </header>
        <section class="main">

            <div class="name_date">
                <div class="epreuves">
                    <h2>Épreuves</h2>
                </div>
                <div class="inputone">
                    <label for="#">
                        Nom de la station
                    </label>
                    <input type="text" name="station_name" placeholder="taper votre Nom station...">
                </div>
                <div class="inputtwo">
                    <label for="#">
                        Date d'inscription
                    </label>
                    <input type="text" name="registration_date" placeholder="taper votre Date d'inscription...">
                </div>
                <div class="test-sub">
                    <input class="nabil" type="submit">
                </div>
            </div>
            <div class="form">
                <form action="./insertParticipants" method="POST" enctype="multipart/form-data">
                    <div class="titre-form">
                        <h2>Formulaire</h2>
                    </div>
                    <div class="la-in">

                        <div class="form1">
                            <label for="#">
                                Nom
                            </label>
                            <input type="text" name="lastname" placeholder="taper votre Nom...">
                        </div>

                        <div class="form2">
                            <label for="#">
                                Prénom
                            </label>
                            <input type="text" name="firstname" placeholder="taper votre Prénom...">
                        </div>

                        <div class="form3">
                            <label for="#">
                                Email
                            </label>
                            <input type="email" name="email" placeholder="taper votre Email...">
                        </div>

                        <div class="form4">
                            <label for="#">
                                Date de naissance
                            </label>
                            <input type="date" name="date_birth" placeholder="taper votre Date de naissance...">
                        </div>

                        <div class="form5">
                            <label for="#">
                                Catégorie
                            </label>
                            <select type="text" name="category">
                                <?php
                                foreach ($categories as $data) {
                                ?>

                                    <option value='<?= $data->getIdCategory(); ?>'>
                                        <?= $data->getNameCategory(); ?>
                                    </option>
                                <?php
                                }
                                ?>
                                <option value="1">Nº</option>
                            </select>
                            <label for="#" id=""></label>
                            <input type="text" name="number">
                        </div>
                        <div class="form6">
                            <div class="file-upload">
                                <input class="inPhoto" type="file" name="photo" value="Photo" placeholder="Photo" size="80px">
                                <label for="file" id="picture">Photo</label>
                            </div>
                        </div>
                        <div class="form7">
                            <input id="marjorie" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    

    <footer>
        <div class="pied-page">

        </div>
    </footer>
</div>
    <script src=""></script>
</body>

</html>