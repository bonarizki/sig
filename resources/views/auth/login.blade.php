<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIG - Sign In Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('auth/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content shadow">
                <div class="signin-image">
                    <figure><img src="{{ asset('auth/images/signin-image.jpg') }}" alt="sing up image"></figure>
                    <a href="{{ url('register') }}" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign In</h2>
                    <form method="POST" class="register-form" id="login-form" action="{{ url('login') }}">
                        @csrf
                        {{-- <div class="input-group mb-3">
                            <span for="name" class="input-group-text"><i class="zmdi zmdi-account material-icons-name"></i></span>
                            <input type="text" name="name" id="name" placeholder="Your Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="input-group mb-3">
                            <span for="email" class="input-group-text"><i class="zmdi zmdi-account material-icons-name"></i></span>
                            <input type="text" name="email" id="email" placeholder="Your Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span for="password" class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"/>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember" class="agree-term" />
                            <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- JS -->
    <!-- JS -->
    <script src="{{ asset('auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let session = "{{ session('status') }}"
        if (session) {
            Swal.fire(
                'Good job!',
                `${session} <br> please login :)`,
                'success'
            )
        }
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>