<?php
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    $PNG_WEB_DIR = 'temp/';

    include "include/qrcode/qrlib.php";
    
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
	$text = 'ionut';
	$filename = $PNG_TEMP_DIR.'test'.md5($text.'|H|10').'.png';
	QRcode::png($text, $filename, 'H', 10, 2);    

	echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';  