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
                <button type = "button" class = "btn btn-success float-right">Select</button>
                <button type = "button" class = "btn btn-danger" onclick = "exitModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function exitModal(){
        $("#modalBooksList").modal("hide");
    }
</script>