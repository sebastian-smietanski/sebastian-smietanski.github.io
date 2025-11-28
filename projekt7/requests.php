<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$servername = "localhost";
$username = "jsdthe1st";
$password = file_get_contents("password.txt");
$dbname = "jsdthe1st";
$connect = new mysqli($servername, $username, $password, $dbname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if (isset($_POST['addButton'])) {
    $sql = $connect->prepare("INSERT INTO people (imie, nazwisko, wiek) VALUES(?, ?, ?)");
    $sql->bind_param("ssi", $_POST['dodaneImie'], $_POST['dodaneNazwisko'], $_POST['dodanyWiek']);
    $sql->execute();
}

if (isset($_POST['deleteButton'])) {
    $sql = $connect->prepare("DELETE FROM people WHERE id = ?");
    $sql->bind_param("i", $_POST['id']);
    $sql->execute();
}

if (isset($_POST['saveModifyButton'])) {
    $sql = $connect->prepare("UPDATE people SET imie = ?, nazwisko = ?, wiek = ? WHERE id = ?");
    $sql->bind_param("ssii", $_POST['imie'], $_POST['nazwisko'], $_POST['wiek'], $_POST['id']);
    $sql->execute();
}

if (isset($_POST['cancelModifyButton'])) {
    //pass
}

header("Location: index.php");
exit;