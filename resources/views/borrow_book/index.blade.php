@include('partials.__header')

    <script src = "/vendors/datatables.net/js/jquery.dataTables.min.js"></script>

    <link href = "{{ url('assets/css/transaction/transaction.css') }}" rel = "stylesheet">

    <div class = "row">
        <!-- for list of borrowers -->
        <div class = "col-md-4 col-sm-4">

            <div class = "form-inline custom-form-inline">
                <label>Issuance No.</label>
                <input type = "text" class = "form-control text-inline ml-2" placeholder = "IS-000001..." >
            </div>
            
            <!-- borrower filter area -->
            <div class = "card mt-3 card-borrower">
                <div class = "card-body">
                    <h5 class = "card-title"><strong>Borrower Information</strong></h5>

                    <!-- borrower custom buttons -->
                    <div class = "borrower-custom-container">
                        <button type = "button" class = "btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Register New Borrower"><i class = "fa fa-plus"></i></button>
                        <button type = "button" 
                            class = "btn btn-outline-secondary btn-sm" 
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Search Borrower" 
                            id = "btnSearchBorrower"
                            onclick = "showBorrowersModal(this)"
                            data-target-url = "{{ url('/admin/transaction/borrow-book/get-borrowers') }}"
                        ><i class = "fa fa-search"></i></button>
                    </div>

                    <!-- id no -->
                    <label>ID #</label>
                    <input type = "text" class = "form-control" readonly>
                    
                    <!-- first name -->
                    <label>First Name</label>
                    <input type = "text" class = "form-control" readonly>

                    <!-- last name -->
                    <label>Last Name</label>
                    <input type = "text" class = "form-control" readonly>

                    <label>Date Borrowed</label>
                    <input type = "date" class = "form-control">

                    <!-- date return -->
                    <label>Expected Date of Return</label>
                    <input type = "date" class = "form-control">
                    
                    <!-- prepared by -->
                    <label>Prepared By</label>
                    <input type = "text" class = "form-control" value = "Riza Jean" readonly>
                </div>
            </div>
        </div>
        
        <!-- for list of books for borrow -->
        <div class = "col-md-8 col-sm-8">
            <div class = "input-group">
                <input type = "text" class = "form-control" placeholder = "Barcode...">
                <div class = "input-group-append">
                    <button type = "button" class = "btn btn-primary">Browse</button>
                </div>
            </div>
            <div class = "card mt-2">
                <div class = "card-body">
                    <h5 class = "card-title"><strong>Books</strong></h5>
                </div>
                
                <div class = "card-body">
                    
                    <!-- books cart list -->
                    <div class="row">
                        <!-- sample book -->
                        <div class="col-md-3">
                            <div class="card book-card">
                               
                                <div class="remove-icon">
                                    <i class="fa fa-times"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Harry Potter and the Prisoner of Azcaban</h5>
                                    <p class="card-text"><strong>Author: </strong>John Doe</p>
                                    <p class="card-text"><strong>Genre: </strong>Fiction</p>
                                    <p class="card-text">Summary: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                </div>
                            </div>
                        </div>
                        <!-- sample book -->

                        <!-- sample book -->
                        <div class="col-md-3">
                            <div class="card book-card">
                                
                                <div class="remove-icon">
                                    <i class="fa fa-times"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Harry Potter and the Prisoner of Azcaban</h5>
                                    <p class="card-text"><strong>Author: </strong>John Doe</p>
                                    <p class="card-text"><strong>Genre: </strong>Fiction</p>
                                    <p class="card-text">Summary: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                </div>
                            </div>
                        </div>
                        <!-- sample book -->

                        <!-- sample book -->
                        <div class="col-md-3">
                            <div class="card book-card">
                                
                                <div class="remove-icon">
                                    <i class="fa fa-times"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Harry Potter and the Prisoner of Azcaban</h5>
                                    <p class="card-text"><strong>Author: </strong>John Doe</p>
                                    <p class="card-text"><strong>Genre: </strong>Fiction</p>
                                    <p class="card-text">Summary: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                </div>
                            </div>
                        </div>
                        <!-- sample book -->

                        <!-- sample book -->
                        <div class="col-md-3">
                            <div class="card book-card">
                                
                                <div class="remove-icon">
                                    <i class="fa fa-times"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Harry Potter and the Prisoner of Azcaban</h5>
                                    <p class="card-text"><strong>Author: </strong>John Doe</p>
                                    <p class="card-text"><strong>Genre: </strong>Fiction</p>
                                    <p class="card-text">Summary: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                </div>
                            </div>
                        </div>
                        <!-- sample book -->

                        <!-- sample book -->
                        <div class="col-md-3">
                            <div class="card book-card">
                                
                                <div class="remove-icon">
                                    <i class="fa fa-times"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Harry Potter and the Prisoner of Azcaban</h5>
                                    <p class="card-text"><strong>Author: </strong>John Doe</p>
                                    <p class="card-text"><strong>Genre: </strong>Fiction</p>
                                    <p class="card-text">Summary: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                </div>
                            </div>
                        </div>
                        <!-- sample book -->
                        

            
                    </div>
            
                </div>
            </div>
        </div>

        <!-- for form controls -->
        <div class = "col-md-12 col-sm-12 mt-2">
            <div class = "card">
                <div class = "card-body">
                    <button class = "btn btn-success float-right"><i class = "fa fa-save"></i>&nbsp; Save Transaction</button>
                </div>
            </div>
        </div>
        <!-- for form controls -->
    </div>

    <!-- transaction borrow modal -->
    <div class = "modal fade" id = "modalSearchBorrower">
        <div class = "modal-dialog modal-xl">
            <div class = "modal-content">
                <div class = "modal-header">
                    <h5 class = "modal-title"><strong>Search Borrower</strong></h5>
                </div>
                
                <div class = "modal-body">
                    <div class = "card">
                        <div class = "card-body">
                            <div class = "form-inline">
                                <label>Search:</label>
                                <input type = "search" class = "form-control ml-2 mr-2" placeholder = "Search..." name ="keyword">
            
                                <label>Borrower Type:</label>
                                <select class = "form-control ml-2 mr-2" name = "type_id">
                                    <option selected>All</option>
                                    <option value = "1">Student</option>
                                    <option value = "2">Faculty</option>
                                </select>
                            </div>
                        </div>
                    </div>
    
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class = "table-responsive">
                                <table class = "table table-bordered table-hover" id = "modalListBorrowers" style = "width: 100%">
                                    <thead>
                                        <tr>
                                            <th width = "30"></th>
                                            <th>ID #</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
        
                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-success"><i class = "fa fa-search"></i>&nbsp; Search</button>
                    <button type = "button" class = "btn btn-danger" data-toggle = "modal" data-target = "#modalSearchBorrower"><i class = "fa fa-times"></i> Cancel</button>
                </div>
            </div>
        
        </div>
    </div>
    <!-- transaction borrow modal -->

    <script src = "{{ url('assets/js/transaction/borrow_books.js') }}"></script>
    
    <script>

        function showBorrowersModal(element){

            let url = $(element).attr("data-target-url");

            $.ajax({
                type: "POST",
                dataType: "json",
                headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}, 
                url: url,
                data: "",
                success: function (response) {

                   $("#modalListBorrowers").DataTable({
                        "paging": false,           
                        "searching": false,        
                        "ordering": true,         
                        "info": true,             
                        "lengthChange": true,     
                        "pageLength": 10,         
                        "order": [[ 0, "asc" ]],
                        "data" :   response.data.borrowersList,
                        "columns": [
                            { "data": "id" },
                            { "data": "id_no" },
                            { "data": "fname" },
                            { "data": "lname" },
                            { 
                                "data": "type_id",
                                "render": function(data, type, row, meta) {
                                    if (data == 0) {
                                        return "Student";
                                    } else if (data == 1) {
                                        return "Faculty";
                                    }
                                }
                            }
                        ]
                    });

                    $("#modalSearchBorrower").modal("show");
                }
            });
        }

        $("#modalSearchBorrower [name='keyword']").on("input",function() {
            let keyword = $(this).val();
            $("#modalListBorrowers").DataTable().column(4).search(keyword).draw();
            
            // Apply a custom search on fname and lname columns
            $("#modalListBorrowers").DataTable().columns().every(function() {
                this.search('');
            });

            $("#modalListBorrowers").DataTable().columns(2).search(keyword);  // Search in fname column
            $("#modalListBorrowers").DataTable().columns(3).search(keyword);  // Search in lname column

            $("#modalListBorrowers").DataTable().draw();  // Redraw the table with the new search
        });
            
    </script>

@include('partials.__footer')