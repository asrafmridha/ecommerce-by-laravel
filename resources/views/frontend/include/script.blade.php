<script src="{{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('frontend') }}/styles/bootstrap4/popper.js"></script>
<script src="{{ asset('frontend') }}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{ asset('frontend') }}/plugins/slick-1.8.0/slick.js"></script>
<script src="{{ asset('frontend') }}/plugins/easing/easing.js"></script>
<script src="{{ asset('frontend') }}/js/custom.js"></script>

{{-- toster Script  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@yield('js')


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

