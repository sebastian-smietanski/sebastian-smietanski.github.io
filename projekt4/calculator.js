let overwriteInput = true
let historyNumber = ""
let operator = ""

function clearEntryButton()/*DONE*/ {
    setInput("0")
    overwriteInput = true
}

function clearEverythingButton() /*DONE*/ {
    setHistory("")
    setInput("0")
    overwriteInput = true
}

function removeButton()/*DONE*/ {
    if (overwriteInput){
        clearEverythingButton()
        return
    }

    setInput(getInput().slice(0, -1))
    if (getInput().length === 0) {
        setInput("0")
        overwriteInput = true
    }
}

function numberButton(sender) {
    if (getHistory()[getHistory().length - 1] === "=") {
        clearEverythingButton()
    }

    if (getInput()[getInput().length - 1] === "0" && sender.innerText === "0") {
        return
    }

    if (overwriteInput) {
        setInput(sender.innerText)
        overwriteInput = false
    } else {
        setInput(getInput() + sender.innerText)
    }

    historyNumber = getInput()
}

function operationButton(sender) {
    newHistory = document.getElementById("input").innerText + " " + sender.innerText
    document.getElementById("history").innerText = newHistory
    overwriteInput = true
    operator = sender.innerText
}

function evalButton() {
    let input = getInput()
    let history = getHistory()
    let newHistory = input + " " + operator + " " + historyNumber

    let equation = newHistory
    equation = equation.replaceAll("+", "+")
    equation = equation.replaceAll("-", "-")
    equation = equation.replaceAll("×", "*")
    equation = equation.replaceAll("÷", "/")
    equation = equation.replaceAll(" ", "")

    overwriteInput = true
    setHistory(newHistory + " =")
    setInput(eval(equation))
}

/**********************************************************************************************************************/

function trimUnnecessaryOperators() {
    const input = document.getElementById("input").innerText
    const lastChar = input[input.length - 1];

    if (!("1234567890".includes(lastChar))) {
        removeButton()
    }
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

