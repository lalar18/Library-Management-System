@include('partials.__header')

<div class="container mt-5">

    <form action="{{ route('penalty.add') }}" method="post">
        @csrf <!-- Add this for security in Laravel forms -->
        <div class="form-group row">
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
        </div>

        <div class="form-group row">
            <div class="col-sm-4 offset-sm-2">
                <button type="submit" class="btn btn-primary">Add Penalty</button>
            </div>
        </div>
    </form>
</div>

@include('partials.__footer')