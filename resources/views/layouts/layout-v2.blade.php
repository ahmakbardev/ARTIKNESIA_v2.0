<!DOCTYPE html>
<html lang="id">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('custom-seo')
    <title>@yield('title', 'ARTIKNESIA')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="{{ asset('images/logo/logo-square.png') }}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Add cache-control headers for Font Awesome CSS -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" as="style"
          crossorigin="anonymous"/>
    <!-- Add cache-control headers for Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <!-- Append version number to CSS file name -->
    <link rel="stylesheet" href="{{ asset('css/app.css?v=1.06') }}">
    <!-- Add cache-control headers for CSS and JavaScript files -->
    <link rel="preload" href="{{ asset('css/app.css?v=1.06') }}" as="style" crossorigin="anonymous"/>
    @livewireStyles
</head>

<body class=" font-montserrat box-border">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@include('layouts.components.navbar')

<main class="max-w-[1444px] mx-auto lg:px-10 xl:px-24 lg:mt-5">
    @yield('content')
</main>

{{-- @include('layouts.components.toast') --}}
@include('layouts.components.footer')
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@livewireScripts
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cartBtn = document.getElementById('cart-btn');
        const cartDropdown = document.getElementById('cart-dropdown');

        // Hide the dropdown on page load if you want it hidden initially
        cartDropdown.style.display = 'none';

        cartBtn.addEventListener('click', function () {
            if (cartDropdown.style.display === 'none' || cartDropdown.style.display === '') {
                cartDropdown.style.display = 'flex';
                cartDropdown.style.flexDirection = 'column';
            } else {
                cartDropdown.style.display = 'none';
            }
        });

        document.addEventListener('click', function (event) {
            if (!cartBtn.contains(event.target) && !cartDropdown.contains(event.target)) {
                cartDropdown.style.display = 'none';
            }
        });
    });
</script>
<script>
    // Get DOM elements
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtns = document.querySelectorAll('#closeModalBtn, #closeModalBtnFooter');

    // Show modal when clicking the open button
    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Close modal when clicking any close button
    closeModalBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    });

    // Optional: Close modal when clicking outside the modal content
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>
<script>
    window.addEventListener('swal', function (e) {
        console.log()
        Swal.fire({
            title: 'Success!',
            text: e.detail.message,
            icon: (e.detail.success) ? 'success' : 'error',
            showConfirmButton: false,
            timer: 500
        });
    });
</script>
</body>

</html>
