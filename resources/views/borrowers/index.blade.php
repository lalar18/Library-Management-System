@include('partials.__header')

	<link href="{{ url('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

	@dump($data['filterData'])

	<!-- filter area -->
	<div class = "card">
		<div class = "card-body">
			<form class = "form-inline" method = "GET">

				<label for = "txtSearch">Search:</label>
				<input id = "txtSearch" type = "search" 
					class = "form-control ml-2 mr-2" 
					name = "keyword" 
					placeholder="Keyword..."
					value = "{{ isset($data['filterData']['keyword']) && $data['filterData']['keyword'] ? $data['filterData']['keyword'] : '' }}"
				>

				<label>Borrower Type:</label>
				<select class = "form-control ml-2 mr-2" name = "type_id">
					<option selected hidden disabled>All</option>
					<option value = "0" {{ isset($data['filterData']['type_id']) &&  $data['filterData']['type_id'] == 0 ? 'selected' : '' }}>Student</option>
					<option value = "1" {{ isset($data['filterData']['type_id']) &&  $data['filterData']['type_id'] == 1 ? 'selected' : '' }}>Faculty</option>
				</select>

				<button type = "submit" class = "btn btn-success mt-1"><i class = "fa fa-search"></i></button>

			</form>
		</div>
	</div>

    <div class = "card mt-2">
        <div class = "card-body">
			<button type = "button" class = "btn btn-primary float-right" data-toggle = "modal" data-target = "#modalBorrowersId"><i class = "fa fa-plus"></i> New</button>
        </div>
    </div>

    <!-- table -->
    <div class = "table-responsive mt-2">
        <table class = "table table-bordered table-hover">
            <thead>
                <tr>
                    <th class = "text-center">#</th>
                    <th>ID No</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th class = "text-center" width = "80"><i class = "fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
				@if(isset($data['borrowersData']))
					@foreach($data['borrowersData'] as $key => $val)
						<tr>
							<td class = "text-center align-middle">{{ $val['id'] }}</td>
							<td class = "align-middle">{{ $val['id_no'] }}</td>
							<td class = "align-middle">
								{{ isset($val['fname']) && $val['fname'] ? $val['fname'] : '' }} 
								{{ isset($val['lname']) && $val['lname'] ? $val['lname'] : '' }} 
								{{ isset($val['mname']) && $val['mname'] ? $val['mname'] : '' }} 
							</td>
							<td class = "align-middle">{{ isset($val['contact_no']) && $val['contact_no'] ? $val['contact_no'] : '' }}</td>
							<td class = "align-middle">{{ isset($val['email']) && $val['email'] ? $val['email'] : '' }}</td>
							<td class = "align-middle">{{ Config('const.designation')[isset($val['type_id']) && $val['type_id'] ? $val['type_id'] : 0]}}</td>
							<td class = "text-center align-middle">
								<button type = "button" 
									class = "btn btn-secondary btn-sm"
									data-id = "{{ $val['id'] }}"
								><i class = "fa fa-edit"></i></button>
							</td>
						</tr>
					@endforeach
				@endif
          	</tbody>
        </table>
    </div>

@include('partials.__footer')