@include('partials.__header')

    <h2>Add User</h2>

    <div class="card">
        <div class="card-body">

          <!-- Display Profile Image -->
          <div class="mb-3">
           
                <img id="profileImage" src="" 
                alt="Profile Image" class="img-thumbnail" style="width: 150px; height: auto;">
        
        </div>

            <form method="post" action="{{ url()->current() }}" enctype="multipart/form-data">
                @csrf  <!-- CSRF token for security -->

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
                                
                            >
                        </label>
                    </div>
                </div>

                <div class = "row">
                    
                    <div class = "col-sm-12 col-md-3 col-lg-4">
                        <label class = "w-100">
                            Username:
                            <input type = "text" name="username" class = "form-control"
                                
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
                            <option value="1">Admin</option>
                            <option value="0">Staff</option>
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

          
                <!-- Submit Buttons -->
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-3 col-lg-4">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
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
            image.src = ""; // Reset to original if no file
        }    
        
        
    }
</script>

@include('partials.__footer')