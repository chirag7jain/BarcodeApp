function createRow(value,id)
{
    var row = '<tr>';
    row += '<td class="name">'+value[0]+'</td>';
    row += '<td>'+value[1]+'</td>';
    row += '<td>'+value[2]+'</td>';
    row += '<td>'+value[3]+'</td>';
    row += '<td><input type="number" name="item['+id+'][quantity]" value="0" required>';
    row += '<input type="hidden" name="item['+id+'][data]" value="'+value+'" required></td>';
    row += '</tr>'
    return row;
}
function head()
{
    var row = '<tr>';
    row += '<th><input class="search"></th>';
    row += '<th>Barcode</th>';
    row += '<th>Price</th>';
    row += '<th>MRP</th>';
    row += '<th>Quantity</th>';
    row += '<input type="hidden" name="op" value="printList"><input type="hidden" name="cName" value="'+cName+'">';
    row += '</tr>';
    return row;
}
function body()
{
    var row;
    for (var i = 0;i<values.length;i++)
    {
            value = values[i];
            row += createRow(value,value[4]);
    }
    return row;
}
function foot()
{
    var row = '<tr><td colspan="100"align="center"><input type="submit" value="Print BarCodes"></td></tr>';
    return row;
}
function addSorter()
{
    var options = { valueNames: ['name']};
    var poList = new List('PO', options);
    var inputPO = 'Enter PO Number: <input type="text" name="poNo" placeholder="Enter PO No" required><br><br>';
    $('#PO').prepend(inputPO);
}
function createForm(values,cName)
{
    $('#appendList').find('thead').html(head());
    $('#appendList').find('tbody').html(body());
    $('#appendList').find('tfoot').html(foot());
    addSorter();
    return 1;
}