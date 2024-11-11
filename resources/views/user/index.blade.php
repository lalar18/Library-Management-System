@include('partials.__header')

    <?php
        $notification = session('test');
    ?>
    @if(isset($notification) && $notification)
        <div class = "alert alert-success">{{$notification}}</div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <div class = "row">
                <div class = "col-sm-12 col-md-3 col-lg-3">
                    <input type = "text" class = "form-control" placeholder="Search...">
                </div>
                <div class = "col-sm-12 col-md-2 col-lg-2">
                    <select class = "form-control">
                        <option value = "">All</option>
                        <option value = "1">Staff</option>
                        <option value = "2">Admin</option>
         
                    </select>
                </div>

            </div>
        
        </div>
    </div>
<style>
    .test-color{
        background-color:#2C3E50;
        color: white;
    }
</style>
<!-- Add button -->


    <div class="card mt-2">

    <div class="mb-3">
    <form action="{{ url('admin/manage-users/add') }}" method="POST" style="display:inline;">
    @csrf

    <button type="submit" class="btn btn-primary">Add User</button>
<!--     
    <a href="{{ url('admin/manage-users/add') }}" class="btn btn-primary">Add User</a> -->
     </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th class = "test-color" scope="col">No.</th>
                    <th class = "test-color" scope="col">Fullname</th>
                    <th class = "test-color" scope="col">Username</th>
                    <th class = "test-color" scope="col">User Type</th>
                    <th width = "50" class = "test-color text-center" scope="col"><i class = "fa fa-cog"></i></th>
                    
                    </tr>
                </thead>
                <tbody>
                   
                    @php($count = 1)

                    @foreach($data['userData'] as $key => $val)
                        <tr>
  
                        </td>
                           <td>{{ $count }}</td>
                            <td>{{ $val['name'] }}</td>
                            <td>{{ $val['username'] }}</td>
                            <td>{{ Config('const.user_type')[$val['user_type']] }}</td>
                            <td class = "text-center">
                                <a href = "{{ url('/admin/manage-users/edit/' . $val['id']) }}" class = "btn btn-secondary btn-sm"><i class = "fa fa-pencil"></i></a>
                            </td> 
                        </tr>
                        @php($count += 1)
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <input type = "password" class = "form-control">

    </form>

@include('partials.__footer')