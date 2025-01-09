@include('partials.__header')

    <script src = "{{url('/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>

    <link href = "{{ url('assets/css/transaction/transaction.css') }}" rel = "stylesheet">

    
    <!-- search books -->
    <div class = "row">

        <!-- for notifiction section -->
        @php $notification = session('book_transaction_notification') @endphp

        @if(isset($notification) && $notification)
        <div class = "col-12">
            <div class = "alert {{ $notification['type'] }}">
                <h5>{{$notification['title']}}</h5>
                <span>{{$notification['message']}}</span>
            </div>
        </div>
        @endif

        <div class = "col-12">
            <div class = "input-group">
                <input type = "text" class = "form-control" 
                    id = "textbarcode"
                    placeholder = "Barcode..." 
                    onkeydown="if (event.key === 'Enter') searchBook(this)"
                    data-href = "{{ url('/admin/') }}"
                >
                {{-- <div class = "input-group-append">
                    <button type = "button" class = "btn btn-primary">Browse</button>
                </div> --}}
            </div>
        </div>
    </div>
    <form method = "post" action = "{{ url()->current() }}">
        <div class = "row">
       

            @csrf
            <!-- for list of borrowers -->
            <div class = "col-sm-12 col-md-4 col-lg-4">
                
                <!-- borrower filter area -->
                <div class = "card card-borrower">
                    <div class = "card-body">
                        <h5 class = "card-title"><strong>Borrower Information</strong></h5>

                        <label>Issuance No.</label>
                        <input type = "text" 
                            class = "form-control text-inline" 
                            name = "trans_issuance_tab[is_no]"
                            placeholder = "IS-000001..." 
                            value = "{{isset($data['tempIssuanceNo']) && $data['tempIssuanceNo'] ? $data['tempIssuanceNo'] : ''}}"
                            readonly
                        >
                            
                        <!-- borrower id -->
                        <input type = "hidden" id = "borrower_id" name = "trans_issuance_tab[borrower_id]" value = "">

                        <!-- user id -->
                        <input type = "hidden"
                            name = "trans_issuance_tab[preparedBy]"
                            value = "{{ session(config('const.session_admin_id')) }}"
                        >

                        <!-- prepared by -->
                        <input type = "hidden" name = "trans_issuance_tab[preparedBy]" value = "{{ session(config('const.session_admin_id')) }}">

                        <!-- borrower custom buttons -->
                        <div class = "borrower-custom-container">
                            {{-- <button type = "button" class = "btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Register New Borrower"><i class = "fa fa-plus"></i></button> --}}
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
                        <input type = "text" id = "id_no" class = "form-control" readonly>
                        
                        <!-- first name -->
                        <label>First Name</label>
                        <input type = "text" id = "fname" class = "form-control" readonly>

                        <!-- last name -->
                        <label>Last Name</label>
                        <input type = "text" id = "lname" class = "form-control" readonly>

                        <label>Date Borrowed</label>
                        <input type = "date" 
                            class = "form-control"
                            name = "trans_issuance_tab[date_borrowed]"
                            value = ""
                            required
                        >

                        <!-- date return -->
                        <label>Expected Date of Return</label>
                        <input type = "date" 
                            class = "form-control"
                            name = "trans_issuance_tab[date_expected_return]"
                            value = ""
                            required
                        >
                        
                        <!-- prepared by -->
                        <label>Prepared By</label>
                        <input type = "text" class = "form-control" value = "{{session(config('const.session_admin_name'))}}" readonly>
                    </div>
                </div>
            </div>
            
            <!-- for list of books for borrow -->
            <div class = "col-sm-12 col-md-8 col-lg-8">

                <div class = "card book-container">
                    <div class = "card-body">
                        <h5 class = "card-title"><strong>Books</strong></h5>

                        <div class = "row px-3 d-flex justify-content-start" id = "bookCart">
                            {{-- <!-- sample book -->
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
                            <!-- sample book --> --}}
                            
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
        </div>
    </form>

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

                let bookIds = [];

                //get all book ids in cart
                $(".book-card-container").each(function(){
                    bookIds.push($(this).data("book-id"));
                })

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Set up jQuery AJAX to include the CSRF token in all requests
                $.ajax({
                    type: "post",
                    headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}, 
                    url: "{{ url('/admin/transaction/borrower-book/getBook') }}",
                    data: {
                        'barcode' : barcode,
                        'book_id' : bookIds
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

                                $("#textbarcode").val("");
                                $("#textbarcode").focus();
                            }
                        }

                    }
                });
            }
        }

        $("#btnModalSelectBorrower").click(function (e) { 
            e.preventDefault();

            let formBorrowerModal = $("#frmBorrowersModal").serializeArray();

            let table  = $("#modalListBorrowers").DataTable();
            let selectedBorrower = formBorrowerModal.find(input => input.name === 'borrower_id');

            if (selectedBorrower) {
                let borrowerData = table.row($("input[name='borrower_id']:checked").closest('tr')).data();

                //populate hidden input
                $("#borrower_id").val(borrowerData.id);

                $("#id_no").val(borrowerData.id_no);
                $("#fname").val(borrowerData.fname);
                $("#lname").val(borrowerData.lname);

                $("#modalSearchBorrower").modal("hide");
            } else {
                alert("Please select a borrower.");
            }
        });

        $("#bookCart").on("click", ".book-card-remove", function(e){
            e.preventDefault();

            $(this).closest(".book-card-container").fadeOut(300, function(){
                $(this).remove();
            });
        });
            
    </script>

@include('partials.__footer')