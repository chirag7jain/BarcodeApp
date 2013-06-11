function createRow(value,id)
{
    var inputField = '<input type="number" name="item['+id+'][quantity]" value="0" required max="999" pattern="[0-9]+"><input type="hidden" name="item['+id+'][data]" value="'+value+'" required></td>';
    var row = '<tr>';
    row += '<td class="name">'+value[0]+'</td>';
    row += '<td>'+value[1]+'</td>';
    row += '<td>'+value[2]+'</td>';;
    row += '<td>'+value[3]+'</td>';
    row += '<td>'+inputField+'</td>';;
    row += '</tr>'
    return row;
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
function addSorter()
{
    var options = { valueNames: ['name']};
    var poList = new List('PO', options);
}
function createForm(values,cName)
{
    $('#PO').fadeIn(1);
    $('#appendList thead').fadeIn(1);
    $('#appendList tbody').html(body(values));
    $('#appendList tfoot').fadeIn(1);
    $("#cName").val(cName);
    addSorter();
    return 1;
}