@extends('admin.master')

@section('content')
    <div class="message"></div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Donor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Donor</li>
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
                                <h3 class="card-title">Edit Donor</h3>
                                <a href="donor.php" class="btn btn-success btn-sm float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                    Donor List
                                </a>
                            </div>
                            <div class="card-body">

                                <form class="form-horizontal" id="edit-donor" action="" method="post">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file"
                                            onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])"
                                            class="form-control new_logo image" id="new_image" name="new_image" />
                                        <input type="hidden" class="old_logo image" name="old_image" id="old_image"
                                            value="{{ $donor->image }}">

                                        @if ($donor->image != null)
                                            <img id="image" src="{{ '/uploads/' . $donor->image }}" width="100px" />
                                        @else
                                            <img id="image" src="../images/donor/" width="100px" />
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Donor Name</label>
                                        <input type="hidden" name="id" id="donor_id" value="{{ $donor->id }}"
                                            required>
                                        <input type="text" class="form-control donor_name" id="name" name="name"
                                            placeholder="Donor Name" value="{{ $donor->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="mr-2 mb-0">Gender: </label>

                                        @if ($donor->gender == 'male')
                                            <label for="" class="mb-0 mr-2">
                                                <input type="radio" class="mr-1 gender" name="gender" id="gender"
                                                    value="male" checked="">
                                                Male
                                            </label>
                                            <label for="" class="mb-0 mr-2">
                                                <input type="radio" class="mr-1 gender" name="gender" id="gender"
                                                    value="female">
                                                Female
                                            </label>
                                        @else
                                            <label for="" class="mb-0 mr-2">
                                                <input type="radio" class="mr-1 gender" name="gender" id="gender"
                                                    value="male">
                                                Male
                                            </label>
                                            <label for="" class="mb-0">
                                                <input type="radio" class="mr-1 gender" name="gender" id="gender"
                                                    value="female" checked="">
                                                Female
                                            </label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control email" name="email" id="email"
                                            placeholder="Email" value="{{ $donor->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" id="phone" class="form-control phone" name="phone"
                                            placeholder="Phone" value="{{ $donor->phone }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control address" id="address" name="address"
                                            placeholder="Address" value="{{ $donor->address }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pin Code</label>
                                        <input type="number" class="form-control pin_code" id="pin_code"
                                            name="pin_code" placeholder="Pin Code" value="{{ $donor->pin_code }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">City</label>

                                        <select class="form-control city" name="city_id" id="city_id">
                                            @foreach ($city as $cities)
                                                <option
                                                    @if ($donor->city_id == $cities->id) {{ 'selected' }} @else {{ '' }} @endif
                                                    value="{{ $cities->id }}">{{ $cities->name }}</option>
                                            @endforeach


                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="">State</label>
                                        <input type="text" class="form-control state" id="state" name="state"
                                            placeholder="State" value="{{ $donor->state }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Country</label>
                                        <input type="text" class="form-control country" id="country" name="country"
                                            placeholder="Country" value="{{ $donor->country }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Blood Group</label>

                                        <select class="form-control blood_group" name="group_id" id="group_id">
                                            @foreach ($groups as $group)
                                                <option
                                                    @if ($donor->group_id == $group->id) {{ 'selected' }} @else
                                                    {{ '' }} @endif
                                                    value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <input type="submit" id="editDonor" class="btn btn-primary" value="Update">
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
            $("#editDonor").on('click', function(e) {
                e.preventDefault();

                var formData = new FormData();

                var id = $("#donor_id").val();
                var name = $("#name").val();
                var gender = $("#gender").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var address = $("#address").val();
                var pin_code = $("#pin_code").val();
                var city_id = $("#city_id").val();
                var state = $("#state").val();
                var country = $("#country").val();
                var group_id = $("#group_id").val();

                formData.append('name', name);
                formData.append('gender', gender);
                formData.append('email', email);
                formData.append('phone', phone);
                formData.append('address', address);
                formData.append('pin_code', pin_code);
                formData.append('city_id', city_id);
                formData.append('state', state);
                formData.append('country', country);
                formData.append('group_id', group_id);

                if (!$("#new_image")[0].files[0] == "") {
                    formData.append('new_image', $("#new_image")[0].files[0]);
                } else {
                    formData.append('old_image', $("#old_image").val())
                }

                $.ajax({
                    url: `/api/donor/${id}`,
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-HTTP-Method-Override': 'PUT'
                    },
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        alert(response.message)
                        window.location.href = '/donor';
                    }
                })

            })
        })
    </script>
@endsection
