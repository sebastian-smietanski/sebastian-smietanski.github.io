<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

// =========================== DATA BASE ===========================

if (str_contains(__DIR__, "jsd.j.pl")){ // when remote
    $servername = "localhost";
    $username = "jsdthe1st";
    $password = file_get_contents("../credentials/password_cba.txt");
    $dbname = "jsdthe1st";
}
else { // when local
    $servername = "localhost";
    $username = "root";
    $password = file_get_contents("../credentials/password_local.txt");
    $dbname = "bsi_base";
}

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

    // check if already registered
    $sql = $connect->prepare("SELECT 1 FROM users WHERE email = ? LIMIT 1");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->store_result();
    $result = $sql->num_rows;
    if ($result > 0) {
        header("Location: register.php?error=email_already_registered");
        exit;
    }


    // add new user
    $salt = bin2hex(random_bytes(16));
    $password_hash_current = hash('sha256', $password . $salt);
    $sql = $connect->prepare("INSERT INTO users (name, surname, email, salt, passwordhash) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssss", $name, $surname, $email, $salt, $password_hash_current);
    $sql->execute();

    header("Location: register.php?registered=true");
    exit;
}

if (isset($_POST['login'])) {
    // request data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check if correct credentials
    $sql = $connect->prepare("SELECT id, salt, passwordhash FROM users WHERE email = ? LIMIT 1");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->store_result();

    // no match: email
    if ($sql->num_rows === 0) {
        header("Location: login.php?error=no_match_email"); // _email sufix only for debugging purposes
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
        header("Location: login.php?error=no_match_password"); // _password sufix only for debugging purposes
        exit;
    }

    // successful login
    session_start();
    $_SESSION['id'] = $id;
    header("Location: private.php");
    exit;
}

if (isset($_POST['logout'])) {
    session_start();
    $_SESSION = [];
    session_destroy();
    header("Location: login.php");
    exit;
}