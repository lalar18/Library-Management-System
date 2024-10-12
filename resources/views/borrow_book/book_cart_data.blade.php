
@if(isset($bookData) && $bookData)
    @foreach($bookData as $key => $val)
        <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="card book-card">
                <div class="remove-icon">
                    <i class="fa fa-times"></i>
                </div>
                <div class="card-body">
                    <h5 class = "card-title">{{ $val['title'] }}</h5>

                    <p class = "card-text"><strong>Author: </strong>{{ $authorData['author_name'] }}</p>
                    <p class = "card-text"><strong>Genre: </strong>{{ $categoryData[$val['book_cat_id']] }}</p>
                    <p class = "card-text">{{ $val['description'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endif