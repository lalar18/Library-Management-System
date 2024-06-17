@include('partials.__header')

    <link href="{{ url('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <div class = "card">
        <div class = "card-body">
            <div class = "row">
                <!-- left side column -->
                <div class = "col-md-6 col-sm-3">
                    <form class = "form-inline" method = "GET">
                        <label for = "txtKeyword">Search:</label>
                        <input id = "txtKeyword"  
                            type = "text" 
                            class = "form-control ml-2 mr-2" 
                            name = "keyword" 
                            placeholder = "Keyword..."
                            value = {{ isset($data['filter_data']['keyword']) && $data['filter_data']['keyword'] ? $data['filter_data']['keyword'] : '' }}
                        >

                        <label>Status</label>
                        <select class = "form-control ml-2 mr-2" name = "status">
                            <option value = "all">All</option>
                            <option value = "enabled" {{ isset($data['filter_data']['status']) && $data['filter_data']['status'] == '1' ? 'selected' : '' }}>Enabled</option>
                            <option value = "disabled" {{ isset($data['filter_data']['status']) && $data['filter_data']['status'] == '0' ? 'selected' : '' }}>Disabled</option>
                        </select>

                       <button type = "submit" class = "btn btn-success mt-1">
                           <i class = "fa fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- right side column -->
                <div class = "col-md-6 col-sm-3">
                    <button type = "button" class = "btn btn-primary float-right" id = "btnNewCategoryModal"><i class = "fa fa-plus"></i> &nbsp;New</button>
                </div>
            </div>
        </div>
    </div>

    <div class = "table-responsive mt-2">
        <table class = "table table-bordered table-hover">
            <thead>
                <th class = "text-center" width = "50">#</th>
                <th class = "text-center" width = "150">Code</th>
                <th>Name</th>
                <th  class = "text-center" width = "150">Status</th>
                <th class = "text-center" width = "60">
                    <i class = "fa fa-cog"></i>
                </th>
            </thead>
            <tbody>
                @if(isset($data['books_data']))
                    @foreach($data['books_data'] as $key => $val)
                        <tr>
                            <td class = "text-center align-middle">{{ $val['id'] }}</td>
                            <td class = "text-center align-middle">{{ $val['code'] }}</td>
                            <td class = "align-middle">{{ $val['name'] }}</td>
                            <td class = "text-center align-middle">
                                @if(isset($val['status']))
                                    @if($val['status']==1)
                                        <span class = "badge badge-success p-2">Enabled</span>
                                    @else
                                        <span class = "badge badge-danger p-2">Disabled</span>
                                    @endif
                                @endif
                            </td>
                            <td class = "text-center align-middle">
                                <button type = "button" 
                                    class = "btn btn-secondary btn-sm btnEditCategory"
                                    data-cat-id = "{{ $val['id'] }}"
                                    data-code = "{{ $val['code'] }}"
                                    data-name = "{{ $val['name'] }}"
                                    data-status = "{{ $val['status'] }}"
                                ><i class = "fa fa-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    
    @include('elements.modals')

    <script src = "{{ url('assets/js/books/book_category/book_category.js') }}" tyepe = "text/javascript"></script>

@include('partials.__footer')