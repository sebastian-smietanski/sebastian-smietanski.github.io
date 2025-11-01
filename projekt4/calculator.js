let overwriteInput = true
let historyNumber = ""

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
    setInput(getInput().slice(0, -1))
    if (getInput().length === 0) {
        setInput("0")
        overwriteInput = true
    }
}

function numberButton(sender) {
    if (getHistory()[getHistory().length - 1] === "=")
        clearEverythingButton()

    if (overwriteInput) {
        setInput(sender.innerText)
        overwriteInput = false
    } else {
        setInput(getInput() + sender.innerText)
    }
}

function operationButton(sender) {
    newHistory = document.getElementById("input").innerText + " " + sender.innerText;
    document.getElementById("history").innerText = newHistory;
    overwriteInput = true
}

function evalButton() {
    let input = getInput()
    let history = getHistory()
    let newHistory = history + " " + input

    let equation = newHistory
    equation = equation.replaceAll("+", "+")
    equation = equation.replaceAll("-", "-")
    equation = equation.replaceAll("×", "*")
    equation = equation.replaceAll("÷", "/")
    equation = equation.replaceAll(" ", "")

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

