
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
            alert (response.success);
        }
    });
});