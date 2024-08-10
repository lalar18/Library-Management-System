<!-- borrowers modal -->
<div class = "modal fade" id = "modalBorrowersId">
    <div class = "modal-dialog modal-lg">
        <div class = "modal-content">
            <div class = "modal-header">
                <h5 class = "modal-title">Borrowers</h5>
            </div>

            <div class = "modal-body">
                <!-- id -->
                <div class = "row">
                    <div class = "col-md-3 col-sm-3">
                        <label>ID No. <span class = "required">*</span></label>
                        <input type = "text" class = "form-control">
                    </div>
                </div>
                
                <!-- full name -->
                <div class = "row mt-1">
                    <div class = "col-md-5 col-sm-4">
                        <label>Surname</label>
                        <input type = "text" class = "form-control mt-0">
                    </div>
                    <div class = "col-md-5 col-sm-4">
                        <label>Given Name</label>
                        <input type = "text" class = "form-control">
                    </div>
                    <div class = "col-md-2 col-sm-4">
                        <label>M.I.</label>
                        <input type = "text" class = "form-control">
                    </div>
                    
                </div>
                
                <!-- gender -->
                <div class = "row mt-3">
                    <div class = "col-md-12 col-sm-12">
                        <p>  
                            <label for = "genderM">Enabled:</label>
                            <input type="radio" class="flat" name="gender" id="genderM" value="1"required />

                            <label for = "genderF">Disabled:</label>
                            <input type="radio" class="flat" name="gender" id="genderF" value="0"  checked />
                        </p>
                    </div>
                </div>

                <!-- contact -->
                <div class = "row mt-1">
                    <div class = "col-md-12 col-sm-12">
                        <label>Contact</label>
                        <input type = "text" class = "form-control">
                    </div>
                </div>

                <!-- email -->
                <div class = "row mt-1">
                    <div class = "col-md-12 col-sm-12">
                        <label>Email</label>
                        <input type = "text" class = "form-control">
                    </div>
                </div>

                <!-- borrower type -->
                <div class = "row mt-1">
                    <div class = "col-md-12 col-sm-12">
                        <label>Borrower Type</label>
                        <select class = "form-control">
                            <option selected hidden disabled></option>
                            <option>Student</option>
                            <option>Faculty</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class = "modal-footer">
                <button type = "button" class = "btn btn-success"><i class  = "fa fa-save"></i>&nbsp; Save</button>
                <button type = "button" class = "btn btn-danger" data-toggle = "modal" data-target = "#modalBorrowersId"><i class = "fa fa-times"></i>&nbsp; Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- borrowers modal -->


@if(isset($data['books_data']))
<!-- book categoroy modal -->
<div class = "modal fade" id = "modalBookCategory">
    <div class = "modal-dialog modal-md">
        <div class = "modal-content">
            <div class = "modal-header">
                <h5 class = "modal-title"><strong>Book Category</strong></h5>
            </div>
            <div class = "modal-body">
                <!-- notification container -->
                <div id = "notification-container">

                </div>

                <form id = "frmBookCategory" method  = "POST">
                    @csrf
                    <input type = "hidden" name = "id">
                    <div class = "row">
                        <!-- code -->
                        <div class = "col-md-12">
                            <label>Code *</label>
                            <input type = "text" class = "form-control" name = "code">
                        </div>
                        <!-- name -->
                        <div class = "col-md-12">
                            <label>Name *</label>
                            <input type = "text" class = "form-control" name = "name">
                        </div>
                        <!-- status -->
                        <div class = "col-md-12">
                            <label>Status</label>
                            <p>
                                    
                                <label for = "bookstatuscategory1">Enabled:</label>
                                <input type="radio" class="flat" name="status" id="bookstatuscategory1" value="1"required />

                                <label for = "bookstatuscategory2">Disabled:</label>
                                <input type="radio" class="flat" name="status" id="bookstatuscategory2" value="0"  checked />
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class = "modal-footer">
                <!-- submit button -->
                <button type = "button" id = "btnSubmitBookCategoryModal" class = "btn btn-success" data-href= ""><i class = "fa fa-save"></i>&nbsp;Save</button>
                <button type = "button" class = "btn btn-danger" id = "btnCancelBookCategoryModal"><i class = "fa fa-times"></i>&nbsp;Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- book category modal -->
@endif


<!-- book return details -->
<div class = "modal fade" id = "modalBookReturnDetails">
    <div class = "modal-dialog modal-md">
        <div class = "modal-content">
            <div class = "modal-header">
                <h5 class = "modal-title"><strong>Return Details</strong></h5>
            </div>
            <div class = "modal-body">
                <div class = "row">
                    <!-- Date returned -->
                    <div class = "col-md-12">
                        <label>Date Returned</label>
                        <input type = "date" class = "form-control">
                    </div>

                    <!-- type of fine -->
                    <div class = "col-md-12">
                        <label>Type of Fine</label>
                        <select class = "form-control">
                            <option selected hidden disabled>Select</option>
                            <option>Damaged</option>
                            <option>Late</option>
                        </select>
                    </div>

                    <!--  remarks -->
                    <div class = "col-md-12">
                        <label>Remarks</label>
                        <textarea class = "form-control"></textarea>
                    </div>

                    <!-- is returned -->
                    <div class = "col-md-12">
                        <label>Is Returned</label>
                        <input type = "checkbox">
                    </div>

         
                </div>
            </div>
            <div class = "modal-footer">
                <button type = "button" id = "btnSubmitReturnBookDetail" class = "btn btn-success"><i class = "fa fa-save"></i>&nbsp;Save</button>
                <button type = "button" class = "btn btn-danger" data-toggle = "modal" data-target = "#modalBookReturnDetails"><i class = "fa fa-times"></i>&nbsp;Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- book return details -->

<!-- book entry modal -->
@if(isset($data['books_data']))
<div class  = "modal fade" id = "modalBooksEntry">
    <div class = "modal-dialog modal-xl" >
        <div class = "modal-content">
            <div class = "modal-header">
                <h5 class = "modal-title"><strong>Book Entry</strong></h5>
            </div>

            <div class = "modal-body">
                <div class = "notification-container">
                    
                </div>

                <form method = "POST" id = "frmBooksModal">
                    @csrf
                    <div class = "card">
                        <div class = "card-body">
                            <h6><b>Book Details</b></h6>
                            <hr>

                            <div class = "row">
                                <!-- id -->
                                <input type = "hidden" value = "" name = "id">
                                
                                <!-- barcode -->
                                <div class = "col-md-3 col-sm-3">
                                    <label for = "booksBarcodeModal">Barcode:</label>
                                    <input type = "number" 
                                        name = "barcode" 
                                        id = "booksBarcodeModal" 
                                        class = "form-control" 
                                        placeholder = "Ex. 129833992771"
                                        required
                                    >
                                </div>

                                <!-- ISBN -->
                                <div class = "col-md-4 col-sm-4">
                                    <label for = "booksISBNModal">ISBN:</label>
                                    <input type = "text" 
                                        name = "isbn"
                                        id = "booksISBNModal" 
                                        class = "form-control" 
                                        placeholder = "Ex. 978-0-306-40615-7..."
                                        required
                                    >
                                </div>
                            </div>
                            <div class = "row">

                                <!-- book price -->
                                <div class = "col-md-3 col-sm-3">
                                    <label for = "txtPriceModal">Price</label>
                                    <input type = "number"
                                        class = "form-control"
                                        name = "price"
                                        id = "txtPriceModal"
                                        placeholder = "Ex. 250.00"
                                        required
                                    >
                                </div>

                                <!-- book genre -->
                                <div class = "col-md-3 col-sm-3">
                                    <label>Genre:</label>
                                    <select name="book_cat_id" id="bookGenreModal" class = "form-control" required>
                                        <option selected hidden disabled></option>
                                        @if(isset($data['book_categories_data']))
                                            @foreach($data['book_categories_data'] as $key => $val)
                                                <option selected hidden disabled>Select</option>
                                                <option value = "{{ $val['id'] }}">{{ $val['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <!-- book status -->
                                <div class = "col-md-3 col-sm-3">
                                    <label for = "booksBookStatusModal">Book Status <span class = "required">*</span></label>
                                    <select id = "booksBookStatusModal" class = "form-control" name = "status" required>
                                        <option selected hidden disabled>Select</option>
                                        <option value = "1">Brand New</option>
                                        <option value = "2">Good Condition</option>
                                        <option value = "3">Damaged</option>
                                        <option value = "4">Lost</option>
                                    </select>
                                </div>

                                <!-- date published -->
                                <div class = "col-md-3 col-sm-3">
                                    <label for = "booksPublishDateModal">Date Published: <span class ="required">*</span></label>
                                    <input type = "date" name = "publish_date" id = "booksPublishDateModal" class = "form-control">
                                </div>

                                <!-- book title -->
                                <div class = "col-md-12 col-sm-12">
                                    <label for = "booksTitleModal">Book Title: <span class ="required">*</span></label>
                                    <input type = "text" name = "title" id = "booksTitleModal" class = "form-control" placeholder = "Ex. Tarzan...">
                                </div>

                                <!-- book description -->
                                <div class = "col-md-12 col-sm-12">
                                    <label for = "booksDescriptionModal">Book Description: <span class ="required">*</span></label>
                                    <textarea id = "booksDescriptionModal" class = "form-control" name = "description" placeholder = "Ex. The quick brown fox jumps over the lazy dog..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "card mt-2">
                        <div class = "card-body">
                            <h6><b>Author</b></h6>
                            <hr>
                            <!-- authors container -->
                            <div class = "row authors-container">
                                <div class = "col-md-3">
                                    <input type = "text" 
                                        autocomplete = "off" 
                                        name = "author_name" 
                                        class = "form-control" 
                                        placeholder = "Ex. Johny Bravo..." 
                                        list = "authorsDataList"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class = "modal-footer">
                <button type = "button" id = "btnSubmitBooksEntryModal" class = "btn btn-success" data-href = "/admin/book-entry/submit-add"><i class = "fa fa-save"></i>&nbsp;Save</button>
                <button type = "button" id = "btnCancelBooksEntryModal"class = "btn btn-danger"><i class = "fa fa-times"></i>&nbsp;Cancel</button>
            </div>
        </div>
    </div>
</div>
@endif
<!-- book entry modal -->

