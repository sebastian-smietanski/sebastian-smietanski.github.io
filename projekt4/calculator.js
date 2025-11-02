let overwriteInput = true
let overwriteHistory = false
let inputTooLong = false
let oldInput = ""
let operator = ""

function exitButton() {
    window.close()
}

function reloadButton() {
    window.location.reload()
}

function clearEntryButton()/*DONE*/ {
    if (overwriteHistory) {
        clearEverythingButton()
        return
    }
    setInput("0")
    overwriteInput = true
}

function clearEverythingButton() /*DONE*/ {
    setHistory("")
    setInput("0")
    overwriteInput = true
    overwriteHistory = true
    oldInput = ""
    operator = ""
}

function removeButton() /*DONE*/ {
    if (overwriteHistory) {
        clearEverythingButton()
        return
    }

    setInput(getInput().slice(0, -1))
    if (getInput().length === 0) {
        setInput("0")
        overwriteInput = true
    }
}

function commaButton() /*DONE*/ {
    if (overwriteInput) {
        setInput("0,")
        overwriteInput = false
        return
    }

    if (!getInput().includes(",")) {
        setInput(getInput() + ",")
        overwriteInput = false
    }
}

function plusMinusButton() {
    if (getInput() === "0") {
        return
    }

    if (getInput()[0] === "-") {
        setInput(getInput().slice(1))
    } else {
        setInput("-" + getInput())
    }

    /*overwriteInput = false*/
}

function numberButton(sender) {
    if (inputTooLong && !overwriteInput)
        return

    if (sender.innerText === "0" && getInput() === "0") {
        return
    }

    if (overwriteHistory) {
        setHistory("")
        overwriteHistory = false
        oldInput = ""
        operator = ""
    }

    if (overwriteInput) {
        setInput(sender.innerText)
        if (sender.innerText !== "0") {
            overwriteInput = false
        }
    } else {
        setInput(getInput() + sender.innerText)
    }

}

function operationButton(sender) {
    if (hasIllegalChars(getInput())) {
        clearEverythingButton()
        return
    }

    if (!overwriteInput)
        evalButton()

    operator = sender.innerText
    oldInput = getInput()
    setHistory(oldInput + " " + operator)
    overwriteInput = true
    overwriteHistory = false
}

function evalButton() {
    if (hasIllegalChars(getInput())) {
        return
    }

    let input
    if (getInput()[0] === "-") {
        input = "(" + getInput() + ")"
    } else {
        input = getInput()
    }

    overwriteInput = true
    overwriteHistory = true

    if (input.endsWith(","))
        input = input.replaceAll(",", "")

    if (input.endsWith(",)")) /* nwm czy taki edge case moze powstac */
        input = input.replaceAll(",)", "")

    if (getHistory()[getHistory().length - 1] === "=") {
        if (operator === "") {
            setHistory(getInput() + " =")
            return /* zeby nie obliczac np: "1 =" */
        } else {
            setHistory(input + " " + operator + " " + oldInput)
        }

        if (operator === "÷" && oldInput === "0") {
            setHistory(getHistory() + " =")
            setInput("Nie można dzielić przez zero.")
            return
        }
    } else {
        setHistory(oldInput + " " + operator + " " + input)
        oldInput = input

        if (operator === "÷" && input === "0") {
            setHistory(getHistory() + " =")
            setInput("Nie można dzielić przez zero.")
            return
        }
    }

    let equation = getHistory()
    equation = equation.replaceAll("+", "+")
    equation = equation.replaceAll("-", "-")
    equation = equation.replaceAll("×", "*")
    equation = equation.replaceAll("÷", "/")
    equation = equation.replaceAll(",", ".")
    equation = equation.replaceAll(" ", "")

    setInput(String(eval(equation)).replace(".", ","))
    setHistory(getHistory() + " =")
}

/**********************************************************************************************************************/

function hasIllegalChars(text) {
    let allowedChars = "1234567890+-÷,. e+"
    for (let i = 0; i < allowedChars.length; i++) {
        text = text.replaceAll(allowedChars[i], "")
    }
    return text.length !== 0
}

function getHistory() {
    return document.getElementById("history").innerText
}

function setHistory(str) {
    document.getElementById("history").innerText = str
}

function getInput() {
    return document.getElementById("input").innerText
}

function setInput(str) {
    document.getElementById("input").innerText = str
}

/**********************************************************************************************************************/

document.getElementById("calculatorKeyboard").addEventListener("click", adjustFontSize);

function adjustFontSize() {
    if (getInput().length > 14) {
        inputTooLong = true
    } else {
        inputTooLong = false
    }

    if (getInput().length > 12) {
        /* let x = (getInput().length - 12) * 3 */
        let x = Math.ceil(Math.sqrt((getInput().length - 12) * 45))
        document.getElementById("input").style.fontSize = `${45 - x}px`;
    } else {
        document.getElementById("input").style.fontSize = "45px";
    }
}