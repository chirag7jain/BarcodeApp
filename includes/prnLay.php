<?php
function prnGenerator($list)
{
    $prnFiles = array();
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
function showContent($files)
{
    foreach($files as $file)
    {
            echo $file;
    }
}
?>
