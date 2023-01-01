
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('backend') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('backend') }}/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="{{ asset('backend') }}/app-assets/vendors/js/extensions/toastr.min.js"></script>

  {{-- for chart  --}}
    <script src="{{ asset('backend') }}/app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="{{ asset('backend') }}/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backend') }}/app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('backend') }}/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('backend') }}/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>

    <script src="{{ asset('backend') }}./app-assets/js/scripts/charts/chart-chartjs.js"></script>
    <!-- END: Page JS-->

     {{-- toster Script  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- trix editor js  --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- for jQuery <Table></Table> --}}
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  @yield('js')

 
   


  <script>
     $(document).ready( function () {
        $('#table_id').DataTable();
    } );

  </script>

     <!-- Toastr Message Script-->
<script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        $(window).on("load", function(){
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif

            @if(session()->get('error'))
                toastr.error('{{ session()->get('error') }}');
            @endif

            @if(session()->get('success'))
                toastr.success('{{ session()->get('success') }}');
            @endif
        });
</script>

@yield('js')






