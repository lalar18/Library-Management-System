
//new button click function
$("#btnBooksNew").click(function (e) { 
    e.preventDefault();

    $("#modalBooksEntry").modal("show");
    
});

//cancel button click function
$("#btnCancelBooksModal").click(function (e) { 
    e.preventDefault();
    $("#modalBooksEntry").modal("hide");
});

//button save  click function 
$("#btnSubmitReturnBooksModal").click(function (e) { 
    e.preventDefault();

    let formData = $("#frmBooksModal").serializeArray();
    let saveHref = $(this).attr("data-href");

    $.ajax({
        type: "POST",
        url: saveHref,
        data: formData,
        dataType: "JSON",
        success: function (response) {
            
        }
    });
    console.log(formData);
    
});