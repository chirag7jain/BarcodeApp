<?php
require 'dbLay.php';
require 'prnLay.php';
require 'etcLay.php';
require 'processLay.php';
if(isset($_REQUEST['op']))
{
    $op = $_REQUEST['op'];
    switch($op)
    {
        case 'getList':
            if(isset($_GET['cList']) && $_GET['cList']!=0)
            {	
                sendList($_GET['cList']);
            }
        break;
        case 'printList':
            makeBarCodeList($_POST['item'],$_POST['cName'],$_POST['poNo']);
        break;
        case 'getbatchfile':
            createBatFile();
        break;
    }
}
?>
