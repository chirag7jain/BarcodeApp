<?php
function dbConnect()
{
	$server = 'localhost';
	$user = 'barcode';
	$pass = 'barcode';
	$db = 'barcode';
	return new PDO("mysql:host=localhost;dbname=barcode;",$user,$pass);
}
function prodList($company)
{
	$listQuery = 'Select * from list where clist = '.$company.' order by name' ;
	$dataArray = null;
	$dbconnect = dbconnect();
	foreach($dbconnect->query($listQuery) as $row)
	{
		$data[0] = $row['name'];
		$data[1] = $row['barcode'];
		$data[2] = $row['price'];
		$data[3] = $row['mrp'];
		$data[4] = $row['id'];
		$dataArray[]= $data;
	}
	if ($dataArray==null)
	{
		return 0;
	}
	else
	{
		return $dataArray;
	}
}
function sendList($company)
{
	$productList = prodList($company);
	if($productList!=null || $productList!=0)
	{
		echo json_encode($productList);
	}
	else
		echo json_encode(0);
}
function makeBarCodeList($list,$cName)
{
	$barList = array();
	foreach ($list as $item)
	{
                $value = explode(',',$item['data']);
                $value[5] = $item['quantity'];
                $value[6] = $cName;
		if(isset($value[5]) && $value[5]>0)
		{
                    $barList[] = $value;
		}
	}
	$files = prnGenerator($barList);
	createZip($files);
	#showFiles($files);
}
function prnGenerator($list)
{
	$prnFiles;
	$precode = prnFixedCharacters();
	foreach ($list as $item)
	{
		$a = $precode;
		$product  = $item[0];
		$barcode = $item[1];
		$price = $item[2];
		$mrp = $item[3];
		$quantity = $item[5];
		$company = $item[6];
		
		$a .= "A3,4,0,1,1,1,N,\"{$product}\"\r\n";
                $a .= "A28,30,1,4,1,1,N,\"{$company}\"\r\n";
		$a .= "B35,21,0,1,2,6,46,B,\"{$barcode}\"\r\n";
                $a .= "A35,99,0,2,2,2,N,\"Rs{$price}\"\r\n";
		$a .= "A182,98,0,2,1,1,N,\" MRP\"\r\n";
		$a .= "A182,114,0,2,1,1,N,\"Rs{$mrp}\"\r\n";
		$a .= "P{$quantity}\r\n";
		$prnFiles[] = $a;
	}
	return $prnFiles;
}
function prnFixedCharacters()
{
	$a = "I8,A,001\r\n\r\n\r\n";
	$a .= "Q160,008\r\n";
	$a .= "q863\r\n";
	$a .= "rN\r\n";
	$a .= "S2\r\n";
	$a .= "D10\r\n";
	$a .= "ZT\r\n";
	$a .= "JF\r\n";
	$a .= "OP\r\n";
	$a .= "R279,0\r\n";
	$a .= "f100\r\n";
	$a .= "N\r\n";
	return $a;
}
/*function printLabels($labels)
{
	$socket = startPrinter();
	foreach($labels as $label)
	{
			socket_write($socket, $label, strlen($label));
	}
	stopPrinter($socket);
}*/
/*function startPrinter()
{
	$port = "9100";
	$host = "127.0.0.1";
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	if ($socket === false)
	{
		echo "Internal Problem : ".socket_strerror(socket_last_error());
		return 0;
	}
	else
	{
		$result = socket_connect($socket, $host, $port);
		if ($result === false) 
		{ 
			echo "Network Problem: ($result) " .socket_strerror(socket_last_error($socket));
			return 0;
		}
	}
	return $socket;
}*/
/*function stopPrinter($socket)
{
	socket_close($socket);
	return 0;
}*/
function showContent($files)
{
	foreach($files as $file)
	{
		echo $file;
	}
}
function batFile($PC='SAMSUNG-2012',$PRINTER = 'ZEBRA')
{
    //return "COPY *.prn /B \\\\{$PC}\\{$PRINTER}";
    $batCommand = "@echo off \r\n";
    $batCommand .= "for %%a in (*.prn) do (COPY %%a /B \\\\{$PC}\\{$PRINTER})";
    return $batCommand;
}
function createZip($files)
{
	$zip = new ZipArchive;
	$zipName = tempnam("tmp", "zip"); 
	$zip->open($zipName, ZipArchive::CREATE);
	foreach($files as $file)
	{
		$filename = substr(md5(microtime()),rand(0,26),7);
		$filename .= '.prn';
		$zip->addFromString($filename, $file);
	}
	$file = batFile();
	$zip->addFromString('print.bat', $file);
	
	$zip->close();
	
	$dt = date('d-m::g:i');
	header("Content-Type: application/zip");
	header("Content-Length: " . filesize($zipName));
	header("Content-Disposition: attachment; filename=\"{$dt}.zip\""); 	
	readfile($zipName);
	unlink($zipName); 
}
?>
