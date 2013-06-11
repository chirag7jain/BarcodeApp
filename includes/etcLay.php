<?php
function createBat($PC='SAMSUNG-2012',$PRINTER = 'ZEBRA')
{
    $batCommand = "@echo off \r\n";
    $batCommand .= "for %%a in (*.prn) do (COPY %%a /B \\\\{$PC}\\{$PRINTER})";
    return $batCommand;
}
function createZip($files,$PO)
{
    $zip = new ZipArchive;
    $zipName = tempnam("tmp", "zip"); 
    $zip->open($zipName, ZipArchive::CREATE);

    //Getting First File and Removing It From Main Array
    $contentPO = $files[0];
    //Removing First Element
    unset($files[0]);

    //Creating File For First Element
    $filename = '0.prn';
    $zip->addFromString($filename, $contentPO);

    //Creating File For Last Element
    $filename = 'zzzzzzz.prn';
    $zip->addFromString($filename, $contentPO);

    foreach($files as $file)
    {
            $filename = substr(md5(microtime()),rand(0,26),7);
            $filename .= '.prn';
            $zip->addFromString($filename, $file);
    }

    //Adding Bat File
    $file = createBat();
    $zip->addFromString('print.bat', $file);

    $zip->close();

    header("Content-Type: application/zip");
    header("Content-Length: " . filesize($zipName));
    header("Content-Disposition: attachment; filename=\"{$PO}.zip\""); 	
    readfile($zipName);
    unlink($zipName); 
}
?>
