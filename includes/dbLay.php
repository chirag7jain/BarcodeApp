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
    $listQuery = 'Select * from pList where cList = '.$company.' order by name' ;
    $data = null;
    $dbconnect = dbconnect();
    foreach($dbconnect->query($listQuery) as $row)
    {
        $item[0] = $row['name'];
        $item[1] = $row['barcode'];
        $item[2] = $row['price'];
        $item[3] = $row['mrp'];
        $item[4] = $row['id'];
        $data[]= $item;
    }
    if ($data==null){ return 0;}        
    return $data;
}
function compList()
{
    $listQuery = 'Select * from cList order by name' ;
    $dbconnect = dbconnect();
    $data = null;
    foreach($dbconnect->query($listQuery) as $row)
    {
        $item['id'] = $row['id'];
        $item['name'] = $row['name'];
        $data[] = $item;
    }
    if ($data==null){ return 0;}        
    return $data;
}
?>