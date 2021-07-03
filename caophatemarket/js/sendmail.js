$("form").submit(function (e) { 
    e.preventDefault();
    var method = $(this).attr("method");
    var submitUrl = $(this).attr("action");
   
   
    $.ajax({
        type: method,
        url: submitUrl,
       
        success: function (response) {
            alert("Send Successfully");
        }
    });

});



