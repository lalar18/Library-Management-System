
@include('partials.__header')

    <link href="{{ url('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Book Category <small>Add new book categories</small></h2>
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

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Code <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="last-name" required="required" class="form-control">
                            </div>
                        </div>
           
                        <div class = "item form-group">
                            <label class = "col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                            <div class = "col-md-6 col-sm-6 pt-2">
                                <p>
                                  
                                    <label for = "genderM">Enabled:</label>
                                    <input type="radio" class="flat" name="gender" id="genderM" value="1"required />

                                    <label for = "genderF">Disabled:</label>
                                    <input type="radio" class="flat" name="gender" id="genderF" value="0"  checked />
                                </p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
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

@include('partials.__footer')