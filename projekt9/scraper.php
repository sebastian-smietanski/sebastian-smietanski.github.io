<?php
$url = "https://sylabus.sggw.edu.pl/";

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_USERAGENT => 'Mozilla/5.0',
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false
]);
$html = curl_exec($curl);

libxml_use_internal_errors(true);
$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DOMXPath($dom);
$nodes = $xpath->query(
        "//*[contains(concat(' ', normalize-space(@class), ' '), ' syl-content-box ')]" // GetElementsByClassName
);
$wydzialy = [];
foreach ($nodes as $node) {
    $nazwa = $node->textContent;
    $style = $node->attributes->getNamedItem("style")->textContent;
    $img = str_replace(['background-image: url(', ')'], '', $style);

    $wydzialy[] = [
        "nazwa"   => $nazwa,
        "grafika" => $img
    ];
};

$json = json_encode([$wydzialy], JSON_PRETTY_PRINT);

file_put_contents("wydizaly.json", $json);

echo $json;

