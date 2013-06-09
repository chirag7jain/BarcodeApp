function createRow(value,id)
{
    var inputField = '<input type="number" name="item['+id+'][quantity]" value="0" required max="3" pattern="[0-9]+"><input type="hidden" name="item['+id+'][data]" value="'+value+'" required></td>';
    var row = '<tr>';
    row += '<td class="name">'+value[0]+'</td>';
    row += createCell(0,value[1]);
    row += createCell(0,value[2]);
    row += createCell(0,value[3]);
    row += createCell(0,inputField);
    row += '</tr>'
    return row;
}
function createCell(type,value)
{
    if(type===1)
    {
        return '<th>'+value+'</th>';
    }
    else
    {
        return '<td>'+value+'</td>';
    }
}
function head()
{
    var hiddenVal = '<input type="hidden" name="op" value="printList"><input type="hidden" name="cName" value="'+cName+'">';
    var filterField = '<input class="search" placeholder="Filter By Name" size="50px">';
    
    var topRow = '<tr>';
    topRow += '<td colspan="100%" align="center">Filter Values : '+filterField+hiddenVal+'</td>';
    topRow += '</tr>';
    
    var headRow = '<tr>';
    headRow += createCell(1,'Name');
    headRow += createCell(1,'Barcode');
    headRow += createCell(1,'Price');
    headRow += createCell(1,'MRP');
    headRow += createCell(1,'Quantity - Labels Needed');
    headRow += '</tr>';
    return topRow + headRow;
}
function body(values)
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
    var printButton = '<input type="submit" value="Print BarCodes">';
    var row = '<tr><td colspan="100%"align="center">'+printButton+'</td></tr>';
    return row;
}
function addSorter()
{
    var options = { valueNames: ['name']};
    var poList = new List('PO', options);
    var inputPO = 'Enter PO Number : <input type="text" name="poNo" placeholder="Enter PO No" required maxlength="5"><br><br>';
    $('#PO').prepend(inputPO);
}
function createForm(values,cName)
{
    $('#appendList').find('thead').html(head());
    $('#appendList').find('tbody').html(body(values));
    $('#appendList').find('tfoot').html(foot());
    addSorter();
    return 1;
}