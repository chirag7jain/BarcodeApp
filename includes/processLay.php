<?php
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
function makeBarCodeList($list,$cName,$PO)
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
    $PO = 'PON'.$PO;
    //Adding PO NO to start of array
    $value = array($PO,$PO,$PO,$PO,$PO,1,$PO);
    array_unshift($barList, $value);
    $barList[] = $value;

    $files = prnGenerator($barList);
    sendFiles($files,$PO);
    #showFiles($files);
}
?>
