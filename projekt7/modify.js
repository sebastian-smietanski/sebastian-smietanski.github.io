const buttons = document.querySelectorAll('.modifyButton');
const firstBtnDivs = document.querySelectorAll('.firstBtnDiv');
const secondBtnDivs = document.querySelectorAll('.secondBtnDiv');

buttons.forEach(button => {
    let startX, startY;

    button.addEventListener('pointerdown', (e) => {
        startX = e.clientX;
        startY = e.clientY;
    });

    button.addEventListener('pointerup', (e) => {
        const endX = e.clientX;
        const endY = e.clientY;

        if (Math.abs(endX - startX) < 10 && Math.abs(endY - startY) < 10) {
            const parent = button.parentElement.parentElement;
            const name = button.parentElement.parentElement.querySelectorAll('.nameDiv')[0].innerText;
            const surname = button.parentElement.parentElement.querySelectorAll('.surnameDiv')[0].innerText;
            const age = button.parentElement.parentElement.querySelectorAll('.ageDiv')[0].innerText;
            const id = button.parentElement.parentElement.querySelectorAll('.idInput')[0].value;
            Del_all_buttons()
            parent.outerHTML = "<form method='post' action='requests.php' class='row' style='padding-left: 14px'> " +
                "<div> <input type='text' id='imie' name='imie' required value=\'" + name + "\'> </div>" +
                "<div> <input type='text' id='nazwisko' name='nazwisko' required value=\'" + surname + "\'> </div>" +
                "<div> <input type='text' id='wiek' name='wiek' inputmode='numeric' maxlength='3' required value=\'" + age + "\'> </div>" +
                "<div><input type=\"submit\" id=\"saveModifyButton\" value=\"Zapisz\" name=\"saveModifyButton\" class=\"button\"></div>" +
                "<input type='hidden' name='id' value=\'" + id + "\'>" +
                "<div><input type=\"submit\" id=\"cancelModifyButton\" value=\"Anuluj\" name=\"cancelModifyButton\" class=\"button\"></div>" +
                "</form>";
        }
    });
});

function Del_all_buttons(){
    firstBtnDivs.forEach(div => {
       div.innerHTML = ""
    });

    secondBtnDivs.forEach(div => {
        div.innerHTML = ""
    });
}