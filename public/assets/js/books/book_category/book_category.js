
$("#btnNewCategoryModal").click(function (e) { 
    e.preventDefault();

    $("#modalBookCategory").modal("show");

    $("#modalBookCategory #btnSubmitBookCategoryModal").attr("data-href", "/admin/book-categories/add/submit");
});

$("#btnSubmitBookCategoryModal").click(function (e) { 
    e.preventDefault();
    
    let formData = $("#frmBookCategory").serializeArray();
    let saveURL = $(this).attr("data-href");
    
    console.log("submit");

    $.ajax({
        type: "POST",
        url: saveURL,
        data: formData,
        dataType: "json",
        success: function (response) {
            if(response.has_error == true){
                $("#notification-container").html(
                    "<div class = 'alert alert-danger'>"+ response.message +"</div>"
                );
            }else{
                $("#notification-container").html(
                    "<div class = 'alert alert-success'>"+ response.message +"</div>"
                );
            }

            setTimeout(() => {
                $("#modalBookCategory").modal("hide");
                location.reload();
            }, 1000);
        }
    });
});

$(".btnEditCategory").click(function (e) { 
    e.preventDefault();

    let statusValue = $(this).attr('data-status');

    $("#modalBookCategory").modal("show");

    $("#modalBookCategory #btnSubmitBookCategoryModal").attr("data-href", "/admin/book-categories/edit/submit"); //button save url

    $("#modalBookCategory input[name='id']").val($(this).attr("data-cat-id")); //id

    $("#modalBookCategory input[name='code']").val($(this).attr("data-code")); //code
    $("#modalBookCategory input[name='name']").val($(this).attr("data-name")); //name
    
    if(statusValue == 1){
        $("#bookstatuscategory1").prop('checekd', true);
        $("#bookstatuscategory1").iCheck('check');
    }else{
        $("#bookstatuscategory2").prop('checekd', true);
        $("#bookstatuscategory2").iCheck('check');
    }
});


$("#btnCancelBookCategoryModal").click(function (e) { 
    e.preventDefault();

    $("#modalBookCategory").modal("hide");

    //clears modal
    clearModal();    
});


function clearModal(){
    $("#modalBookCategory input[name='id']").val(""); //id
    $("#modalBookCategory input[name='code']").val(""); //code
    $("#modalBookCategory input[name='name']").val(""); //name

    //radio button
    $("#bookstatuscategory1").prop('checekd', true);
    $("#bookstatuscategory1").iCheck('check');

    //button save attributes
    $("#btnNewCategoryModal #btnSubmitBookCategoryModal").attr("data-href", "");


}