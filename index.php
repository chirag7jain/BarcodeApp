<?php include 'includes/dbLay.php';
$cList = compList();
$a = '';
foreach ($cList as $item){$a .= "<option value ={$item['id']}>{$item['name']}</option>";}
?>
 <!DOCTYPE html>
<html>
    <head>
        <title>Bar Code App</title>
        <link rel='stylesheet' href='includes/style.css'></link>
    </head>
    <body>
        <H1 align="center">Bar Code App</H1>
        <hr>
        <form id="companyList" action="includes/routes.php" method="GET">
            <table align="right">
                <tr>
                    <td>Get BarCode List For</td>
                    <td>
                        <input type='hidden' value="getList" name='op'>
                        <select id="cList" name="cList">
                            <option value=0>Client</option>
                            <?php echo $a;?>
                        </select>
                        <input type="submit" value="Get List">
                        <input type="button" value="Get Windows Script" onclick="location.href='includes/routes.php?op=getbatchfile';">
                    </td>
                </tr>
            </table>
        </form>
        <br><br>
        <form id="createBarcode" name="createBarcode" action="includes/routes.php" method="POST">
            <input type="hidden" name="op" value="printList"><input type="hidden" name="cName" id="cName">
            <div id ="PO" style="display:None">
                Enter PO Number : <input type="text" id="poNo" name="poNo" placeholder="Enter PO No" required maxlength="5"><br><br>
                <table id="appendList" border='1px' border-collapse: collapse align="center">
                    <thead style="display: none">
                        <tr>
                            <td colspan="100%" align="center">Filter Values : <input class="search" placeholder="Filter By Name" size="50px"></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>Barcode</th>
                            <th>Price</th>
                            <th>MRP</th>
                            <th>Quantity - Labels Needed</th>
                        </tr>
                    </thead>
                    <tbody class="list"></tbody>
                    <tfoot style="display: none">
                        <tr>
                            <td colspan="100%" align="center">
                                <button type="button" onclick="doPrint();">Print Barcodes</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
        <script type="text/javascript" src="includes/js/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="includes/js/list.min.js"></script>
        <script type="text/javascript" src="includes/js/makeForm.js"></script>
        <script type="text/javascript" src='includes/js/getList.js'></script>
        <script type="text/javascript" src="includes/js/stopStupid.js"></script>
    </body>
</html>
