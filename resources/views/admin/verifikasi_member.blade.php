@extends('master.admin.admin')

@section('title','Verifikasi Member')
    
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dahsboard /</span> Verifikasi Member</h4>

        <div class="card">
            <h5 class="card-header">Member Need Verification</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="table" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2">Nama</th>
                                <th rowspan="2">Date of Birth</th>
                                <th rowspan="2">Place of Birth</th>
                                <th rowspan="2">Email</th>
                                <th rowspan="2">Id Card</th>
                                <th colspan="2"><center>Option</center></th>
                            </tr>
                            <tr>
                                <th>Approve</th>
                                <th>Reject</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

@section('footer')
    <script>
        $('#verifikasi-member').addClass('active');

        $('#table').DataTable({
            ajax : {
                url : "{{ url('verifikasi-member') }}",
                type : "get"
            },
            columns:[{
                data:"DT_RowIndex",
                name:"DT_RowIndex"
            },
            {
                data:"name",
                name:"name"
            },
            {
                data:"date_of_birth",
                name:"date_of_birth"
            },
            {
                data:"place_of_birth",
                name:"place_of_birth"
            },
            {
                data:"email",
                name:"email"
            },
            {
                data:"id_card",
                name:"id_card"
            },
            {
                data:"id",
                name:"id",
                render : (data) => {
                    return `<center>
                                <span class='bx bxs-user-check' onclick="alert('approve','${data}')"></span>
                            </center>`;
                }
            },
            {
                data:"id",
                name:"id",
                render : (data) => {
                    return `<center>
                                <span class='bx bxs-user-x' onclick="alert('reject','${data}')"></span>
                            </center>`;
                }
            }]

        });

        const alert = (type,id) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, ${type} it!`
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"put",
                        url :"{{ url('verifikasi-member') }}/" + id,
                        data : {
                            status_member : type
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success : (res) => {
                            sweetSuccess(res)
                        },
                        complete : () => {
                            $(`#table`).DataTable().ajax.reload();
                        }
                    })
                }
            })
        }

        const sweetSuccess = (res) => {
            Swal.fire(
                'Good job!',
                res.message,
                'success'
            );
        }
    </script>
@endsection