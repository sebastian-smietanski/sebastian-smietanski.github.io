/* this is entirely ai generated */

const windowDiv = document.getElementById('myWindow');
const titleBar = document.getElementById('myTitleBar');

let isDragging = false;
let offsetX = 0;
let offsetY = 0;

titleBar.addEventListener('mousedown', (e) => {
    isDragging = true;
    // Calculate offset between mouse and top-left corner of window
    offsetX = e.clientX - windowDiv.offsetLeft;
    offsetY = e.clientY - windowDiv.offsetTop;
});

document.addEventListener('mousemove', (e) => {
    if (isDragging) {
        // Update window position
        windowDiv.style.left = `${e.clientX - offsetX}px`;
        windowDiv.style.top = `${e.clientY - offsetY}px`;
    }
});

document.addEventListener('mouseup', () => {
    isDragging = false;
});