<?php
function prnGenerator($list)
{
    $prnFiles = '';
    $precode = prnFixedCharacters();
    foreach ($list as $item)
    {
        if($prnFiles!='') { $prnFiles .= "\r\n";}
        
        $a        = $precode;
        $product  = $item[0];
        $barcode  = $item[1];
        $price    = $item[2];
        $mrp      = $item[3];
        $quantity = $item[5];
        $company  = $item[6];
        
        $prnFiles .= template($a, $product, $barcode, $price, $mrp, $quantity, $company);
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
    $a .= "D14\r\n";
    $a .= "ZT\r\n";
    $a .= "JF\r\n";
    $a .= "O\r\n";
    $a .= "R279,0\r\n";
    $a .= "f100\r\n";
    $a .= "N\r\n";
    return $a;
}
function template($a, $product, $barcode, $price, $mrp, $quantity, $company)
{
    $date     = constant('DATE');
    $supplier = constant('SUPPLIER');

    $a .= "A193,5,0,1,1,1,N,\"DT:{DATE}\"\r\n";
    $a .= "B9,58,0,1,2,6,49,B,\"{$barcode}\"\r\n";
    $a .= "A2,26,0,1,1,1,N,\"{$product}\"\r\n";
    $a .= "A215,77,0,2,1,1,N,\" MRP\"\r\n";
    $a .= "A215,93,0,2,1,1,N,\"RS{$mrp}\"\r\n";
    $a .= "A205,47,0,3,1,1,N,\"RS{price}\"\r\n";
    $a .= "A202,123,0,2,1,1,N,\"{SUPPLIER}\"\r\n";
    $a .= "A59,5,0,2,1,1,N,\"{$company}\"\r\n";
    $a .= "P{$quantity}\r\n";
    return $a;
}
?>
