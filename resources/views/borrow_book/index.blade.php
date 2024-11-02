@include('partials.__header')

    <script src = "/vendors/datatables.net/js/jquery.dataTables.min.js"></script>

    <link href = "{{ url('assets/css/transaction/transaction.css') }}" rel = "stylesheet">

    <div class = "row">
        <form method = "post" action = "{{ url()->current() }}">

            @csrf
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

                        <!-- borrower id -->
                        <input type = "hidden" name = "borrower_id" value = "">

                        <!-- user id -->
                        <input type = "hidden"
                            name = "user_id"
                            value = "{{ $userData['admin_user_id'] ?? '' }}"
                        >

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
                        <input type = "date" 
                            class = "form-control" 
                            name = ""
                            value = ""
                            required
                        >

                        <!-- date return -->
                        <label>Expected Date of Return</label>
                        <input type = "date" 
                            class = "form-control"
                            name = "date_return"
                            value = ""
                            required
                        >
                        
                        <!-- prepared by -->
                        <label>Prepared By</label>
                        <input type = "text" class = "form-control" value = "{{ $userData['admin_user_name'] ?? '' }}" readonly>
                    </div>
                </div>
            </div>
            
            <!-- for list of books for borrow -->
            <div class = "col-md-8 col-sm-8">
                <div class = "input-group">
                    <input type = "text" class = "form-control" 
                        placeholder = "Barcode..." 
                        onkeydown="if (event.key === 'Enter') searchBook(this)"
                        data-href = "{{ url('/admin/') }}"
                    >
                    <div class = "input-group-append">
                        <button type = "button" class = "btn btn-primary">Browse</button>
                    </div>
                </div>
                <div class = "card mt-2 book-container">
                    <div class = "card-body">
                        <h5 class = "card-title"><strong>Books</strong></h5>
                    </div>
                        <!-- books cart list -->
                        <div class="d-flex justify-content-between" >
                            <div class = "row px-3" id = "bookCart">
                                <!-- sample book -->
                                <div class="col-sm-12 col-md-4 col-lg-3">
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
                                <div class="col-sm-12 col-md-4 col-lg-3">
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
                                <div class="col-sm-12 col-md-4 col-lg-3">
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
                                <div class="col-sm-12 col-md-4 col-lg-3">
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
                                <div class="col-sm-12 col-md-4 col-lg-3">
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
                        <button type = "submit" class = "btn btn-success float-right"><i class = "fa fa-save"></i>&nbsp; Save Transaction</button>
                    </div>
                </div>
            </div>
            <!-- for form controls -->
        </form>
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
                                <form id = "frmBorrowersModal">
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
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
        
                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-success" id = "btnModalSelectBorrower"><i class = "fa fa-search"></i>&nbsp; Search</button>
                    <button type = "button" class = "btn btn-danger" data-toggle = "modal" data-target = "#modalSearchBorrower"><i class = "fa fa-times"></i> Cancel</button>
                </div>
            </div>
        
        </div>
    </div>
    <!-- transaction borrow modal -->

    <!-- books list modal -->
    @include('modals/book_list_modal');

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

                    if (!$.fn.DataTable.isDataTable("#modalListBorrowers")) {
                        // Initialize the DataTable
                        $("#modalListBorrowers").DataTable({      
                            "paging": false,           
                            "searching": true,        
                            "ordering": true,         
                            "info": true,             
                            "lengthChange": true,     
                            "pageLength": 10,         
                            "order": [[ 0, "asc" ]],
                            "data": response.data.borrowersList,
                            "dom": 'lrtip',
                            "columns": [
                                { 
                                    "data": null,  // No actual data needed, we will render the radio button
                                    "render": function (data, type, row, meta) {
                                        return '<input type="radio" name="borrower_id" value="' + row.id + '">';
                                    },
                                    "orderable": false,  // Disable ordering for this column
                                    "searchable": false,  // Disable search for this column
                                    "className" : "text-center"
                                },
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
                    } else {
                        // If already initialized, just update the data
                        let table = $("#modalListBorrowers").DataTable();
                        table.clear().rows.add(response.data.borrowersList).draw();
                    }

                    $("#modalSearchBorrower").modal("show");
                }
            });
        }

        $("#modalSearchBorrower [name='keyword']").on("input",function() {
            let keyword = $(this).val();
            $("#modalListBorrowers").DataTable().search(keyword).draw();
        });

        $("[name='type_id']").change(function (e) { 
            e.preventDefault();

            let bType = $(this).val() == 1 ? 'student' : $(this).val() == 2 ? 'faculty' : '';
            let table = $("#modalListBorrowers").DataTable().column(4).search(bType).draw();
            
        });

        function searchBook(e){
            if ($(e).val() !== undefined && $(e).val() !== null && $(e).val() !== '') {

                let barcode = $(e).val();

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Set up jQuery AJAX to include the CSRF token in all requests
                $.ajax({
                    type: "post",
                    headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}, 
                    url: "{{ url('/admin/transaction/borrower-book/getBook') }}",
                    data: {
                        'barcode' : barcode
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log("get book responded!");
                        if(typeof response !== 'undefined'){
                            if(response.book_count > 1){
                                $("#modalBooksList tbody").html(response.html);
                       
                                $("#modalBooksList").modal("show");
                            }else{
                                //append books to book cart
                                let bookItem = $(response.html).hide(); 

                                $("#bookCart").append(bookItem);
                                bookItem.fadeIn(300);
                            }
                        }
                       



                    }
                });
            }
        }

        $("#btnModalSelectBorrower").click(function (e) { 
            e.preventDefault();
            let formBorrowerModal = $("#frmBorrowersModal").serializeArray();

            


        });
            
    </script>

@include('partials.__footer')