@extends('admin.master')

@section('content')
    <div class="message"></div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Donor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Donor</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Donor</h3>
                                <a href="{{ route('admin.donor') }}" class="btn btn-success btn-sm float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                    Donor List
                                </a>
                            </div>
                            <div class="card-body">

                                @if ($city->count() == 0 && $group->count() == 0)
                                    <div class="alert alert-danger">Add First Cities and Blood Groups</div>
                                @endif

                                @if ($city->count() == 0)
                                    <div class="alert alert-danger">Add First Cities</div>
                                @endif
                                @if ($group->count() == 0)
                                    <div class="alert alert-danger">Add First Blood Groups</div>
                                @endif


                                <form class="form-horizontal" id="add-donor" action="" method="post">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control image" name="image" id="image"
                                            value="">
                                        <img id="viewImg" src="" width="100px" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Donor Name</label>
                                        <input type="text" class="form-control donor_name" id="name" name="name"
                                            placeholder="Donor Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="mr-2 mb-0">Gender: </label>
                                        <label for="" class="mb-0 mr-2">
                                            <input type="radio" class="mr-1 gender" id="gender" name="gender"
                                                value="male" checked="">
                                            Male
                                        </label>
                                        <label for="" class="mb-0">
                                            <input type="radio" class="mr-1 gender" id="gender" name="gender"
                                                value="female">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control email" id="email" name="email"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" class="form-control phone" id="phone" name="phone"
                                            placeholder="Phone" pattern="([0-9]{10})" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control address" id="address" name="address"
                                            placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pin Code</label>
                                        <input type="number" class="form-control pin_code" id="pin_code" name="pin_code"
                                            placeholder="Pin Code" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">City</label>
                                        <select class="form-control city" name="city_id" id="city_id">
                                            <option value="" selected disabled>Select City</option>
                                            @foreach ($city as $cities)
                                                <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                                            @endforeach




                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">State</label>
                                        <input type="text" class="form-control state" id="state" name="state"
                                            placeholder="State" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Country</label>
                                        <input type="text" class="form-control country" id="country" name="country"
                                            placeholder="Country" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Blood Group</label>
                                        <select class="form-control blood_group" name="group_id" id="group_id">
                                            <option value="" selected disabled>Select Blood Group</option>

                                            @foreach ($group as $groups)
                                                <option value="{{ $groups->id }}">{{ $groups->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <input type="submit" id="addDonor" class="btn btn-primary" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script>
        $(document).ready(function() {
            $("#addDonor").on('click', function(e) {
                e.preventDefault();

                var formData = new FormData();

                var name = $("#name").val()
                var gender = $("#gender").val()
                var email = $("#email").val()
                var phone = $("#phone").val()
                var address = $("#address").val()
                var pin_code = $("#pin_code").val()
                var city_id = $("#city_id").val()
                var state = $("#state").val()
                var country = $("#country").val()
                var group_id = $("#group_id").val()

                var formData = new FormData();
                if (!$("#image")[0].files[0] == "") {
                    formData.append('image', $("#image")[0].files[0]);
                }

                formData.append('name', name);
                formData.append('gender', gender)
                formData.append('email', email)
                formData.append('phone', phone)
                formData.append('address', address)
                formData.append('pin_code', pin_code)
                formData.append('city_id', city_id)
                formData.append('state', state)
                formData.append('country', country)
                formData.append('group_id', group_id)

                $.ajax({
                    url: '/api/donor',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        alert(response.message);
                        window.location.href = '/donor'
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })



            })
        })
    </script>
@endsection
