@extends('admin.master')

@section('content')
    <div class="message"></div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                                <h3 class="card-title">User List</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('userPDF') }}" class="btn btn-warning mt-2 mb-4">Download PDF</a>
                                <table id="" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">

                                        <tr>
                                            <td></td>
                                            <td>

                                                <img src="../../images/" width="60px" height="60px"
                                                    style="object-fit: cover;" alt="">

                                                <img src="../../images/user.jpg" width="60px" height="60px"
                                                    style="object-fit: cover;" alt="">

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script>
        $(document).ready(function() {
            function loadData() {
                $.ajax({
                    url: 'api/user',
                    type: 'GET',
                    beforeSend: function() {
                        $("#data").html(
                            `<tr>
                            <td colspan="7" style="text-align: center;">Please Wait...</td>
                        </tr>`
                        );
                    },
                    success: function(response) {
                        $("#data").empty();

                        $.each(response.users, function(key, value) {
                            if (value.image != null && value.image != "") {
                                image = `<img src="uploads/${value.image}" width="60px" height="60px"
                                                    style="object-fit: cover;" alt="">`
                            } else {
                                image = ` <img src="../../images/user.jpg" width="60px" height="60px"
                                                    style="object-fit: cover;" alt="">`
                            }
                            var output =
                                `
                            <tr>
                                            <td>${value.id}</td>
                                            <td>${image}</td>
                                            <td>${value.name}</td>
                                            <td>${value.email}</td>
                                            <td>${value.phone}</td>
                                            <td>${value.city.name}</td>
                            </tr>

                            `
                            $("#data").append(output)
                        })
                    }
                })
            }
            loadData()
        })
    </script>
@endsection
