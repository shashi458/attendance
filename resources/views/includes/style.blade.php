<link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- Toastr Js Css --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .car-header {
        background: #e6f2fc;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 0.75rem;
        display: flex;
        align-items: center;
        position: relative;
        z-index: 10;
    }
    .car-dropdown-btn {
        background: none;
        border: none;
        color: #6b6b6b;
        font-size: 1.25rem;
        font-weight: 600;
        padding: 0.5rem 1rem;
        transition: color 0.2s ease-in-out;
        display: flex;
        align-items: baseline;
    }
    .car-dropdown-btn:hover {
        color: #6b6b6b;
    }
    .car-dropdown-btn:focus {
        outline: none;
        color: #6b6b6b;
        box-shadow: none;
    }
    .car-dropdown-btn .car-parent-name {
        font-size: 0.9rem;
        color: #bcb8b8;
        margin-right: 0.25rem;
    }
    .dropdown {
        position: relative;
    }
    .dropdown-menu {
        width: 250px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        position: absolute;
        top: 100%;
        left: 1rem;
        margin-top: 0.25rem;
        padding: 0.5rem 0;
        z-index: 5;
    }
    .dropdown-header {
        font-size: 1rem;
        font-weight: 700;
        color: #005eb2;
        padding: 0.5rem 1rem;
    }
    .dropdown-item {
        font-size: 0.95rem;
        color: #495057;
        padding: 0.5rem 1.5rem;
        transition: background-color 0.2s ease-in-out;
    }
    .dropdown-item:hover {
        background-color: #e6f0fa;
        color: #005eb2;
    }
    .dropdown-divider {
        margin: 0.25rem 0;
    }
    /* Tablet view (768px - 991px) */
    @media (max-width: 991px) {
        .car-header {
            padding: 0.5rem;
        }
        .car-dropdown-btn {
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
            width: 100%;
            text-align: left;
        }
        .car-dropdown-btn .car-parent-name {
            font-size: 0.8rem;
        }
        .dropdown-menu {
            width: calc(100vw - 1rem);
            left: 0;
            right: 0;
            border-radius: 0;
            box-shadow: none;
            position: absolute;
            top: 100%;
            margin-top: 0.25rem;
        }
        .dropdown-header {
            font-size: 0.95rem;
        }
        .dropdown-item {
            font-size: 0.9rem;
        }
    }
    /* Mobile view (below 768px) */
    @media (max-width: 767px) {
        .car-header {
            padding: 0.5rem;
        }
        .car-dropdown-btn {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            width: 100%;
            text-align: left;
        }
        .car-dropdown-btn .car-parent-name {
            font-size: 0.75rem;
        }
        .dropdown-menu {
            width: calc(100vw - 1rem);
            left: 0;
            right: 0;
            border-radius: 0;
            box-shadow: none;
            position: absolute;
            top: 100%;
            margin-top: 0.25rem;
        }
        .dropdown-header {
            font-size: 0.9rem;
        }
        .dropdown-item {
            font-size: 0.85rem;
        }
    }
</style>
