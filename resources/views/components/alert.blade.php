<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
            @if (session('success'))
            Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
            });
            @endif
            </script>

             {{-- Confirm Alert --}}
            <script>
                function confirmAuth() {
                Swal.fire({
                title: "Anda harus login terlebih dahulu",
                text: "Untuk melakukan aksi ini, silakan login atau register.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Login",
                cancelButtonText: "Register",
                showCloseButton: true,
                customClass: {
                    confirmButton: 'btn-login',
                    cancelButton: 'btn-register'
                }

            }).then((result) => {
                if (result.isConfirmed) {
                // arahkan ke halaman login
                    window.location.href = '{{ route('login') }}';
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    //arahkan ke halaman register
                    window.location.href = '{{ route('register') }}';
                }
             });
         }
            </script>
