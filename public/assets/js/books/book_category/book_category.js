
$("#btnSubmitBookCategory").click(function (e) { 
    e.preventDefault();
    
    let form_data = $("#frmBookCategory").serializeArray();
    
    console.log("submit");

    $.ajax({
        type: "POST",
        url: "/admin/book-categories/add/submit",
        data: form_data,
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
        }
    });
});

$(".btnEditCategory").click(function (e) { 
    e.preventDefault();

    let statusValue = $(this).attr('data-status');

    $("#modalBookCategory").modal("show");

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