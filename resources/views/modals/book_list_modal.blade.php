<div class = "modal fade" id = "modalBooksList">
    <div class = "modal-dialog modal-lg">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4 class = "modal-title">Select Book(s)</h4>
            </div>
            <div class = "modal-body">
                <div class = "table-responsive">
                    <table class = "table table-hover table-bordered" id = "booksList">
                        <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>

            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-success float-right" onclick = "saveToCart()">Select</button>
                <button type = "button" class = "btn btn-danger" onclick = "exitModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function saveToCart() {
        let bookIds = [];
        $('.checkBooks:checked').each(function(){
            bookIds.push($(this).attr("data-book-id"));
        })

        $.ajax({
            type: "post",
            headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}, 
            url: "{{ url('/admin/transaction/borrower-book/add-to-cart-books') }}",
            data: {
                'books_id' : bookIds
            },
            dataType: "json",
            success: function (response) {
                console.log("added cart responded!");

                if(typeof response !== 'undefined' && response.has_error == 0){
                    //append books to book cart
                    let bookItem = $(response.html).hide(); 

                    $("#bookCart").append(bookItem);
                    bookItem.fadeIn(300);
                }
                exitModal();
            }
        });
    }

    function exitModal(){
        $("#modalBooksList").modal("hide");
    }
</script>