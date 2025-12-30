<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>BSI Projekt 9: Web Crawler</title>
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/inputBox.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/source_code_redirect.css">
    <link rel="stylesheet" href="projekt9.css">
</head>
<body>
<img src="../obrazy/banbus.jpg" class="background" style="z-index: 0" draggable="false">
<h2 id="header" style="z-index: 1">Crawler</h2>

<div id="box" class="boxBase" style="z-index: 1">
    <h3>Lista wydziałów SGGW.</h3>
    <div id="scrapeBtn" class="button">Scrape'uj</div>
    <div id="loader" class="loader" hidden></div>
</div>

<div id="gallery" class="imggallery" style="z-index: 1">
</div>

<div id="source_code_redirect">
    <a href="https://github.com/sebastian-smietanski/sebastian-smietanski.github.io/blob/main/projekt9">
        <img src="../icons/source_code.png" alt="Source code icon" draggable="false" id="source_code_img" title="Kod źródłowy">
    </a>
</div>
<script src="projekt9.js"></script>
</body>
</html>