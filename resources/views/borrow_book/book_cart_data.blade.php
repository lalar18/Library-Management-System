
@if(isset($bookData) && $bookData)
    @foreach($bookData as $key => $val)
        <div class="col-sm-12 col-md-4 col-lg-3 book-card-container" data-book-id = "{{$val['id']}}">
            <!-- book id data -->
            <input type = "hidden"
                value = "{{$val['id']}}"
                name = "trans_issuance_tab_det[{{mt_rand(1000,9999)}}][book_id]"
            >

            <div class="card book-card">
                <div class="remove-icon">
                    <i class="fa fa-times book-card-remove"></i>
                </div>
                <div class="card-body">
                    <h5 class = "card-title">{{ $val['title'] }}</h5>

                    @if(count($authorData) > 1)
                        <p class = "card-text"><strong>Athor: </strong>{{ isset($authorData[$val['book_cat_id']]) && $authorData[$val['book_cat_id']] ? $authorData[$val['book_cat_id']] : '' }}</p>
                    @else
                        <p class = "card-text"><strong>Author: </strong>{{ $authorData['author_name'] }}</p>
                    @endif

                    <p class = "card-text"><strong>Genre: </strong>{{ $categoryData[$val['book_cat_id']] }}</p>
                    <p class = "card-text">{{ $val['description'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endif