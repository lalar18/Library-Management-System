
//new button click function
$("#btnBooksNew").click(function (e) { 
    e.preventDefault();

    $("#modalBooksEntry").modal("show");
    
});

//cancel button click function
$("#btnCancelBooksEntryModal").click(function (e) { 
    e.preventDefault();

    // clear modal fields
    clearFields();

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

function editBook(e){

    let bookId = $(e).attr("data-id");

    $.ajax({
        type: "POST",
        url: "/admin/books/get-book-information",
        data: {
            'book_id' : bookId
        },
        dataType: "JSON",
        headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}, 
        success: function (response) {

            $("#modalBooksEntry [name='id']").val(response.id);
            $("#modalBooksEntry [name='barcode']").val(response.barcode);
            $("#modalBooksEntry [name='isbn']").val(response.isbn);
            $("#modalBooksEntry [name='price']").val(response.price);
            $("#modalBooksEntry [name='book_cat_id']").val(response.book_cat_id);
            $("#modalBooksEntry [name='status']").val(response.status);
            $("#modalBooksEntry [name='publish_date']").val(response.publish_date);

            $("#modalBooksEntry [name='title']").val(response.title);
            $("#modalBooksEntry [name='description']").val(response.description);

            $("#modalBooksEntry [name='author_name']").val(response.author_name);
        }
    });

    $("#modalBooksEntry").modal("show");
}

function clearFields(){
    
    $("#modalBooksEntry [name='id']").val("");
    $("#modalBooksEntry [name='barcode']").val("");
    $("#modalBooksEntry [name='isbn']").val("");
    $("#modalBooksEntry [name='price']").val("");
    $("#modalBooksEntry [name='book_cat_id']").val("");
    $("#modalBooksEntry [name='status']").val("");
    $("#modalBooksEntry [name='publish_date']").val("");

    $("#modalBooksEntry [name='title']").val("");
    $("#modalBooksEntry [name='description']").val("");

    $("#modalBooksEntry [name='author_name']").val("");
}