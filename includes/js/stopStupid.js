var totalItems = 0;
var totalCount = 0;

function doPrint()
{
    if($('#poNo').val()!=='')
    {
        poList.search();    
        if(count()!=0)
        {
            confirm();
        }
    }
    else
    {
        alert('Please enter PO NO');
    }
}

function count()
{
    $("#createBarcode input[type='number']").each(function()
    {
        var a = parseInt($(this).val());
        if(a!==0 && a<999)
        {
            totalItems += 1;
            totalCount += a;
        }
        else
            return 0;
    });
}
function confirm()
{
    var message = 'Total Items = '+ totalItems;
    message += "\r\nTotal Label Count = "+totalCount;
    message += "\r\nType y and press enter to print";
    message = prompt(message)
    if(message==='y')
    {
        $('#createBarcode').submit();
    }
    totalItems = 0;
    totalCount = 0;
}