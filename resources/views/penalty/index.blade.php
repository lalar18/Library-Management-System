@include('partials.__header')
<style>
    .test-color {
        background-color: #2C3E50;
        color: white;
    }
</style>

<section class = "content">
    <div class = "container-fluid">
        
        <!-- button filter -->
        <div class = "card">
            <div class = "card-body">
                <a href = "{{ url('/admin/manage-penalty/create') }}" class = "btn btn-primary float-right">New</a>
            </div>
        </div>

        <!-- data container -->
        <div class = "card mt-2">
            <div class = "card-body">
                <div class = "table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="test-color" scope="col">No.</th>
                                <th class="test-color" scope="col">Penalty Name</th>
                                <th class="test-color" scope="col">Penalty Charge</th>
                                <th width="50" class="test-color text-center" scope="col"><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach($data['penaltyData'] as $key => $val)
                                <tr>
                                    <td style="width: 50px;">{{ $count }}</td>
                                    <td style="width: 400px;">{{ $val['penalty_name'] }}</td>
                                    <td style="width: 150px;">{{ $val['penalty_charge'] }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal" data-id="{{ $val['penalty_id'] }}" data-name="{{ $val['penalty_name'] }}" data-charge="{{ $val['penalty_charge'] }}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php($count += 1)
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('/admin/manage-penalty/update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Penalty</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="penalty_id" id="penalty-id">
                    <div class="form-group">
                        <label for="penalty-name">Penalty Name</label>
                        <input type="text" class="form-control" id="penalty-name" name="penalty_name" required>
                    </div>
                    <div class="form-group">
                        <label for="penalty-charge">Penalty Charge</label>
                        <input type="number" class="form-control" id="penalty-charge" name="penalty_charge" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id');
        var name = button.data('name');
        var charge = button.data('charge');

        var modal = $(this);
        modal.find('#penalty-id').val(id);
        modal.find('#penalty-name').val(name);
        modal.find('#penalty-charge').val(charge);
    });
</script>

@include('partials.__footer')
