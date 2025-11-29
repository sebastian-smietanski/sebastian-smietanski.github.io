<?php
$servername = "localhost";
$username = "root"; // root for local, jsdthe1st fot cba hosting
$password = file_get_contents("password.txt");
$dbname = "bsi_base"; // bsi_base for local, jsdthe1st for cba hosting

$connect = new mysqli($servername, $username, $password, $dbname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

function echo_table($table) {
    echo_table_normal($table);
}

function echo_table_normal($table) {
    echo "<div class='box'>";
    echo "<div class='row headerRow'><div style='padding-left: 5px''>Imię:</div><div>Nazwisko:</div><div>Wiek:</div><div></div><div></div></div>";
    while ($row = $table->fetch_assoc()) {
        echo "<div class='row'>";
        echo "<div class='nameDiv'>" . $row["imie"] . "</div>";
        echo "<div class='surnameDiv'>" . $row["nazwisko"] . "</div>";
        echo "<div class='ageDiv'>" . $row["wiek"] . "</div>";

        echo "<div class='firstBtnDiv'>";
        echo "<form method='post' action='requests.php'><input type='submit' id='deleteButton' value='Usuń' name='deleteButton' class='button'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "' class='idInput'></form>";
        echo "</div>";

        echo "<div class='secondBtnDiv'><button class='button modifyButton'>Modyfikuj</button></div>";
        echo "</div>";
    }
    echo "</div>";
}

function echo_table_modify($table) {
    echo "xd xd xd";
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>BSI Projekt 7: Baza MySQL</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="source_code_redirect.css">
</head>
<body>
    <h2 id="header">Baza MySQL</h2>
    <?php
        $sql = "SELECT * FROM `people`";
        $result = $connect->query($sql);
        echo_table($result);
    ?>
    <div class="box" style="padding: 8px">
        <form method="post" action="requests.php">
            <div class="addRow">
                <div class="inputBox">
                    <label for="dodaneImie">Imię</label>
                    <input type="text" id="dodaneImie" name="dodaneImie" required maxlength="50" value="">
                </div>

                <div class="inputBox">
                    <label for="dodaneNazwisko">Nazwisko</label>
                    <input type="text" id="dodaneNazwisko" name="dodaneNazwisko" required maxlength="50" value="">
                </div>

                <div class="inputBox">
                    <label for="dodanyWiek">Wiek</label>
                    <input type="text" id="dodanyWiek" name="dodanyWiek" inputmode="numeric" maxlength="3" required value="">
                </div>
            </div>
            <div class="addRow inputBox">
                <input type="submit" id="addButton" value="Dodaj" name="addButton" class="button">
            </div>
        </form>
    </div>
    <div id="source_code_redirect">
        <a href="https://github.com/sebastian-smietanski/sebastian-smietanski.github.io/blob/main/projekt7/index.php">
            <img src="source_code.png" alt="Source code icon" draggable="false" id="source_code_img" title="index.php">
        </a>
    </div>
    <div id="source_code_redirect2">
        <a href="https://github.com/sebastian-smietanski/sebastian-smietanski.github.io/blob/main/projekt7/requests.php">
            <img src="source_code.png" alt="Source code icon" draggable="false" id="source_code_img" title="requests.php">
        </a>
    </div>
    <script src="modify.js"></script>
</body>
</html>