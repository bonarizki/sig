@extends('master.admin.admin')

@section('title','Dashboard Admin')
    
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>Welcome Admin</h1>
    </div>
    <!-- / Content -->
   
@endsection

@section('footer')
    <script>
        $('#dashboard').addClass('active');
    </script>
@endsection