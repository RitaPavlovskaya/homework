<?php
	$filename = $_GET['filename'];
	$file_extension = strtolower(substr(strrchr($filename,"."),1));
	if( $filename == "" )
	{
			  echo "ОШИБКА: не указано имя файла.";
			  exit;
	} elseif ( ! file_exists( $filename ) )
	{
			  echo "ОШИБКА: данного файла не существует.";
			  exit;
	};
	switch( $file_extension )
	{
			  case "doc": $ctype="application/msword"; break;
			  case "xls": $ctype="application/vnd.ms-excel"; break;
			  default: $ctype="application/force-download";
	}
	
	//Функция header используется для простановки заголовков «вручную», для кеширования, для внешнего перенаправления, для выставления правильного mime-типа и кодировки.
	header("Pragma: public"); //может кешироваться всеми (прокси-серверами тоже)   
	header("Expires: 0");//для задания даты, при которой кеш считается просроченным
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
	header("Content-Type: $ctype");
	header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
	header("Content-Transfer-Encoding: binary"); //очень важен для того, чтобы заставить браузер скачивать файл, а не отображать текстовое содержимое.
	header("Content-Length: ".filesize($filename)); // необходимо доделать подсчет размера файла по абсолютному пути
	readfile("$filename");
	exit();
?>