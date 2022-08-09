<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIG - Add Family Data</title>

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
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="form-title">Add Family</h2>
                    <form method="post" class="register-form" id="register-form" action="{{ url('add-parent') }}" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span for="name_father" class="input-group-text"><i
                                            class="zmdi zmdi-account material-icons-name"></i></span>
                                    <input type="text" name="name_father" id="name_father" placeholder="Father Name"
                                        class="form-control @error('name_father') is-invalid @enderror"
                                        value="{{ old('name_father') }}" />
                                    @error('name_father')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="id_card_father" class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                                    <input type="id_card_father" name="id_card_father" id="id_card_father" placeholder="ID Number Father"
                                        class="form-control @error('id_card_father') is-invalid @enderror" value="{{ old('id_card_father') }}" />
                                    @error('id_card_father')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="date_of_birth_father" class="input-group-text"><i class="zmdi zmdi-cake"></i></span>
                                    <input type="date_of_birth_father" name="date_of_birth_father" id="date_of_birth_father"
                                        placeholder="Date Of Birth Father"
                                        class="form-control date @error('date_of_birth_father') is-invalid @enderror"
                                        value="{{ old('date_of_birth_father') }}" />
                                    @error('date_of_birth_father')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="place_of_birth_father" class="input-group-text"><i
                                            class="zmdi zmdi-cake"></i></span>
                                    <input type="place_of_birth_father" name="place_of_birth_father" id="place_of_birth_father"
                                        placeholder="Place Of Birth Father"
                                        class="form-control @error('place_of_birth_father') is-invalid @enderror"
                                        value="{{ old('place_of_birth_father') }}" />
                                    @error('place_of_birth_father')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="phone_number_father" class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                    <input type="text" name="phone_number_father" id="phone_number_father" placeholder="Phone Number Father"
                                        class="form-control @error('phone_number_father') is-invalid @enderror"
                                        value="{{ old('phone_number_father') }}" />
                                    @error('phone_number_father')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="address_father" class="input-group-text"><i class="zmdi zmdi-text"></i></span>
                                    <textarea id="address_father" name="address_father"
                                        class="form-control @error('address_father') is-invalid @enderror"
                                        placeholder="Address Father"
                                    ></textarea>
                                    @error('address_father')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span for="name_mother" class="input-group-text"><i
                                            class="zmdi zmdi-account material-icons-name"></i></span>
                                    <input type="text" name="name_mother" id="name_mother" placeholder="Mother Name"
                                        class="form-control @error('name_mother') is-invalid @enderror"
                                        value="{{ old('name_mother') }}" />
                                    @error('name_mother')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="id_card_mother" class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                                    <input type="id_card_mother" name="id_card_mother" id="id_card_mother" placeholder="ID Number Mother"
                                        class="form-control @error('id_card_mother') is-invalid @enderror" value="{{ old('id_card_mother') }}" />
                                    @error('id_card_mother')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="date_of_birth_mother" class="input-group-text"><i class="zmdi zmdi-cake"></i></span>
                                    <input type="date_of_birth_mother" name="date_of_birth_mother" id="date_of_birth_mother"
                                        placeholder="Date Of Birth Mother"
                                        class="form-control date @error('date_of_birth_mother') is-invalid @enderror"
                                        value="{{ old('date_of_birth_mother') }}" />
                                    @error('date_of_birth_mother')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="place_of_birth_mother" class="input-group-text"><i
                                            class="zmdi zmdi-cake"></i></span>
                                    <input type="place_of_birth_mother" name="place_of_birth_mother" id="place_of_birth_mother"
                                        placeholder="Place Of Birth Mother"
                                        class="form-control @error('place_of_birth_mother') is-invalid @enderror"
                                        value="{{ old('place_of_birth_mother') }}" />
                                    @error('place_of_birth_mother')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="phone_number_mother" class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                    <input type="text" name="phone_number_mother" id="phone_number_mother" placeholder="Phone Number Mother"
                                        class="form-control @error('phone_number_mother') is-invalid @enderror"
                                        value="{{ old('phone_number_mother') }}" />
                                    @error('phone_number_mother')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span for="address_mother" class="input-group-text"><i class="zmdi zmdi-text"></i></span>
                                    <textarea id="address_mother" name="address_mother"
                                        class="form-control @error('address_mother') is-invalid @enderror""
                                        placeholder="Address Mother"
                                    ></textarea>
                                    @error('address_mother')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </div>
                    </form>
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
            $('.date').datepicker({
                format: 'yyyy-mm-dd', 
            });
        });
    </script>
</body>
</html>