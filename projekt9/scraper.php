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
$xml = new SimpleXMLElement('<xml/>');
foreach ($nodes as $node) {
    $nazwa = $node->textContent;
    $style = $node->attributes->getNamedItem("style")->textContent;
    $img = str_replace(['background-image: url(', ')'], '', $style);

    $wydzial = $xml->addChild('wydzial');
    $wydzial->addChild("nazwa", $nazwa);
    $wydzial->addChild("grafika", $img);
//    echo
//    '
//        <div class="imgbox">
//            <img src=" ' . $img . ' " alt="Grafika wydziału" class="img">
//            <p class="imgcaptin"> ' . $nazwa . ' </p>
//        </div>
//    ';
}
$xml->asXML("wydzialy.xml");
echo $xml->saveXML();
