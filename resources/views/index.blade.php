@extends('master')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="site-logo">
                        <img src="./admin/images/site-logo/" alt="">
                    </div>

                    <div class="site-logo">
                        <h2 class="m-0" style="color:#fff;font-weight:700;"></h2>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="blood-form">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">City</label>
                                        <select class="form-control city" name="city_id" id="city_id">
                                            <option value="" selected disabled>Select City</option>
                                            @foreach ($city as $cities)
                                                <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Blood Group</label>
                                        <select class="form-control blood_group" name="group_id" id="group_id">
                                            <option value="" selected disabled>Select Blood Group</option>

                                            @foreach ($group as $groups)
                                                <option value="{{ $groups->id }}">{{ $groups->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <label for=""></label>
                                    <input type="submit" id="searchDonors" class="btn1 btn btn mt-3" value="Search">
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $("#searchDonors").on('click', function() {
                var city_id = $("#city_id").val();
                var group_id = $("#group_id").val();

                const url = `/search?group_id=${group_id}&city_id=${city_id}`;

                window.location.href = url;
            })
        })
    </script>
@endsection
