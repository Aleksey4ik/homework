<?php

// в теории вроде все пронятно, но как дошло до написания 
$objXml = new XMLReader();
$objXml->open('file2.xml');

$objDom = new DOMDocument();

$i = 0;
while ($objXml->read()) {
    if ($objXml->nodeType == XMLReader::ELEMENT && $objXml->name == 'location') {
        $i++;
    }

    if ($objXml->nodeType == XMLReader::ELEMENT && $objXml->name == 'belligerent') {
        $node = simplexml_import_dom($objDom->importNode($objXml->expand(), true));        
        $arrAtrName[] = strval($node->name);
        // echo $node->name."\n";
    }
}

echo 'количество элементов <location>: '.$i."\n";
echo 'Дочерние элементы <name> элемента <belligerent>' . "\n";
// print_r($arrAtrName);
foreach ($arrAtrName as $key => $value) {
    echo $value . "\n";
}