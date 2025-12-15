<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    echo '
    <h1>Access denied</h1>
    <br>
    <div>You need to log in before accessing this page.</div>
    ';
    session_unset();
    session_destroy();
    exit;
}
$servername = $username = $password = $dbname = null; // hide PHPStorm warnings
include '../../credentials/db_credentials.php';

$connect = new mysqli($servername, $username, $password, $dbname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = $connect->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
$sql->bind_param("s", $_SESSION['id']);
$sql->execute();
$sql->store_result();

$id = $name = $surname = $email = $salt = $password_hash = null;
$sql->bind_result($id, $name, $surname, $email, $salt, $password_hash);
$sql->fetch();
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
    <link rel="stylesheet" href="private.css">
</head>
<body>
<h2 id="header">Zalogowany</h2>

<div class="boxBase">
    <div class="middle">
        <div class="row" id="topRow"><div class="left">ID:</div><div class="right"><?php echo $id?></div></div>
        <div class="row" id="topRow"><div class="left">Imię:</div><div class="right"><?php echo $name?></div></div>
        <div class="row" id="topRow"><div class="left">Nazwisko:</div><div class="right"><?php echo $surname?></div></div>
        <div class="row" id="topRow"><div class="left">E-Mail:</div><div class="right"><?php echo $email?></div></div>
        <div class="row" id="topRow"><div class="left">Sól:</div><div class="right"><?php echo $salt?></div></div>
        <div class="row" id="topRow"><div class="left">Hash:</div><div class="right"><?php echo $password_hash?></div></div>
    </div>
    <form method='post' action='../requests/requests.php' style="margin-left: 250px; margin-right: 250px">
        <input class="button" type="submit" id="logout" value="Wyloguj" name="logout">
    </form>
</div>
<div id="source_code_redirect">
    <a href="https://github.com/sebastian-smietanski/sebastian-smietanski.github.io/blob/main/projekt8">
        <img src="../../icons/source_code.png" alt="Source code icon" draggable="false" id="source_code_img" title="Kod źródłowy">
    </a>
</div>
</body>
</html>