@include('partials.__header')

	<link href="{{ url('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

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
					<option value = ""selected>All</option>
					<option value = "0" {{ isset($data['filterData']['type_id']) &&  $data['filterData']['type_id'] == 0 ? 'selected' : '' }}>Student</option>
					<option value = "1" {{ isset($data['filterData']['type_id']) &&  $data['filterData']['type_id'] == 1 ? 'selected' : '' }}>Faculty</option>
				</select>

				<button type = "submit" class = "btn btn-success mt-1"><i class = "fa fa-search"></i></button>

			</form>
		</div>
	</div>

    <div class = "card mt-2">
        <div class = "card-body">
			<button type = "button" 
				class = "btn btn-primary float-right" 
				onclick = "showBorrowerEntryModal(this)"
				data-mode = "1"
			><i class = "fa fa-plus"></i> New</button>
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
								<dl>
									<dd>
										<strong>Name: </strong>	
										{{ isset($val['fname']) && $val['fname'] ? $val['fname'] : '' }} 
										{{ isset($val['lname']) && $val['lname'] ? $val['lname'] : '' }} 
										{{ isset($val['mname']) && $val['mname'] ? $val['mname'] : '' }}
									</dd>
									@if(isset($val['type_id']) && $val['type_id'] == 0)
										@if(isset($val['address']) && $val['address'])
											<dd><b>Address : </b>{{ $val['address'] }}</dd>
										@endif

										@if(isset($val['year_level']) && $val['year_level'])
											<dd><b>Year Level : </b>{{ $val['year_level'] }}</dd>
										@endif

										@if(isset($val['section']) && $val['section'])
											<dd><b>Section : </b>{{ $val['section'] }}</dd>
										@endif

										@if(isset($val['strand']) && $val['strand'])
											<dd><b>Strand : </b>{{ $val['strand'] }}</dd>
										@endif
									@endif
								</dl>
							</td>
							<td class = "align-middle">{{ isset($val['contact_no']) && $val['contact_no'] ? $val['contact_no'] : '' }}</td>
							<td class = "align-middle">{{ isset($val['email']) && $val['email'] ? $val['email'] : '' }}</td>
							<td class = "align-middle">{{ Config('const.designation')[isset($val['type_id']) && $val['type_id'] ? $val['type_id'] : 0]}}</td>
							<td class = "text-center align-middle">
								<button type = "button" 
									class = "btn btn-secondary btn-sm"
									data-id = "{{ $val['id'] }}"
									data-id-no = "{{ $val['id_no'] }}"
									data-type-id = "{{ $val['type_id'] }}"
									data-fname = "{{ $val['fname'] }}"
									data-lname = "{{ $val['lname'] }}"
									data-mname = "{{ $val['mname'] }}"
									data-contact-no = "{{ $val['contact_no'] }}"
									data-email = "{{ $val['email'] }}"
									data-mode = "1"
									onclick = "showBorrowerEntryModal(this)"
								><i class = "fa fa-edit"></i></button>
							</td>
						</tr>
					@endforeach
				@endif
          	</tbody>
        </table>
    </div>

	<!-- modal -->
	<div class = "modal fade" id = "modalBorrowersEntryId">
		<div class = "modal-dialog modal-lg">
			<div class = "modal-content">
				<div class = "modal-header">
					<h5 class = "modal-title">Borrowers Information</h5>
				</div>

				<div class = "modal-body">
					<!-- notification container -->
					<div class = "notification-container">
					</div>

					<form method = "POST" action = "{{ url('admin/settings/borrowers-list/submit-data') }}" id = "frmModalBorrowersEntryId">
						@csrf
						<!-- borrower id -->
						<input type = "hidden" name = "id" value = "">

						<div class = "row">
							<!-- ID no -->
							<div class = "col-md-4 col-sm-4">
								<label>ID No.<span class = "required">*</span></label>
								<input type = "text" class = "form-control" name = "id_no" required>
							</div>
						</div>
						<div class = "row">
							<!-- first name -->
							<div class = "col-md-4 col-sm-4">
								<label>Last Name <span class ="required">*</span></label>
								<input type = "text" class = "form-control" name = "lname" required>
							</div>

							<!-- first name -->
							<div class = "col-md-4 col-sm-4">
								<label>First Name <span class ="required">*</span></label>
								<input type = "text" class = "form-control" name = "fname" required>
							</div>

							<!--last name -->
							<div class = "col-md-4 col-sm-4">
								<label>Middle Name <span class ="required">*</span></label>
								<input type = "text" class = "form-control" name = "mname" required>
							</div>

							<!-- email -->
							<div class = "col-md-8 col-sm-8">
								<label>Email</label>
								<input type = "email" class = "form-control" name = "email" required>
							</div>

							<!-- contact -->
							<div class = "col-md-4 col-sm-4">
								<label>Contact <span class ="required">*</span></label>
								<input type = "text" class = "form-control" name = "contact_no" required>
							</div>

							<!-- borrower type -->
							<div class = "col-md-4 col-sm-4">
								<label>Designation <span class = "required">*</span></label>
								<select class = "form-control" name = "type_id" required>
									<option value = "" selected hidden disabled>Select Designation</option>
									<option value = "0">Student</option>
									<option value = "1">Faculty</option>
								</select>
							</div>
						</div>

						<div class = "row additional_dev">
							@if(isset($data['borrowersData']['type_id']) && $data['borrowersData']['type_id'] == 0)
								@include('borrowers.student_additional_input')
							@endif
						</div>
					</form>
				</div>

				<div class = "modal-footer">
					<!-- save button -->
					<button type = "button" class = "btn btn-success" onclick = "submitData(this)"><i class = "fa fa-save"></i>&nbsp; Save</button>
					<button type = "button" class = "btn btn-danger" onclick = "hideBorrowersEntryModal()"><i class = "fa fa-times"></i>&nbsp; Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		//show modal for adding/updating borrowers data
		function showBorrowerEntryModal(element){
			if($(element).attr("data-mode") == 1){
				loadData(element);
			}

			$("#modalBorrowersEntryId").modal("show");
		}

		//hide modal for adding/updating borrowers data
		function hideBorrowersEntryModal(){
			$("#modalBorrowersEntryId").modal("hide");
		}

		function submitData(element){
		
			let formData = $("#frmModalBorrowersEntryId").serializeArray();
			
			$.ajax({
				type: "POST",
				url: "/admin/settings/borrowers-list/submit-data",
				data: formData,
				dataType: "JSON",
				success: function (response) {
					if(response.has_error == 0){
						$(".notification-container").html("<div class = 'alert alert-success'>"+ response.message +"</div>");

						$(element).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="sr-only">Loading...</span> &nbsp; Save');

						setTimeout(function(){
							if(!response.has_error){
								$("#modalBorrowersEntryId").modal("hide");
								location.reload();
							}
						
						}, 2000)
					}else{
						$(".notification-container").html("<div class = 'alert alert-danger'>"+ response.message +"</div>");
					}
				}
			});
		}

		function loadData(element){
			clearForm();

			$("#modalBorrowersEntryId [name='id']").val($(element).attr("data-id"));
			$("#modalBorrowersEntryId [name='id_no']").val($(element).attr("data-id-no"));
			$("#modalBorrowersEntryId [name='lname']").val($(element).attr("data-lname"));
			$("#modalBorrowersEntryId [name='fname']").val($(element).attr("data-fname"));
			$("#modalBorrowersEntryId [name='mname']").val($(element).attr("data-mname"));
			
			$("#modalBorrowersEntryId [name='email']").val($(element).attr("data-email"));
			$("#modalBorrowersEntryId [name='contact_no']").val($(element).attr("data-contact-no"));
			$("#modalBorrowersEntryId [name='type_id']").val($(element).attr("data-type-id"));
		}

		function clearForm(){
			$("#modalBorrowersEntryId [name='id']").val("");
			$("#modalBorrowersEntryId [name='id_no']").val("");
			$("#modalBorrowersEntryId [name='lname']").val("");
			$("#modalBorrowersEntryId [name='fname']").val("");
			$("#modalBorrowersEntryId [name='mname']").val("");
			
			$("#modalBorrowersEntryId [name='email']").val("");
			$("#modalBorrowersEntryId [name='contact_no']").val("");
			$("#modalBorrowersEntryId [name='type_id']").val("");
		}

		$("[name='type_id']").change(function() {
			let type_id = $(this).val();

			if(type_id == 0){
				$(".additional_dev").html(`@include('borrowers.student_additional_input')`);
			}else{
				$(".additional_dev").html("");
			}
		})
	</script>

@include('partials.__footer')