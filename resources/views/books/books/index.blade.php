@include('partials.__header')

    <div class = "clearfix"></div>

    <!-- filter area -->

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Book Filter(s)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class = "form-inline" method = "GET">
                        <!-- keyword -->
                        <label for = "txtKeyword">Search:</label>
                        <input id = "txtKeyword"  
                            type = "text" 
                            class = "form-control ml-2 mr-2" 
                            name = "keywords" 
                            placeholder = "Keyword..."
                            value = "{{ isset($data['filter_data']['keywords']) ? $data['filter_data']['keywords'] : '' }}"
                        >

                        <!-- Genre -->
                        <label>Genre: </label>
                        <select class = "form-control mr-2 ml-2" name = "genre">
                            <option value = "">All</option>
                            @if(isset($data['book_categories_data']))
                                @foreach($data['book_categories_data'] as $key => $val1)
                                    {{ $selected = ''; }}
                                    @if(isset($data['filter_data']['genre']) && $data['filter_data']['genre'] == $val1['id'])
                                        {{ $selected =  'selected' }}
                                    @endif

                                    <option value = "{{ $val1['id'] }}" {{ $selected }}>{{ $val1['name'] }}</option>
                                @endforeach
                            @endif
                        </select>

                        <!-- author -->
                        <label>Author</label>
                        <select class = "form-control ml-2 mr-2" name = "author">
                            <option value = "">All</option>
                            @if(isset($data['authors_data']))
                                @foreach($data['authors_data'] as $key => $val)
                                    <option value = "{{ $val['id'] }}">{{ $val['name'] }}</option>
                                @endforeach
                            @endif
                        </select>

                        <!-- date published -->
                        <label for = "dtFrom">Date Published : From</label>
                        <input id = "dtFrom" type = "date" class = "form-control ml-2 mr-2">

                        <label for = "dtTo">To:</label>
                        <input id = "dtTo" type = "date" class = "form-control ml-2 mr-2">


                       <button type = "submit" class = "btn btn-success mt-1">
                           <i class = "fa fa-search"></i>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class = "card">
        <div class = "card-body">
            <div class = "row">
                <!-- left container -->
                <div class = "col-md-8 col-sm-8"></div>

                <!-- right container -->
                <div class = "col-md-4 col-sm-4">
                    <button type = "button" id = "btnBooksNew" class = "btn btn-primary float-right"><i class = "fa fa-plus"></i> &nbsp; New</button>
                </div>
            </div>
           
        </div>
    </div>

    <div class = "table-responsive">
        <table class = "table table-bordered table-hover mt-2">
            <thead>
                <tr>
                    <th class = "text-center align-middle" width = "50">#</th>
                    <th class = "align-middle" width = "100">Barcode</th>
                    <th class = "align-middle">Title</th>
                    <th class = "align-middle">Description</th>
                    <th class = "align-middle">ISBN</th>
                    <th class = "align-middle">Author</th>
                    <th class = "align-middle">Publish Date</th>
                    <th class = "align-middle">Publisher</th>
                    <th class = "align-middle">Status</th>
                    <th class = "text-center" width = "50"><i class = "fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($data['books_data']))
                    @foreach($data['books_data'] as $key => $val)
                        <tr>
                            <td class = "text-center">{{ $val['id'] }}</td>
                            <td>{{ $val['barcode'] }}</td>
                            <td>{{ $val['title'] }}</td>
                            <td>{{ $val['description'] }}</td>
                            <td>{{ $val['isbn'] }}</td>
                            <td>{{ $val['author_name'] }}</td>
                            <td>{{ $val['publish_date'] }}</td>
                            <td>{{ $val['publisher_name'] }}</td>
                            <td>{{Config('const.status_types2')[$val['status']]}}</td>
                            <td class = "text-center">
                                <button type = "button" 
                                    class = "btn btn-secondary btn-sm"
                                    data-id = "{{ $val['id'] }}"
                                    onclick = "editBook(this)"
                                ><i class = "fa fa-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class = "pagination-container float-right">
            {{ $data['books_data']->links('pagination::bootstrap-4') }}
        </div>
       
    </div>

    <!-- datalist -->
    @if(isset($data['authors_data']))
    <datalist id = "authorsDataList">
        @foreach($data['authors_data'] as $key => $val)
            <option value= "{{ $val['name'] }}"></option>
        @endforeach
    </datalist>
    @endif

    @include('elements.modals')

    <script src = "{{ url('/assets/js/books/books/books.js') }}"></script>

@include('partials.__footer')