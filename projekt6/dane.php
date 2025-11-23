<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>BSI Projekt 6: Formularz PHP</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="dane.css">
    <link rel="stylesheet" href="source_code_redirect.css">
</head>
<body>
    <h2  class="header">Formularz</h2>

    <div class="middle">
        <div class="row" id="topRow"><div class="left">Imie i nazwisko:</div><div class="right"> <?php
                if (strlen($_GET["imie"] . " " . $_GET["nazwisko"]) < 2) {
                    echo "Brak.";
                }
                else {
                    echo $_GET["imie"] . " " . $_GET["nazwisko"];
                } ?></div></div>
        <div class="row"><div class="left">Data urodzenia:</div><div class="right"> <?php
                if (strlen($_GET["dataurodzenia"]) == 0) {
                    echo "Brak.";
                }
                else {
                    echo $_GET["dataurodzenia"];
                } ?></div></div>
        <div class="row"><div class="left">Płeć:</div><div class="right"> <?php
                if (isset($_GET["plec"])) {
                    echo $_GET["plec"];
                }
                else {
                    echo "Brak.";
                } ?></div></div>
        <div class="row"><div class="left">Adres zamieszkania:</div><div class="right"> <?php
                $adres = $_GET["miasto"] . " " . $_GET["kodpocztowy"] . " " . $_GET["ulica"] . " " . $_GET["numerdomu"] . " " . $_GET["numermieszkania"];
                if (isset($_GET["wojewodztwo"]))
                    echo $_GET["wojewodztwo"] . " " . $adres;
                else if (strlen($adres) <= 4)
                    echo "Brak.";
                else
                    echo $adres;
                ?></div></div>
        <div class="row"><div class="left">E-mail:</div><div class="right">  <?php
                if (strlen($_GET["email"]) == 0) {
                    echo "Brak.";
                }
                else {
                    echo $_GET["email"];
                } ?></div></div>
        <div class="row"><div class="left">Hasło:</div><div class="right"> <?php
                if (strlen($_GET["haslo"]) == 0) {
                    echo "Brak.";
                }
                else {
                    echo $_GET["haslo"];
                } ?></div></div>
        <div class="row"><div class="left">Nr. telefonu:</div><div class="right">  <?php
                if (strlen($_GET["telefon"]) == 0) {
                    echo "Brak.";
                }
                else {
                    echo $_GET["telefon"];
                } ?></div></div>
        <div class="row"><div class="left">Prawo jazdy:</div><div class="right"> <?php
            if (isset($_GET["prawojazdy"])) {
                echo "Posiadane.";
            }
            else {
                echo "Brak.";
            } ?></div></div>
        <div class="row" id="bottomRow"><div class="left">Uwagi:</div><div class="right"> <?php
            if (strlen($_GET["uwagi"]) == 0) {
                echo "Brak.";
            }
            else {
                echo $_GET["uwagi"];
            } ?></div></div>
    </div>
    <div id="source_code_redirect">
        <a href="https://github.com/sebastian-smietanski/sebastian-smietanski.github.io/blob/main/projekt6/dane.php">
            <img src="source_code.png" alt="Source code icon" draggable="false" id="source_code_img">
        </a>
    </div>
</body>
</html>
