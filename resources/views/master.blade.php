<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>
    <title></title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-sm-6">
                    <h2 class="m-0"><a href="index.php" class="site-title"></a></h2>
                </div>

                <div class="col-lg-8 col-sm-6 d-flex justify-content-end login-btn">
                    @if (Auth::check())
                        <div class="dropdown">
                            <button class="btn btn1 dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello, {{ Auth::user()->name }}
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item logout" type="submit">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn1 btn">Login</a>
                        <a href="{{ route('register') }}" class="btn1 btn">Sign Up</a>
                    @endif

                </div>
            </div>
        </div>
    </div>





    @yield('content')







    <footer class="footer">
        <strong>Copyright &copy; <a href="https://muhammadrafayshaikh.github.io/Monument/" target="blank">Muhammad Rafay
                Shaikh</a></strong>
    </footer>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/actions.js') }}"></script>
    <script>
        $(document).ready(function() {
            // load image with jquery
            $('.image').change(function() {
                readURL(this);
            });

            // preview image before upload
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

        });

        //Display Select Box when Checkbox is Checked
        function myFunction() {
            var checkBox = document.getElementById("myCheckbox");
            var blood_group = document.getElementById("blood_group");
            if (checkBox.checked == true) {
                blood_group.style.display = "block";
            } else {
                blood_group.style.display = "none";
            }
        }
    </script>

</body>

</html>
