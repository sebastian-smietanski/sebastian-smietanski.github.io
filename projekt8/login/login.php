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
<h2 id="header">Logowanie</h2>
<form method='post' action='../requests/requests.php'>
<div class="boxBase column">
        <div class="inputBox">
            <label for="email">E-Mail</label>
            <input type="text" id="email" name="email" required maxlength="255" value="admin@example.com">
        </div>

        <div class="inputBox">
            <label for="password">Hasło</label>
            <input type="password" id="password" name="password" required value="Password1!">
            <img src="../../icons/eye_on.png" draggable="false" class="visibility-btn" height="20px" width="20px" alt="eye">
        </div>

        <?php
        if (isset($_SESSION['wrong_email']) || isset($_SESSION['wrong_password'])) {
            echo '<div class="warning" id="credentials_error_msg">Niepoprawne hasło lub e-mail</div>';
        }
        ?>

        <input class="button" type="submit" id="login" value="Zaloguj" name="login">

        <a class="hyperLink" href="../register/register.php">Zarejestruj się</a>
    </div>
</form>
<div id="source_code_redirect">
    <a href="https://github.com/sebastian-smietanski/sebastian-smietanski.github.io/blob/main/projekt8">
        <img src="../../icons/source_code.png" alt="Source code icon" draggable="false" id="source_code_img" title="Kod źródłowy">
    </a>
</div>
<script src="login.js"></script>
<script src="../../js/visibility-button.js"></script>
</body>
</html>

<?php
session_unset();
session_destroy();
?>
