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

            const wydzialy = JSON.parse(this.responseText)[0];

            //gallery.innerHTML = wydzialy[0][2]["nazwa"];
            for (let i = 0; i < wydzialy.length; i++) {
                const nazwa = wydzialy[i]["nazwa"];
                const grafika = wydzialy[i]["grafika"];
                gallery.innerHTML += '<div class="imgbox"> <img src="' + grafika + '" alt="Grafika wydziału" class="img"> <p class="imgcaptin">' + nazwa + '</p> </div>';
            }
        }
    };
    xmlhttp.open("post", "scraper.php", true);
    xmlhttp.send();
}
