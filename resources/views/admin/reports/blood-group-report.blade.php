@extends('admin.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blood Group Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blood Group Report</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Blood Group Report</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" id="blood-group-report" action="" method="post">
                                    <div class="form-group">
                                        <label for="">Blood Group</label>
                                        <select class="form-control blood_group" name="group_id" id="group_id">
                                            <option value="all" selected>All Blood Group</option>
                                            @foreach ($group as $groups)
                                                <option value="{{ $groups->id }}">{{ $groups->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

        <section class="content blood-report">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="card-title">Blood Group Report List</h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <button class="btn btn-warning mt-2 mb-4" id="groupPDF">Download PDF</button>

                                <table id="" class="blood-table table table-bordered table-hover"
                                    style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Photo</th>
                                            <th>Donor Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Blood Group</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">

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

            function fetchData(group_id) {
                $.ajax({
                    url: `/reportInfo/${group_id}`,
                    type: 'GET',
                    data: {
                        group_id: group_id
                    },
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
                        $.each(response.donors, function(key, value) {
                            let image;
                            if (value.image != null && value.image != "") {
                                image = `<img src="uploads/${value.image}" alt="" width="60px">`
                            } else {
                                image =
                                    `<img src="../adminimages/images/donor/user.jpg" alt="" width="60px">`
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
                                <td>${value.group.name}</td>
                            </tr>
                            `;
                            $("#data").append(output);
                        });
                    }
                });
            }

            fetchData("all");

            $("#group_id").on('change', function() {
                var group_id = $(this).val();
                fetchData(group_id);
            });


            $("#groupPDF").on('click', function() {
                var group_id = $("#group_id").val();

                const url = `groupPDF?group_id=${group_id}`

                window.location.href = url;
            })
        });
    </script>
@endsection
