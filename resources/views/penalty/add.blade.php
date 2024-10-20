@include('partials.__header')

<section class = "content">
    <div class = "container-fluid">
        <div class = "card">
            <div class = "card-body">

                <form action="{{ route('penalty.add') }}" method="post">
                    @csrf <!-- Add this for security in Laravel forms -->

                    <div class = "row">
                        <!-- penalty name -->
                        <div class = "col-sm-12 col-md-3 col-lg-3">
                            <label class = "w-100">
                                Penalty Name:
                                <input type = "text" 
                                    class = "form-control"
                                    name = "penalty_name"
                                    value = ""
                                    required
                                >
                            </label>
                        </div>

                        <!-- penalty charge -->
                        <div class = "col-sm-12 col-md-3 col-lg-2">
                            <label class = "w-100">
                                Penalty Charge
                                <input type = "number"
                                    class = "form-control"
                                    name = "penalty_charge"
                                    value = ""
                                    required
                                >
                            </label>
                        </div>
                    </div>


                    <!-- <div class="form-group row">
                        <label for="penalty_name" class="col-sm-2 col-form-label">Penalty Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="penaltyName" name="penalty_name" placeholder="Enter Penalty Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="penalty_charge" class="col-sm-2 col-form-label">Penalty Charge</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="penaltyCharge" name="penalty_charge" placeholder="Enter Penalty Charge" min="0" step="0.01" required>
                        </div>
                    </div> -->

                    <!-- button container -->
                    <div class = "row">
                        <div class = "col-12">
                            <button type = "submit" class = "btn btn-success float-right">Add Penalty</button>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <div class="col-sm-4 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Add Penalty</button>
                        </div>
                    </div> -->
                </form>

            </div>
        </div>
    </div>
</section>

<div class="container-fluid mt-5">

    
</div>

@include('partials.__footer')