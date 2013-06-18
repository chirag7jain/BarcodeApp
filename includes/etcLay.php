<?php
function createBat($PC='SAMSUNG-2012',$PRINTER = 'ZEBRA')
{
    $batCommand = "@echo off \r\n";
    $batCommand .= "COPY *.prn \\\\{$PC}\\{$PRINTER}";
    return $batCommand;
}
function sendFiles($files,$PO)
{
	$filename = "{$PO}.prn";
	
    header('Content-Type: text/plain');  
    header('Content-Description: File Transfer');
    header("Content-Disposition: attachment; filename=\"{$PO}.prn\""); 	
    
    ob_clean();
	flush(); 
    
    echo $files;
    exit();
}
?>
