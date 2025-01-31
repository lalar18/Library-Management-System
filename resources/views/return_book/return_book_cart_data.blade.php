
@if(isset($books_data) && $books_data)
    @foreach($books_data as $key => $val)
        <div class="col-sm-12 col-md-4 col-lg-3 book-card-container" data-book-id = "{{$val['book_id']}}">
            <!-- book id data -->
            <input type = "hidden"
                value = "{{$val['book_id']}}"
                name = "trans_return_det[{{$val['book_id']}}][book_id]"
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

                    <div class = "row">
                        @if(isset($val['is_returned']) && $val['is_returned'])
                            <input type = "hidden"
                                 name = "trans_return_det[{{$val['book_id']}}][exclude]"
                                 value = "1"
                            >
                            <div class = "col-12">
                                <p class = "card-text"><strong>Status: </strong>{{config('const.penalty_status')[$val['is_returned']]}}</p>
                            </div>
                            <div class = "col-12">
                                @if(isset($penalty_data) && $penalty_data)
                                    @foreach($penalty_data as $key => $valPenalty)
                                        @if(isset($val['penalty_id']) && $val['penalty_id'] == $valPenalty['penalty_id'])
                                        <p class = "card-text"><strong>Penalty: </strong> {{$valPenalty['penalty_name']}}  ({{ config('const.default_currenty_symbol') }}{{$valPenalty['penalty_charge']}})</p>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class = "col-12">
                                <p class = "card-text"><strong>Remarks: </strong>{{ $val['item_remarks'] }}</p>
                            </div>
                        @else
                            <!-- status -->
                            <div class = "col-12 mb-2">
                                <select name = "trans_return_det[{{$val['book_id']}}][is_returned]" class = "form-control">
                                    <option value = "" selected hidden disabled>Select Status</option>
                                    @foreach(config('const.penalty_status') as $key3 => $valPenaltyType)
                                        <option value = "{{$key3}}">{{$valPenaltyType}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- penalty -->
                            <div class = "col-12">
                                <label class = "w-100">
                                    <select name = "trans_return_det[{{$val['book_id']}}][penalty_id]" class = "form-control">
                                        <option value = "" selected hidden disabled>Select Penalty</option>
                                        @if(isset($penalty_data) && $penalty_data)
                                            @foreach($penalty_data as $key => $valPenalty)
                                                <option value = "{{$valPenalty['penalty_id']}}">{{$valPenalty['penalty_name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </label>
                            </div>

                            <!-- remarks -->
                            <div class = "col-12">
                                <textarea 
                                    class = "form-control"
                                    name = "trans_return_det[{{$val['book_id']}}][item_remarks]"
                                    placeholder = "Remarks..."
                                ></textarea>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif