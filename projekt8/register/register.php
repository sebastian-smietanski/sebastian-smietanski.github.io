<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    header('Location: ../private/private.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>BSI Projekt 8: Panel logowania</title>
    <link rel="icon" type="image/x-icon" href="../../icons/favicon.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/inputBox.css">
    <link rel="stylesheet" href="../../css/button.css">
    <link rel="stylesheet" href="../../css/source_code_redirect.css">
    <link rel="stylesheet" href="../project8.css">
</head>
<body>
    <h2 id="header">Rejestracja</h2>
    <form method='post' action='../requests/requests.php' id="mainForm">
        <div class="boxBase column">
            <?php if (isset($_GET['registered'])): ?>
                <h2 style="text-align: center">Rejestracja powiodła się</h2>
            <?php else: ?>
                <!-- name -->
                <div class="wide inputBox wide" >
                    <label for="name">Imię</label>
                    <input type="text" id="name" name="name" required maxlength="255" value="Jan" pattern=".{3,50}" title="Od 3 do 255 znaków.">
                </div>
                <div class="warning" id="warning_name" style="display: none">warning</div>

                <!-- surname -->
                <div class="inputBox">
                    <label for="surname">Nazwisko</label>
                    <input type="text" id="surname" name="surname" required maxlength="255" value="Kowalski" pattern=".{3,255}" title="Od 3 do 255 znaków." >
                </div>
                <div class="warning" id="warning_surname" style="display: none">warning</div>

                <!-- email -->
                <div class="inputBox">
                    <label for="email">E-Mail</label>
                    <input type="text" id="email" name="email" required maxlength="255" value="jan.kowalski@example.com" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,255}$" title="https://en.wikipedia.org/wiki/Email_address#Syntax">
                </div>
                <?php if (isset($_SESSION['email_already_registered'])): ?>
                <div class="warning" id="warning_email">Konta o takim adresie email już istnieje.</div>
                <?php else: ?>
                <div class="warning" id="warning_email" style="display: none">Konta o takim adresie email już istnieje.</div>
                <?php endif ?>

                <!-- password -->
                <div class="inputBox">
                    <label for="password">Hasło</label>
                    <input type="password" id="password" name="password" required value="Password1!" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,255}" title="Hasło powinno zawierać od 8 do 255 znaków, w tym jedną: małą literę, dużą literę, cyfrę i znak specjalny (!, @, #, $ %).">
                    <img src="../../icons/eye_on.png" draggable="false" class="visibility-btn" height="20px" width="20px" alt="eye" >
                </div>
                <div class="warning" id="warning_password" style="display: none">warning</div>

                <!-- repeat password -->
                <div class="inputBox">
                    <label for="password_repeat">Potwierdź hasło</label>
                    <input type="password" id="password_repeat" name="password_repeat" required value="Password1!" pattern="" title="Hasła muszą być takie same.">
                    <img src="../../icons/eye_on.png" draggable="false" class="visibility-btn" height="20px" width="20px" alt="eye">
                </div>
                <div class="warning" id="warning_password_repeat" style="display: none">Hasła nie są takie same.</div>

                <input class="button" type="submit" id="register" value="Zarejestruj" name="register">
            <?php endif ?>

            <a class="hyperLink" href="../login/login.php">Zaloguj się</a>
    </div>
</form>
<div id="source_code_redirect">
    <a href="https://github.com/sebastian-smietanski/sebastian-smietanski.github.io/blob/main/projekt8">
        <img src="../../icons/source_code.png" alt="Source code icon" draggable="false" id="source_code_img" title="Kod źródłowy">
    </a>
</div>
<script src="register.js"></script>
<script src="../../js/visibility-button.js"></script>
</body>
</html>
<?php
session_unset();
session_destroy();
?>
