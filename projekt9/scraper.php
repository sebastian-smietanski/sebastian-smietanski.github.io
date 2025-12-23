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
<img src="../obrazy/banbus.jpg" class="background" style="z-index: 0">
<h2 id="header">Crawler</h2>

<div class="imggallery">
<?php
$url = "https://sylabus.sggw.edu.pl/";
$html = file_get_contents($url);
libxml_use_internal_errors(true);
$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DOMXPath($dom);
$nodes = $xpath->query(
        "//*[contains(concat(' ', normalize-space(@class), ' '), ' syl-content-box ')]" // GetElementsByClassName
);

foreach ($nodes as $node) {
    $nazwa = $node->textContent;
    $style = $node->attributes->getNamedItem("style")->textContent;
    $img = str_replace(['background-image: url(', ')'], '', $style);
    echo
    '
        <div class="imgbox">
            <img src=" ' . $img . ' " alt="Grafika wydziału" class="img">
            <p class="imgcaptin"> ' . $nazwa . ' </p>
        </div>
    ';
}
?>
</div>

<div id="source_code_redirect">
    <a href="https://github.com/sebastian-smietanski/sebastian-smietanski.github.io/blob/main/projekt9">
        <img src="../icons/source_code.png" alt="Source code icon" draggable="false" id="source_code_img" title="Kod źródłowy">
    </a>
</div>
</body>
</html>