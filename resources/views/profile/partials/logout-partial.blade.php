<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Logout') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button>
        <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); confirmLogout();">
                {{ __('Logout') }}
            </a>
        </form>
    </x-danger-button>
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will out from this account',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#987070',
                cancelButtonColor: '#dbb5b5',
                confirmButtonText: 'Yes',
                customClass: {}
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>

</section>
