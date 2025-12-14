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
<h2 id="header">Logowanie</h2>
<form method='post' action='requests.php'>
<div class="boxBase column">
        <div class="inputBox">
            <label for="email">E-Mail</label>
            <input type="text" id="email" name="email" required maxlength="255" value="jan.kowalski2@example.com">
        </div>

        <div class="inputBox">
            <label for="password">Hasło</label>
            <input type="password" id="password" name="password" required value="password">
        </div>

        <input class="button" type="submit" id="login" value="Zaloguj" name="login">

        <a class="hyperLink" href="register.php">Zarejestruj się</a>
    </div>
</form>
</body>
</html>