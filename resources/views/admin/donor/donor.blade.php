@extends('admin.master')

@section('content')
    <div class="message"></div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Donor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Donor</li>
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
                                <h3 class="card-title">Donor List</h3>
                                <a href="{{ route('addDonor') }}" class="btn btn-primary btn-sm float-right">Add
                                    New</a>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('donorPDF') }}" class="btn btn-warning mt-2 mb-4">Download PDF</a>
                                <table id="" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Blood Group</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">

                                        <tr>
                                            <td></td>
                                            <td>

                                                <img src="../images/donor/" width="60px" height="60px"
                                                    style="object-fit: cover;" alt="">

                                                <img src="../images/donor/user.jpg" width="60px" height="60px"
                                                    style="object-fit: cover;" alt="">

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="edit-donor.php?doid=" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" data-doid=""
                                                    class="btn btn-danger btn-sm delete-donor">Delete</a>
                                            </td>
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
                    url: '/api/donor',
                    type: 'GET',
                    beforeSend: function() {
                        $("#data").html(
                            `<tr>
                            <td colspan="7" style="text-align: center;">Please Wait...</td>
                        </tr>`
                        );
                    },
                    success: function(response) {
                        console.log(response);
                        $("#data").empty()
                        $.each(response.donors, function(key, value) {
                            if (value.image != null && value.image != "") {
                                image = `<img src="uploads/${value.image}" width="60px" height="60px"
                                                    style="object-fit: cover;" alt="">`
                            } else {
                                image = ` <img src="../adminimages/images/donor/user.jpg" width="60px" height="60px"
                                                    style="object-fit: cover;" alt="">`
                            }

                            const url = `editDonor/${value.id}`;

                            var output =
                                `
                            <tr>
                                            <td>${value.id}</td>
                                            <td>
                                                ${image}
                                            </td>
                                            <td>${value.name}</td>
                                            <td>${value.email}</td>
                                            <td>${value.phone}</td>
                                            <td>${value.group.name}</td>
                                            <td>
                                                <a href="${url}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" data-doid=""
                                                    class="btn btn-danger btn-sm delete-donor">Delete</a>
                                            </td>
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
