@include('partials.__header')

    <link href = "{{ url('assets/css/transaction/transaction.css') }}" rel = "stylesheet">

    <div class = "row">
        <!-- for list of borrowers -->
        <div class = "col-md-4 col-sm-4">

            <div class = "form-inline custom-form-inline">
                <label>Issuance No.</label>
                <input type = "text" class = "form-control text-inline ml-2" placeholder = "IS-000001..." >
            </div>
            
            <!-- borrower filter area -->
            <div class = "card mt-2 card-borrower">
                <div class = "card-body">
                    <h5 class = "card-title"><strong>Borrower Information</strong></h5>

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


@include('partials.__footer')