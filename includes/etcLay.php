<?php
function createBatFile($PC='SAMSUNG-2012',$PRINTER = 'ZEBRA')
{
    header('Content-Type: text/plain');  
    header('Content-Description: File Transfer');
    header("Content-Disposition: attachment; filename=\"printNdelete.bat\"");
    
    $batCommand = "@echo off \r\n";
    $batCommand .= "COPY *.prn \\\\{$PC}\\{$PRINTER}\r\n";
    $batCommand .= "del *.prn";
    
    ob_clean();
    flush(); 
    echo $batCommand;
    exit();
}
function sendFiles($files,$PO)
{	
    header('Content-Type: text/plain');  
    header('Content-Description: File Transfer');
    header("Content-Disposition: attachment; filename=\"{$PO}.prn\"");
    
    ob_clean();
    flush(); 
    echo $files;
    exit();
}
?>
