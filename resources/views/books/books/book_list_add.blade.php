@include('partials.__header')

<div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Book <small>Information Details</small></h2>
                    {{-- <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul> --}}
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <!-- barbode -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Barcode <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" required="required" class="form-control ">
                            </div>
                        </div>

                        <!-- book title -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Book Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="last-name" required="required" class="form-control">
                            </div>
                        </div>

                        <!-- book description -->
                        <div class = "item form-group">
                            <label class = "col-form-label col-md-3 col-sm-3 label-align">Book Description <span class = "required">*</span></label>

                            <div class = "col-md-6 col-sm-6">
                                <textarea class = "form-control"></textarea>
                            </div>
                        </div>

                        <!-- ISBN -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">ISBN <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="last-name" required="required" class="form-control">
                            </div>
                        </div>

                        <!-- publish date -->
                        <div class = "item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date Published <span class="required">*</span></label>

                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" id="last-name" name="last-name" required="required" class="form-control">
                            </div>
                        </div>

                        <!-- book status -->
                        <div class = "item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Book Status <span class="required">*</span></label>

                            <div class = "col-md-6 col-sm-6">
                                <select class = "form-control">
                                    <option selected disabled hidden></option>
                                    <option>Brand New</option>
                                    <option>Good Condition</option>
                                    <option>Damaged</option>
                                    <option>Lost</option>
                                </select>
                            </div>
                        </div>
           
                        <div class="ln_solid"></div>
                </div>
            </div>
        </div>
    </div>

    <div class = "clearfix"></div>

    <div class = "row">
        <div class = "col-md-12 col-sm-12">
            <div class = "x_panel">
                <div class = "x_title">
                    <h2>Author(s)</h2>

                    {{-- <ul class = "nav navbar-right panel_toolbox">
                        <li><i class = "fa fa-plus"></i></li>
                    </ul> --}}

                    <div class = "clearfix"></div>
                </div>

                <div class = "x_content">

                    <div class = "item form-group">
                        <div class = "col-md-6 col-sm-6 offset-md-3">
                            <button type ="button" class = "btn btn-danger btn-sm float-right"><i class = "fa fa-plus"></i></button>
                        </div>
                    </div>

                    <!-- Authors -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Author <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="last-name" name="last-name" required="required" class="form-control">
                        </div>
                    </div>

                    <div class = "ln_solid"></div>

                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success"><i class = "fa fa-submit"></i>Submit</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class = "clearfix"></div>


@include('partials.__footer')