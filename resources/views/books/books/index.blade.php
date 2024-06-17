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
                        <input id = "txtKeyword"  type = "text" class = "form-control ml-2 mr-2" name = "keyword" placeholder = "Keyword...">

                        <!-- Genre -->
                        <label>Genre: </label>
                        <select class = "form-control mr-2 ml-2">
                            <option value = "" selected>All</option>
                            @if(isset($data['book_categories_data']))
                                @foreach($data['book_categories_data'] as $key => $val1)
                                    <option value = "{{ $val1['id'] }}">{{ $val1['name'] }}</option>
                                @endforeach
                            @endif
                        </select>

                        <!-- author -->
                        <label>Author</label>
                        <select class = "form-control ml-2 mr-2">
                            <option value = "" selected>All</option>
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
                    <a href="{{ url('admin/book-entry/add') }}" class = "btn btn-primary float-right"><i class = "fa fa-plus"></i> &nbsp; New</a>
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
                    <th class = "align-middle">Status</th>
                    <th class = "text-center" width = "50"><i class = "fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>001</td>
                    <td>To Kill a Mockingbird</td>
                    <td>A novel set in the Depression-era South, focusing on the Finch family and their moral growth amidst racial injustice.</td>
                    <td>978-0-06-112008-4</td>
                    <td>Harper Lee</td>
                    <td>1960</td>
                    <td>Available</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>001</td>
                    <td>002</td>
                    <td>1984</td>
                    <td>A dystopian novel about a totalitarian regime that uses surveillance, censorship, and repression to control its citizens.</td>
                    <td>978-0-452-28423-4</td>
                    <td>George Orwell</td>
                    <td>1949</td>
                    <td>Checked Out</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>001</td>
                    <td>003</td>
                    <td>Pride and Prejudice</td>
                    <td>A romantic novel that explores the themes of love, social class, and family dynamics in early 19th century England.</td>
                    <td>978-0-19-953556-9</td>
                    <td>Jane Austen</td>
                    <td>1813</td>
                    <td>Available</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>001</td>
                    <td>The Great Gatsby</td>
                    <td>A story about the mysterious Jay Gatsby and his unrequited love for Daisy Buchanan, set in the Roaring Twenties.</td>
                    <td>978-0-7432-7356-5</td>
                    <td>F. Scott Fitzgerald</td>
                    <td>1925</td>
                    <td>Available</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>005</td>
                    <td>001</td>
                    <td>The Catcher in the Rye</td>
                    <td>The narrative follows Holden Caulfield, a teenager who leaves his prep school and experiences the challenges of adulthood in New York City.</td>
                    <td>978-0-316-76948-0</td>
                    <td>J.D. Salinger</td>
                    <td>1951</td>
                    <td>Checked Out</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>006</td>
                    <td>001</td>
                    <td>Moby-Dick</td>
                    <td>An epic tale of the obsessive quest of Captain Ahab for revenge against Moby Dick, the white whale.</td>
                    <td>978-0-14-243724-7</td>
                    <td>Herman Melville</td>
                    <td>1851</td>
                    <td>Available</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>007</td>
                    <td>001</td>
                    <td>War and Peace</td>
                    <td>A sprawling novel set during the Napoleonic wars, focusing on the lives, loves, and fates of several Russian aristocratic families.</td>
                    <td>978-0-14-044793-4</td>
                    <td>Leo Tolstoy</td>
                    <td>1869</td>
                    <td>Checked Out</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>008</td>
                    <td>001</td>
                    <td>The Hobbit</td>
                    <td>The prelude to "The Lord of the Rings," this fantasy novel follows Bilbo Baggins on his quest to reclaim a treasure guarded by the dragon Smaug.</td>
                    <td>978-0-618-00221-3</td>
                    <td>J.R.R. Tolkien</td>
                    <td>1937</td>
                    <td>Available</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>009</td>
                    <td>001</td>
                    <td>Jane Eyre</td>
                    <td>The novel follows the experiences of Jane Eyre, an orphaned girl who becomes a governess and falls in love with her enigmatic employer, Mr. Rochester.</td>
                    <td>978-0-14-243720-9</td>
                    <td>Charlotte Brontë</td>
                    <td>1847</td>
                    <td>Available</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>010</td>
                    <td>001</td>
                    <td>Brave New World</td>
                    <td>A dystopian novel that imagines a future society driven by technological advances and conditioned happiness, questioning the cost of utopia.</td>
                    <td>978-0-06-085052-4</td>
                    <td>Aldous Huxley</td>
                    <td>1932</td>
                    <td>Checked Out</td>
                    <td>
                        <a href = "#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a>
                    </td>
                </tr>
                
                
            </tbody>
        </table>
    </div>
@include('partials.__footer')