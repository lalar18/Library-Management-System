@include('partials.__header')
    


<h2>User Management</h2>
    <div class="card">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">

          <!-- Display Profile Image -->
          <div class="mb-3">
            @if ($data['userData']['profile_image'])
            <img id="profileImage" src="{{ asset('storage/images/' . $data['userData']['profile_image']) }}" 
            alt="Profile Image" class="img-thumbnail" style="width: 150px; height: auto;">
               <!-- <img src="{{ asset('storage/images/' . $data['userData']['profile_image']) }}" alt="Profile Image" class="img-thumbnail" style="width: 150px; height: auto;"> -->
            @else
                <p>No image available</p>
            @endif
        </div>

        <form method="post" action="{{ url('admin/manage-users/editSubmit') }}" enctype="multipart/form-data">
            @csrf  <!-- CSRF token for security -->
            @method('PUT') <!-- Use PUT or PATCH for updates -->

            <input type = "hidden" name = "id" value = "{{ $data['userData']['id'] }}">

            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-4">
                    <label class="w-100">
                        Profile Image:
                        <input type="file" name="profile_image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    </label>
                </div>
            </div>


                <div class = "row">
                    <div class = "col-sm-12 col-md-3 col-lg-4">
                        <label class = "w-100">
                            Fullname:
                            <input type = "text" name="name" class = "form-control"
                                value = "{{ $data['userData']['name'] }}"
                            >
                        </label>
                    </div>
                </div>

                <div class = "row">
                    
                    <div class = "col-sm-12 col-md-3 col-lg-4">
                        <label class = "w-100">
                            Username:
                            <input type = "text" name="username" class = "form-control"
                                value = "{{ $data['userData']['username'] }}"
                            >
                        </label>
                    </div>
                </div>


                <div class = "row">
                <div class="col-sm-12 col-md-3 col-lg-4">
                        <label class="w-100">
                            Admin Type:
                            <select name="user_type" id="user_type" class="form-control">
                            <option value="">-- Select Admin Type --</option>                         
                            <option value="1" {{ $data['userData']['user_type'] == '1' ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $data['userData']['user_type'] == '0' ? 'selected' : '' }}>Staff</option>
                     </select>
                        </label>
                    </div>
                </div>


                <div class = "row">
                    
                    <div class = "col-sm-12 col-md-3 col-lg-4">
                        <label class = "w-100">
                            Password:
                            <input type = "password" name="password" class="form-control" placeholder="Password">
                              
                        
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
            <div class="row mt-3">
                <div class="col-sm-12 col-md-3 col-lg-4">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </div>

            </form>
        </div>
    </div>

    <script>
    function previewImage(event) {
        const image = document.getElementById('profileImage');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result; // Set the image source to the file data
            }
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            image.src = "{{ asset('storage/images/' . $data['userData']['profile_image']) }}"; // Reset to original if no file
        }
    }
</script>


@include('partials.__footer')