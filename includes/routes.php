<?php
require('functions.php');
if(isset($_REQUEST['op']))
{
	$op = $_REQUEST['op'];
	switch($op)
	{
		case 'getList':
			if(isset($_GET['cList']) and $_GET['cList']!=0)
			{	
				sendList($_GET['cList']);
			}
		break;
		case 'printList':
			makeBarCodeList($_POST['item'],$_POST['cName']);
		break;
	}
}
?>
