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
                {{-- <th class = "align-middle text-center"><i class = "fa fa-cog"></i></th> --}}
            </tr>
        </thead>

        <tbody>
            @php $count = 1; @endphp
            @if(isset($data['book_transactions']) && $data['book_transactions'])
                @foreach($data['book_transactions'] as $key => $val)
                    <tr>
                        <td class="align-middle text-center">{{$count}}</td>
                        <td class="align-middle">{{$val['is_no']}}</td>
                        <td class="align-middle">{{$val['ir_no'] ?? 'N/A'; }}</td>
                        <td class="align-middle">{{$val['date_borrowed'] ?? '';}}</td>
                        <td class="align-middle">{{$val['date_expected_return'] ?? '';}}</td>
                        <td class="align-middle text-center">{{$val['borrowed_books'] ?? '0'}}</td>
                        <td class="align-middle text-center">{{$val['returned_books'] ?? '0'}}</td>
                        <td class="align-middle">{{$val['borrower_type'] ?? 'N/A'}}</td>
                        <td class="align-middle">{{$val['fname'] . ' ' . $val['lname']}}</td>
                        <td class="align-middle">{{$val['date_returned'] ?? 'N/A';}}</td>
                        <td class="align-middle">TBD</td>
                        {{-- <td class = "align-middle text-center"><button class = "btn btn-sm"><i class = "fa fa-ellipsis-v"></i></button></td> --}}
                    </tr>
                @endforeach
                @php $count++; @endphp
            @endif

        </tbody>
        
    </table>
</div>

@include('partials.__footer')