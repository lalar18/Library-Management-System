

<!-- address -->
<div class = "col-sm-12 col-md-12 col-lg-12">
    <label class = "w-100">Address
        <textarea class = "form-control"
            name = "address"
            placeholder = "Address..."
        >{{isset($data['borrowersData']['address']) ?? ''}}</textarea>
    </label>
</div>

<!-- year level -->
<div class = "col-sm-12 col-md-5 col-lg-4">
    <label class = "w-100">
        Grade Levels
        <select class = "form-control"
            name = "year_level"
        >   <option value = "" selected hidden disabled>Select Grade Level</option>
            @foreach(config('const.grade_levels') as $key => $val)
                <option value = "{{$val}}" {{isset($data['borrowersData']['year_level']) && $data['borrowersData']['year_level'] == $val ? 'selected' : ''}}>{{$val}}</option>
            @endforeach
        </select>
    </label>
</div>

<!-- section -->
<div class = "col-sm-12 col-md-5 col-lg-4">
    <label class = "w-100">
        Section
        <input type = "text"
            class = "form-control"
            name = "section"
            placeholder = "Section..."
            value = "{{isset($data['borrowersData']['section']) ?? ''}}"
        >
    </label>
</div>

<!-- strand -->
<div class = "col-sm-12 col-md-5 col-lg-4">
    <label class = "w-100">
        Strand
        <select class = "form-control" name = "strand">
            @foreach(config('const.strands') as $key => $val)
                <optgroup label = {{$key}}></optgroup>
                @foreach($val as $valStrand)
                    <option value = "{{$valStrand['strand']}}" {{isset($data['borrowersData']['strand']) && $data['borrowersData']['strand'] == $valStrand['strand'] ? 'selected' : '';}}>{{$valStrand['strand']}}</option>
                @endforeach
            @endforeach
        </select>
    </label>
</div>

