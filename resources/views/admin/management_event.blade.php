@extends('master.admin.admin')

@section('title','Management Event')
    
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dahsboard /</span> Management Event</h4>

        <div class="card">
            <h5 class="card-header">Management Event</h5>
            <div class="card-body">
                <button type="button" class="btn btn-primary mb-2" onclick="showModal('add')">
                    <span class="tf-icons bx bx-user-plus"></span>&nbsp; Add Event
                </button>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="table" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" class="align-middle">#</th>
                                <th rowspan="2" class="align-middle">Event Name</th>
                                <th rowspan="2" class="align-middle">Event Date</th>
                                <th colspan="2"><center>Option</center></th>
                            </tr>
                            <tr>
                                <th><center>Edit</center></th>
                                <th><center>Delete</center></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Large Modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form">
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label class="form-label">Event Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-book"></i></span>
                                        <input type="text" id="event_name" name="event_name" class="form-control"
                                            placeholder="event Name"
                                            name="event_name" />
                                    </div>
                                    <div class="form-text text-danger" id="event_name_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label class="form-label">Event of Date</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-calendar"></i></span>
                                        <input type="text" id="event_of_date" class="form-control date"
                                            placeholder="Event of Date"
                                            name="event_of_date" />
                                    </div>
                                    <div class="form-text text-danger" id="event_of_date_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label class="form-label">Slug</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-book"></i></span>
                                        <input type="text" id="slug" name="slug" class="form-control"
                                            placeholder="Slug"
                                            name="slug" />
                                    </div>
                                    <div class="form-text text-danger" id="slug_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label class="form-label">Excert</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-book"></i></span>
                                        <input type="text" id="excert" name="excert" class="form-control"
                                            placeholder="Excert"
                                            name="excert" />
                                    </div>
                                    <div class="form-text text-danger" id="excert_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label class="form-label">Content</label>
                                    <div class="input-group input-group-merge basic-default-message">
                                        <span class="input-group-text">
                                            <i class="bx bx-book"></i>
                                        </span>
                                        <textarea id="event_content" name="event_content" class="form-control" 
                                        placeholder="About Event">

                                        </textarea>
                                    </div>
                                    <div class="form-text text-danger" id="event_content_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="col-md">
                                        <label class="form-label" >Content Photo</label>
                                        <input type="file" class="my-pond" name="content_photo"/>
                                    </div>
                                    <div class="form-text text-danger" id="content_photo_alert"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary" id="submit">Saves</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

@section('footer')
    <script>
        $.fn.filepond.registerPlugin(FilePondPluginImagePreview);


        $(document).ready(function () {
            $('.date').datepicker({
                format: 'yyyy-mm-dd',
            });
        });

        $('#management-event').addClass('active');

        $(`#table`).DataTable({
            destroy: true,
            ajax: {
                url: "{{ url('management-event') }}",
                type: "get",
            },
            columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex"
                },
                {
                    data: "event_name",
                    name: "event_name"
                },
                {
                    data: "event_of_date",
                    name: "event_of_date"
                },
                {
                    data: "id",
                    name: "id",
                    render: (data) => {
                        return `<center>
                                <span class='bx bxs-edit' onclick="showModal('edit','${data}')"></span>
                            </center>`;
                    }
                },
                {
                    data: "id",
                    name: "id",
                    render: (data) => {
                        return `<center>
                                <span class='bx bxs-trash' onclick="alertDelete('${data}')"></span>
                            </center>`;
                    }
                },
            ],
        });

        const alertDelete = (id) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    deleteProcess(id)
                }
            })
        }

        const deleteProcess = (id) => {
            $.ajax({
                type : "delete",
                url : "{{ url('management-event') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : (res) => {
                    sweetSuccess(res.status,res.message)
                },
                error : (res) => {
                    errorHandle(res)
                },
                complete : () => {
                    $(`#table`).DataTable().ajax.reload();
                    $('#form')[0].reset()
                }
            })
        }

        const showModal = (type, id) => {
            $('.text-danger').empty()
            $('.is-invalid').removeClass('is-invalid')
            $('#form')[0].reset()
            $('.my-pond').filepond();
            if (type == 'add') {
                $('.modal-title').text('Form Add Event');
                $('#modal').modal('show');
                $('#submit').attr('onclick', 'add()');
            } else {
                $('.modal-title').text('Form Edit Event');
                edit(id)
            }
        }

        const add = () => {
            let file = $(`.my-pond`).filepond('getFiles');
            let formData = new FormData($('#form').get(0));
            if (file.length != 0) {
                formData.append('image', file[0].file, file[0].file.file_name);
            }

            $.ajax({
                type: "POST",
                url: "{{ url('management-event') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: (res) => {
                    sweetSuccess(res.status,res.message)
                    $(`#table`).DataTable().ajax.reload();
                    $('#modal').modal('hide');
                },
                error: (res) => {
                    errorHandle(res)
                },
            })
        }

        const edit = (id) => {
            $.ajax({
                url: `{{ url('management-event') }}/${id}/edit`,
                success: (res) => {
                    let data = res.data;
                    $('#event_name').val(data.event_name);
                    $('#event_content').val(data.event_content);
                    $('#slug').val(data.slug);
                    $('#excert').val(data.excert);
                    $('#event_of_date').val(data.event_of_date);
                    showImage(data)
                    $('#submit').attr('onclick', `update(${id})`);
                    $('#modal').modal('show');
                },
                error: (res) => {
                    errorHandle(res)
                },
            })
        }

        const showImage = (data) => {
            $('.my-pond').filepond();
            if (data.event_image != null) {
                $('.my-pond').filepond('addFile', `{{asset('upload/event/${data.event_image}')}}`)
                    .then(function (file) {

                    });
            }
        }

        const update = (id) => {
            let file = $(`.my-pond`).filepond('getFiles');
            let formData = new FormData($('#form').get(0));
            if (file.length != 0) {
                formData.append('image', file[0].file, file[0].file.name);
            }
            formData.append('id',id);
            $.ajax({
                type: "post",
                url: "{{ url('event-update') }}",
                data: formData,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: (res) => {
                    sweetSuccess(res.status, res.message)
                    $(`#table`).DataTable().ajax.reload();
                    $('#modal').modal('hide');
                },
                error: (res) => {
                    errorHandle(res)
                },
            })
        }
    </script>
@endsection