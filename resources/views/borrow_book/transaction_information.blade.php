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
                    value = "{{$data['filter_data']['keyword'] ?? ''}}"
                >

                <!-- borrow type -->
                <lable for = "">Borrower Type:</lable>
                <select class = "form-control ml-2"
                    name = "borrower_type"
                >
                    <option value = "">All</option>
                    <option value = "2" {{isset($data['filter_data']['borrower_type']) && $data['filter_data']['borrower_type'] == 2 ? 'selected' : ''; }}>Faculty</option>
                    <option value = "1" {{isset($data['filter_data']['borrower_type']) && $data['filter_data']['borrower_type'] == 1 ? 'selected' : ''; }}>Student</option>
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
                    @php $count++; @endphp
                @endforeach
             
            @endif

        </tbody>
        
    </table>

    <div class = "pagination-container float-right">
        {{ $data['book_transactions']->links('pagination::bootstrap-4') }}
    </div>
</div>

@include('partials.__footer')