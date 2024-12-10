@extends('admin.master')

@section('content')
    <div class="message"></div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit City</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit City</li>
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
                                <h3 class="card-title">Edit City</h3>
                                <a href="city.php" class="btn btn-success btn-sm float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                    City List
                                </a>
                            </div>
                            <div class="card-body">

                                <form class="form-horizontal" id="edit-city" action="" method="post">
                                    <div class="form-group">
                                        <label for="">City Name</label>
                                        <input type="hidden" id="city_id" name="id" value="{{ $city->id }}">
                                        <input type="text" id="name" class="form-control city" name="name"
                                            placeholder="City Name" value="{{ $city->name }}" required>
                                    </div>
                                    <input type="submit" id="editCity" class="btn btn-primary" value="Save">
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
            $("#editCity").on('click', function(e) {
                e.preventDefault();

                var id = $("#city_id").val();
                var name = $("#name").val();

                $.ajax({
                    url: `/api/city/${id}`,
                    type: 'POST',
                    data: {
                        id: id,
                        name: name
                    },
                    headers: {
                        'X-HTTP-Method-Override': 'PUT'
                    },
                    success: function(response) {
                        // console.log(response);
                        alert(response.message)
                        window.location.href = '/city'
                    }
                })
            })
        })
    </script>
@endsection
