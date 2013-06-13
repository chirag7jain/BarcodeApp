$('#companyList').submit(function(e) {
    e.preventDefault();
    cList = $('#cList').val(),
    cName = $('#cList option[value='+cList+']').text(),
    url = $(this).attr('action'),
    method = $(this).attr('method');
    if(cList!==0)
    {
        $.ajax({
                url: url,
                type: method,
                dataType: 'json',
                data: $(this).serialize(),
                success: function(values,status,jqXHR) {
                        if ( values[0]!=0){createForm(values,cName); }
                        else { alert('Data Not Found'); }
                        },
                error: function(jqXHR,status,error) { 
                        alert('Problem While Request Data Please Try Again'); 
                        },
                });
    }
    else { alert('Please Select A Client Value'); }
});
