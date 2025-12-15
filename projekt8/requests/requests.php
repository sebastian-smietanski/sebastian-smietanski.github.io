<?php
const DEBUG = true;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

// =========================== DATA BASE ===========================
$servername = $username = $password = $dbname = null; // hide PHPStorm warnings
include '../../credentials/db_credentials.php';

$connect = new mysqli($servername, $username, $password, $dbname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// =========================== REQUESTS ===========================

if (isset($_POST['register'])) {
    // request data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    // check if already registered
    $sql = $connect->prepare("SELECT 1 FROM users WHERE email = ? LIMIT 1");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->store_result();
    $result = $sql->num_rows;
    if ($result > 0) {
        session_start();
        $_SESSION['email_already_registered'] = true;
        if (DEBUG)
            header("Location: ../register/register.php?DebugError=email_already_registered");
        else
            header("Location: ../register/register.php?");
        exit;
    }

    // check name

    // check surname

    // check email

    // check password
//    if (strlen($password) < 8) {
//        session_start();
//        $_SESSION['passwords_too_short'] = true;
//        if (DEBUG)
//            header("Location: ../register/register.php?DebugError=passwords_too_short");
//        else
//            header("Location: ../register/register.php");
//        exit;
//    }

    // password_repeat
//    if ($password !== $password_repeat) {
//        session_start();
//        $_SESSION['passwords_not_matching'] = true;
//        if (DEBUG)
//            header("Location: ../register/register.php?DebugError=passwords_not_matching");
//        else
//            header("Location: ../register/register.php");
//        exit;
//    }

    // add new user
    $salt = bin2hex(random_bytes(4));
    $password_hash_current = hash('sha256', $password . $salt);
    $sql = $connect->prepare("INSERT INTO users (name, surname, email, salt, passwordhash) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssss", $name, $surname, $email, $salt, $password_hash_current);
    $sql->execute();

    header("Location: ../register/register.php?registered=true"); // todo: zamienic na sesje
    exit;
}

if (isset($_POST['login'])) {
    // request data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // search in database
    $sql = $connect->prepare("SELECT id, salt, passwordhash FROM users WHERE email = ? LIMIT 1");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->store_result();

    // no match: email
    if ($sql->num_rows === 0) {
        session_start();
        $_SESSION['wrong_email'] = true;
        if (DEBUG)
            header("Location: ../login/login.php?DebugError=no_match_email");
        else
            header("Location: ../login/login.php");
        exit;
    }

    // no match: password
    $id = null;
    $salt = null;
    $password_hash_correct = null;

    $sql->bind_result($id, $salt, $password_hash_correct);
    $sql->fetch();

    $password_hash_current = hash('sha256', $password . $salt);

    if ($password_hash_current !== $password_hash_correct) {
        session_start();
        $_SESSION['wrong_password'] = true;
        if (DEBUG)
            header("Location: ../login/login.php?DebugError=no_match_password");
        else
            header("Location: ../login/login.php");
        exit;
    }

    // successful login
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['id'] = $id;
    header("Location: ../private/private.php");
    exit;
}

if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../login/login.php");
    exit;
}

// TODO: reagowanie na requesty od requests.php
// TODO: weryfikacja w js i regex