<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Caseth La Magasin's</title>
    <link rel="icon" href="{{ 'asset-views/img/logo-caseth-bg.png' }}" type="image/icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <!-- FEATHER ICONS -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('asset-views/css/style.css?v=1.0') }}" />
    {{ $slot }}
    <!-- Alphine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- App -->
    <script src="{{ asset('asset-views/src/app.js') }}"></script>

    {{-- LINK NPM --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- Tailwind link --}}
    @vite('resources/css/app.css')

</head>
