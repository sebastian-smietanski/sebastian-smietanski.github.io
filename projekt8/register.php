<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>BSI Projekt 8: Panel logowania</title>
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/inputBox.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/source_code_redirect.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h2 id="header">Rejestracja</h2>
    <form method='post' action='requests.php'>
        <div class="boxBase column">
            <?php
            if (isset($_GET['registered'])) {
                echo '<h2 style="text-align: center">Rejestracja powiodła się</h2>';
            }
            else {
                echo '
                <!-- name -->
                <div class="wide inputBox wide" >
                    <label for="name">Imię</label>
                    <input type="text" id="name" name="name" required maxlength="255" value="Jan">
                </div>
    
                <!-- surname -->
                <div class="inputBox">
                    <label for="surname">Nazwisko</label>
                    <input type="text" id="surname" name="surname" required maxlength="255" value="Kowalski">
                </div>
    
                <!-- email -->
                <div class="inputBox">
                    <label for="email">E-Mail</label>
                    <input type="text" id="email" name="email" required maxlength="255" value="jan.kowalski@example.com">
                </div>
                
                <!-- password -->
                <div class="inputBox">
                    <label for="password">Hasło</label>
                    <input type="password" id="password" name="password" required value="password">
                </div>
    
                <!-- repeat password -->
                <div class="inputBox">
                    <label for="password">Potwierdź hasło</label>
                    <input type="password" id="password" name="password" required value="password">
                </div>
    
                <input class="button" type="submit" id="register" value="Zarejestruj" name="register">';
            } ?>

            <a class="hyperLink" href="login.php">Zaloguj się</a>
    </div>
</form>
</body>
</html>