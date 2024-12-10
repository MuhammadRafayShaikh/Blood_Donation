@extends('master')

@section('content')
    <div class="content">
        <div class="container-xl container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="my-profile">
                        <div class="card" style="background-color:transparent;border:none;">
                            <div class="card-header mb-4 bg-white">
                                <h3 class="card-title d-inline-block mb-0">Donor List</h3>
                                <a href="index.php" class="btn btn1 btn-sm float-right">Change City / Blood Group</a>
                            </div>
                            <input type="hidden" id="check_user" name="check_user" value="{{ Auth::check() }}">
                            <input type="hidden" id="group_id" value="{{ $group_id }}">
                            <input type="hidden" id="city_id" value="{{ $city_id }}">
                            <div class="card-body bg-white mb-4">
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
                                            </tbody>
                                        </table>

                                        <a href="" class="btn btn1">Get Contact</a>

                                        <a href="" class="btn btn1 mb-1">Get Contact</a>
                                        <small class="mx-2 mb-0 d-block">If you want more details about this donor please
                                            login with your account.</small>

                                    </div>
                                    <div class="col-md-3"></div>
                                </div>

                            </div>

                            <div id="error"></div>

                            <div class="pagination-outer">

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

                var group_id = $("#group_id").val();
                var city_id = $("#city_id").val();

                $.ajax({
                    url: '/api/searchDonor',
                    type: 'GET',
                    data: {
                        group_id: group_id,
                        city_id: city_id
                    },
                    success: function(response) {

                        $("#data").empty();

                        if (!response.error) {
                            console.log(response);
                            $.each(response, function(key, value) {
                                const url = `/contact/${value.id}`
                                var check_user = $("#check_user").val();
                                if (check_user != "") {
                                    msg = `<a href="${url}" class="btn btn1">Get Contact</a>`
                                } else {
                                    msg = `<a href="${url}" class="btn btn1 mb-1">Get Contact</a>
                                        <small class="mx-2 mb-0 d-block">If you want more details about this donor please
                                            login with your account.</small>`
                                }
                                if (value.image != null && value.image != "") {
                                    image = ` <img src="uploads/${value.image}" alt="">`
                                } else {
                                    image =
                                        `<img src="./adminimages/images/donor/user.jpg" alt="">`
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
                                                    <td><b>Full Name: ${value.name}</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Blood Group: ${value.group.name}</b></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        ${msg}
                                        

                                    </div>
                                    <div class="col-md-3"></div>

                            `

                                $("#data").append(output)

                            })
                        } else {
                            $(".card-body").remove();
                            $("#error").empty();
                            var error = `<h3 class="bg-white p-3">No Record Found</h3>`;
                            $("#error").append(error);
                        }
                    }
                })
            }
            loadData()
        })
    </script>
@endsection
