
//new button click function
$("#btnBooksNew").click(function (e) { 
    e.preventDefault();

    $("#modalBooksEntry").modal("show");
    
});

//cancel button click function
$("#btnCancelBooksEntryModal").click(function (e) { 
    e.preventDefault();
    $("#modalBooksEntry").modal("hide");
});

//button save  click function 
$("#btnSubmitBooksEntryModal").click(function (e) { 
    e.preventDefault();

    let formData = $("#frmBooksModal").serializeArray();
    let saveHref = $(this).attr("data-href");

    //show loading button icon
    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="sr-only">Loading...</span> &nbsp; Save');

    setTimeout(function(){
      
            $.ajax({
                type: "POST",
                url: saveHref,
                data: formData,
                dataType: "JSON",
                success: function (response) {
                    $("#btnSubmitBooksEntryModal").html("<i class ='fa fa-save'></i>&nbsp; Save");
                    
                    if(response.has_error){
                        $(".notification-container").html("<div class = 'alert alert-danger'>"+ response.message +"</div>");
                    }else{
                        $(".notification-container").html("<div class = 'alert alert-success'>"+ response.message +"</div>");
                    }
                    
                    //exit book entry modal after 2 sec
                    setTimeout(function(){
                        if(!response.has_error){
                            $("#modalBooksEntry").modal("hide");
                            location.reload();
                        }
                      
                    }, 2000)

                }
            });
    }, 1500)

    console.log(formData);
    
});