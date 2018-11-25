<?php
    $PNG_TEMP_DIR = 'codes'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'codes/';
	
	$files = glob($PNG_WEB_DIR.'*');
	foreach($files as $file){
	  if(is_file($file))
		unlink($file);
	}
	
	$all_events = $events->getAllEvents();
	
	if(isset($_POST['event']))
	{
		include "include/qrcode/qrlib.php";
		if (!file_exists($PNG_TEMP_DIR))
			mkdir($PNG_TEMP_DIR);
		$filename = $PNG_TEMP_DIR.'test.png';
		
		$files = array();
		for($i=1; $i<=$_POST['count']; $i++)
		{
			$code = md5(uniqid(rand()));
			$events->addQrCode($_POST['event'], $code);
			
			$text = $site_url.'register/'.$code;
			$filename = $PNG_TEMP_DIR.'quizme'.md5($text.'|H|10').'.png';
			QRcode::png($text, $filename, 'H', 10, 2); 

			$files[] = $PNG_WEB_DIR.basename($filename);
		}

		$zipname = 'qr_codes.zip';
		$zip = new ZipArchive;
		$zip->open($zipname, ZipArchive::CREATE);
		foreach ($files as $file) {
		  $zip->addFile($file);
		}
		$zip->close();

		$user->redirect($zipname);
	}
?>