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
                            <input type = "search" class = "form-control ml-2 mr-2" placeholder = "Search...">
        
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
                            <table class = "table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width = "30"></th>
                                        <th>ID #</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type = "radio" name = "borrowerId"></td>
                                        <td>1001</td>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>Student</td>
                                    </tr>
                                    <tr>
                                        <td><input type = "radio" name = "borrowerId"></td>
                                        <td>1002</td>
                                        <td>Jane</td>
                                        <td>Smith</td>
                                        <td>Faculty</td>
                                    </tr>
                                    <tr>
                                        <td><input type = "radio" name = "borrowerId"></td>
                                        <td>1003</td>
                                        <td>Emily</td>
                                        <td>Johnson</td>
                                        <td>Student</td>
                                    </tr>
                                    <tr>
                                        <td><input type = "radio" name = "borrowerId"></td>
                                        <td>1004</td>
                                        <td>Michael</td>
                                        <td>Brown</td>
                                        <td>Faculty</td>
                                    </tr>
                                    <tr>
                                        <td><input type = "radio" name = "borrowerId"></td>
                                        <td>1005</td>
                                        <td>Sarah</td>
                                        <td>Davis</td>
                                        <td>Student</td>
                                    </tr>
                                  
                                </tbody>
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


@if(isset($data['books_data']))
<!-- book categoroy modal -->
<div class = "modal fade" id = "modalBookCategory">
    <div class = "modal-dialog modal-md">
        <div class = "modal-content">
            <div class = "modal-header">
                <h5 class = "modal-title"><strong>Book Category</strong></h5>
            </div>
            <div class = "modal-body">
                <form id = "frmBookCategory" method  = "post">
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
                                    
                                <label for = "genderM">Enabled:</label>
                                <input type="radio" class="flat" name="status" id="rdioEnabled" value="1"required />

                                <label for = "genderF">Disabled:</label>
                                <input type="radio" class="flat" name="status" id="rdioDisabled" value="0"  checked />
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class = "modal-footer">
                <!-- submit button -->
                <button type = "button" id = "btnSubmitBookCategory" class = "btn btn-success"><i class = "fa fa-save"></i>&nbsp;Save</button>
                <button type = "button" class = "btn btn-danger" data-toggle = "modal" data-target = "#modalBookCategory"><i class = "fa fa-times"></i>&nbsp;Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- book categoroy modal -->
@endif


<!-- book return details -->

