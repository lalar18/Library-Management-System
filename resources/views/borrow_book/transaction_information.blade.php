@include('partials.__header')

<div class="card">
    <div class="card-body">
        <div class = "search-container">
            <form class = "form-inline">

                <!-- Keyword -->
                <label for = "txtTransactionKeyword">Search:</label>
                <input type = "search"
                    class = "form-control ml-2 mr-2" 
                    id = "txtTransactionKeyword"
                    name = "keyword" 
                    placeholder = "Keyword..."
                >

                <!-- borrow type -->
                <lable for = "">Borrow Type:</lable>
                <select class = "form-control ml-2"
                    name = "borrow_type"
                >
                    <option>All</option>
                    <option>Borrow</option>
                    <option>Return</option>
                </select>

                <!-- submit button -->
                <button type = "submit" class = "btn btn-success mt-2 ml-2"><i class = "fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>

<div class = "table-responsive mt-2">
    <table class = "table table-bordered table-hover">
        <thead>
            <tr>
                <th class = "align-middle text-center">#</th>
                <th class = "align-middle">Issuance No.</th>
                <th class = "align-middle">Return No.</th>
                <th class = "align-middle">Date Borrowed</th>
                <th class = "align-middle">Expected Date Return</th>
                <th class = "align-middle">No. Books Borrowed</th>
                <th class = "align-middle">No. Books Returned</th>
                <th class = "align-middle">Borrower Type</th>
                <th class = "align-middle">Borrower Name</th>
                <th class = "align-middle">Date Returned</th>
                <th class = "align-middle">Transaction Status</th>
                <th class = "align-middle text-center"><i class = "fa fa-cog"></i></th>
            </tr>
        </thead>

        <tbody>
            <!-- sample data-->
            <tr>
                <td class="align-middle text-center">1</td>
                <td class="align-middle">ISS-001</td>
                <td class="align-middle">RET-001</td>
                <td class="align-middle">2023-06-01</td>
                <td class="align-middle">2023-06-10</td>
                <td class="align-middle text-center">3</td>
                <td class="align-middle text-center">3</td>
                <td class="align-middle">Student</td>
                <td class="align-middle">John Doe</td>
                <td class="align-middle">2023-06-09</td>
                <td class="align-middle">Completed</td>
                <td class = "align-middle text-center"><button class = "btn btn-sm"><i class = "fa fa-ellipsis-v"></i></button></td>
            </tr>
            <tr>
                <td class="align-middle text-center">2</td>
                <td class="align-middle">ISS-002</td>
                <td class="align-middle">RET-002</td>
                <td class="align-middle">2023-06-05</td>
                <td class="align-middle">2023-06-15</td>
                <td class="align-middle text-center">2</td>
                <td class="align-middle text-center">1</td>
                <td class="align-middle">Faculty</td>
                <td class="align-middle">Jane Smith</td>
                <td class="align-middle">2023-06-14</td>
                <td class="align-middle">Partially Returned</td>
                <td class = "align-middle text-center"><button class = "btn btn-sm"><i class = "fa fa-ellipsis-v"></i></button></td>
            </tr>
            <tr>
                <td class="align-middle text-center">3</td>
                <td class="align-middle">ISS-003</td>
                <td class="align-middle">RET-003</td>
                <td class="align-middle">2023-06-10</td>
                <td class="align-middle">2023-06-20</td>
                <td class="align-middle text-center">5</td>
                <td class="align-middle text-center">5</td>
                <td class="align-middle">Student</td>
                <td class="align-middle">Michael Brown</td>
                <td class="align-middle">2023-06-19</td>
                <td class="align-middle">Completed</td>
                <td class = "align-middle text-center"><button class = "btn btn-sm"><i class = "fa fa-ellipsis-v"></i></button></td>
            </tr>
            <tr>
                <td class="align-middle text-center">4</td>
                <td class="align-middle">ISS-004</td>
                <td class="align-middle">RET-004</td>
                <td class="align-middle">2023-06-12</td>
                <td class="align-middle">2023-06-22</td>
                <td class="align-middle text-center">4</td>
                <td class="align-middle text-center">4</td>
                <td class="align-middle">Staff</td>
                <td class="align-middle">Emily White</td>
                <td class="align-middle">2023-06-21</td>
                <td class="align-middle">Completed</td>
                <td class = "align-middle text-center"><button class = "btn btn-sm"><i class = "fa fa-ellipsis-v"></i></button></td>
            </tr>
            <tr>
                <td class="align-middle text-center">5</td>
                <td class="align-middle">ISS-005</td>
                <td class="align-middle">RET-005</td>
                <td class="align-middle">2023-06-15</td>
                <td class="align-middle">2023-06-25</td>
                <td class="align-middle text-center">1</td>
                <td class="align-middle text-center">0</td>
                <td class="align-middle">Visitor</td>
                <td class="align-middle">Sarah Johnson</td>
                <td class="align-middle">N/A</td>
                <td class="align-middle">Overdue</td>
                <td class = "align-middle text-center"><button class = "btn btn-sm"><i class = "fa fa-ellipsis-v"></i></button></td>
            </tr>
        </tbody>
        
    </table>
</div>

@include('partials.__footer')