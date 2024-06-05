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