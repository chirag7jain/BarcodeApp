<?php
function prnGenerator($list)
{
    $prnFiles = '';
    $precode = prnFixedCharacters();
    foreach ($list as $item)
    {
        if($prnFiles!='') { $prnFiles .= "\r\n";}
        $a = $precode;
        $product  = $item[0];
        $barcode = $item[1];
        $price = $item[2];
        $mrp = $item[3];
        $quantity = $item[5];
        $company = $item[6];

        $a .= "A9,1,0,1,1,1,N,\"{$product}\"\r\n";
        $a .= "A31,20,1,4,1,1,N,\"{$company}\"\r\n";
        $a .= "B45,18,0,1,2,6,49,B,\"{$barcode}\"\r\n";
        $a .= "A45,103,0,4,1,1,N,\"Rs{$price}\"\r\n";
        $a .= "A203,92,0,4,1,1,N,\" MRP\"\r\n";
        $a .= "A203,114,0,4,1,1,N,\"Rs{$mrp}\"\r\n";
        $a .= "P{$quantity}\r\n";
        $prnFiles .= $a;
    }
    return $prnFiles;
}
function prnFixedCharacters()
{
    $a = "I8,A,001\r\n\r\n\r\n";
    $a .= "Q160,024\r\n";
    $a .= "q863\r\n";
    $a .= "rN\r\n";
    $a .= "S4\r\n";
    $a .= "D12\r\n";
    $a .= "ZT\r\n";
    $a .= "JF\r\n";
    $a .= "O\r\n";
    $a .= "R271,0\r\n";
    $a .= "f100\r\n";
    $a .= "N\r\n";
    return $a;
}
?>
