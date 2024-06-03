@include('partials.__header')

    <!-- filter area -->
    <div class = "card">
        <div class = "card-body">
            <form class = "form-inline" method = "GET">

                <label for = "txtSearch">Search:</label>
                <input id = "txtSearch" type = "search" class = "form-control ml-2 mr-2" name = "keyword">

                <label>Borrower Type:</label>
                <select class = "form-control ml-2 mr-2" name = "type_id">
                    <option selected hidden disabled></option>
                    <option value = "1">Student</option>
                    <option value = "2">Faculty</option>
                </select>

                <button type = "submit" class = "btn btn-success mt-1"><i class = "fa fa-search"></i></button>

            </form>
        </div>
    </div>

    <div class = "card mt-2">
        <div class = "card-body">
            <a href="#" class = "btn btn-primary float-right"><i class = "fa fa-plus"></i>&nbsp; New</a>
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
                <tr>
                    <td class = "text-center">1</td>
                    <td>001</td>
                    <td>John Doe</td>
                    <td>(123) 456-7890</td>
                    <td>john.doe@example.com</td>
                    <td>Manager</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                  </tr>
                  <tr>
                    <td class = "text-center">2</td>
                    <td>002</td>
                    <td>Jane Smith</td>
                    <td>(234) 567-8901</td>
                    <td>jane.smith@example.com</td>
                    <td>Developer</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                </tr>
                  <tr>
                    <td class = "text-center">3</td>
                    <td>003</td>
                    <td>Bob Johnson</td>
                    <td>(345) 678-9012</td>
                    <td>bob.johnson@example.com</td>
                    <td>Designer</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                </tr>
                  <tr>
                    <td class = "text-center">4</td>
                    <td>004</td>
                    <td>Alice Williams</td>
                    <td>(456) 789-0123</td>
                    <td>alice.williams@example.com</td>
                    <td>Analyst</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                </tr>
                  <tr>
                    <td class = "text-center">5</td>
                    <td>005</td>
                    <td>Charlie Brown</td>
                    <td>(567) 890-1234</td>
                    <td>charlie.brown@example.com</td>
                    <td>Consultant</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                </tr>
                  <tr>
                    <td class = "text-center">6</td>
                    <td>006</td>
                    <td>Emily Davis</td>
                    <td>(678) 901-2345</td>
                    <td>emily.davis@example.com</td>
                    <td>HR Specialist</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                </tr>
                  <tr>
                    <td class = "text-center">7</td>
                    <td>007</td>
                    <td>David Wilson</td>
                    <td>(789) 012-3456</td>
                    <td>david.wilson@example.com</td>
                    <td>Accountant</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                </tr>
                  <tr>
                    <td class = "text-center">8</td>
                    <td>008</td>
                    <td>Emma Thompson</td>
                    <td>(890) 123-4567</td>
                    <td>emma.thompson@example.com</td>
                    <td>Marketing Manager</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                </tr>
                  <tr>
                    <td class = "text-center">9</td>
                    <td>009</td>
                    <td>Frank Moore</td>
                    <td>(901) 234-5678</td>
                    <td>frank.moore@example.com</td>
                    <td>Sales Executive</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                </tr>
                  <tr>
                    <td class = "text-center">10</td>
                    <td>010</td>
                    <td>Grace Lee</td>
                    <td>(012) 345-6789</td>
                    <td>grace.lee@example.com</td>
                    <td>Project Manager</td>
                    <td class = "text-center"><a href="#" class = "btn btn-secondary btn-sm"><i class = "fa fa-edit"></i></a></td>
                </tr>
                  
            </tbody>
        </table>
    </div>

@include('partials.__footer')