@extends('admin.master')

@section('content')
    <div class="message"></div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>City</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">City</li>
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
                                <h3 class="card-title">City List</h3>
                                <a href="{{ route('admin.add-city') }}" class="btn btn-primary btn-sm float-right">Add
                                    New</a>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('cityPDF') }}" class="btn btn-warning mt-2 mb-4">Download PDF</a>
                                <table id="" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>City Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="edit-city.php?ctid=" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" data-ctid=""
                                                    class="btn btn-danger btn-sm delete-city">Delete</a>
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
                    url: 'api/city',
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

                        $("#data").empty();

                        $.each(response.city, function(key, value) {
                            const url = `editCity/${value.id}`;
                            var output =
                                `
                            <tr>
                                            <td>${value.id}</td>
                                            <td>${value.name}</td>
                                            <td>
                                                <a href="${url}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" data-ctid=""
                                                    class="btn btn-danger btn-sm delete-city">Delete</a>
                                            </td>
                            </tr>

                            `
                            $("#data").append(output)
                        })
                    }
                })
            }
            loadData();
        })
    </script>
@endsection
