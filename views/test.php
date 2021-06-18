<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <h2><span> course de ski</span> </h2>
        <!-- Box -->
        <div class="box">
            <!-- info container -->
            <section class="info">
                <h4>Course de courchevel</h4>
                <p>
                    <img src="https://phototheque.mon-sejour-en-montagne.com/images/msem/1400_700/courchevel-photo1.jpg" alt="" width="400px" height="300px">
                </p>
            </section>
            <!-- form container -->
            <h3>Formulaire de participation</h3>
            <form action="./insertParticipants" method="POST" enctype="multipart/form-data">
                <!-- Name -->
                <div class="name">
                    <label for="name">Nom</label>
                    <br>
                    <input type="text" name="lastname" id="lastname" required>
                </div>
                <!-- Company -->
                <div class="firstname">
                    <label for="firstname">Prénom</label>
                    <br>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
                <!-- Email -->
                <div class="email">
                    <label for="email">Email</label>
                    <br>
                    <input type="email" name="email" id="email" required>
                </div>
                <!-- Telephone -->
                <div class="date_birth">
                    <label for="date_birth">Date de naissance</label>
                    <br>
                    <input type="date" name="date_birth" id="date_birth" required>
                </div>
                <!-- Message -->
                <div id="photo">
                    <input type="file" name="photo" accept="image/*" id="imgInp" value="./ressources/camera.png">
                    <img id="preview" src="" alt="your image" />
                    <em>Formats acceptés : 'JPG', 'JPEG', 'PNG', 'GIF', 'JFIF' - Max 2Mo.</em>
                    <label for="imgInp" class="labelimage">Choisir une image</label>
                </div>
                <div class="category">
                    <select name="category">
                        <?php
                        foreach ($categories as $data) {
                        ?>
                            <option value='<?= $data->getIdCategory(); ?>'><?= $data->getNameCategory(); ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <div class="number">
                        <label for="number">n° Dossard</label>
                        <input type="text" name="number" id="number">
                        <input type="button" id="idButton">
                    </div>


                </div>
                <!-- Submit -->
                <div class="submit">
                    <input type="submit" value="SUBMIT">
                </div>
            </form>
        </div>
    </main>
<script src="./src/index.js">idGenerator()</script>
</body>

</html>