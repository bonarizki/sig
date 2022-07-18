@extends('master.admin.admin')

@section('title','Management Member')
    
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dahsboard /</span> Management Member</h4>

        <div class="col-xl">
            <h6 class="text" id="info-card"></h6>
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#tab-active" aria-controls="tab-active"
                            aria-selected="true" onclick="getDataMember('active')">
                            <i class="tf-icons bx bx-user-check"></i> Active
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#tab-inactive" aria-controls="tab-inactive"
                            aria-selected="false" onclick="getDataMember('inactive')">
                            <i class="tf-icons bx bx-user-x" ></i> Inactive
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tab-active" role="tabpanel">
                        <button type="button" class="btn btn-primary mb-2" onclick="showModal('add')">
                            <span class="tf-icons bx bx-user-plus"></span>&nbsp; Add User
                        </button>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered" id="table-active" width="100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Nama</th>
                                        <th rowspan="2">Date of Birth</th>
                                        <th rowspan="2">Place of Birth</th>
                                        <th rowspan="2">Email</th>
                                        <th rowspan="2">Member Status</th>
                                        <th colspan="3"><center>Option</center></th>
                                    </tr>
                                    <tr>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Reverse</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-inactive" role="tabpanel">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered" id="table-inactive" width="100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Nama</th>
                                        <th rowspan="2">Date of Birth</th>
                                        <th rowspan="2">Place of Birth</th>
                                        <th rowspan="2">Email</th>
                                        <th rowspan="2">Member Status</th>
                                        <th colspan="3"><center>Option</center></th>
                                    </tr>
                                    <tr>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Reverse</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                            <div class="divider">
                                <div class="divider-text">Data Member</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label class="form-label">Full Name</label>
                                    <div class="input-group input-group-merge">
                                        <span  class="input-group-text">
                                            <i class="bx bx-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Full Name" 
                                            aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                    <div class="form-text text-danger" id="name_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label class="form-label" >ID Number</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-id-card"></i>
                                        </span>
                                        <input type="text" id="id_card" name="id_card" class="form-control"
                                            placeholder="ID NUMBER"
                                            name="id_card" />
                                    </div>
                                    <div class="form-text text-danger" id="id_card_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label class="form-label">Date of Birth</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-cake"></i></span>
                                        <input type="text" id="date_of_birth" class="form-control date"
                                            placeholder="Date of Birth"
                                            name="date_of_birth" />
                                    </div>
                                    <div class="form-text text-danger" id="date_of_birth_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label class="form-label">Place of Birth</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-id-card"></i></span>
                                        <input type="text" id="place_of_birth" class="form-control"
                                            placeholder="Place of Birth"
                                            name="place_of_birth" />
                                    </div>
                                    <div class="form-text text-danger" id="place_of_birth_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-envelope"></i>
                                        </span>
                                        <input type="text" id="email" class="form-control"
                                            placeholder="john.doe" aria-label="john.doe"
                                            name="email" />
                                        
                                    </div>
                                    <div class="form-text text-danger" id="email_alert"></div>
                                </div>
                                <div class="col-md">
                                    <label class="form-label">Phone No</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-phone"></i></span>
                                        <input type="text" id="phone_number" class="form-control phone-mask"
                                            placeholder="658 799 8941"
                                            name="phone_number" />
                                    </div>
                                    <div class="form-text text-danger" id="phone_number_alert"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Proffesion</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-envelope"></i>
                                        </span>
                                        <input type="text" id="proffesion" class="form-control"
                                            placeholder="john.doe" aria-label="john.doe"
                                            name="proffesion" />
                                        
                                    </div>
                                    <div class="form-text text-danger" id="proffesion_alert"></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="basic-icon-default-phone">Role</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-user"></i></span>
                                        <select name="role" id="role" class="form-select">
                                            <option value="">Choose . . .</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                    <div class="form-text text-danger" id="role_alert"></div>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <div class="col-md">
                                    <label class="form-label" >Adress</label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="address" name="address"
                                            class="form-control"
                                            placeholder="Address"
                                        ></textarea>
                                    </div>
                                    <div class="form-text text-danger" id="addresss_alert"></div>
                                </div>
                                <div class="col-md">
                                    <label class="form-label" >member Photo</label>
                                    <input type="file" class="my-pond" name="user_profil"/>
                                </div>
                            </div>

                            {{-- divider --}}
                            <div class="divider">
                                <div class="divider-text">Data Member Parents</div>
                            </div>
                            {{-- end devider --}}

                            <div class="row">
                                {{-- form father form --}}
                                <div class="col-md-6">
                                    <div class="divider">
                                        <div class="divider-text">Data Father</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label">Full Name</label>
                                            <div class="input-group input-group-merge">
                                                <span  class="input-group-text">
                                                    <i class="bx bx-user"></i>
                                                </span>
                                                <input type="text" class="form-control" id="name_father" name="name_father"
                                                    placeholder="Full Name" 
                                                    name="basic-icon-default-fullname2" />
                                            </div>
                                            <div class="form-text text-danger" id="name_father_alert"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label" >ID Number</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bx bx-id-card"></i>
                                                </span>
                                                <input type="text" id="id_card_father" class="form-control"
                                                    placeholder="ID NUMBER"
                                                    name="id_card_father" />
                                            </div>
                                            <div class="form-text text-danger" id="id_card_father_alert"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label">Date of Birth</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bx bx-cake"></i></span>
                                                <input type="text" id="date_of_birth_father" class="form-control date"
                                                    placeholder="Date of Birth"
                                                    name="date_of_birth_father" />
                                            </div>
                                            <div class="form-text text-danger" id="date_of_birth_father_alert"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label">Place of Birth</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bx bx-id-card"></i></span>
                                                <input type="text" id="place_of_birth_father" class="form-control"
                                                    placeholder="Place of Birth"
                                                    name="place_of_birth_father" />
                                            </div>
                                            <div class="form-text text-danger" id="place_of_birth_father_alert"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label">Phone No</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bx bx-phone"></i></span>
                                                <input type="text" id="phone_number_father" name="phone_number_father" class="form-control phone-mask"
                                                    placeholder="658 799 8941"
                                                    name="phone_number_father" />
                                            </div>
                                            <div class="form-text text-danger" id="phone_number_father_alert"></div>
                                        </div>
                                    </div>
                                    <div class=" row mb-3">
                                        <label class="form-label" >Adress</label>
                                        <div class="input-group input-group-merge">
                                            <textarea id="address_father" name="address_father"
                                                class="form-control"
                                                placeholder="Address"
                                            ></textarea>
                                        </div>
                                        <div class="form-text text-danger" id="address_father_alert"></div>
                                    </div>
                                </div>
                                {{--end form father form --}}

                                {{-- form mother form --}}
                                <div class="col-md-6">
                                    <div class="divider">
                                        <div class="divider-text">Data mother</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label">Full Name</label>
                                            <div class="input-group input-group-merge">
                                                <span  class="input-group-text">
                                                    <i class="bx bx-user"></i>
                                                </span>
                                                <input type="text" class="form-control" id="name_mother" name="name_mother"
                                                    placeholder="Full Name" 
                                                    name="basic-icon-default-fullname2" />
                                            </div>
                                            <div class="form-text text-danger" id="name_mother_alert"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label" >ID Number</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bx bx-id-card"></i>
                                                </span>
                                                <input type="text" id="id_card_mother" class="form-control"
                                                    placeholder="ID NUMBER"
                                                    name="id_card_mother" />
                                            </div>
                                            <div class="form-text text-danger" id="id_card_mother_alert"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label">Date of Birth</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bx bx-cake"></i></span>
                                                <input type="text" id="date_of_birth_mother" class="form-control date"
                                                    placeholder="Date of Birth"
                                                    name="date_of_birth_mother" />
                                            </div>
                                            <div class="form-text text-danger" id="date_of_birth_mother_alert"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label">Place of Birth</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bx bx-id-card"></i></span>
                                                <input type="text" id="place_of_birth_mother" class="form-control"
                                                    placeholder="Place of Birth"
                                                    name="place_of_birth_mother" />
                                            </div>
                                            <div class="form-text text-danger" id="place_of_birth_mother_alert"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label class="form-label">Phone No</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bx bx-phone"></i></span>
                                                <input type="text" id="phone_number_mother" name="phone_number_mother" class="form-control phone-mask"
                                                    placeholder="658 799 8941"
                                                    name="phone_number_mother" />
                                            </div>
                                            <div class="form-text text-danger" id="phone_number_mother_alert"></div>
                                        </div>
                                    </div>
                                    <div class=" row mb-3">
                                        <label class="form-label" >Adress</label>
                                        <div class="input-group input-group-merge">
                                            <textarea id="address_mother" name="address_mother"
                                                class="form-control"
                                                placeholder="Address"
                                            ></textarea>
                                        </div>
                                        <div class="form-text text-danger" id="address_mother_alert"></div>
                                    </div>
                                </div>
                                {{--end form father form --}}
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
            getDataMember();

            $('.date').datepicker({
                format: 'yyyy-mm-dd', 
            });
        });
        $('#management-member').addClass('active');

        const getDataMember = (type = 'active') => {
            $('#info-card').text(`List Member - ${capitalizeFirstLetter(type)}`)
            $(`#table-${type}`).DataTable({
                destroy: true,
                ajax: {
                    url: "{{ url('management-member') }}",
                    type: "get",
                    data: {
                        "type": type,
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex"
                    },
                    {
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "date_of_birth",
                        name: "date_of_birth"
                    },
                    {
                        data: "place_of_birth",
                        name: "place_of_birth"
                    },
                    {
                        data: "email",
                        name: "email"
                    },
                    {
                        data: "status_member",
                        name: "status_member"
                    },
                    {
                        data: "id",
                        name: "id",
                        render: (data) => {
                            return `<center>
                                <span class='bx bxs-user-detail' onclick="showModal('edit','${data}')"></span>
                            </center>`;
                        }
                    },
                    {
                        data: "id",
                        name: "id",
                        render: (data) => {
                            return `<center>
                                <span class='bx bxs-user-x' onclick="alert('${type}',${data})"></span>
                            </center>`;
                        }
                    },
                    {
                        data: "id",
                        name: "id",
                        render: (data) => {
                            return `<center>
                                <span class='bx bxs-user' onclick="reverse('${data}')"></span>
                            </center>`;
                        }
                    }
                ],
                columnDefs: [
                        {
                            target: [6,7],
                            visible: type == 'inactive' ? false : true,
                            searchable: false,
                        },
                        {
                            target: [8],
                            visible: type == 'inactive' ? true : false,
                            searchable: false,
                        },
                ],

            });
        }

        const alert = (type,id) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, delete it!`
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"DELETE",
                        url :"{{ url('management-member') }}/" + id,
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
                            $(`#table-${type}`).DataTable().ajax.reload();
                        }
                    })
                }
            })
        }

        const reverse = (id) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, reverse it!`
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"get",
                        url :"{{ url('management-member-reverse') }}/" + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success : (res) => {
                            sweetSuccess(res)
                        },
                        complete : () => {
                            $(`#table-inactive`).DataTable().ajax.reload();
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

        const showModal = (type,id) => {
            $('.text-danger').empty()
            $('.is-invalid').removeClass('is-invalid')
            $('#form')[0].reset()
            if (type == 'add') {
                $('.modal-title').text('Form Add Member');
                $('.my-pond').filepond();
                $('#modal').modal('show');
                $('#submit').attr('onclick','add()');
            }else{
                edit(id)
            }
        }

        const add = () => {
            let file = $(`.my-pond`).filepond('getFiles');
            let formData = new FormData($('#form').get(0));
            if (file.length != 0) {
                formData.append('user_profil',file[0].file,file[0].file.file_name);
            }
            
            $.ajax({
                type : "POST",
                url : "{{ url('management-member') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data : formData,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success : (res) => {
                    sweetSuccess(res.status,res.message)
                    $(`#table-active`).DataTable().ajax.reload();
                    $('#modal').modal('hide');
                },
                error : (res) => {
                    errorHandle(res)
                },
            })
        }

        const edit = (id) => {
            $.ajax({
                url : `{{ url('management-member') }}/${id}/edit`,
                success : (res) => {
                    let data = res.data;
                    $('#name').val(data.name);
                    $('#id_card').val(data.id_card);
                    $('#date_of_birth').val(data.date_of_birth);
                    $('#place_of_birth').val(data.place_of_birth);
                    $('#email').val(data.email);
                    $('#phone_number').val(data.phone_number);
                    $('#proffesion').val(data.proffesion);
                    $('#role').val(data.role);
                    $('#address').val(data.address);
                    showProfilImage(data)
                    showParent(data);
                    let params = paramsUpdate(data);
                    $('#submit').attr('onclick',`update(${params})`);
                    $('#modal').modal('show');
                },
                error : (res) => {
                    errorHandle(res)
                },
            })
        }

        const showProfilImage = (data) => {
            $('.my-pond').filepond();
            if (data.image_user != null) {
                $('.my-pond').filepond('addFile', `{{asset('upload/user_image/${data.image_user}')}}`)
                .then(function(file){

                });
            }
        }

        const showParent = (data) => {
            let family = data.family;
            family.forEach(el => {
                if (el.parents_gender == 'male') {
                    $('#name_father').val(el.name);
                    $('#id_card_father').val(el.id_card);
                    $('#date_of_birth_father').val(el.date_of_birth);
                    $('#place_of_birth_father').val(el.place_of_birth);
                    $('#address_father').val(el.address);
                    $('#phone_number_father').val(el.phone_number);
                }else{
                    $('#name_mother').val(el.name);
                    $('#id_card_mother').val(el.id_card);
                    $('#date_of_birth_mother').val(el.date_of_birth);
                    $('#place_of_birth_mother').val(el.place_of_birth);
                    $('#address_mother').val(el.address);
                    $('#phone_number_mother').val(el.phone_number);
                }
            });
        }

        const paramsUpdate = (data) => {
            let family = data.family;
            let id_father = null
            let id_mothher = null
            family.forEach(el => {
                if (el.parents_gender == 'male') {
                    id_father = el.id
                }else{
                    id_mother = el.id
                }
            });
            return `'${data.id}','${id_father}','${id_mother}'`
        }

        const update = (id,father_id,mother_id) =>{
            let file = $(`.my-pond`).filepond('getFiles');
            let data = $('#form').serialize();
            data += `&id=${id}&father_id=${father_id}&mother_id=${mother_id}`
            let formData = new FormData($('#form').get(0));
            // formData.append('user_profil',file[0].file,file[0].file.file_name);
            // formData.append('father_id',father_id);
            // formData.append('mother_id',mother_id);
            $.ajax({
                type : "patch",
                url : "{{ url('management-member') }}/"+id,
                data:data,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success : (res) => {
                    sweetSuccess(res.status,res.message)
                    $(`#table-active`).DataTable().ajax.reload();
                    $('#modal').modal('hide');
                },
                error : (res) => {
                    errorHandle(res)
                },
            })
        }
    </script>
@endsection