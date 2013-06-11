$('#companyList').submit(function(event) {
    event.preventDefault();
    var formElements = $(this),
    cList = formElements.find('select[id="cList"]').val(),
    cName = $("#cList option[value='"+cList+"']").text(),
    url = formElements.attr('action'),
    method = formElements.attr('method');
    if(cList!==0)
    {
        $.ajax({
                url: url,
                type: method,
                dataType: 'json',
                data: formElements.serialize(),
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
