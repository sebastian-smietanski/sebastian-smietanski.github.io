const box = document.getElementById('box');
const scrapeBtn = document.getElementById('scrapeBtn');
const loader = document.getElementById('loader');
const gallery = document.getElementById('gallery');

scrapeBtn.onclick = showHint

function showHint() {
    loader.hidden = false;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            loader.hidden = true;
            box.hidden = true;
            const parser = new DOMParser();
            const xmlDoc = parser.parseFromString(this.responseText, "text/xml");
            gallery.innerText = xmlDoc.
        }
    };
    xmlhttp.open("post", "scraper.php", true);
    xmlhttp.send();
}