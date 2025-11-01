function numberButton(sender)
{
    document.getElementById("input").innerText += sender.innerText;
}

function clearButton()
{
    document.getElementById("history").innerText = "";
    document.getElementById("input").innerText = "0";
}

function removeButton()
{
    document.getElementById("input").innerText = document.getElementById("input").innerText.slice(0, -1)
    if (document.getElementById("input").innerText.length === 0)
        document.getElementById("input").innerText = "0"
}


function operationButton(sender)
{
    trimUnnecessaryOperators()
    numberButton(sender);
}

function evalButton()
{
    trimUnnecessaryOperators()

    let equation = document.getElementById("input").innerText

    document.getElementById("history").innerText = equation + "="

    equation = equation.replaceAll("+", "+")
    equation = equation.replaceAll("-", "-")
    equation = equation.replaceAll("×", "*")
    equation = equation.replaceAll("÷", "/")
    equation = equation.replaceAll("", "")
    equation = equation.replaceAll("", "")
    equation = equation.replaceAll("", "")

    /*window.alert(equation)*/
    document.getElementById("input").innerText = eval(equation)
}

function trimUnnecessaryOperators()
{
    const input = document.getElementById("input").innerText
    const lastChar = input[input.length - 1];

    if (!("1234567890".includes(lastChar)))
    {
        removeButton()
    }
}

