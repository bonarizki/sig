<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIG - Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('auth/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" integrity="sha512-Fppbdpv9QhevzDE+UHmdxL4HoW8HantO+rC8oQB2hCofV+dWV2hePnP5SgiWR1Y1vbJeYONZfzQc5iII6sID2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


    <!-- Sign up form -->
    <section class="signup mt-2 ">
        <div class="container">
            <div class="signup-content shadow-lg">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" action="{{ url('register') }}" novalidate>
                        @csrf
                        <div class="input-group mb-3">
                            <span for="name" class="input-group-text"><i class="zmdi zmdi-account material-icons-name"></i></span>
                            <input type="text" name="name" id="name" placeholder="Nama Anda" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span for="nik" class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                            <input type="nik" name="nik" id="nik" placeholder="KTP ID" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"/>
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span for="date_of_birth" class="input-group-text"><i class="zmdi zmdi-cake"></i></span>
                            <input type="date_of_birth" name="date_of_birth" id="date_of_birth" placeholder="Tanggal Lahir" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}"/>
                            @error('date_of_birth')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span for="place_of_birth" class="input-group-text"><i class="zmdi zmdi-cake"></i></span>
                            <input type="place_of_birth" name="place_of_birth" id="place_of_birth" placeholder="Tempat Lahir" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ old('place_of_birth') }}"/>
                            @error('place_of_birth')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span for="email" class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span for="pass" class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            <input type="password" name="pass" id="pass" placeholder="Password" class="form-control @error('pass') is-invalid @enderror" value="{{ old('pass') }}"/>
                            @error('pass')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span for="re-pass" class="input-group-text"><i class="zmdi zmdi-lock-outline"></i></span>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" class="form-control @error('re_pass') is-invalid @enderror" value="{{ old('re_pass') }}"/>
                            @error('re_pass')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{ asset('auth/images/signup-image.jpg') }}" alt="sing up image"></figure>
                    <a href="{{ url('login') }}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>


    <!-- JS -->
    <script src="{{ asset('auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function(){
            $('#date_of_birth').datepicker({
                format: 'yyyy-mm-dd', 
            });
        });
    </script>
</body>
</html>