
@if(isset($books_data) && $books_data)
    @foreach($books_data as $key => $val)
        <div class="col-sm-12 col-md-4 col-lg-3 book-card-container" data-book-id = "{{$val['book_id']}}">
            <!-- book id data -->
            <input type = "hidden"
                value = ""
                name = ""
            >

            <div class="card book-card">
                <div class="card-body">
                    <h5 class = "card-title">{{ $val['title'] }}</h5>

                    {{-- @if(count($authorData) > 1)
                        <p class = "card-text"><strong>Athor: </strong>{{ isset($authorData[$val['book_cat_id']]) && $authorData[$val['book_cat_id']] ? $authorData[$val['book_cat_id']] : '' }}</p>
                    @else
                        <p class = "card-text"><strong>Author: </strong>{{ $authorData['author_name'] }}</p>
                    @endif --}}
                    <p class = "card-text"><strong>Author: </strong>{{ $authors_data[$val['author_id']] }}</p>

                    <p class = "card-text"><strong>Genre: </strong>{{ $categories_data[$val['book_cat_id']] }}</p>
                    <p class = "card-text">{{ $val['description'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endif