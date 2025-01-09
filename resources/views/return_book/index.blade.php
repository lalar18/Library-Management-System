@include('partials.__header')

    <link href = "{{ url('assets/css/transaction/transaction.css') }}" rel = "stylesheet">

    <div class = "row">
        <div class = "col-12">
            <!-- issuance number -->
            <label>Issuance No.</label>
            <div class = "input-group">
                <input type = "text" class = "form-control text-inline" placeholder = "IS-0000001..." id = "txtIssuanceNo">
                <div class = "input-group-prepend">
                    <button class = "btn btn-primary"><i class = "fa fa-search"></i>&nbsp; Search</button>
                </div>
            </div>

            
        </div>
    </div>

    <div class = "row">
        <!-- for list of borrowers -->
        <div class = "col-md-4 col-sm-4">

            <!-- borrower filter area -->
            <div class = "card card-borrower">
                <div class = "card-body">
                    <h5 class = "card-title"><strong>Borrower Information</strong></h5>

                    <!-- preparedBy -->
                    <input type = "hidden"
                        name = "trans_return_tab[preparedBy]"
                        value = "{{$data['userData']['admin_user_id']}}"
                    >

                    <!-- borrower_id -->
                    <input type = "hidden" value = "" id = "borrower_id">

                    <label>Return No.</label>
                    <input type = "text" class = "form-control" 
                        placeholder = "IR-000001..."
                        value = "{{$data['ir_no']}}"
                        readonly
                    >

                    <!-- id no -->
                    <label>ID #</label>
                    <input type = "text" 
                        class = "form-control" 
                        id = "id_no" 
                        readonly
                    >
                    
                    <!-- first name -->
                    <label>First Name</label>
                    <input type = "text" 
                        class = "form-control" 
                        readonly
                        id = "fname"
                    >

                    <!-- last name -->
                    <label>Last Name</label>
                    <input type = "text" 
                        class = "form-control" 
                        readonly
                        id = "lname"
                    >

                    <!-- date return 1 -->
                    <label>Date Returned</label>
                    <input type = "date" class = "form-control">
                    <!-- date return 1 -->

                    <!-- date borrowed --->
                    <label>Date Borrowed</label>
                    <input type = "date" class = "form-control">

                    <!-- date return -->
                    <label>Expected Date of Return</label>
                    <input type = "date" 
                        class = "form-control"
                        id = "date_expected_return"
                        readonly
                    >
                    
                    <!-- prepared by -->
                    <label>Prepared By</label>
                    <input type = "text" 
                        class = "form-control" 
                        value = "{{$data['userData']['admin_user_name']}}" 
                        readonly
                    >
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
                    <button class = "btn btn-success float-right"><i class = "fa fa-save"></i>&nbsp; Save Transaction</button>
                </div>
            </div>
        </div>
        <!-- for form controls -->
    </div>
 
    @include('elements.modals')


    <script src = "{{ url('/assets/js/transaction/return_books.js') }}"></script>

    <script>
        $(document).ready(function(){
            $("#txtIssuanceNo").on("keyup", function(event) {
                if (event.key === "Enter" || event.keyCode === 13) {
                    let isNo = $(this).val();

                     $.ajax({
                        type: "POST",
                        url: "{{url('/admin/transaction/get-transaction-info')}}",
                        headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}, 
                        data: {
                            is_no : isNo
                        },
                        dataType: "json",
                        success: function (response) {
                            if(typeof response !== 'undefined' && response){
                                $("#borrower_id").val(response.borrower_information.borrower_id);
                                $("#id_no").val(response.borrower_information.id_no);
                                $("#fname").val(response.borrower_information.fname);
                                $("#lname").val(response.borrower_information.lname);
                                $("#date_expected_return").val(response.borrower_information.date_expected_return);


                                //append html layout
                                if(typeof response.html !== 'undefined' && response.html){
                                    $("#bookCart").html(response.html);
                                }
                            }
                        }
                   });
                }
            });
        });
    </script>

@include('partials.__footer')