<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Local JS via asset() -->
<script src="{{ asset('js/vendors.min.js') }}"></script>
<script src="{{ asset('js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>

<script src="{{ asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>

<!-- App Scripts -->
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/pages/dashboard.js') }}"></script>
<script src="{{ asset('js/pages/calendar-dash.js') }}"></script>
<script src="{{ asset('js/pages/data-table.js') }}"></script>
<script src="{{ asset('js/pages/notification.js') }}"></script>

<!-- DataTable -->
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>

<!-- Bootstrap Bundle CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- Toastr Js Script --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- End Toastr Js Script --}}
	<script src="../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
<script src="js/pages/advanced-form-element.js"></script>
 {{-- Include Quill CSS and JS --}}

@yield('script')
<script>
    function updateDateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        document.getElementById('currentDateTime').textContent = now.toLocaleString('en-US', options);
    }

    updateDateTime(); // Initial call
    setInterval(updateDateTime, 1000); // Update every second

    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const button = document.getElementById('filterDropdown');
            const sectionDiv = item.closest('div'); // Find the parent div of the clicked item
            const parentName = sectionDiv.querySelector('.dropdown-header')
            .textContent; // Get the header within that div
            const selectedName = item.textContent;
            button.innerHTML = `<span class="car-parent-name">${parentName}</span> ${selectedName}`;
        });
    });
</script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    }
</script>
@if (session()->has('SuccessToastr'))
    <script>
        toastr.success("{!! session()->get('SuccessToastr') !!}", {
            timeOut: 2500
        });
    </script>
@endif

@if (session()->has('InfoToastr'))
    <script>
        toastr.info("{!! session()->get('InfoToastr') !!}", {
            timeOut: 2500
        });
    </script>
@endif

@if (session()->has('ErrorToastr'))
    <script>
        toastr.error("{!! session()->get('ErrorToastr') !!}", {
            timeOut: 2500
        });
    </script>
@endif
</script>
