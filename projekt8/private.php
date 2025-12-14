<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo '
    <h1>Access denied</h1><br>
    You need to log in before accessing this page.
    ';
    session_unset();
    session_destroy();
    exit;
} ?>

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
<h2 id="header">Zalogowany</h2>
    <div class="boxBase">
        <form method='post' action='requests.php'>
            <input class="button" type="submit" id="logout" value="Wyloguj" name="logout">
        </form>
    </div>
</body>
</html>