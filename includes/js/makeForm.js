function createForm(values,cName)
{
    var tableHead = '<tr>';
    tableHead += '<th>Name</th>';
    tableHead += '<th>Barcode</th>';
    tableHead += '<th>Price</th>';
    tableHead += '<th>MRP</th>';
    tableHead += '<th>Quantity</th>';
    tableHead += '<input type="hidden" name="op" value="printList"><input type="hidden" name="cName" value="'+cName+'">';
    tableHead += '</tr>';
    var tableBody;
    for (var i = 0;i<values.length;i++)
    {
            value = values[i];
            tableBody += createRow(value,value[4]);
    }
    var tableFoot = '<tr><td colspan="100"align="center"><input type="submit" value="Print BarCodes"></td></tr>';
    $('#appendList').find('thead').html(tableHead);
    $('#appendList').find('tbody').html(tableBody);
    $('#appendList').find('tfoot').html(tableFoot);
    var inputPO = 'Enter PO Number: <input type="text" name="poNo" placeholder="Enter PO No" required><br><br>';
    $('#PO').prepend(inputPO);
    return 1;
}
function createRow(value,id)
{
    var row = '<tr>';
    row += '<td>'+value[0]+'</td>';
    row += '<td>'+value[1]+'</td>';
    row += '<td>'+value[2]+'</td>';
    row += '<td>'+value[3]+'</td>';
    row += '<td><input type="number" name="item['+id+'][quantity]" value="0" required>';
    row += '<input type="hidden" name="item['+id+'][data]" value="'+value+'" required></td>';
    row += '</tr>'
    return row;
}
