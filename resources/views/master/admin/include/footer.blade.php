<!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('admin/admin_template/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('admin/admin_template/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('admin/admin_template/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('admin/admin_template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}">
        </script>

        <script src="{{ asset('admin/admin_template/assets/vendor/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{ asset('admin/admin_template/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('admin/admin_template/assets/js/main.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('admin/admin_template/assets/js/dashboards-analytics.js') }}"></script>
        
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        
        {{-- Datatables --}}
        {{-- <script src="{{ asset('admin/admin_template/libs/datatables/jquery.dataTables.js') }}"></script> --}}
        {{-- <script src="{{ asset('admin/admin_template/libs/datatables/datatables-bootstrap5.js') }}"></script> --}}
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- datepicker --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- include FilePond library -->
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

        <!-- include FilePond plugins -->
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

        <!-- include FilePond jQuery adapter -->
        <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

        <script>
                const capitalizeFirstLetter = (string) => {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }

                const errorHandle = (response) => {
                    if (response.responseJSON.errors == null) {
                        sweetError(response.responseJSON.message)
                    } else {
                        let fail = response.responseJSON.errors;
                        let key = Object.keys(fail)
                        loopingError(fail, key)
                    }
                }

                sweetError = (message) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: message,
                    })
                }

                sweetSuccess = (status, message) => {
                    Swal.fire(
                        'Good job!',
                        message,
                        status
                    );
                }

                loopingError = (fail, key) => {
                    $('.is-invalid').removeClass('is-invalid')
                    for (let index = 0; index < key.length; index++) {
                        if (fail.hasOwnProperty(`${key[index]}`)) {
                            $(`#${key[index]}`).addClass('is-invalid');
                            $(`#${key[index]}_alert`).text(fail[`${key[index]}`][0]);
                            sweetError(fail[`${key[index]}`][0]);
                        }
                    }
                }
        </script>


