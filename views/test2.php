<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="./insertParticipants" method="POST"
        <div class="formRun">
        <h3>Formulaire de course</h3>
            <div class="station">
                    <label for="station">Station : </label>
                    <br>
                    <input type="text" name="station" id="station" required>
            </div>
            <div class="dateTrial">
                    <label for="dateTrial">Date de l'épreuve : </label>
                    <br>
                    <input type="date" name="dateTrial" id="dateTrial" required>
            </div>
            <div class="submit">
                    <input type="submit" value="SUBMIT">
                </div>
        </div>
</form>
</body>
</html>