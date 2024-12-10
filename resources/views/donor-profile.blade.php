@extends('master')

@section('content')
    <div class="content">
        <div class="container-xl container-fluid-md">
            <div class="row">
                <div class="col-md-12">
                    <div class="my-profile">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title d-inline-block mb-0">Donor Profile</h3>
                                <!-- <a href="update-profile.php" class="btn btn1 btn-sm float-right">Update Profile</a> -->
                            </div>

                            <input type="hidden" id="donor_id" name="donor_id" value="{{ $donor->id }}">

                            <div class="card-body">
                                <div class="row" id="data">
                                    <div class="col-lg-3 col-md-4 col-sm-5">
                                        <div class="user-img">

                                            <img src="./admin/images/donor/" alt="">

                                            <img src="./admin/images/donor/user.jpg" alt="">

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-7">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><b>Full Name:</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Blood Group:</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Phone Number:</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>City:</b></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            function loadData() {
                var donor_id = $("#donor_id").val();

                $.ajax({
                    url: `/contactInfo/${donor_id}`,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);

                        $("#data").empty();

                        if (response.donor.image != null && response.donor.image != "") {
                            image = `<img src="/uploads/${response.donor.image}" alt="">`
                        } else {
                            image = `<img src="../adminimages/images/donor/user.jpg" alt="">`
                        }


                        var output =
                            `
                        <div class="col-lg-3 col-md-4 col-sm-5">
                                        <div class="user-img">
                                            ${image}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-7">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><b>Full Name: ${response.donor.name}</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Blood Group: ${response.donor.group.name}</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Phone Number: ${response.donor.phone}</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>City: ${response.donor.city.name}</b></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                        `
                        $("#data").append(output)



                    }
                })
            }
            loadData();
        })
    </script>
@endsection
