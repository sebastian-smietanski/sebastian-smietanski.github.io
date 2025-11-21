
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>BSI Projekt 3: Formularz PHP</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="style.css">
    <style>
        input, textarea, select {
            border-radius: 0px 0px 7px 7px;
            border-width: 1px;
            padding: 6px;
            background-color: #F0F0F0;

            width: 100%;
            box-sizing: border-box;
            border-width: 0px;
        }

        label {
            margin-left: 5px;
            padding: 5px 5px 2px 5px;
        }

        hr {
            color: #2c4c3b;
        }

        form div {
            width: auto;
            margin: 0px 10px 0px 10px;
            padding: 10px;
            display: inline-block;

            border-radius: 25px;
            background: #B6CEB4;
        }

        form div div {
            width: auto;
            margin: 0px;
            padding: 0px;
            display: grid;

            grid-auto-flow: column;

            background-color: 1cyan;
        }

        form div div div {
            width: auto;
            margin: 5px;
            padding: 0px;

            border-radius: 7px;
            text-align: left;
            grid-auto-flow: row;

            background-color: #D9E9CF;
        }
    </style>
</head>
<body>

<h2  class="header">Formularz</h2>


<form method="get" action="dane.php">
    <div>
        <div>
            <div>
                <label for="imie">Imię </label>
                <input type="text" id="imie" name="imie">
            </div>
            <div>
                <label for="nazwisko">Nazwisko </label>
                <input type="text" id="nazwisko" name="nazwisko">
            </div>
        </div>

        <div>
            <div>
                <label for="dataurodzenia">Data urodzenia </label>
                <input type="date" id="dataurodzenia" name="dataurodzenia">
            </div>
            <div>
                <label for="plec">Płeć </label>
                <select id="plec" name="plec" required>
                    <option value="" disabled selected>Wybierz Płeć</option>
                    <option value="Inna">Inna</option>
                    <option value="Kobieta">Kobieta</option>
                    <option value="Mężczyzna">Mężczyzna</option>
                </select>
            </div>
        </div>

        <hr>

        <div>
            <div>
                <label for="wojewodztwo">Województwo </label>
                <select id="wojewodztwo" name="wojewodztwo" required>
                    <option value="" disabled selected>Wybierz województwo</option>
                    <option value="Dolnośląskie">Dolnośląskie</option>
                    <option value="Kujawsko-Pomorskie">Kujawsko-Pomorskie</option>
                    <option value="Lubelskie">Lubelskie</option>
                    <option value="Lubuskie">Lubuskie</option>
                    <option value="Łódzkie">Łódzkie</option>
                    <option value="Małopolskie">Małopolskie</option>
                    <option value="Mazowieckie">Mazowieckie</option>
                    <option value="Opolskie">Opolskie</option>
                    <option value="Podkarpackie">Podkarpackie</option>
                    <option value="Podlaskie">Podlaskie</option>
                    <option value="Pomorskie">Pomorskie</option>
                    <option value="Śląskie">Śląskie</option>
                    <option value="Świętokrzyskie">Świętokrzyskie</option>
                    <option value="Warmińsko-Mazurskie">Warmińsko-Mazurskie</option>
                    <option value="Wielkopolskie">Wielkopolskie</option>
                    <option value="Zachodniopomorskie">Zachodniopomorskie</option>
                </select>
            </div>
        </div>

        <div>
            <div style="width: 350px;">
                <label for="miasto">Miasto </label>
                <input type="text" id="miasto" name="miasto">
            </div>
            <div style="width: 120px; justify-self: flex-end">
                <label for="kodpocztowy">Kod pocztowy </label>
                <input type="text" id="kodpocztowy" name="kodpocztowy" pattern="\d{2}-\d{3}" inputmode="numeric" maxlength="6" placeholder="12-345">
            </div>
        </div>

        <div>
            <div style="width: 250px;">
                <label for="ulica">Ulica</label>
                <input type="text" id="ulica" name="ulica">
            </div>
            <div style="width: 85px; justify-self: flex-end">
                <label for="numerdomu">Nr. Domu</label>
                <input type="number" id="numerdomu" name="numerdomu" min="1" >
            </div>
            <div style="width: 120px; justify-self: flex-end">
                <label for="numermieszkania">Nr. Mieszkania</label>
                <input type="number" id="numermieszkania" name="numermieszkania" min="1" >
            </div>
        </div>

        <hr>

        <div>
            <div>
                <label for="email">E-Mail </label>
                <input type="email" id="email" name="email">
            </div>
        </div>

        <div>
            <div>
                <label for="haslo">Hasło </label>
                <input type="password" id="haslo" name="haslo">
            </div>
        </div>

        <div>
            <div>
                <label for="telefon">Nr. Telefonu </label>
                <input type="tel" id="telefon" name="telefon"  pattern="[0-9]{3} [0-9]{3} [0-9]{3}">
            </div>
        </div>

        <hr>

        <div>
            <div style="grid-auto-flow: column; justify-content: flex-start">
                <label for="prawojazdy">Prawa jazdy kat. B</label>
                <input type="checkbox" id="prawojazdy" name="prawojazdy">
            </div>
        </div>

        <div>
            <div>
                <label for="uwagi">Uwagi</label>
                <textarea style="resize: none;" id="uwagi" name="uwagi" rows="4" maxlength="256"></textarea>
            </div>
        </div>

        <div>
            <div>
                <input type="submit" value="Gotowe">
            </div>
            <div>
                <input type="reset" value="Resetuj">
            </div>
        </div>
    </div>
</form>
</body>
</html>
