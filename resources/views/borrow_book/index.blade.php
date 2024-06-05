@include('partials.__header')

    <div class = "row">
        <!-- for list of borrowers -->
        <div class = "col-md-5">
            
            <!-- borrower filter area -->
            <form class = "form-inline">
                <input type = "search" class = "form-control mlr" placeholder = "Search...">
            </form>
            

            <div class = "card mt-2">
                <div class = "card-body">
                    <h5 class = "card-title"><strong>Borrower Information</strong></h5>

                    <label>Date Borrowed</label>
                    <input type = "date" class = "form-control">
                </div>
            </div>
        </div>
        
        <!-- for list of books for borrow -->
        <div class = "col-md-7 col-sm-7">
            <input class = "form-control" placeholder = "Barcode...">
            <div class = "card mt-2">
                <div class = "card-body">
                    <h5 class = "card-title"><strong>Books</strong></h5>
                </div>
            </div>
        </div>
    </div>


@include('partials.__footer')