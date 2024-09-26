@include('partials.__header')
    

    <div class="card">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">

            <form method = "post" action = "">
                <div class = "row">
                    <div class = "col-sm-12 col-md-3 col-lg-4">
                        <label class = "w-100">
                            Fullname:
                            <input type = "text" class = "form-control"
                                value = "{{ $data['userData']['name'] }}"
                            >
                        </label>
                    </div>
                </div>

                <div class = "row">
                    
                    <div class = "col-sm-12 col-md-3 col-lg-4">
                        <label class = "w-100">
                            Username:
                            <input type = "text" class = "form-control"
                                value = "{{ $data['userData']['username'] }}"
                            >
                        </label>
                    </div>

                </div>
            </form>
        </div>
    </div>


@include('partials.__footer')