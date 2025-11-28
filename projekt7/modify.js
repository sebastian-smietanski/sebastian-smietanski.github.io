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
            const firstBtnDiv = button.parentElement.parentElement.querySelectorAll('.firstBtnDiv')[0];
            const secondBtnDiv = button.parentElement.parentElement.querySelectorAll('.secondBtnDiv')[0];
            Del_all_buttons()
            parent.outerHTML = "<form method='post' action='requests.php' class='row' style='padding-left: 14px'> " +
                "<div> <input type='text' id='imie' name='imie' required value=\"Dawid\"> </div>" +
                "<div> <input type='text' id='imie' name='imie' required value=\"Dawid\"> </div>" +
                "<div> <input type='text' id='wiek' name='wiek' inputmode='numeric' maxlength='3' required value='38'> </div>" +
                "<div><input type=\"submit\" id=\"saveButton\" value=\"Zapisz\" name=\"saveButton\" class=\"button\"></div>" +
                "<div><input type=\"submit\" id=\"cancelButton\" value=\"Anuluj\" name=\"cancelButton\" class=\"button\"></div>" +
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